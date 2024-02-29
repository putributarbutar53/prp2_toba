<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->akses = is_logged_in();
    }

    public function index($encrypt_id)
    {
        $id_detail = decrypt_url($encrypt_id);
        $detail = $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id_detail]);
        $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $detail['id_kegiatan']]);
        $skpd = $this->mquery->select_id('data_skpd', ['kd_urusan' => $ta_kontrak['kd_urusan'],'kd_bidang' => $ta_kontrak['kd_bidang'],'kd_unit' => $ta_kontrak['kd_unit'],'kd_sub' => $ta_kontrak['kd_sub']]);
        
        $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $detail['id_kegiatan']]);
            if($jml_kontrak_pa==0){$nama_pa="";}
            else{
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $detail['id_kegiatan']]);
                $nama_pa=$kontrak_pa['nama_pa'];
            }
        
        $no_kontrak=$ta_kontrak['no_kontrak'];
        $spp_kontrak = $this->mquery->select_id('ta_spp_kontrak', ['no_kontrak' => $no_kontrak]);
        $no_spp=$spp_kontrak['no_spp'];
        $hit_spp_rinc = $this->mquery->count_data('ta_spp_rinc', ['no_spp' => $no_spp]);
        if($hit_spp_rinc==0){$realisasi=0;}
        {
            $sum_spp_rinc = $this->mquery->sum_data('ta_spp_rinc', 'nilai', ['no_spp' => $no_spp]);
            $realisasi=$sum_spp_rinc['nilai'];
        }

        if($ta_kontrak['nilai']==0){$persen_real=0;}
        else{
            $persen_real=hitung_persen($realisasi, $ta_kontrak['nilai'], 2);
        }

        $data = [
            "menu_active" => "kegiatan_skpd",
            "submenu_active" => null,
            "detail" => $detail,
            "nama_pa" => $nama_pa,
            "realisasi" => $realisasi,
            "persen_real" => $persen_real,
            "ta_kontrak" => $ta_kontrak,
            "skpd" => $skpd

        ];
        $this->load->view('kegiatan/dokumentasi/view', $data);
    }

    public function load_dk()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $data = [
            "data_kegiatan" => $this->mquery->select_by('data_kegiatan_detail', ['id_kegiatan' => $id_kontrak])
        ];
        $this->load->view('kegiatan/dokumentasi/detail_dk', $data);
    }

    public function load()
    {
        $id_detail = $this->input->post('detail');
        $data = [
            "cek_foto" => $this->mquery->count_data('kegiatan_dokumentasi', ['id_kegiatan_detail' => $id_detail]),
            "result_foto" => $this->mquery->select_by('kegiatan_dokumentasi', ['id_kegiatan_detail' => $id_detail])
        ];
        $this->load->view('kegiatan/dokumentasi/detail', $data);
    }

    public function form()
    {
        $id_detail = htmlspecialchars($this->input->post('detail', TRUE));
        $data = [
            "detail" => $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id_detail])
        ];
        $this->load->view('kegiatan/dokumentasi/form_add', $data);
    }

    function upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_detail = htmlspecialchars($post['id_detail']);
        $config['upload_path']      = "./uploads/dokumentasi/";
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['file_name']        = $id_detail . '-' . date("Ymd-His");
        $config['max_size']         = 512;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $errors = [
                'foto' => $this->upload->display_errors()
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $gbr = $this->upload->data();
            $array =  [
                'id_kegiatan_detail' => $id_detail,
                'file_dokumentasi' => $gbr['file_name'],
                'user_input' => $this->akses['user'],
                'tgl_input' => date('Y-m-d H:i:s')
            ];
            $log = simpan_log("upload dokumentasi", "");
            $res = $this->mquery->insert_data('kegiatan_dokumentasi', $array, $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $temp = $this->mquery->select_id('kegiatan_dokumentasi', ['id_dokumentasi' => $id]);
        $string = ['kegiatan_dokumentasi' => $temp];
        $log = simpan_log("delete dokumentasi", json_encode($string));
        $res = $this->mquery->delete_data('kegiatan_dokumentasi', ['id_dokumentasi' => $id], $log);
        if ($res > 0) {
            if (file_exists(FCPATH . "uploads/dokumentasi/" . $temp['file_dokumentasi'])) {
                unlink(FCPATH . "uploads/dokumentasi/" . $temp['file_dokumentasi']);
            }
        }
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
