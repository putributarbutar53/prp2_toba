<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
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
            "submenu_active" => "upload_sirup_skpd"
        ];
        $this->load->view('upload_sirup/skpd/view', $data);
    }

    public function load()
    {
        $tahun = 2021;
        if ($this->akses['role'] == "master" or $this->akses['role'] == "admin") {
            $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);

                $this->db->select_sum('pagu');
                $this->db->where(['id_skpd' => $r['id_skpd'], 'tahun' => $tahun]);
                $row_anggaran = $this->db->get('data_sirup_skpd')->row_array();

                $nama_skpd = "<a href=" . base_url("upload/sirup-skpd/detail/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'pagu' => format_rupiah($row_anggaran['pagu'])
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
            "submenu_active" => "upload_sirup_skpd",
            "skpd" => $skpd
        ];
        $this->load->view('upload_sirup/skpd/view_detail', $data);
    }

    public function load_data()
    {
        $skpd = $this->input->post('id');
        $result = $this->mquery->select_by('data_sirup_skpd', ['tahun' => 2021, 'id_skpd' => $skpd]);
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row = [
                'no' => $no,
                'tahun' => $r['tahun'],
                'bulan' => bulan($r['bulan']),
                'nama_paket' => $r['nama_paket'],
                'pagu' => format_rupiah($r['pagu']),
                'metode_pemilihan' => $r['metode_pemilihan'],
                'sumber_dana' => $r['sumber_dana'],
                'kode_rup' => $r['kode_rup']
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
        $this->load->view('upload_sirup/skpd/form_upload', $data);
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
                $data = array();
                $numrow = 0;
                $pagu = '';
                $this->db->trans_start();
                $this->db->delete('data_sirup_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);

                foreach ($sheet as $row) {
                    if ($numrow > 0) {
                        $nama_paket = strlen($row['B']);
                        if ($nama_paket != 0) {
                            $nama_paket = $row['B'];
                            $pagu = $row['C'];
                            $metode = $row['D'];
                            $sumber_dana = $row['E'];
                            $kode_rup = $row['F'];
                            $waktu_pemilihan = $row['G'];
                            $nilai_pagu = preg_replace("/[^0-9]/", "", $pagu);
                            switch ($metode) {
                                case 'Pengadaan Langsung':
                                    $metode_pemilihan = 1;
                                    break;
                                case 'E-Purchasing':
                                    $metode_pemilihan = 2;
                                    break;
                                case 'Tender':
                                    $metode_pemilihan = 3;
                                    break;
                                case 'Penunjukan Langsung':
                                    $metode_pemilihan = 4;
                                    break;
                                case 'Tender Cepat':
                                    $metode_pemilihan = 5;
                                    break;
                                default:
                                    $metode_pemilihan = 0;
                                    break;
                            }

                            $format_tanggal = date('d-m-Y', strtotime($waktu_pemilihan));
                            $ref_tanggal = explode("-", $format_tanggal);
                            $bulan = $ref_tanggal[1];
                            $tahun = $ref_tanggal[2];

                            $array_alokasi =  [
                                'id_skpd' => $id_skpd,
                                'nama_paket' => $nama_paket,
                                'pagu' => $nilai_pagu,
                                'id_jenis_pelaksanaan' => $metode_pemilihan,
                                'metode_pemilihan' => $metode,
                                'sumber_dana' => $sumber_dana,
                                'kode_rup' => $kode_rup,
                                'tahun' => $tahun,
                                'bulan' => $bulan
                            ];

                            $this->db->insert('data_sirup_skpd', $array_alokasi);
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
