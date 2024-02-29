<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->load->library('PHPExcel');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_anggaran_pemko",
        ];
        $this->load->view('upload_anggaran/pemko/view', $data);
    }

    public function load()
    {
        $result = $this->mquery->select_by('data_uraian_kegiatan_pemko', ['tahun' => 2021], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row = [
                'no' => $no,
                'tahun' => bulan($r['tahun']),
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $r['uraian'],
                'anggaran' => format_rupiah($r['anggaran'])
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form_upload()
    {
        $this->load->view('upload_anggaran/pemko/form_upload');
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $object = new PHPExcel();
        $new_file = "";

        $config['upload_path'] = "./uploads/berkas/excel/";
        $config['allowed_types'] = 'xls';
        $config['file_name'] = 'anggaran-pemko-' . date("Ymd-His");
        $config['max_size'] = 512;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file_upload')) {
            $errors = [
                'file_upload' => $this->upload->display_errors()
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $upload = $this->upload->data();
            $new_file = $upload['file_name'];

            if ($new_file != "" || $new_file != NULL) {
                $excelreader     = new PHPExcel_Reader_Excel5();
                $loadexcel         = $excelreader->load('./uploads/berkas/excel/' . $new_file);
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $data = array();
                $numrow = 0;
                $kode_rekening='';
                $uraian='';
                $level='';
                $anggaran='';
                $jenis=1;
                $this->db->trans_start();
                $this->db->delete('data_uraian_kegiatan_pemko', ['tahun' => $post['tahun'], 'st_anggaran' => $post['status']]);
                
                foreach ($sheet as $row) {
                    if ($numrow > 10) {
                        $cek_D = strlen($row['D']);
                        if ($cek_D != 0) {
                            $kode_rekening=$row['D'];
                            $anggaran = konversi_angka($row['Q']);
                            $cek_H = strlen($row['H']);
                            $cek_I = strlen($row['I']);
                            $cek_J = strlen($row['J']);
                            $cek_K = strlen($row['K']);
                            $cek_L= strlen($row['L']);
                            if ($cek_H >= 1){$uraian=$row['H'];$level=1;}
                            elseif ($cek_I >= 1){$uraian=$row['I'];$level=2;}
                            elseif ($cek_J >= 1){$uraian=$row['J'];$level=3;}
                            elseif ($cek_K >= 1){$uraian=$row['K'];$level=4;}
                            elseif ($cek_L >= 1){$uraian=$row['L'];$level=5;}
                            else {$uraian="";$level=6;}

                            if ($row['H']== "BELANJA DAERAH"){$jenis=2;}
                            if ($row['I']== "PENERIMAAN PEMBIAYAAN"){$jenis=3;}
                            if ($row['I']== "PENGELUARAN PEMBIAYAAN"){$jenis=4;}

                            $array_alokasi =  [
                                'kode_rekening' => $kode_rekening,
                                'uraian' => $uraian,
                                'level' => $level,
                                'anggaran' => $anggaran,
                                'jenis' => $jenis,
                                'tahun' => $post['tahun'],
                                'st_anggaran' => $post['status']
                            ];
                            
                            $this->db->insert('data_uraian_kegiatan_pemko', $array_alokasi);
                        }
                    }
                    $numrow++;
                }
                $this->db->trans_complete();
                $res = $this->db->trans_status();

                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }   
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $id_decrypt = decrypt_url($id);
        if ($id_decrypt == "error") {
            $data = ['notif' => FALSE, 'pesan' => "blocked"];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $temp_alokasi = $this->mquery->select_id('data_alokasi_pemko', ['id_alokasi_pemko' => $id_decrypt]);
            $temp_realisasi = $this->mquery->select_id('data_realisasi_pemko', ['id_realisasi_pemko' => $id_decrypt]);
            $string = ['data_alokasi_pemko' => $temp_alokasi, 'data_realisasi_pemko' => $temp_realisasi];
            $log = simpan_log("delete lra pemko", json_encode($string));
            $this->db->trans_start();
            $this->db->delete('data_alokasi_pemko', ['id_alokasi_pemko' => $id_decrypt]);
            $this->db->delete('data_realisasi_pemko', ['id_realisasi_pemko' => $id_decrypt]);
            $this->db->insert('log_user', $log);
            $this->db->trans_complete();
            $res = $this->db->trans_status();
            $data = ['notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
}
