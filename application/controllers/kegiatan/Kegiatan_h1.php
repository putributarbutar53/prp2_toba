<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $jml_keg_all = $this->mquery->count_data('ta_kontrak', ['tahun' => 2022]);
            $data = [
                "menu_active" => "kegiatan",
                "submenu_active" => null,
                "jml_keg_all" => $jml_keg_all
            ];
            $this->load->view('kegiatan/view', $data);
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
                $jumlah_kegiatan = $this->mquery->count_data('ta_kontrak', ['kd_urusan' => $r['kd_urusan'], 'kd_bidang' => $r['kd_bidang'], 'kd_unit' => $r['kd_unit'], 'kd_sub' => $r['kd_sub'], 'tahun'=> $tahun]);
                $sum_kontrak = $this->mquery->sum_data('ta_kontrak', 'nilai', ['kd_urusan' => $r['kd_urusan'], 'kd_bidang' => $r['kd_bidang'], 'kd_unit' => $r['kd_unit'], 'kd_sub' => $r['kd_sub'], 'tahun'=> $tahun]);

                $nama_skpd = "<a href=" . base_url("kegiatan/skpd/" . $tahun .'/'. $encrypt_id) . "><h2>" . $r['nama_skpd'] . "</h2></a>";
                $no++;

                if ($jumlah_kegiatan == 0) {
                    $tamp_persen_fisik = "-";
                    $tamp_jml_input = "-";
                } else {
                    if ($r['persen_realisasi'] > $r['persen_fisik']) {
                        $tamp_persen_fisik = "<button class='btn btn-danger btn-sm'>" . $r['persen_fisik'] . " %</button>";
                    } else {
                        $tamp_persen_fisik = "<button class='btn btn-success btn-sm'>" . $r['persen_fisik'] . " %</button>";
                    }

                    if ($r['jml_input'] < $jumlah_kegiatan) {
                        $tamp_jml_input = "<button class='btn btn-success btn-sm'>" . format_angka($jumlah_kegiatan) . "</button>";
                    } else {
                        $tamp_jml_input = "<button class='btn btn-success btn-sm'>" . format_angka($jumlah_kegiatan) . "</button>";
                    }
                }
                $row = [
                    'no' => $no,
                    'nama_skpd' => $nama_skpd,
                    'jumlah' => format_angka($jumlah_kegiatan),
                    'kontrak' => 'Rp ' . format_rupiah($sum_kontrak['nilai']),
                    'persen_fisik' => $tamp_persen_fisik,
                    'jml_input' => $tamp_jml_input
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

    public function skpd($tahun, $encrypt_id)
    {
        if ($this->akses['akses'] == 'Y') {
            $id_skpd = decrypt_url($encrypt_id);
            $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
            $data = [
                "menu_active" => "kegiatan",
                "submenu_active" => null,
                "skpd" => $skpd,
                "tahun" => $tahun
            ];
            $this->load->view('kegiatan/view_detail', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load_kegiatan()
    {
        $id_skpd = $this->input->post('skpd');
        $tahun = $this->input->post('tahun');
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $result = $this->mquery->select_by('ta_kontrak', ['kd_urusan' => $skpd['kd_urusan'], 'kd_bidang' => $skpd['kd_bidang'], 'kd_unit' => $skpd['kd_unit'], 'kd_sub' => $skpd['kd_sub'], 'tahun'=> $tahun]);
        $data = [];
        $no = 0;
        $realisasi_total = 0;
        $nilai_total = 0;
        $fisik_total = 0;
        $jml_input_data = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            $encrypt_id = encrypt_url($r['id_kontrak']);
            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);

            if ($jml_kontrak_pa == 0) {
                $nama_pa = "";
            } else {
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
                $nama_pa = $kontrak_pa['nama_pa'];
            }

            $no_kontrak = $r['no_kontrak'];
            // $spp_kontrak = $this->mquery->select_id('ta_spp_kontrak', ['no_kontrak' => $no_kontrak]);
            // $no_spp=$spp_kontrak['no_spp'];
            // $hit_spp_rinc = $this->mquery->count_data('ta_spp_rinc', ['no_spp' => $no_spp]);
            // if($hit_spp_rinc==0){$realisasi=0;}
            // {
            //     $sum_spp_rinc = $this->mquery->sum_data('ta_spp_rinc', 'nilai', ['no_spp' => $no_spp]);
            //     $realisasi=$sum_spp_rinc['nilai'];
            // }

            // if($r['nilai']==0){$persen_real=0;}
            // else{
            //     $persen_real=hitung_persen($realisasi, $r['nilai'], 2);
            // }

            $hit_kontrak_real = $this->mquery->count_data('data_kontrak_real', ['no_kontrak' => $no_kontrak]);
            if ($hit_kontrak_real == 0) {
                $realisasi = 0;
            } {
                $sum_kontrak_real = $this->mquery->sum_data('data_kontrak_real', 'nilai', ['no_kontrak' => $no_kontrak]);
                $realisasi = $sum_kontrak_real['nilai'];
                $realisasi_total = $realisasi_total + $realisasi;
            }

            if ($r['nilai'] == 0) {
                $persen_real = 0;
            } else {
                $persen_real = hitung_persen($realisasi, $r['nilai'], 2);
            }

            $jml_fisik = $this->mquery->count_data('data_kegiatan_detail', ['id_kegiatan' => $r['id_kontrak']]);

            if ($jml_fisik == 0) {
                $realisasi_fisik = 0;
            } else {
                $max_realisasi = $this->mquery->max_data_where('data_kegiatan_detail', 'realisasi', ['id_kegiatan' => $r['id_kontrak']]);
                $realisasi_fisik = $max_realisasi['realisasi'];
                $jml_input_data++;
            }

            if ($realisasi_fisik >= $persen_real) {
                $tamp_realisasi_fisik = "<button class='btn btn-success btn-sm'>" . $realisasi_fisik . " %</button>";
            } else {
                $tamp_realisasi_fisik = "<button class='btn btn-danger btn-sm'>" . $realisasi_fisik . " %</button>";
            }

            if ($jml_fisik == 0) {
                $tamp_realisasi_fisik = "-";
            }

            if ($this->akses['role'] == "pakar") {
                $keperluan = $r['keperluan'];
            } else {
                $keperluan = "<a href=" . base_url("kegiatan/detail/" . $encrypt_id) . ">" . $r['keperluan'] . "</a>";
            }

            $data_kontrak = "Nomor : " . $r['no_kontrak'] . "<br>Tanggal : " . substr($r['tgl_kontrak'], 0, 10);
            if($r['id_prioritas']!=0){$data_kontrak=$data_kontrak."<br>Prioritas :".$r['id_prioritas'];}
            if($r['id_kegiatan']!=0)
            {
                $hsl_kegiatan = $this->mquery->select_id('kegiatan_strategis', ['id_kegiatan' => $r['id_kegiatan']]);
                $data_kontrak=$data_kontrak."<br>Kegiatan :".$hsl_kegiatan['urutan'];
            }

            $nilai_total = $nilai_total + $r['nilai'];
            $fisik_total = $fisik_total + $realisasi_fisik;

            if ($this->akses['role'] == "pakar") {
                $edit = "-";
            } else {
                if($tahun_now==$tahun){
                    $edit = action_edit($r['id_kontrak']);
                    $delete = action_delete($r['id_kontrak']);
                }
                else{
                    $edit ='-';
                    $delete = '-';
                }
            }

            $row = [
                'no' => $no,
                'no_kontrak' => $data_kontrak,
                'keperluan' => $keperluan,
                'waktu' => $r['waktu'],
                'nilai' => 'Rp ' . format_rupiah($r['pagu']).'<br>Rp ' . format_rupiah($r['nilai']),
                'realisasi' => format_rupiah($realisasi) . "<br>Persen : " . $persen_real . " %",
                'persen' => $tamp_realisasi_fisik,
                'nama_pa' => $nama_pa,
                'aksi' => $edit . ' ' . $delete
            ];
            $data[] = $row;
        }
        // if ($no == 0) {
        //     $persen_fisik = 0;
        // } else {
        //     $persen_fisik = round(($fisik_total / $no), 2);
        // }
        // if ($nilai_total == 0) {
        //     $persen_total = 0;
        // } else {
        //     $persen_total = round(($realisasi_total / $nilai_total * 100), 2);
        // }
        // $array_update =  [
        //     'realisasi' => $realisasi_total,
        //     'persen_realisasi' => $persen_total,
        //     'persen_fisik' => $persen_fisik,
        //     'jml_input' => $jml_input_data
        // ];

        // $this->db->update('data_skpd', $array_update, ['id_skpd' => $id_skpd]);

        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        if ($opsi == "add") {
            $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
            $data = [
                'skpd' => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]),
                'hsl_prioritas' => $this->mquery->select_data('data_prioritas', 'id_prioritas ASC')
            ];
            $this->load->view('kegiatan/form_add', $data);
        } elseif ($opsi == "edit") {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id]);
            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $id]);

            if ($jml_kontrak_pa == 0) {
                $nama_pa = "";
                $nip_pa = "";
            } else {
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $id]);
                $nama_pa = $kontrak_pa['nama_pa'];
                $nip_pa = $kontrak_pa['nip_pa'];
            }
            $data = [
                'id_kontrak' => $id,
                'nama_pa' => $nama_pa,
                'nip_pa' => $nip_pa,
                'ta_kontrak' => $ta_kontrak,
                'hsl_prioritas' => $this->mquery->select_data('data_prioritas', 'id_prioritas ASC')
            ];
            $this->load->view('kegiatan/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('nama_pa', 'Nama Pengguna Anggaran', 'required|trim');
        $this->form_validation->set_rules('nip_pa', 'NIP Pengguna Anggaran', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun kontrak', 'required|trim');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required|trim');
        $this->form_validation->set_rules('pagu', 'Pagu', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'nama_pa' => form_error('nama_pa'),
            'nip_pa' => form_error('nip_pa'),
            'tahun' => form_error('tahun'),
            'nama_kegiatan' => form_error('nama_kegiatan'),
            'pagu' => form_error('pagu')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        $this->form_validation->set_rules('nama_skpd', 'Nama OPD', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun kontrak', 'required|trim');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required|trim');
        $this->form_validation->set_rules('pagu', 'Pagu', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $errors = [
                'nama_skpd' => form_error('nama_skpd'),
                'tahun' => form_error('tahun'),
                'nama_kegiatan' => form_error('nama_kegiatan'),
                'pagu' => form_error('pagu')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $post = $this->input->post(null, TRUE);
            $id_skpd = htmlspecialchars($this->input->post('id_skpd'));
            if(isset($post['strategis'])){$id_kegiatan=$post['strategis'];}
            else{$id_kegiatan=0;}
            $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
            $array =  [
                'tahun' => htmlspecialchars($post['tahun']),
                'id_prioritas' => htmlspecialchars($post['prioritas']),
                'id_kegiatan' => $id_kegiatan,
                'no_kontrak' => htmlspecialchars($post['no_kontrak']),
                'pagu' => htmlspecialchars($post['pagu']),
                'kd_urusan' => $skpd['kd_urusan'],
                'kd_bidang' => $skpd['kd_bidang'],
                'kd_unit' => $skpd['kd_unit'],
                'kd_sub' => $skpd['kd_sub'],
                'tgl_kontrak' => tanggal_database($post['tgl_kontrak']),
                'keperluan' => htmlspecialchars($post['nama_kegiatan']),
                'waktu' => htmlspecialchars($post['waktu']),
                'nilai' => htmlspecialchars($post['nilai_kontrak']),
                'nm_perusahaan' => htmlspecialchars($post['nama_perusahaan'])
            ];
            $string = ['ta_kontrak' => $array];
            $log = simpan_log("insert kegiatan", json_encode($string));
            $res = $this->mquery->insert_data('ta_kontrak', $array, $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function edit()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error();
        } else {
            $post = $this->input->post(null, TRUE);
            $id_kontrak = htmlspecialchars($post['id_kontrak']);
            $temp_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kontrak]);
            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $id_kontrak]);
           
            if(isset($post['strategis']))
            {
                $id_kegiatan=$post['strategis'];
                $array_kontrak =  [
                    'tahun' => htmlspecialchars($post['tahun']),
                    'id_prioritas' => htmlspecialchars($post['prioritas']),
                    'id_kegiatan' => $id_kegiatan,
                    'no_kontrak' => htmlspecialchars($post['no_kontrak']),
                    'pagu' => input_rupiah($post['pagu']),
                    'tgl_kontrak' => tanggal_database($post['tgl_kontrak']),
                    'keperluan' => htmlspecialchars($post['nama_kegiatan']),
                    'waktu' => htmlspecialchars($post['waktu']),
                    'nilai' => input_rupiah($post['nilai_kontrak']),
                    'nm_perusahaan' => htmlspecialchars($post['nama_perusahaan'])
                ];
            }
            else
            {
                $array_kontrak =  [
                    'tahun' => htmlspecialchars($post['tahun']),
                    'id_prioritas' => htmlspecialchars($post['prioritas']),
                    'no_kontrak' => htmlspecialchars($post['no_kontrak']),
                    'pagu' => input_rupiah($post['pagu']),
                    'tgl_kontrak' => tanggal_database($post['tgl_kontrak']),
                    'keperluan' => htmlspecialchars($post['nama_kegiatan']),
                    'waktu' => htmlspecialchars($post['waktu']),
                    'nilai' => input_rupiah($post['nilai_kontrak']),
                    'nm_perusahaan' => htmlspecialchars($post['nama_perusahaan'])
                ];
            }
            if ($jml_kontrak_pa == 0) {
                $array_pa =  [
                    'id_kontrak' => $id_kontrak,
                    'nama_pa' => htmlspecialchars($post['nama_pa']),
                    'nip_pa' => htmlspecialchars($post['nip_pa'])
                ];

                $string = [
                    'ta_kontrak_pa' => $array_pa,
                    'ta_kontrak' => ['old' => $temp_kontrak['nilai'], 'new' => $array_kontrak['nilai']]
                ];
                $log = simpan_log("insert pa", json_encode($string));
                $this->db->trans_start();
                $this->db->insert('ta_kontrak_pa', $array_pa);
                $this->db->update('ta_kontrak', $array_kontrak, ['id_kontrak' => $id_kontrak]);
                $this->db->insert('log_user', $log);
                $this->db->trans_complete();
                $res = $this->db->trans_status();
            } else {
                $array_pa =  [
                    'nama_pa' => htmlspecialchars($post['nama_pa']),
                    'nip_pa' => htmlspecialchars($post['nip_pa'])
                ];
                $temp = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $id_kontrak]);
                $string = [
                    'ta_kontrak_pa' => ['old' => $temp, 'new' => $array_kontrak],
                    'ta_kontrak' => ['old' => $temp_kontrak['nilai'], 'new' => $array_kontrak['nilai']]
                ];
                $log = simpan_log("update pa", json_encode($string));
                $this->db->trans_start();
                $this->db->update('ta_kontrak_pa', $array_pa, ['id_kontrak' => $id_kontrak]);
                $this->db->update('ta_kontrak', $array_kontrak, ['id_kontrak' => $id_kontrak]);
                $this->db->insert('log_user', $log);
                $this->db->trans_complete();
                $res = $this->db->trans_status();
            }

            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $string = [
            'ta_kontrak' => $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id]),
            'ta_kontrak_pa' => $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $id]),
            'data_kegiatan_detail' => $this->mquery->select_by('data_kegiatan_detail', ['id_kegiatan' => $id]),
        ];
        $log = simpan_log("delete kegiatan", json_encode($string));

        $this->db->trans_start();
        $this->db->delete('ta_kontrak', ['id_kontrak' => $id]);
        $this->db->delete('ta_kontrak_pa', ['id_kontrak' => $id]);
        $this->db->delete('data_kegiatan_detail', ['id_kegiatan' => $id]);
        $this->db->insert('log_user', $log);
        $this->db->trans_complete();
        $res = $this->db->trans_status();

        $res = $this->mquery->delete_data('ta_kontrak', ['id_kontrak' => $id], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function injek_data()
    {
        $jml_keg_all = $this->mquery->count_data('ta_kontrak', ['tahun' => 2022]);
        $data = [
            "menu_active" => "kegiatan_skpd",
            "submenu_active" => null,
            "jml_keg_all" => $jml_keg_all
        ];
        $this->load->view('kegiatan/injek_data', $data);
    }

    function cek_kegiatan()
    {
        $id_kegiatan=0;
        $id_prioritas = $this->input->post('id_prioritas', TRUE);
        $result = $this->mquery->select_by('kegiatan_strategis', ['id_prioritas' => $id_prioritas], 'id_kegiatan ASC');
        echo "<option value=''>Pilih Kegiatan Strategis</option>";
        foreach ($result as $r) {
            if ($r['id_kegiatan'] == $id_kegiatan) {
                echo "<option value='" . $r['id_kegiatan'] . "' selected>" . $r['nama_kegiatan'] . "</option>";
            } else {
                echo "<option value='" . $r['id_kegiatan'] . "'>" . $r['nama_kegiatan'] . "</option>";
            }
        }
    }

}
