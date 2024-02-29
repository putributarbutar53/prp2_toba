<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
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
            "submenu_active" => "upload_lra_skpd"
        ];
        $this->load->view('upload_lra/skpd/view', $data);
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
                $where = array('id_skpd' => $r['id_skpd'], 'tahun' => 2021, 'st_data' => 2);
                $result_max = $this->mquery->max_data_where("log_upload", "bulan", $where);

                $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 4]);
                $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $result_max['bulan'], 'kode_rekening' => 5]);
                $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $r['id_skpd'], 'tahun' => 2021, 'st_data' => 2, 'bulan' => $result_max['bulan']]);
            
                $row_users = $this->mquery->select_id('users', ['id_user' => $row_log_upload['user_input']]);
                
                $nama_skpd = "<a href=" . base_url("upload/lra-skpd/detail/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'bulan' => bulan($result_max['bulan']),
                    'realisasi_pendapatan' => format_rupiah($row_realisasi_pendapatan['realisasi']),
                    'persen_pendapatan' => format_rupiah($row_realisasi_pendapatan['persen'])." %",
                    'realisasi_belanja' => format_rupiah($row_realisasi_belanja['realisasi']),
                    'persen_belanja' => format_rupiah($row_realisasi_belanja['persen'])." %",
                    'tanggal_data' => $row_log_upload['tgl_data'],
                    'user_input' => $row_users['username']
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
            "submenu_active" => "upload_lra_skpd",
            "skpd" => $skpd
        ];
        $this->load->view('upload_lra/skpd/view_detail', $data);
    }

    public function load_apbd()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('log_upload', ['id_skpd' => $skpd, 'tahun'=> 2021, 'st_data'=> 2], "bulan ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("upload/lra-skpd/detail2/" .$encrypt_id."/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 4]);
            $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 5]);
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

    public function detail2($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_lra_skpd",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('upload_lra/skpd/view_detail2', $data);
    }

    public function load_apbd2()
    {
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening']]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening']]);
            
            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => bulan($bulan),
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $row_uraian['uraian'],
                'anggaran' => format_rupiah($row_anggaran['anggaran']),
                'realisasi' => format_rupiah($r['realisasi']),
                'persen' => format_rupiah($r['persen'])." %"
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
        $this->load->view('upload_lra/skpd/form_upload', $data);
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
                            if ($row['I']== "BELANJA OPERASI"){$cek_validasi=1;}
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
                    $this->db->trans_start();
                    $data = array();
                    $numrow = 0;
                    $kode_rekening='';
                    $level='';
                    $anggaran='';
                    $jenis=1;
                    $cek_tanggal=$post['tanggal'];
                    if($cek_tanggal<"2021-10-28"){$hsl_stanggaran=1;}
                    else{$hsl_stanggaran=2;}
                    $temp_bulan=substr($cek_tanggal,5,2);
                    $hsl_bulan=intval($temp_bulan);
                    foreach ($sheet as $row) {
                        if ($numrow > 10) {
                            $cek_D = strlen($row['D']);
                            if ($cek_D != 0) {
                                $kode_rekening=str_replace(' ','',$row['D']);
                                $anggaran = konversi_angka($row['Q']);
                                $cek_H = strlen($row['H']);
                                $cek_I = strlen($row['I']);
                                $cek_J = strlen($row['J']);
                                $cek_K = strlen($row['K']);
                                $cek_L= strlen($row['L']);
                                $cek_M= strlen($row['M']);

                                if ($cek_H >= 1){$uraian=$row['H'];$level=1;}
                                elseif ($cek_I >= 1){$uraian=$row['I'];$level=2;}
                                elseif ($cek_J >= 1){$uraian=$row['J'];$level=3;}
                                elseif ($cek_K >= 1){$uraian=$row['K'];$level=4;}
                                elseif ($cek_L >= 1){$uraian=$row['L'];$level=5;}
                                elseif ($cek_M >= 1){$uraian=$row['M'];$level=6;}
                                else {$uraian="";$level=7;}
    
                                if ($row['H']== "BELANJA DAERAH"){$jenis=2;}
                                if ($row['I']== "PENERIMAAN PEMBIAYAAN"){$jenis=3;}
                                if ($row['I']== "PENGELUARAN PEMBIAYAAN"){$jenis=4;}
    
                                $array_alokasi_pemko =  [
                                    'kode_rekening' => $kode_rekening,
                                    'uraian' => $uraian,
                                    'level' => $level,
                                    'anggaran' => $anggaran,
                                    'jenis' => $jenis,
                                    'tahun' => $post['tahun'],
                                    'st_anggaran' => $hsl_stanggaran
                                ];

                                $update_alokasi_pemko =  [
                                    'uraian' => $uraian,
                                    'anggaran' => $anggaran
                                ];

                                $cek_jml_data1 = $this->mquery->count_data('data_uraian_kegiatan_pemko', ['kode_rekening' => $kode_rekening, 'tahun' => $post['tahun'], 'st_anggaran' => $hsl_stanggaran]);
                                if($cek_jml_data1==0){$this->db->insert('data_uraian_kegiatan_pemko', $array_alokasi_pemko);}
                                else{$this->db->update('data_uraian_kegiatan_pemko', $update_alokasi_pemko, ['kode_rekening' => $kode_rekening, 'tahun' => $post['tahun'], 'st_anggaran' => $hsl_stanggaran]);}
                                
                                $array_alokasi_skpd =  [
                                    'id_skpd' => $id_skpd,
                                    'kode_rekening' => $kode_rekening,
                                    'level' => $level,
                                    'anggaran' => $anggaran,
                                    'jenis' => $jenis,
                                    'tahun' => $post['tahun'],
                                    'st_anggaran' => $hsl_stanggaran
                                ];

                                $update_alokasi_skpd =  [
                                    'anggaran' => $anggaran
                                ];

                                $cek_jml_data2 = $this->mquery->count_data('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'kode_rekening' => $kode_rekening, 'tahun' => $post['tahun'], 'st_anggaran' => $hsl_stanggaran]);
                                if($cek_jml_data2==0){$this->db->insert('data_uraian_kegiatan_skpd', $array_alokasi_skpd);}
                                else{$this->db->update('data_uraian_kegiatan_skpd', $update_alokasi_skpd, ['id_skpd' => $id_skpd, 'kode_rekening' => $kode_rekening, 'tahun' => $post['tahun'], 'st_anggaran' => $hsl_stanggaran]);}
                            }
                        }
                        $numrow++;
                    }
                    
                    $this->db->trans_complete();
                    $res = $this->db->trans_status();

                    $this->db->trans_start();
                    $this->db->delete('data_realisasi_detail_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $hsl_bulan]);
                    $this->db->delete('log_upload', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'bulan' => $hsl_bulan, 'st_data' => 2]);
                
                    $data = array();
                    $numrow = 0;
                    $kode_rekening='';
                    $realisasi='';
                    foreach ($sheet as $row) {
                        if ($numrow > 10) {
                            $cek_D = strlen($row['D']);
                            if ($cek_D != 0) {
                                $kode_rekening=$row['D'];
                                $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $id_skpd, 'tahun' => $post['tahun'], 'kode_rekening' => $kode_rekening]);
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
                                    'id_skpd' => $id_skpd,
                                    'kode_rekening' => $kode_rekening,
                                    'realisasi' => $realisasi,
                                    'persen' => $persen,
                                    'tahun' => $post['tahun'],
                                    'bulan' => $hsl_bulan
                                ];
                                $this->db->insert('data_realisasi_detail_skpd', $array_realisasi);
                            }
                        }
                        $numrow++;
                    }

                    $array_tanggal =  [
                        'tahun' => $post['tahun'],
                        'bulan' => $hsl_bulan,
                        'id_skpd' => $id_skpd,
                        'st_data' => 2,
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
