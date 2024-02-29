<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apbd extends CI_Controller
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
                "submenu_active" => "apbd-kabupaten-kota"
            ];
            $this->load->view('kabupaten/apbd/view', $data);
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
                $status_apbd = $this->mquery->max_data_where('tbl_detail_anggaran_wil', 'st_apbd', ['id_kabupaten' => $r['id_kabupaten'], 'tahun' => $tahun]);
                $st_apbd = $status_apbd['st_apbd'];
                $row_apbd = $this->mquery->select_id('tbl_detail_anggaran_wil', ['id_kabupaten' => $r['id_kabupaten'], 'tahun' => $tahun, 'st_apbd' => $st_apbd]);
                $nama_kabupaten = "<a href=" . base_url("apbd-kabupaten-kota/detail/" . $tahun . '/' . $encrypt_id) . ">" . $r['nama_kabupaten'] . "</a>";
                $no++;
                $pendapatan = "<table class='table-detail'>
                    <tr>
                        <td style='text-align: left;'>PAD</td>
                        <td>Rp" . format_rupiah($row_apbd['pad_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>TRANSFER</td>
                        <td>Rp" . format_rupiah($row_apbd['transfer_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>LAIN</td>
                        <td>Rp" . format_rupiah($row_apbd['lain_anggaran']) . "</td>
                    </tr>
                </table>";

                $belanja = "<table class='table-detail'>
                    <tr>
                        <td style='text-align: left;'>MODAL</td>
                        <td>Rp" . format_rupiah($row_apbd['modal_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>OPERASIONAL</td>
                        <td>Rp" . format_rupiah($row_apbd['operasional_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>TAK TERDUGA</td>
                        <td>Rp" . format_rupiah($row_apbd['takter_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>TRANSFER</td>
                        <td>Rp" . format_rupiah($row_apbd['beltransfer_anggaran']) . "</td>
                    </tr>
                </table>";
                $row = [
                    'no' => $no,
                    'nama_kabupaten' => $nama_kabupaten,
                    'tahun' => $row_apbd['tahun'],
                    'pendapatan' => $pendapatan,
                    'belanja' => $belanja
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
            "submenu_active" => "apbd-kabupaten-kota",
            "row_kabupaten" => $row_kabupaten,
            "tahun" => $tahun
        ];
        $this->load->view('kabupaten/apbd/view_detail', $data);
    }

    public function load_detail()
    {
        if ($this->akses['akses'] == 'Y') {
            $id_kabupaten = $this->input->post('id');
            $tahun = $this->input->post('tahun');
            $result = $this->mquery->select_by('tbl_detail_anggaran_wil', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun]);
            $data = [];
            $no = 0;
            $tahun_now=date('Y');
            foreach ($result as $r) {
                $no++;
                $pendapatan = "<table class='table-detail'>
                    <tr>
                        <td style='text-align: left;'>PAD</td>
                        <td>Rp" . format_rupiah($r['pad_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>TRANSFER</td>
                        <td>Rp" . format_rupiah($r['transfer_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>LAIN</td>
                        <td>Rp" . format_rupiah($r['lain_anggaran']) . "</td>
                    </tr>
                </table>";

                $belanja = "<table class='table-detail'>
                    <tr>
                        <td style='text-align: left;'>MODAL</td>
                        <td>Rp" . format_rupiah($r['modal_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>OPERASIONAL</td>
                        <td>Rp" . format_rupiah($r['operasional_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>TAK TERDUGA</td>
                        <td>Rp" . format_rupiah($r['takter_anggaran']) . "</td>
                    </tr>
                    <tr>
                        <td style='text-align: left;'>TRANSFER</td>
                        <td>Rp" . format_rupiah($r['beltransfer_anggaran']) . "</td>
                    </tr>
                </table>";
                ($r['st_apbd'] == 0) ? $status = 'APBD' : $status = 'PABPD';
                
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
                    'tahun' => $r['tahun'],
                    'pendapatan' => $pendapatan,
                    'belanja' => $belanja,
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
        $this->form_validation->set_rules('pad', 'Pendapatan PAD', 'required|trim');
        $this->form_validation->set_rules('transfer', 'Pendapatan transfer', 'required|trim');
        $this->form_validation->set_rules('pad_lain', 'Pendapatan lain', 'required|trim');
        $this->form_validation->set_rules('operasional', 'Belanja operasional', 'required|trim');
        $this->form_validation->set_rules('modal', 'Belanja modal', 'required|trim');
        $this->form_validation->set_rules('tak_terduga', 'Belanja tak terduga', 'required|trim');
        $this->form_validation->set_rules('bel_transfer', 'Belanja transfer', 'required|trim');
        $this->form_validation->set_rules('st_apbd', 'Status anggaran', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
        if ($params == "wilayah") {
            $errors = [
                'kabupaten' => "<p>Data apbd kabupaten/kota sudah ada pada tahun ini</p>",
                'tahun' => form_error('tahun'),
                'pad' => form_error('pad'),
                'transfer' => form_error('transfer'),
                'pad_lain' => form_error('pad_lain'),
                'operasional' => form_error('operasional'),
                'modal' => form_error('modal'),
                'tak_terduga' => form_error('tak_terduga'),
                'bel_transfer' => form_error('bel_transfer'),
                'st_apbd' => form_error('st_apbd')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data apbd kabupaten/kota sudah ada pada tahun ini'];
        } else {
            $errors = [
                'kabupaten' => form_error('kabupaten'),
                'tahun' => form_error('tahun'),
                'pad' => form_error('pad'),
                'transfer' => form_error('transfer'),
                'pad_lain' => form_error('pad_lain'),
                'operasional' => form_error('operasional'),
                'modal' => form_error('modal'),
                'tak_terduga' => form_error('tak_terduga'),
                'bel_transfer' => form_error('bel_transfer'),
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
            $this->load->view('kabupaten/apbd/form_add', $data);
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
                $cek_wilayah = $this->mquery->count_data('tbl_detail_anggaran_wil', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'st_apbd' => $st_apbd]);
                if ($cek_wilayah > 0) {
                    $this->_send_error('wilayah');
                } else {
                    $array =  [
                        'id_kabupaten' => $id_kabupaten,
                        'tahun' => $tahun,
                        'pad_anggaran' => input_rupiah($post['pad']),
                        'transfer_anggaran' => input_rupiah($post['transfer']),
                        'lain_anggaran' => input_rupiah($post['pad_lain']),
                        'operasional_anggaran' => input_rupiah($post['operasional']),
                        'modal_anggaran' => input_rupiah($post['modal']),
                        'takter_anggaran' => input_rupiah($post['tak_terduga']),
                        'beltransfer_anggaran' => input_rupiah($post['bel_transfer']),
                        'st_apbd' => $st_apbd
                    ];
                    $string = ['tbl_detail_anggaran_wil' => $array];
                    $log = simpan_log("insert apbd kabupaten/kota", json_encode($string));
                    $res = $this->mquery->insert_data('tbl_detail_anggaran_wil', $array, $log);
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
            $detail = $this->mquery->select_id('tbl_detail_anggaran_wil', ['no' => $id]);
            $data = [
                "apbd" => $detail,
                "kabupaten" => $this->mquery->select_id('ta_kabupaten', ['id_kabupaten' => $detail['id_kabupaten']]),
            ];
            $this->load->view('kabupaten/apbd/form_edit', $data);
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
                $temp = $this->mquery->select_id('tbl_detail_anggaran_wil', ['no' => $id]);
                $cek_wilayah = $this->mquery->count_data('tbl_detail_anggaran_wil', ['id_kabupaten' => $id_kabupaten, 'tahun' => $tahun, 'st_apbd' => $st_apbd]);

                if (($cek_wilayah) > 0 && ($st_apbd != $temp['st_apbd'])) {
                    $this->_send_error('wilayah');
                } else {
                    $array =  [
                        'id_kabupaten' => $id_kabupaten,
                        'tahun' => $tahun,
                        'pad_anggaran' => input_rupiah($post['pad']),
                        'transfer_anggaran' => input_rupiah($post['transfer']),
                        'lain_anggaran' => input_rupiah($post['pad_lain']),
                        'operasional_anggaran' => input_rupiah($post['operasional']),
                        'modal_anggaran' => input_rupiah($post['modal']),
                        'takter_anggaran' => input_rupiah($post['tak_terduga']),
                        'beltransfer_anggaran' => input_rupiah($post['bel_transfer']),
                        'st_apbd' => $st_apbd
                    ];
                    $string = ['tbl_detail_anggaran_wil' => $array];
                    $log = simpan_log("update apbd kabupaten/kota", json_encode($string));
                    $res = $this->mquery->update_data('tbl_detail_anggaran_wil', $array, ['no' => $id], $log);
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
            $temp = $this->mquery->select_id('tbl_detail_anggaran_wil', ['no' => $id]);
            $string = ['tbl_detail_anggaran_wil' => $temp];
            $log = simpan_log("delete apbd kabupaten/kota", json_encode($string));
            $res = $this->mquery->delete_data('tbl_detail_anggaran_wil', ['no' => $id], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            redirect(site_url('blocked'));
        }
    }
}
