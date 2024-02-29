<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penanda_tangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model', 'master');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "master_data",
            "submenu_active" => "penanda-tangan"
        ];
        $this->load->view('master/penanda_tangan/view', $data);
    }

    public function load()
    {

        if ($this->akses['role'] == 'skpd') {
            $user = $this->mquery->select_id('users', ['id_user' => $this->akses['user']]);
            $result = $this->master->get_ttd($user['id_skpd']);
        } else {
            $result = $this->master->get_ttd();
        }
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $new = "<button id='tombol-new' data-id='" . $r['id_skpd'] . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-warning btn-sm' title='NEW'><i class='fa fa-user'></i> NEW TTD</button>";
            $edit = "<button id='tombol-ubah' data-id='" . $r['id_ttd'] . "' data-toggle='modal' data-target='#modal-form-action' class='btn btn-success btn-sm' title='UBAH'><i class='fa fa-edit'></i> UBAH</button>";
            $row = [
                'no' => $no,
                'nama_skpd' => $r['nama_skpd'],
                'nip_ttd' => $r['nip_ttd'],
                'nama_ttd' => $r['nama_ttd'],
                'ttd' => "<img src='" . cek_file("uploads/ttd/" . $r['ttd']) . "' style='width: 200px; height: 75px;' alt='Photo'>",
                'aksi' => $new . ' ' . $edit
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
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
            $this->load->view('master/penanda_tangan/form_add', $data);
        } elseif ($opsi == "new") {
            $id_skpd = htmlspecialchars($this->input->post('skpd', TRUE));
            $data = [
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd])
            ];
            $this->load->view('master/penanda_tangan/form_new', $data);
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
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_skpd = htmlspecialchars($post['nama_skpd']);
            $cek_pa = $this->mquery->count_data('penanda_tangan', ['id_skpd' => $id_skpd]);
            if ($cek_pa > 0) {
                $this->_send_error('skpd');
            } else {
                $nama_ttd = htmlspecialchars($post['nama_ttd']);
                $config['upload_path']      = "./uploads/ttd/";
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = url_title($nama_ttd, 'dash', true) . '-' . date("Ymd-His");
                $config['max_size']         = 512;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('ttd')) {
                    $this->_send_error('images');
                } else {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "./uploads/ttd/" . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 200;
                    $config['height'] = 75;
                    $config['new_image'] = "./uploads/ttd/" . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $array =  [
                        'nip_ttd' => htmlspecialchars($post['nip_ttd']),
                        'nama_ttd' => $nama_ttd,
                        'ttd' => $gbr['file_name'],
                        'id_skpd' => $id_skpd,
                        'is_active' => 'Y',
                        'tgl_input' => date('Y-m-d H:i:s')
                    ];
                    $string = ['penanda_tangan' => $array];
                    $log = simpan_log("new penanda tangan", json_encode($string));
                    $res = $this->mquery->insert_data('penanda_tangan', $array, $log);
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        }
    }

    function new_ttd()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_skpd = htmlspecialchars($post['id_skpd']);
            $nama_ttd = htmlspecialchars($post['nama_ttd']);
            $config['upload_path']      = "./uploads/ttd/";
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['file_name']        = url_title($nama_ttd, 'dash', true) . '-' . date("Ymd-His");
            $config['max_size']         = 512;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ttd')) {
                $this->_send_error('images');
            } else {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = "./uploads/ttd/" . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 200;
                $config['height'] = 75;
                $config['new_image'] = "./uploads/ttd/" . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $array =  [
                    'nip_ttd' => htmlspecialchars($post['nip_ttd']),
                    'nama_ttd' => $nama_ttd,
                    'ttd' => $gbr['file_name'],
                    'id_skpd' => $id_skpd,
                    'is_active' => 'Y',
                    'tgl_input' => date('Y-m-d H:i:s')
                ];
                $cek_ttd = $this->mquery->count_data('penanda_tangan', ['id_skpd' => $id_skpd]);
                if ($cek_ttd > 0) {
                    $temp = $this->mquery->select_id('penanda_tangan', ['id_skpd' => $id_skpd, 'is_active' => 'Y']);
                    $array_old = [
                        'is_active' => 'N'
                    ];
                    $string = ['penanda_tangan' => ['old' => $temp, 'new' => $array]];
                    $log = simpan_log("new pananda tangan", json_encode($string));
                    $res = $this->master->insert_new_ttd($array, $array_old, $temp['id_ttd'], $log);
                } else {
                    $string = ['penanda_tangan' => $array];
                    $log = simpan_log("new penanda tangan", json_encode($string));
                    $res = $this->mquery->insert_data('penanda_tangan', $array, $log);
                }
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }
    }

    function edit()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_ttd = htmlspecialchars($post['id_ttd']);
            $nama_ttd = htmlspecialchars($post['nama_ttd']);
            $config['upload_path']      = "./uploads/ttd/";
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['file_name']        = url_title($nama_ttd, 'dash', true) . '-' . date("Ymd-His");
            $config['max_size']         = 512;
            $this->load->library('upload', $config);
            if (empty($_FILES['ttd']['name'])) {
                $array =  [
                    'nip_ttd' => htmlspecialchars($post['nip_ttd']),
                    'nama_ttd' => $nama_ttd,
                ];
                $temp = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $id_ttd]);
                $string = ['penanda_tangan' => ['old' => $temp, 'new' => $array]];
                $log = simpan_log("update penanda tangan", json_encode($string));
                $res = $this->mquery->update_data('penanda_tangan', $array, ['id_ttd' => $id_ttd], $log);
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                if (!$this->upload->do_upload('ttd')) {
                    $this->_send_error('images');
                } else {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "./uploads/ttd/" . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 200;
                    $config['height'] = 75;
                    $config['new_image'] = "./uploads/ttd/" . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $array =  [
                        'nip_ttd' => htmlspecialchars($post['nip_ttd']),
                        'nama_ttd' => $nama_ttd,
                        'ttd' => $gbr['file_name']
                    ];
                    $temp = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $id_ttd]);
                    $string = ['penanda_tangan' => ['old' => $temp, 'new' => $array]];
                    $log = simpan_log("update penanda tangan", json_encode($string));
                    $res = $this->mquery->update_data('penanda_tangan', $array, ['id_ttd' => $id_ttd], $log);
                    if ($res > 0) {
                       hapus_file('uploads/ttd/' . $temp['ttd']);
                    }
                    $data = ['status' => TRUE, 'notif' => $res];
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        }
    }
}
