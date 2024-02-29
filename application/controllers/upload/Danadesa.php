<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Danadesa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('Danadesa_model', 'danadesa');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index($tahun=NULL, $bulan=NULL)
    {
        if ($this->akses['akses'] == 'Y') {
            if($tahun==NULL){$tahun=date('Y');}
            if($bulan==NULL){$bulan=date('m');}
            $data = [
                "menu_active" => "upload_data",
                "submenu_active" => "upload-dana-desa",
                "tahun" => $tahun,
                "bulan" => $bulan,
                "periode" => $this->mquery->select_id('tbl_dana_desa_log', ['tahun' => $tahun, 'bulan' => $bulan]),
                "result_bulan" => $this->mquery->select_data('bulan', 'id_bulan ASC')
            ];
            $this->load->view('upload/dana_desa/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        $tahun = htmlspecialchars($this->input->post('tahun'));
        $bulan = htmlspecialchars($this->input->post('bulan'));
        $result_kabupaten = $this->mquery->select_by('tbl_dana_desa', ['tahun' => $tahun, 'bulan' => $bulan]);
        $array = [];
        foreach ($result_kabupaten as $kab) {
            $r_kab = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $kab['id_kabupaten']]);
            $nama_kabupaten = $r_kab['kabupaten_danadesa'];

            $dana = $this->danadesa->sum_danadesa($tahun, $bulan, $kab['id_kabupaten']);
            $alokasi = $dana['alokasi'];
            $realisasi_total = $dana['total_realisasi'];
            $persen_realisasi = $realisasi_total / $alokasi * 100;
            $realisasi_total_blt = $dana['total_blt'];

            $realisasi_total_salur = $dana['total_salur'];
            if($realisasi_total_salur==0){$realisasi_total_salur=$realisasi_total;}
            
            $persen_total_salur = $realisasi_total_salur / $alokasi * 100;

            $array[] = [
                'nama_kabupaten' => "TOBA",
                'alokasi' => $alokasi,
                'realisasi_total' => $realisasi_total,
                'persen_realisasi' => $persen_realisasi,
                'realisasi_total_blt' => $realisasi_total_blt,
                'relokasi_jumlah' => $dana['relokasi_jumlah'],
                'realisasi_total_salur' => $realisasi_total_salur,
                'persen_total_salur' => $persen_total_salur
            ];
        }
        $result_realisasi = array_sort($array, 'persen_realisasi', SORT_DESC); // sorting array berdasarkan jumlah tertinggi
        $data = [
            "result_realisasi" => $result_realisasi
        ];
        $this->load->view('upload/dana_desa/load', $data);
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[5]|trim');
        $this->form_validation->set_rules('tgl_periode', 'Tanggal periode', 'required|max_length[25]|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('max_length', 'Karakter %s terlalu panjang');
    }

    private function _send_error($params)
    {
        if ($params == 'file') {
            $errors = [
                'tahun' => form_error('tahun'),
                'tgl_periode' => form_error('tgl_periode'),
                'file_upload' => $this->upload->display_errors()
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        } else {
            $errors = [
                'tahun' => form_error('tahun'),
                'tgl_periode' => form_error('tgl_periode'),
                'file_upload' => form_error('file_upload')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form_upload()
    {
        $this->load->view('upload/dana_desa/form_upload');
    }

    function upload()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $new_file = "";
            $config['upload_path'] = "./uploads/excel/";
            $config['allowed_types'] = 'xlsx';
            $config['file_name'] = 'dana-desa-' . date("Ymd-His");
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_upload')) {
                $this->_send_error('file');
            } else {
                $upload = $this->upload->data();
                $new_file = $upload['file_name'];
                if ($new_file != "") {
                    $excelreader     = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('./uploads/excel/' . $new_file);
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                    $numrow = 0;
                    $tgl_periode = tanggal_database($post['tgl_periode']);
                    $bulan = date('m', strtotime($tgl_periode));
                    $cek_validasi=0;

                    $tdk_sesuai=" Tidak Sesuai";
                    
                    if($cek_validasi>0)
                    {
                        $errors = [
                            'data error' => 'data error'
                        ];
                        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => $tdk_sesuai];
                        $this->output->set_content_type('application/json')->set_output(json_encode($data));
                    }
                    else
                    {
                        $numrow = 0;
                        $this->db->trans_start();

                        $this->db->delete('tbl_dana_desa_log', ['tahun' => $post['tahun'], 'bulan' => $bulan]);
                        foreach ($sheet as $row) {
                            if ($numrow >= 2) {
                                $cek_batas = strlen($row['A']);
                                if ($cek_batas != 0) {
                                    if ($row['A'] != 'TOTAL') {
                                        $nama_kabupaten = trim($row['B']);
                                        $alokasi = number_only($row['C']);
                                        $tahap1 = number_only($row['D']);
                                        $tahap2 = number_only($row['E']);
                                        $tahap3 = number_only($row['F']);
                                        $total = number_only($row['G']);
                                        $persen_total = konversi_angka($row['H']);
                                        $jumlah_desa = number_only($row['I']);
                                        $desa1 = number_only($row['J']);
                                        $desa2 = number_only($row['K']);
                                        $desa3 = number_only($row['L']);
                                        $belum1 = number_only($row['M']);
                                        $belum2 = number_only($row['N']);
                                        $belum3 = number_only($row['O']);
                                        $blt = number_only($row['P']);
                                        $tw1 = number_only($row['Q']);
                                        $tw2 = number_only($row['R']);
                                        $tw3 = number_only($row['S']);
                                        $tw4 = number_only($row['T']);
                                        $total_blt = number_only($row['U']);
                                        $blt_cair1 = number_only($row['V']);
                                        $blt_cair2 = number_only($row['W']);
                                        $blt_cair3 = number_only($row['X']);
                                        $blt_cair4 = number_only($row['Y']);
                                        $blt_bcair1 = number_only($row['Z']);
                                        $blt_bcair2 = number_only($row['AA']);
                                        $blt_bcair3 = number_only($row['AB']);
                                        $blt_bcair4 = number_only($row['AC']);

                                        $relokasi_jumlah = number_only($row['AD']);
                                        $relokasi_desa = number_only($row['AE']);
                                        $relokasi_belum_salur = number_only($row['AF']);

                                        $total_salur = number_only($row['AG']);
                                        $persen_salur = konversi_angka($row['AH']);
                                       // $get_kode = $this->mquery->select_id('ta_kabupaten', ['kabupaten_danadesa' => $nama_kabupaten]);
                                        $id_kabupaten = 34;
                                        $array =  [
                                            'id_kabupaten' => $id_kabupaten,
                                            'tahun' => $post['tahun'],
                                            'bulan' => $bulan,
                                            'alokasi' => $alokasi,
                                            'tahap1' => $tahap1,
                                            'tahap2' => $tahap2,
                                            'tahap3' => $tahap3,
                                            'total_realisasi' => $total,
                                            'persen' => $persen_total,
                                            'desa' => $jumlah_desa,
                                            'desa1' => $desa1,
                                            'desa2' => $desa2,
                                            'desa3' => $desa3,
                                            'belum1' => $belum1,
                                            'belum2' => $belum2,
                                            'belum3' => $belum3,
                                            'belum3' => $belum3,
                                            'blt' => $blt,
                                            'tw1' => $tw1,
                                            'tw2' => $tw2,
                                            'tw3' => $tw3,
                                            'tw4' => $tw4,
                                            'total_blt' => $total_blt,
                                            'blt_cair1' => $blt_cair1,
                                            'blt_cair2' => $blt_cair2,
                                            'blt_cair3' => $blt_cair3,
                                            'blt_cair4' => $blt_cair4,
                                            'blt_bcair1' => $blt_bcair1,
                                            'blt_bcair2' => $blt_bcair2,
                                            'blt_bcair3' => $blt_bcair3,
                                            'blt_bcair4' => $blt_bcair4,
                                            'relokasi_jumlah' => $relokasi_jumlah,
                                            'relokasi_desa' => $relokasi_desa,
                                            'relokasi_belum_salur' => $relokasi_belum_salur,
                                            'total_salur' => $total_salur,
                                            'persen_salur' => $persen_salur
                                        ];
                                        $cek_skpd = $this->mquery->count_data('tbl_dana_desa', ['id_kabupaten' => $id_kabupaten, 'tahun' => $post['tahun'], 'bulan' => $bulan]);
                                        if ($cek_skpd > 0) {
                                            $this->db->update('tbl_dana_desa', $array, ['id_kabupaten' => $id_kabupaten, 'tahun' => $post['tahun'], 'bulan' => $bulan]);
                                        } else {
                                            $this->db->insert('tbl_dana_desa', $array);
                                        }
                                    }
                                }
                            }
                            $numrow++;
                        }
                        $array_log = [
                            "tahun" => $post['tahun'],
                            "bulan" => $bulan,
                            "periode" => $tgl_periode,
                            "tgl_input" => date('Y-m-d H:i:s'),
                            "user_input" => $this->user['user']
                        ];
                        $this->db->insert('tbl_dana_desa_log', $array_log);
                        $this->db->trans_complete();
                        $res = $this->db->trans_status();
                        $data = ['status' => TRUE, 'notif' => $res];
                        $this->output->set_content_type('application/json')->set_output(json_encode($data));
                    }
                }
            }
        }
    }
}
