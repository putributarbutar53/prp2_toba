<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->load->model('Kabupaten_model', 'kabupaten');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "kabupaten_kota",
                "submenu_active" => "anggaran-kabupaten-kota"
            ];
            $this->load->view('kabupaten/anggaran/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $result = $this->kabupaten->get_anggaran_kabupaten($tahun);
            $data = [];
            $no = 0;
            $tahun_now=date('Y');
            foreach ($result as $r) {
                $no++;
                if($tahun_now==$tahun)
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = action_edit($r['no']);}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = action_delete($r['no']);}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = action_edit($r['no']);}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = action_delete($r['no']);}
                    else{$delete = "-";}
                }
                $row = [
                    'no' => $no,
                    'nama_kabupaten' => $r['nama_kabupaten'],
                    'tahun' => $r['tahun'],
                    'pendapatan' => 'Rp.' . format_rupiah($r['pendapatan']),
                    'belanja' => 'Rp.' . format_rupiah($r['belanja']),
                    'pendapatan_p' => 'Rp.' . format_rupiah($r['pendapatan_p']),
                    'belanja_p' => 'Rp.' . format_rupiah($r['belanja_p']),
                    'aksi' => $edit . ' ' . $delete
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

    private function _rule_form()
    {
        $this->form_validation->set_rules('kabupaten', 'Nama kabupaten', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun anggaran', 'required|trim');
        $this->form_validation->set_rules('pendapatan', 'Pendapatan APBD', 'required|trim');
        $this->form_validation->set_rules('belanja', 'Belanja APBD', 'required|trim');
        $this->form_validation->set_rules('pendapatan_p', 'Pendapatan PAPBD', 'required|trim');
        $this->form_validation->set_rules('belanja_p', 'Belanja PAPBD', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == "wilayah") {
            $errors = [
                'kabupaten' => "<p>Data anggaran kabupaten/kota sudah ada pada tahun ini</p>",
                'tahun' => form_error('tahun'),
                'pendapatan' => form_error('pendapatan'),
                'belanja' => form_error('belanja'),
                'pendapatan_p' => form_error('pendapatan_p'),
                'belanja_p' => form_error('belanja_p')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data anggaran kabupaten/kota sudah ada pada tahun ini'];
        } else {
            $errors = [
                'kabupaten' => form_error('kabupaten'),
                'tahun' => form_error('tahun'),
                'pendapatan' => form_error('pendapatan'),
                'belanja' => form_error('belanja'),
                'pendapatan_p' => form_error('pendapatan_p'),
                'belanja_p' => form_error('belanja_p')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form_add()
    {
        if ($this->akses['tambah'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $data = [
                "result_kabupaten" => $this->mquery->select_data('ta_kabupaten', 'nama_kabupaten ASC'),
                'tahun' => $tahun
            ];
            $this->load->view('kabupaten/anggaran/form_add', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    function add()
    {
        if ($this->akses['tambah'] == 'Y') {
            $this->_rule_form();
            if ($this->form_validation->run() == false) {
                $this->_send_error('default');
            } else {
                $post = $this->input->post(null, TRUE);
                $id_kabupaten = htmlspecialchars($post['kabupaten']);
                $tahun = htmlspecialchars($post['tahun']);
                $cek_wilayah = $this->mquery->count_data('tbl_anggaran_wilayah', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun]);
                if ($cek_wilayah > 0) {
                    $this->_send_error('wilayah');
                } else {
                    $array =  [
                        'id_kabupaten' => $id_kabupaten,
                        'tahun' => $tahun,
                        'pendapatan' => input_rupiah($post['pendapatan']),
                        'belanja' => input_rupiah($post['belanja']),
                        'pendapatan_p' => input_rupiah($post['pendapatan_p']),
                        'belanja_p' => input_rupiah($post['belanja_p']),
                    ];
                    $string = ['tbl_anggaran_wilayah' => $array];
                    $log = simpan_log("insert anggaran kabupaten/kota", json_encode($string));
                    $res = $this->mquery->insert_data('tbl_anggaran_wilayah', $array, $log);
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function form_edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $id = $this->input->post('id');
            $data = [
                "result_kabupaten" => $this->mquery->select_data('ta_kabupaten', 'nama_kabupaten ASC'),
                "anggaran" => $this->mquery->select_id('tbl_anggaran_wilayah', ['no' => $id])
            ];
            $this->load->view('kabupaten/anggaran/form_edit', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    function edit()
    {
        if ($this->akses['ubah'] == 'Y') {
            $this->_rule_form();
            if ($this->form_validation->run() == false) {
                $this->_send_error('default');
            } else {
                $post = $this->input->post(null, TRUE);
                $id = htmlspecialchars($post['id_wilayah']);
                $id_kabupaten = htmlspecialchars($post['kabupaten']);
                $tahun = htmlspecialchars($post['tahun']);
                $temp = $this->mquery->select_id('tbl_anggaran_wilayah', ['no' => $id]);
                $cek_wilayah = $this->mquery->count_data('tbl_anggaran_wilayah', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun]);

                if (($cek_wilayah) > 0 && ($id_kabupaten != $temp['id_kabupaten'])) {
                    $this->_send_error('wilayah');
                } else {
                    $array =  [
                        'id_kabupaten' => $id_kabupaten,
                        'tahun' => $tahun,
                        'pendapatan' => input_rupiah($post['pendapatan']),
                        'belanja' => input_rupiah($post['belanja']),
                        'pendapatan_p' => input_rupiah($post['pendapatan_p']),
                        'belanja_p' => input_rupiah($post['belanja_p']),
                    ];
                    $string = ['tbl_anggaran_wilayah' => $array];
                    $log = simpan_log("update anggaran kabupaten/kota", json_encode($string));
                    $res = $this->mquery->update_data('tbl_anggaran_wilayah', $array, ['no' => $id], $log);
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        } else {
            $data = ['status' => FALSE, 'pesan' => 'blocked'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        if ($this->akses['hapus'] == 'Y') {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $temp = $this->mquery->select_id('tbl_anggaran_wilayah', ['no' => $id]);
            $string = ['tbl_anggaran_wilayah' => $temp];
            $log = simpan_log("delete anggaran kabupaten/kota", json_encode($string));
            $res = $this->mquery->delete_data('tbl_anggaran_wilayah', ['no' => $id], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            redirect(site_url('blocked'));
        }
    }
}
