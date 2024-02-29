<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggarankas extends CI_Controller
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
            "submenu_active" => "anggaran-kas"
        ];
        $this->load->view('upload_data/anggarankas/view', $data);
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

                $result_realisasi = 0;
                $where = array('tahun' => $tahun, 'id_skpd' => $r['id_skpd']);
                $result_count = $this->mquery->count_data("data_uraian_kegiatan_skpd", $where);
                $row_anggaran_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 4]);
                $row_anggaran_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['tahun' => $tahun, 'id_skpd' => $r['id_skpd'], 'kode_rekening' => 5]);
                $row_anggaran_pendapatan_pemko = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => 4]);
                
                $this->db->select_sum('anggaran');
                $this->db->where(['level' => 1, 'jenis' => 1]);
                $row_anggaran_belanja_pemko = $this->db->get('data_uraian_kegiatan_skpd')->row_array();

                $temp_pendapatan=$row_anggaran_pendapatan['anggaran']/$row_anggaran_pendapatan_pemko['anggaran']*100;
                $persen_pendapatan=round($temp_pendapatan,3);
                $temp_belanja=$row_anggaran_belanja['anggaran']/$row_anggaran_belanja_pemko['anggaran']*100;
                $persen_belanja=round($temp_belanja,2);

                $nama_skpd = "<a href=" . base_url("anggaran-kas-detail/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'pendapatan' => format_rupiah($row_anggaran_pendapatan['anggaran']),
                    'persen_pendapatan' => format_3_desimal($persen_pendapatan)." %",
                    'belanja' => format_rupiah($row_anggaran_belanja['anggaran']),
                    'persen_belanja' => format_rupiah($persen_belanja)." %",
                    'jumlah' => $result_count
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
            "submenu_active" => "anggaran-kas",
            "skpd" => $skpd
        ];
        $this->load->view('upload_data/anggarankas/view_detail', $data);
    }

    public function load_anggaran()
    {
        $skpd = $this->input->post('id');
        $result = $this->mquery->select_by('data_uraian_kegiatan_skpd', ['tahun' => 2021, 'id_skpd' => $skpd], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $r['tahun'], 'kode_rekening' => $r['kode_rekening']]);
            $nilai_anggaran=$row_uraian['anggaran'];
            $st_anggaran=$r['st_anggaran'];
            if($st_anggaran==1){$ket_st="APBD";}else{$ket_st="PAPBD";}
            $row = [
                'no' => $no,
                'tahun' => bulan($r['tahun']),
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $row_uraian['uraian'],
                'anggaran' => format_rupiah($r['anggaran']),
                'st_anggaran' => $ket_st
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
        $this->load->view('upload_data/anggarankas/form_upload', $data);
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
                
                $numrow = 0;
                $cek_validasi=0;
                foreach ($sheet as $row) {
                    if ($numrow > 10) {
                        $cek_D = strlen($row['D']);
                        if ($cek_D != 0) {
                            if ($row['I']== "ANGGARAN KAS"){$cek_validasi=1;}
                        }
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
                    $realisasi=array();
                    foreach ($sheet as $row) {
                        if ($numrow > 5) {
                            if ($row['G']== "Jumlah Alokasi Belanja & Pengeluaran Pembiayaan")
                            $anggaran = konversi_angka($row['R']);
                            $realisasi(1) = konversi_angka($row['S']);
                            $realisasi(2) = konversi_angka($row['T']);
                            $realisasi(3) = konversi_angka($row['U']);
                            $realisasi(4) = konversi_angka($row['V']);
                            $realisasi(5) = konversi_angka($row['W']);
                            $realisasi(6) = konversi_angka($row['X']);
                            $realisasi(7) = konversi_angka($row['Y']);
                            $realisasi(8) = konversi_angka($row['Z']);
                            $realisasi(9) = konversi_angka($row['AA']);
                            $realisasi(10) = konversi_angka($row['AC']);
                            $realisasi(11) = konversi_angka($row['AE']);
                            $realisasi(12) = konversi_angka($row['AF']);
                            }
                        }
                        $numrow++;
                    }
                    $this->db->trans_start();
                    $this->db->delete('anggaran_kas', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                    $this->db->delete('anggarankas_detail', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                    
                    $array_anggaran =  [
                        'id_skpd' => $id_skpd,
                        'tahun' => $post['tahun'],
                        'nilai' => $anggaran
                    ];
                    $this->db->insert('anggaran_kas', $array_anggaran);

                    for ($i = 1; $i < 13; $i++)
                    {
                        $array_realisasi =  [
                            'id_skpd' => $id_skpd,
                            'tahun' => $post['tahun'],
                            'bulan' => $i,
                            'nilai' => $realisasi($i)
                        ];
                        $this->db->insert('anggarankas_detail', $array_realisasi);
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
