<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tkdd extends CI_Controller
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
                "submenu_active" => "tkdd-kabupaten-kota"
            ];
            $this->load->view('kabupaten/tkdd/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $result = $this->mquery->select_by("ta_kabupaten", ['kode' => 0], "nama_kabupaten ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_kabupaten']);
                $status_apbd = $this->mquery->max_data_where('tbl_dana_tkdd', 'st_apbd', ['id_kabupaten' => $r['id_kabupaten'], 'tahun' => $tahun]);
                $st_apbd = $status_apbd['st_apbd'];
                $tkdd = $this->mquery->select_id('tbl_dana_tkdd', ['id_kabupaten' => $r['id_kabupaten'], 'tahun' => $tahun, 'st_apbd' => $st_apbd]);
                $nama_kabupaten = "<a href=" . base_url("tkdd-kabupaten-kota/detail/" . $tahun . '/' . $encrypt_id) . ">" . $r['nama_kabupaten'] . "</a>";
                $no++;

                $row = [
                    'no' => $no,
                    'nama_kabupaten' => $nama_kabupaten,
                    'tahun' => $tkdd['tahun'],
                    'dbh' => format_rupiah($tkdd['dbh']),
                    'dau' => format_rupiah($tkdd['dau']),
                    'dak_fisik' => format_rupiah($tkdd['dakfisik']),
                    'daknon' => format_rupiah($tkdd['daknon']),
                    'did' => format_rupiah($tkdd['did']),
                    'desa' => format_rupiah($tkdd['desa'])
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

    public function detail($tahun, $encrypt_id)
    {
        $id_kabupaten = decrypt_url($encrypt_id);
        $row_kabupaten = $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $id_kabupaten]);
        $data = [
            "menu_active" => "kabupaten_kota",
            "submenu_active" => "tkdd-kabupaten-kota",
            "row_kabupaten" => $row_kabupaten,
            "tahun" => $tahun
        ];
        $this->load->view('kabupaten/tkdd/view_detail', $data);
    }

    public function load_detail()
    {
        if ($this->akses['akses'] == 'Y') {
            $id_kabupaten = $this->input->post('id');
            $tahun = $this->input->post('tahun');
            $result = $this->mquery->select_by('tbl_dana_tkdd', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun]);
            $data = [];
            $no = 0;
            $tahun_now=date('Y');
            foreach ($result as $r) {
                $no++;
                ($r['st_apbd'] == 0) ? $status = 'APBD' : $status = 'PABPD';
                
                if($tahun_now==$tahun)
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = action_edit($r['id_tkdd']);}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = action_delete($r['id_tkdd']);}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = action_edit($r['id_tkdd']);}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = action_delete($r['id_tkdd']);}
                    else{$delete = "-";}
                }
                
                $row = [
                    'no' => $no,
                    'tahun' => $r['tahun'],
                    'dbh' => format_rupiah($r['dbh']),
                    'dau' => format_rupiah($r['dau']),
                    'dak_fisik' => format_rupiah($r['dakfisik']),
                    'daknon' => format_rupiah($r['daknon']),
                    'did' => format_rupiah($r['did']),
                    'desa' => format_rupiah($r['desa']),
                    'status' => $status,
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
        $this->form_validation->set_rules('dbh', 'DBH', 'required|trim');
        $this->form_validation->set_rules('dau', 'DAU', 'required|trim');
        $this->form_validation->set_rules('dakfisik', 'DAK fisik', 'required|trim');
        $this->form_validation->set_rules('daknon', 'DAK non fisik', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('st_apbd', 'Status anggaran', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == "wilayah") {
            $errors = [
                'kabupaten' => "<p>Data tkdd kabupaten/kota sudah ada pada tahun ini</p>",
                'tahun' => form_error('tahun'),
                'dbh' => form_error('dbh'),
                'dau' => form_error('dau'),
                'dakfisik' => form_error('dakfisik'),
                'daknon' => form_error('daknon'),
                'desa' => form_error('desa'),
                'st_apbd' => form_error('st_apbd')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data tkdd kabupaten/kota sudah ada pada tahun ini'];
        } else {
            $errors = [
                'kabupaten' => form_error('kabupaten'),
                'tahun' => form_error('tahun'),
                'dbh' => form_error('dbh'),
                'dau' => form_error('dau'),
                'dakfisik' => form_error('dakfisik'),
                'daknon' => form_error('daknon'),
                'desa' => form_error('desa'),
                'st_apbd' => form_error('st_apbd')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function form_add()
    {
        if ($this->akses['tambah'] == 'Y') {
            $id_kabupaten = $this->input->post('kabupaten');
            $tahun = $this->input->post('tahun');
            $data = [
                "kabupaten" => $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $id_kabupaten]),
                'tahun' => $tahun
            ];
            $this->load->view('kabupaten/tkdd/form_add', $data);
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
                $st_apbd = htmlspecialchars($post['st_apbd']);
                $cek_wilayah = $this->mquery->count_data('tbl_dana_tkdd', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'st_apbd' => $st_apbd]);
                if ($cek_wilayah > 0) {
                    $this->_send_error('wilayah');
                } else {
                    $array =  [
                        'id_kabupaten' => $id_kabupaten,
                        'tahun' => $tahun,
                        'dbh' => input_rupiah($post['dbh']),
                        'dau' => input_rupiah($post['dau']),
                        'dakfisik' => input_rupiah($post['dakfisik']),
                        'daknon' => input_rupiah($post['daknon']),
                        'desa' => input_rupiah($post['desa']),
                        'st_apbd' => $st_apbd
                    ];
                    $string = ['tbl_dana_tkdd' => $array];
                    $log = simpan_log("insert tkdd kabupaten/kota", json_encode($string));
                    $res = $this->mquery->insert_data('tbl_dana_tkdd', $array, $log);
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
            $detail = $this->mquery->select_id('tbl_dana_tkdd', ['id_tkdd' => $id]);
            $data = [
                "tkdd" => $detail,
                "kabupaten" => $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $detail['id_kabupaten']]),
            ];
            $this->load->view('kabupaten/tkdd/form_edit', $data);
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
                $st_apbd = htmlspecialchars($post['st_apbd']);
                $temp = $this->mquery->select_id('tbl_dana_tkdd', ['id_tkdd' => $id]);
                $cek_wilayah = $this->mquery->count_data('tbl_dana_tkdd', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'st_apbd' => $st_apbd]);

                if (($cek_wilayah) > 0 && ($st_apbd != $temp['st_apbd'])) {
                    $this->_send_error('wilayah');
                } else {
                    $array =  [
                        'id_kabupaten' => $id_kabupaten,
                        'tahun' => $tahun,
                        'dbh' => input_rupiah($post['dbh']),
                        'dau' => input_rupiah($post['dau']),
                        'dakfisik' => input_rupiah($post['dakfisik']),
                        'daknon' => input_rupiah($post['daknon']),
                        'desa' => input_rupiah($post['desa']),
                        'st_apbd' => $st_apbd
                    ];
                    $string = ['tbl_dana_tkdd' => $array];
                    $log = simpan_log("update tkdd kabupaten/kota", json_encode($string));
                    $res = $this->mquery->update_data('tbl_dana_tkdd', $array, ['id_tkdd' => $id], $log);
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
            $temp = $this->mquery->select_id('tbl_dana_tkdd', ['id_tkdd' => $id]);
            $string = ['tbl_dana_tkdd' => $temp];
            $log = simpan_log("delete tkdd kabupaten/kota", json_encode($string));
            $res = $this->mquery->delete_data('tbl_dana_tkdd', ['id_tkdd' => $id], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            redirect(site_url('blocked'));
        }
    }
}
