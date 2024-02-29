<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasikontrak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "realisasi-kontrak"
        ];
        $this->load->view('upload_data/realisasikontrak/view', $data);
    }

    public function load()
    {
        $tahun=2021;
        if ($this->akses['role'] == "master" or $this->akses['role'] == "admin") {
            $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $row_anggaran = $this->mquery->select_id('realisasi_kontrak', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd']]);
                $hasil_anggaran=$row_anggaran['nilai'];

                $nama_skpd = "<a href=" . base_url("realisasi-kontrak-detail/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'anggaran' => "Rp. ".format_rupiah($hasil_anggaran)
                ];
                $data[] = $row;
            }
            $output['data'] = $data;
            echo json_encode($output);
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function detail($encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "realisasi-kontrak",
            "skpd" => $skpd
        ];
        $this->load->view('upload_data/realisasikontrak/view_detail', $data);
    }

    public function load_anggaran()
    {
        $id_skpd = $this->input->post('id');
        $result = $this->mquery->select_by('realisasi_kontrak_detail', ['tahun' => 2021, 'id_skpd' => $id_skpd], "bulan ASC");
        $data = [];
        $no = 0;
        $total=0;
        foreach ($result as $r) {
            $no++;
            $total=$total+$r['nilai'];
            $row = [
                'no' => $no,
                'tahun' => bulan($r['tahun']),
                'bulan' => $r['bulan'],
                'anggaran' => "Rp. ".format_rupiah($r['nilai']),
                'total' => "Rp. ".format_rupiah($total)
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
        $this->load->view('upload_data/realisasikontrak/form_upload', $data);
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = htmlspecialchars($post['id_skpd']);
        $object = new PHPExcel();
        $new_file = "";

        $config['upload_path'] = "./uploads/berkas/excel/";
        $config['allowed_types'] = 'xls';
        $config['file_name'] = $id_skpd . '-' . date("Ymd-His");
        $config['max_size'] = 1012;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file_upload')) {
            $errors = [
                'file_upload' => $this->upload->display_errors()
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } 
        else
        {
            $upload = $this->upload->data();
            $new_file = $upload['file_name'];

            if ($new_file != "" || $new_file != NULL) 
            {
                $excelreader     = new PHPExcel_Reader_Excel5();
                $loadexcel         = $excelreader->load('./uploads/berkas/excel/' . $new_file);
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                
                $numrow = 0;
                $cek_validasi=0;
                foreach ($sheet as $row) {
                    if ($numrow > 2) {
                        if ($row['F']== "DAFTAR REALISASI PEMBAYARAN KONTRAK"){$cek_validasi=1;}
                    }
                    $numrow++;
                }

                if($cek_validasi==0)
                {
                    $errors = [
                        'data error' => 'data error'
                    ];
                    $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Format Tidak Sesuai'];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
                else
                {
                    $numrow = 0;
                    $anggaran=0;
                    $realisasi=0;
                    foreach ($sheet as $row) {
                        $numrow++; 
                        if ($numrow > 5) {
                            if ($row['M']== "JUMLAH")
                            {
                                $anggaran = konversi_angka($row['N']);
                                $realisasi = konversi_angka($row['S']);
                            }
                            
                        }
                    }
                        $this->db->trans_start();
                        $this->db->delete('realisasi_kontrak', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                        $this->db->delete('realisasi_kontrak_detail', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $post['bulan']]);
                        
                        $array_anggaran =  [
                            'id_skpd' => $id_skpd,
                            'tahun' => $post['tahun'],
                            'nilai' => $anggaran
                        ];
                        $this->db->insert('realisasi_kontrak', $array_anggaran);

                        $array_realisasi =  [
                            'id_skpd' => $id_skpd,
                            'tahun' => $post['tahun'],
                            'bulan' => $post['bulan'],
                            'nilai' => $realisasi
                        ];
                        $this->db->insert('realisasi_kontrak_detail', $array_realisasi);

                        $this->db->trans_complete();
                        $res = $this->db->trans_status();

                        $data = ['status' => TRUE, 'notif' => $res];
                        $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
                    

            }
        }
    }   

    function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $id_realisasi = decrypt_url($id);
        if ($id_realisasi == "error") {
            $data = ['notif' => FALSE, 'pesan' => "blocked"];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $temp = $this->mquery->select_id('data_realisasi', ['id_realisasi' => $id_realisasi]);
            $string = ['realisasi' => $temp];
            $log = simpan_log("delete realisasi", json_encode($string));
            $res = $this->mquery->delete_data('data_realisasi', ['id_realisasi' => $id_realisasi], $log);
            $data = ['notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }


}
