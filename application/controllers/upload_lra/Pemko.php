<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->load->model('M_fungsi', 'fungsi');
        $this->load->library('PHPExcel');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_lra_pemko",
        ];
        $this->load->view('upload_lra/pemko/view', $data);
    }

    public function load()
    {
        $tahun = 2021;
        $result = $this->mquery->select_by('log_upload', ['tahun' => $tahun, 'st_data' =>1], "bulan ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("upload/lra-pemko/detail/" . $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 4]);
            $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 5]);
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);
            
            $row = [
                'no' => $no,
                'tahun' => 2021,
                'bulan' => $nama_bulan,
                'realisasi_pendapatan' => format_rupiah($row_realisasi_pendapatan['realisasi']),
                'persen_pendapatan' => format_rupiah($row_realisasi_pendapatan['persen'])." %",
                'realisasi_belanja' => format_rupiah($row_realisasi_belanja['realisasi']),
                'persen_belanja' => format_rupiah($row_realisasi_belanja['persen'])." %",
                'tanggal_data' => $r['tgl_data'],
                'tanggal_input' => $r['tanggal_input'],
                'user_input' => $row_users['username']
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form_upload()
    {
        $this->load->view('upload_lra/pemko/form_upload');
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $object = new PHPExcel();
        $new_file = "";

        $config['upload_path'] = "./uploads/berkas/excel/";
        $config['allowed_types'] = 'xls';
        $config['file_name'] = 'lra-gabungan-' . date("Ymd-His");
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
                $realisasi='';

                $this->db->trans_start();

                $this->db->delete('data_realisasi_detail_pemko', ['tahun' => $post['tahun'], 'bulan' => $post['bulan']]);
                $this->db->delete('log_upload', ['tahun' => $post['tahun'], 'bulan' => $post['bulan'], 'st_data' => 1]);
               
                foreach ($sheet as $row) {
                    if ($numrow > 10) {
                        $cek_D = strlen($row['D']);
                        if ($cek_D != 0) {
                            $kode_rekening=$row['D'];
                            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $post['tahun'], 'kode_rekening' => $kode_rekening]);
                            $nilai_anggaran=$row_uraian['anggaran'];
                            $realisasi = konversi_angka($row['U']);
                            if($realisasi==0){$persen=0;}
                            else
                            {
                                if($nilai_anggaran==0){$persen=0;}
                                else{
                                    $temp_persen=$realisasi/$nilai_anggaran*100;
                                    $persen=round($temp_persen,2);
                                }
                            }
                            
                            $array_realisasi =  [
                                'kode_rekening' => $kode_rekening,
                                'realisasi' => $realisasi,
                                'persen' => $persen,
                                'tahun' => $post['tahun'],
                                'bulan' => $post['bulan']
                            ];
                            $this->db->insert('data_realisasi_detail_pemko', $array_realisasi);
                        }
                    }
                    $numrow++;
                }

                $array_tanggal =  [
                    'tahun' => $post['tahun'],
                    'bulan' => $post['bulan'],
                    'id_skpd' => 99,
                    'tgl_data' => $post['tanggal'],
                    'tanggal_input' => date('Y-m-d H:i:s'),
                    'user_input' => $this->akses['user']
                ];
                $this->db->insert('log_upload', $array_tanggal);

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


    public function detail($bulan)
    {
        $row_log_upload = $this->mquery->select_id('log_upload', ['tahun' => 2021, 'bulan' => $bulan, 'st_data' => 1]);
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_lra_pemko",
            "bulan" => $bulan,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('upload_lra/pemko/view_detail', $data);
    }

    public function load_detail()
    {
        $tahun = 2021;
        $bulan = $this->input->post('bulan');
        $result = $this->mquery->select_by('data_realisasi_detail_pemko', ['tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening']]);
            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => bulan($bulan),
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $row_uraian['uraian'],
                'anggaran' => format_rupiah($row_uraian['anggaran']),
                'realisasi' => format_rupiah($r['realisasi']),
                'persen' => format_rupiah($r['persen'])." %"
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }
}
