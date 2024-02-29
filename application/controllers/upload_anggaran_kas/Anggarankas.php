<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggarankas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "upload_data",
                "submenu_active" => "upload-anggaran-kas"
            ];
            $this->load->view('upload_data/anggarankas/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }


    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            if ($this->user['is_skpd'] == 'Y') {
                $user = $this->mquery->select_id('users', ['id_user' => $this->user['user']]);
                $result = $this->mquery->select_by("data_skpd", ['id_skpd'=>$user['id_skpd']]);
            } else {
                $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            }
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                $row_anggaran = $this->mquery->select_id('anggaran_kas', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd']]);
                $hasil_anggaran=$row_anggaran['nilai'];

                $nama_skpd = "<a href=" . base_url("upload-anggaran-kas/detail/" . $tahun ."/". $encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                $nama_file = "<a href=" . base_url("uploads/berkas/excel/" . $row_anggaran['namafile']) . ">" . $row_anggaran['namafile'] . "</a>";

                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'namafile' => $nama_file,
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

    public function detail($tahun, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload-anggaran-kas",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('upload_data/anggarankas/view_detail', $data);
    }

    public function load_anggaran()
    {
        $id_skpd = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $result = $this->mquery->select_by('anggarankas_detail', ['tahun' => $tahun, 'id_skpd' => $id_skpd], "bulan ASC");
        $data = [];
        $no = 0;
        $total=0;
        foreach ($result as $r) {
            $no++;
            $total=$total+$r['nilai'];
            $row = [
                'no' => $no,
                'tahun' => $r['tahun'],
                'bulan' => bulan($r['bulan']),
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
        $tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        $data = [
            'id_skpd' => $id_skpd,
            'tahun' => $tahun
        ];
        $this->load->view('upload_data/anggarankas/form_upload', $data);
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = htmlspecialchars($post['id_skpd']);
        $object = new PHPExcel();
        $new_file = "";

        $config['upload_path'] = "./uploads/berkas/excel/";
        $config['allowed_types'] = 'xlsx';
        $config['file_name'] = 'anggaran_kas_' . $id_skpd . '_' . date("Ymd-His");
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
                $excelreader     = new PHPExcel_Reader_Excel2007();
                $loadexcel         = $excelreader->load('./uploads/berkas/excel/' . $new_file);
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                
                $numrow = 0;
                $cek_validasi=0;
                foreach ($sheet as $row) {
                    $numrow++;
                    if ($numrow == 10) {
                        if ($row['B']== "BELANJA"){$cek_validasi=1;}
                    }
                }

                if($cek_validasi==0)
                {
                    $errors = [
                        'data error' => 'data error'
                    ];
                    $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Format Tidak Sesuai. Klik Download Format Excel, Untuk Format Yang Sesuai.'];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
                else
                {
                    $numrow = 0;
                    $anggaran=0;
                    $realisasi=array();
                    foreach ($sheet as $row) {
                        $numrow++; 
                        if ($numrow == 10) {
                                $anggaran = number_only($row['C']);
                                $realisasi[1] = number_only($row['E']);
                                $realisasi[2] = number_only($row['F']);
                                $realisasi[3] = number_only($row['G']);
                                $realisasi[4] = number_only($row['I']);
                                $realisasi[5] = number_only($row['J']);
                                $realisasi[6] = number_only($row['K']);
                                $realisasi[7] = number_only($row['M']);
                                $realisasi[8] = number_only($row['N']);
                                $realisasi[9] = number_only($row['O']);
                                $realisasi[10] = number_only($row['Q']);
                                $realisasi[11] = number_only($row['R']);
                                $realisasi[12] = number_only($row['S']);
                            }
                    }

                        $row_anggaran_kas=$this->mquery->select_id("anggaran_kas", ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
        
                        $this->db->trans_start();
                        $this->db->delete('anggaran_kas', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                        $this->db->delete('anggarankas_detail', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                        
                        $array_anggaran =  [
                            'id_skpd' => $id_skpd,
                            'tahun' => $post['tahun'],
                            'nilai' => $anggaran,
                            'namafile' => $new_file
                        ];
                        $this->db->insert('anggaran_kas', $array_anggaran);

                        for ($i = 1; $i < 13; $i++)
                        {
                            $array_realisasi =  [
                                'id_skpd' => $id_skpd,
                                'tahun' => $post['tahun'],
                                'bulan' => $i,
                                'nilai' => $realisasi[$i]
                            ];
                            $this->db->insert('anggarankas_detail', $array_realisasi);
                        }

                        $this->db->trans_complete();
                        $res = $this->db->trans_status();
                        if ($res > 0) {
                            hapus_file('/uploads/berkas/excel/' , $row_anggaran_kas['namafile']);
                        }
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
