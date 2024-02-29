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
            "submenu_active" => "upload_kegiatan_skpd"
        ];
        $this->load->view('upload_kegiatan/skpd/view', $data);
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
                $this->db->select_sum('anggaran');
                $this->db->where(['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'level' => 3]);
                $row_anggaran = $this->db->get('detail_realisasi_skpd')->row_array();
                $nama_skpd = "<a href=" . base_url("upload/kegiatan-skpd/detail/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'anggaran' => format_rupiah($row_anggaran['anggaran'])
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
            "submenu_active" => "upload_kegiatan_skpd",
            "skpd" => $skpd
        ];
        $this->load->view('upload_kegiatan/skpd/view_detail', $data);
    }

    public function load_anggaran()
    {
        $skpd = $this->input->post('id');
        $this->db->select("tahun, bulan, SUM(anggaran) as anggaran");
        $this->db->where(['id_skpd' => $skpd, 'tahun' => 2021]);
        $this->db->group_by('bulan');
        $result = $this->db->get('detail_realisasi_skpd')->result_array();
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $paramater = $r['bulan'] . '/' . encrypt_url($skpd);
            $tahun = "<a href='" . site_url('upload/kegiatan-skpd/rekap/' . $paramater) . "'>" . $r['tahun'] . "</a>";
            $bulan = "<a href='" . site_url('upload/kegiatan-skpd/rekap/' . $paramater) . "'>" . bulan($r['bulan']) . "</a>";
            $anggaran = "<a href='" . site_url('upload/kegiatan-skpd/rekap/' . $paramater) . "'>" . format_rupiah($r['anggaran']) . "</a>";
            $no++;
            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'anggaran' => $anggaran
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function rekap($bulan, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $tahun = 2021;
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_kegiatan_skpd",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "tahun" => $tahun,
            "result_kegiatan" => $this->mquery->select_by('detail_realisasi_skpd', ['id_skpd' => $skpd['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan])
        ];
        $this->load->view('upload_kegiatan/skpd/view_rekap', $data);
    }

    public function cetak($bulan, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $tahun = 2021;
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_kegiatan_skpd",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "tahun" => $tahun,
            "result_kegiatan" => $this->mquery->select_by('detail_realisasi_skpd', ['id_skpd' => $skpd['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan])
        ];
        $this->load->view('upload_kegiatan/skpd/cetak_rekap', $data);
    }

    public function load_rekap()
    {
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $result = $this->mquery->select_by('detail_realisasi_skpd', ['id_skpd' => $skpd, 'tahun' => 2021, 'bulan' => $bulan]);
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            if ($r['level'] == 1) {
                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => 2021, 'bulan' => $bulan, 'level' => 3]);
                $this->db->like('parent', $r['kode_rekening'], 'after');
                $query = $this->db->get('detail_realisasi_skpd')->row_array();
                $anggaran = format_rupiah($query['anggaran']);
            } elseif ($r['level'] == 2) {
                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => 2021, 'bulan' => $bulan, 'level' => 3, 'parent' => $r['kode_rekening']]);
                $query = $this->db->get('detail_realisasi_skpd')->row_array();
                $anggaran = format_rupiah($query['anggaran']);
            } else {
                $anggaran = format_rupiah($r['anggaran']);
            }
            $no++;
            $row = [
                'no' => $no,
                'periode' => bulan($r['bulan']) . ' ' . $r['tahun'],
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $r['uraian'],
                'anggaran' => $anggaran
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
        $this->load->view('upload_kegiatan/skpd/form_upload', $data);
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
                $excelreader = new PHPExcel_Reader_Excel5();
                $loadexcel = $excelreader->load('./uploads/berkas/excel/' . $new_file);
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $data = array();
                $numrow = 0;
                $parent = 0;
                $this->db->trans_start();
                $this->db->delete('detail_kegiatan_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                $this->db->delete('detail_realisasi_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $post['bulan']]);

                foreach ($sheet as $row) {
                    if ($numrow > 10) {
                        $cek_kegiatan = strlen($row['C']);
                        if ($cek_kegiatan != 0) {
                            $row_kegiatan = $row['C'];
                            if ($row_kegiatan != "LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENGELUARAN (SPJ BELANJA - FUNGSIONAL)") {
                                if ($row_kegiatan == "Program") {
                                    $kode_rekening = $row['I'];
                                    $kegiatan = $row['O'];
                                    $level = 1;
                                    $anggaran = 0;
                                    $realisasi = 0;
                                    $cek_program = $this->mquery->count_data('detail_kegiatan_skpd', ['kode_rekening' => $kode_rekening]);
                                    if ($cek_program > 0) {
                                        $this->db->select('kode_rekening');
                                        $this->db->limit(1);
                                        $this->db->where('kode_rekening', $kode_rekening);
                                        $program = $this->db->get('detail_kegiatan_skpd')->row_array();
                                        $parent = $program['kode_rekening'];
                                    } else {
                                        $array_anggaran = [
                                            "id_skpd" => $id_skpd,
                                            "kode_rekening" => $kode_rekening,
                                            "uraian" => $kegiatan,
                                            "level" => $level,
                                            "parent" => $parent,
                                            "anggaran" => $anggaran,
                                            "tahun" => $post['tahun']
                                        ];

                                        $array_realisasi = [
                                            "id_skpd" => $id_skpd,
                                            "kode_rekening" => $kode_rekening,
                                            "uraian" => $kegiatan,
                                            "level" => $level,
                                            "parent" => $parent,
                                            "anggaran" => $realisasi,
                                            "bulan" => $post['bulan'],
                                            "tahun" => $post['tahun']
                                        ];
                                        $this->db->insert('detail_kegiatan_skpd', $array_anggaran);
                                        $this->db->insert('detail_realisasi_skpd', $array_realisasi);
                                        $parent = $kode_rekening;
                                    }
                                } elseif ($row_kegiatan == "Kegiatan") {
                                    $kode_rekening = $row['I'];
                                    $kegiatan = $row['O'];
                                    $level = 2;
                                    $anggaran = 0;
                                    $realisasi = 0;

                                    $array_anggaran = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "parent" => $parent,
                                        "anggaran" => $anggaran,
                                        "tahun" => $post['tahun']
                                    ];

                                    $array_realisasi = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "parent" => $parent,
                                        "anggaran" => $realisasi,
                                        "bulan" => $post['bulan'],
                                        "tahun" => $post['tahun']
                                    ];
                                    $this->db->insert('detail_kegiatan_skpd', $array_anggaran);
                                    $this->db->insert('detail_realisasi_skpd', $array_realisasi);
                                    $parent = $kode_rekening;
                                } else {
                                    $kode_rekening = $row['C'];
                                    $kegiatan = $row['K'];
                                    $level = 3;
                                    $anggaran = konversi_angka($row['U']);
                                    $realisasi = konversi_angka($row['AB']);

                                    $array_anggaran = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "parent" => $parent,
                                        "anggaran" => $anggaran,
                                        "tahun" => $post['tahun']
                                    ];

                                    $array_realisasi = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "parent" => $parent,
                                        "anggaran" => $realisasi,
                                        "bulan" => $post['bulan'],
                                        "tahun" => $post['tahun']
                                    ];
                                    $this->db->insert('detail_kegiatan_skpd', $array_anggaran);
                                    $this->db->insert('detail_realisasi_skpd', $array_realisasi);
                                }
                            }
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

    function uploadbefore()
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
                $excelreader = new PHPExcel_Reader_Excel5();
                $loadexcel = $excelreader->load('./uploads/berkas/excel/' . $new_file);
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $data = array();
                $numrow = 0;
                $program = 0;
                $sub_program = 0;
                $this->db->trans_start();
                $this->db->delete('detail_kegiatan_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun']]);
                $this->db->delete('detail_realisasi_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $post['bulan']]);

                foreach ($sheet as $row) {
                    if ($numrow > 10) {
                        $cek_kegiatan = strlen($row['C']);
                        if ($cek_kegiatan != 0) {
                            $row_kegiatan = $row['C'];
                            if ($row_kegiatan != "LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENGELUARAN (SPJ BELANJA - FUNGSIONAL)") {
                                if ($row_kegiatan == "Program") {
                                    $kode_rekening = $row['I'];
                                    $kegiatan = $row['O'];
                                    $level = 1;
                                    $anggaran = 0;
                                    $realisasi = 0;
                                    $cek_program = $this->mquery->count_data('detail_kegiatan_skpd', ['kode_rekening' => $kode_rekening]);
                                    if ($cek_program > 0) {
                                        $sub_program++;
                                    } else {
                                        $program++;
                                        $sub_program++;

                                        $array_anggaran = [
                                            "id_skpd" => $id_skpd,
                                            "kode_rekening" => $kode_rekening,
                                            "uraian" => $kegiatan,
                                            "level" => $level,
                                            "program" => $program,
                                            "sub_program" => $sub_program,
                                            "anggaran" => $anggaran,
                                            "tahun" => $post['tahun']
                                        ];

                                        $array_realisasi = [
                                            "id_skpd" => $id_skpd,
                                            "kode_rekening" => $kode_rekening,
                                            "uraian" => $kegiatan,
                                            "level" => $level,
                                            "program" => $program,
                                            "sub_program" => $sub_program,
                                            "anggaran" => $realisasi,
                                            "bulan" => $post['bulan'],
                                            "tahun" => $post['tahun']
                                        ];
                                        $this->db->insert('detail_kegiatan_skpd', $array_anggaran);
                                        $this->db->insert('detail_realisasi_skpd', $array_realisasi);
                                    }
                                } elseif ($row_kegiatan == "Kegiatan") {
                                    $kode_rekening = $row['I'];
                                    $kegiatan = $row['O'];
                                    $level = 2;
                                    $anggaran = 0;
                                    $realisasi = 0;

                                    $array_anggaran = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "program" => $program,
                                        "sub_program" => $sub_program,
                                        "anggaran" => $anggaran,
                                        "tahun" => $post['tahun']
                                    ];

                                    $array_realisasi = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "program" => $program,
                                        "sub_program" => $sub_program,
                                        "anggaran" => $realisasi,
                                        "bulan" => $post['bulan'],
                                        "tahun" => $post['tahun']
                                    ];
                                    $this->db->insert('detail_kegiatan_skpd', $array_anggaran);
                                    $this->db->insert('detail_realisasi_skpd', $array_realisasi);
                                } else {
                                    $kode_rekening = $row['C'];
                                    $kegiatan = $row['K'];
                                    $level = 3;
                                    $anggaran = konversi_angka($row['U']);
                                    $realisasi = konversi_angka($row['AB']);

                                    $array_anggaran = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "program" => $program,
                                        "sub_program" => $sub_program,
                                        "anggaran" => $anggaran,
                                        "tahun" => $post['tahun']
                                    ];

                                    $array_realisasi = [
                                        "id_skpd" => $id_skpd,
                                        "kode_rekening" => $kode_rekening,
                                        "uraian" => $kegiatan,
                                        "level" => $level,
                                        "program" => $program,
                                        "sub_program" => $sub_program,
                                        "anggaran" => $realisasi,
                                        "bulan" => $post['bulan'],
                                        "tahun" => $post['tahun']
                                    ];
                                    $this->db->insert('detail_kegiatan_skpd', $array_anggaran);
                                    $this->db->insert('detail_realisasi_skpd', $array_realisasi);
                                }
                            }
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

    function upload_backup()
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
                $kode_rekening = '';
                $level = '';
                $anggaran = '';
                $this->db->trans_start();
                $this->db->delete('detail_kegiatan_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $post['bulan'], 'st_anggaran' => $post['status']]);

                foreach ($sheet as $row) {
                    if ($numrow > 10) {
                        $cek_kode_rekening = strlen($row['C']);
                        if ($cek_kode_rekening != 0) {
                            $kode_rekening = $row['C'];
                            $anggaran = konversi_angka($row['N']);
                            $cek_H = strlen($row['H']);
                            $cek_I = strlen($row['I']);
                            if ($cek_H >= 1) {
                                $level = 1;
                                $uraian = $row['H'];
                            } elseif ($cek_I >= 1) {
                                $level = 2;
                                $uraian = $row['I'];
                            }

                            if ($kode_rekening != "LAPORAN PENGAWASAN ANGGARAN DEFINITIF PER KEGIATAN") {
                                $array_alokasi =  [
                                    'id_skpd' => $id_skpd,
                                    'kode_rekening' => $kode_rekening,
                                    'uraian' => $uraian,
                                    'level' => $level,
                                    'anggaran' => $anggaran,
                                    'tahun' => $post['tahun'],
                                    'bulan' => $post['bulan'],
                                    'st_anggaran' => $post['status']
                                ];

                                $this->db->insert('detail_kegiatan_skpd', $array_alokasi);
                            }
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
