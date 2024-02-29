<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->akses = is_logged_in();
    }


    public function index()
    {
        $jml_keg_all = $this->mquery->count_data('ta_kontrak', ['tahun' => 2021]);
        $data = [
            "menu_active" => "kegiatan_skpd",
            "submenu_active" => null,
            "jml_keg_all" => $jml_keg_all
        ];
        $this->load->view('kegiatan/view', $data);
    }

    public function load()
    {
        $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $encrypt_id = encrypt_url($r['id_skpd']);
            $jumlah_kegiatan = $this->mquery->count_data('ta_kontrak', ['kd_urusan' => $r['kd_urusan'],'kd_bidang' => $r['kd_bidang'],'kd_unit' => $r['kd_unit'],'kd_sub' => $r['kd_sub']]);


            $nama_skpd = "<a href=" . base_url("kegiatan/skpd/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
            $no++;
            $row = [
                'no' => $no,
                'nama_skpd' => $nama_skpd,
                'jumlah' => $jumlah_kegiatan
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function skpd($encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "kegiatan_skpd",
            "submenu_active" => null,
            "skpd" => $skpd
        ];
        $this->load->view('kegiatan/view_detail', $data);
    }


    public function load_kegiatan()
    {
        $id_skpd = $this->input->post('skpd');
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $result = $this->mquery->select_data('ta_kontrak');
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $encrypt_id = encrypt_url($r['id_kontrak']);
            $hit_spp_rinc = $this->mquery->count_data('ta_spp_kontrak', ['no_kontrak' => $r['no_kontrak']]);
           
            if($hit_spp_rinc>1){
                $sum_spp_rinc = $this->mquery->sum_data('ta_spp_kontrak', 'nilai', ['no_kontrak' => $r['no_kontrak']]);
                $realisasi1=$sum_spp_rinc['nilai'];

                $spp_kontrak = $this->mquery->select_by('ta_spp_kontrak', ['no_kontrak' => $r['no_kontrak']]);
                $realisasi2=0;
                $realisasi3='';
                $realisasi4='';
                foreach ($spp_kontrak as $rk) {
                    $no_spp=$rk['no_spp'];
                    $realisasi3.=format_rupiah($rk['nilai']).' => ';
                    $ta_spp_rinc = $this->mquery->select_id('ta_spp_rinc', ['no_spp' => $no_spp]);
                    $realisasi3.=format_rupiah($ta_spp_rinc['nilai']).'<br> ';

                    $hit_spp_rinc2 = $this->mquery->count_data('ta_spp_rinc', ['no_spp' => $no_spp]);
                    if($hit_spp_rinc2!=0)
                    {
                        $sum_spp_rinc = $this->mquery->sum_data('ta_spp_rinc', 'nilai', ['no_spp' => $no_spp]);
                        $realisasi2=$realisasi2+$sum_spp_rinc['nilai'];
                        
                        $realisasi4.=format_rupiah($sum_spp_rinc['nilai']).', ';
                    }
                }
                
                $row = [
                    'no' => $no,
                    'no_kontrak' => $r['no_kontrak'],
                    'keperluan' => $hit_spp_rinc,
                    'waktu' => format_rupiah($r['nilai']),
                    'nilai' => format_rupiah($realisasi1),
                    'realisasi' => $realisasi3,
                    'persen' => $hit_spp_rinc2,
                    'nama_pa' => format_rupiah($realisasi2),
                    'aksi' => $realisasi4
                ];
                $data[] = $row;
            }
            
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        if ($opsi == "add") {
            $skpd = htmlspecialchars($this->input->post('skpd', TRUE));
            $pa = $this->mquery->select_id('pengguna_anggaran', ['id_skpd' => $skpd, 'is_active' => 'Y']);
            $data = [
                'skpd' => $this->mquery->select_id('data_skpd', ['id_skpd' => $skpd]),
                'pengguna_anggaran' => $pa,
                'jenis_pelaksanaan' => $this->mquery->select_data('jenis_pelaksanaan')
            ];
            $this->load->view('kegiatan/form_add', $data);
        } elseif ($opsi == "edit") {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id]);
            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $id]);
            
            if($jml_kontrak_pa==0){$nama_pa=""; $nip_pa="";}
            else{
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $id]);
                $nama_pa=$kontrak_pa['nama_pa'];
                $nip_pa=$kontrak_pa['nip_pa'];
            }
            $data = [
                'id_kontrak' => $id,
                'nama_pa' => $nama_pa,
                'nip_pa' => $nip_pa,
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
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'nama_pa' => form_error('nama_pa'),
            'nip_pa' => form_error('nip_pa')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error();
        } else {
            $post = $this->input->post(null, TRUE);
            $array =  [
                'id_skpd' => htmlspecialchars($post['id_skpd']),
                'id_pa' => htmlspecialchars($post['id_pa']),
                'tgl_input' => date('Y-m-d H:i:s')
            ];
            $string = ['data_kegiatan' => $array];
            $log = simpan_log("insert kegiatan", json_encode($string));
            $res = $this->mquery->insert_data('data_kegiatan', $array, $log);
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

            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $id_kontrak]);
            
            if($jml_kontrak_pa==0)
            {
                $array =  [
                    'id_kontrak' => $id_kontrak,
                    'nama_pa' => htmlspecialchars($post['nama_pa']),
                    'nip_pa' => htmlspecialchars($post['nip_pa'])
                ];
                $string = ['ta_kontrak_pa' => $array];
                $log = simpan_log("insert pa", json_encode($string));
                $res = $this->mquery->insert_data('ta_kontrak_pa', $array, $log);
            }
            else
            {
                $array =  [
                    'nama_pa' => htmlspecialchars($post['nama_pa']),
                    'nip_pa' => htmlspecialchars($post['nip_pa'])
                ];
                $temp = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $id_kontrak]);
                $string = ['ta_kontrak_pa' => ['old' => $temp, 'new' => $array]];
                $log = simpan_log("update pa", json_encode($string));
                $res = $this->mquery->update_data('ta_kontrak_pa', $array, ['id_kontrak' => $id_kontrak], $log);
            }

            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

}
