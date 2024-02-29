<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_fisik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_kegiatan"
        ];
        $this->load->view('upload_kegiatan/kegiatan_fisik/view', $data);
    }

    public function load()
    {
        $result = $this->mquery->select_data("data_kegiatan_fisik", "id_kegiatan_fisik ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {

            // $update_data =  [
            //     'id_skpd' => 37
            // ];
            // if($r['nama_skpd']=="SEKRETARIAT DPRD PROVSU")
            // {$this->db->update('data_kegiatan_fisik', $update_data, ['id_kegiatan_fisik' => $r['id_kegiatan_fisik']]);}

            $data_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $r['id_skpd']]);

            $no++;
            $row = [
                'no' => $no,
                'kode_tender' => $r['kode_tender'],
                'nama_tender' => $r['nama_tender'],
                'id_skpd' => $r['id_skpd'],
                'nama_skpd' => $r['nama_skpd'],
                'nilai_pagu' => $r['nilai_pagu'],
                'nilai_hps' => $r['nilai_hps'],
                'harga_penawaran' => $r['harga_penawaran']
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form_upload()
    {
        $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
        $data = [
            'id_skpd' => $id_skpd
        ];
        $this->load->view('upload_kegiatan/kegiatan_fisik/form_upload', $data);
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = 33;
        $object = new PHPExcel();
        $new_file = "";

        $config['upload_path'] = "./uploads/berkas/excel/";
        $config['allowed_types'] = 'xls';
        $config['file_name'] = $id_skpd . '-' . date("Ymd-His");
        $config['max_size'] = 1512;

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
                
                    $this->db->trans_start();
                    $data = array();
                    $numrow = 0;
                    $kode_rekening='';
                    $realisasi='';
                    foreach ($sheet as $row) {
                        if ($numrow >= 1) {
                            
                            // $array_kegiatan_fisik =  [
                            //     'kode_tender' => $row['B'],
                            //     'kode_rup' => cek_angka($row['C']),
                            //     'nama_tender' => cek_string($row['D']),
                            //     'tanggal_tayang' => cek_string($row['E']),
                            //     'anggaran' => cek_string($row['F']),
                            //     'nama_skpd' => cek_string($row['H']),
                            //     'kategori' => cek_string($row['I']),
                            //     'id_metode' => cek_string($row['J']),
                            //     'kualifikasi' => cek_string($row['K']),
                            //     'dokumen' => cek_string($row['L']),
                            //     'motode_evaluasi' => cek_string($row['M']),
                            //     'nilai_pagu' => cek_angka($row['N']),
                            //     'nilai_hps' => cek_angka($row['O']),
                            //     'nama_pemenang' => cek_string($row['P']),
                            //     'harga_penawaran' => cek_angka($row['Q']),
                            //     'st_jadwal' => cek_string($row['R'])
                            // ];
                            // $this->db->insert('data_kegiatan_fisik', $array_kegiatan_fisik);

                           // $temp_metode=str_replace(' ', '', $row['J']);
                            
                            // $id_kegiatan_fisik=angka($row['A']);
                            // $kategori=angka($row['I']);
                            // $id_metode=angka($row['J']);

                            // if($temp_metode=="Tender"){$id_metode=3; $nama_metode="";}
                            // else if($temp_metode=="TenderCepat"){$id_metode=5; $nama_metode="";}
                            // else if($temp_metode=="Seleksi"){$id_metode=6; $nama_metode="";}
                            // else {$id_metode=0; $nama_metode=$row['J'];}

                            // $update_data_fisik =  [
                            //     'id_metode' => $id_metode,
                            //     'kategori' => $kategori
                            // ];
                            // $this->db->update('data_kegiatan_fisik', $update_data_fisik, ['id_kegiatan_fisik' => $id_kegiatan_fisik]);

                        }
                        $numrow++;
                    }
                    $this->db->trans_complete();
                    $res = $this->db->trans_status();
                    //$res=1;
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }   
    }
    
}
