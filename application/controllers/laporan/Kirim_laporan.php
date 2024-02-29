<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kirim_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->akses = is_logged_in();
    }
    
    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        if ($opsi == "add") {
            if ($this->akses['role'] == 'skpd') {
                $user = $this->mquery->select_id('users', ['id_user' => $this->akses['user']]);
                $result_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $user['id_skpd']]);
            } else {
                $result_skpd = $this->mquery->select_data('data_skpd', 'nama_skpd ASC');
            }
            $data = [
                "result_skpd" => $result_skpd,
                "akses" => $this->akses['role']
            ];
            $this->load->view('laporan/realisasi_keuangan/form_konfirmasi', $data);
        } elseif ($opsi == "new") {
            $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
            $data = [
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd])
            ];
            $this->load->view('laporan/realisasi_keuangan/form_konfirmasi', $data);
        } elseif ($opsi == "edit") {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $data = [
                'penanda_tangan' => $this->master->get_ttd_id($id)
            ];
            $this->load->view('master/penanda_tangan/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('nama_skpd', 'Nama SKPD', 'required|trim');
        $this->form_validation->set_rules('nip_ttd', 'NIP Penanda Tangan', 'required|trim');
        $this->form_validation->set_rules('nama_ttd', 'Nama Penanda Tangan', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == 'skpd') {
            $errors = [
                'nama_skpd' => "<p>Data Penanda Tangan Sudah Ada Di Skpd Ini</p>",
                'nip_ttd' => form_error('nip_ttd'),
                'nama_ttd' => form_error('nama_ttd'),
                'ttd' => form_error('ttd')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Penanda Tangan Sudah Ada'];
        } elseif ($params == 'images') {
            $errors = [
                'nama_skpd' => form_error('nama_skpd'),
                'nip_ttd' => form_error('nip_ttd'),
                'nama_ttd' => form_error('nama_ttd'),
                'ttd' => $this->upload->display_errors()
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        } else {
            $errors = [
                'nama_skpd' => form_error('nama_skpd'),
                'nip_ttd' => form_error('nip_ttd'),
                'nama_ttd' => form_error('nama_ttd'),
                'ttd' => form_error('ttd')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        
                    $res = 1;
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        }
    }


}
