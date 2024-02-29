<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function load()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kontrak]);
        //$no_kontrak = $this->input->post('no_kontrak');
        $result = $this->mquery->select_by('data_kontrak_real', ['id_kontrak' => $id_kontrak]);
        $data = [];
        $no = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            if($tahun_now==$ta_kontrak['tahun'])
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = "<button id='tombol-ubah-kontrak' data-id='" . $r['id_real'] . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-icon btn-round btn-success btn-sm' title='UBAH'><i class='fa fa-edit'></i> </button>";}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = "<button id='tombol-hapus-kontrak' data-id='" . $r['id_real'] . "' class='btn btn-icon btn-round btn-danger btn-sm' title='HAPUS'><i class='fa fa-trash'></i></button>";}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = "<button id='tombol-ubah-kontrak' data-id='" . $r['id_real'] . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-icon btn-round btn-success btn-sm' title='UBAH'><i class='fa fa-edit'></i> </button>";}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = "<button id='tombol-hapus-kontrak' data-id='" . $r['id_real'] . "' class='btn btn-icon btn-round btn-danger btn-sm' title='HAPUS'><i class='fa fa-trash'></i></button>";}
                    else{$delete = "-";}
                }
            
            $row = [
                'no' => $no,
                'no_kontrak' => $r['no_kontrak'],
                'nilai' => format_rupiah($r['nilai']),
                'keterangan' => $r['keterangan'],
                'aksi' => $edit . ' ' . $delete
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form()
    {
        $opsi = $this->input->post('opsi', TRUE);
        if ($opsi == "add") {
            $id_kontrak = $this->input->post('id_kontrak', TRUE);
            $data = [
                'kontrak' => $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kontrak])
            ];
            $this->load->view('kegiatan/detail/form_add_kontrak', $data);
        } elseif ($opsi == "edit") {
            $id_real = htmlspecialchars($this->input->post('id', TRUE));
            $data_real = $this->mquery->select_id('data_kontrak_real', ['id_real' => $id_real]);
            $data = [
                'data_real' => $data_real,
                'kontrak' => $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $data_real['id_kontrak']])
            ];
            $this->load->view('kegiatan/detail/form_edit_kontrak', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('id_kontrak', 'Nomor kontrak', 'required|trim');
        $this->form_validation->set_rules('nilai', 'Realisasi kontrak', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'id_kontrak' => form_error('id_kontrak'),
            'nilai' => form_error('nilai')
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
            $id_kontrak = htmlspecialchars($post['id_kontrak']);
            $kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kontrak]);
            $array =  [
                'tahun' => htmlspecialchars($post['tahun']),
                'id_kontrak' => $id_kontrak,
                'no_kontrak' => htmlspecialchars($post['no_kontrak']),
                'nilai' => input_rupiah($post['nilai']),
                'kd_urusan' => $kontrak['kd_urusan'],
                'kd_bidang' => $kontrak['kd_bidang'],
                'kd_unit' => $kontrak['kd_unit'],
                'kd_sub' => $kontrak['kd_sub'],
                'keterangan' => htmlspecialchars($post['keterangan'])
            ];
            $string = ['data_kontrak_real' => $array];
            $log = simpan_log("insert real kontrak", json_encode($string));
            $res = $this->mquery->insert_data('data_kontrak_real', $array, $log);
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
            $id_real = htmlspecialchars($post['id_real']);
            $array =  [
                'no_kontrak' => htmlspecialchars($post['no_kontrak']),
                'nilai' => input_rupiah($post['nilai']),
                'keterangan' => htmlspecialchars($post['keterangan'])
            ];
            $temp = $this->mquery->select_id('data_kontrak_real', ['id_real' => $id_real]);
            $string = ['data_kontrak_real' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("edit real kontrak", json_encode($string));
            $res = $this->mquery->update_data('data_kontrak_real', $array, ['id_real' => $id_real], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $temp = $this->mquery->select_id('data_kontrak_real', ['id_real' => $id]);
        $string = ['data_kontrak_real' => $temp];
        $log = simpan_log("delete real kontrak", json_encode($string));
        $res = $this->mquery->delete_data('data_kontrak_real', ['id_real' => $id], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
