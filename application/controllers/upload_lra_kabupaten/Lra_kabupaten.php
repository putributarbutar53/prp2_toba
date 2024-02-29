<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lra_kabupaten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index()
    {
        if ($this->akses['akses'] == 'Y') {
            $data = [
                "menu_active" => "upload_data",
                "submenu_active" => "upload-lra-kabupaten-kota"
            ];
            $this->load->view('upload_data/lrakabupaten/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $result = $this->mquery->select_by("ta_kabupaten", ['kode' => 0], "id_kabupaten ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_kabupaten']);
             
                $this->db->select_max('bulan');
                $this->db->from('tbl_realisasi_wilayah');
                $this->db->where(['id_kabupaten' => $r['id_kabupaten'], 'tahun' => $tahun]);
                $bulan_temp = $this->db->get()->row_array();
                $bulan_max = $bulan_temp['bulan'];

                $row_anggaran = $this->mquery->select_id('tbl_anggaran_wilayah', ['tahun' => $tahun, 'id_kabupaten' => $r['id_kabupaten']]);
                $row_realisasi = $this->mquery->select_id('tbl_realisasi_wilayah', ['tahun' => $tahun, 'bulan' => $bulan_max, 'id_kabupaten' => $r['id_kabupaten']]);
            
                if($row_anggaran['pendapatan']==0){$persen_pendapatan=0;}
                else{$persen_pendapatan = round(($row_realisasi['pendapatan_realisasi'] / $row_anggaran['pendapatan'] * 100), 2);}
                $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_anggaran['pendapatan']) . "</td></tr>
                    <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi['pendapatan_realisasi']) . "</td></tr>
                    <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>".$persen_pendapatan." %</td></tr>
                </table>";

                if($row_anggaran['belanja']==0){$persen_belanja=0;}
                else{$persen_belanja = round(($row_realisasi['belanja_realisasi'] / $row_anggaran['belanja'] * 100), 2);}
                $tampil_belanja = "<table class='table-detail' style='width:100%;'>
                    <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_anggaran['belanja']) . "</td></tr>
                    <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi['belanja_realisasi']) . "</td></tr>
                    <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>".$persen_belanja." %</td></tr>
                </table>";
                
                $nama_kabupaten = "<a href=" . base_url("upload-lra-kabupaten-kota/detail/" . $tahun. "/" .$encrypt_id) . ">" . $r['nama_kabupaten'] . "</a>";
                $no++;
                $row = [
                    'no' => $no,
                    'nama_kabupaten' => $nama_kabupaten,
                    'bulan' => bulan($bulan_max),
                    'pendapatan' => $tampil_pendapatan,
                    'belanja' => $tampil_belanja,
                    'tanggal' => $row_realisasi['tanggal'],
                    'tgl_update' => $row_realisasi['tgl_update']
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
            "menu_active" => "upload_data",
            "submenu_active" => "upload-lra-kabupaten-kota",
            "row_kabupaten" => $row_kabupaten,
            "tahun" => $tahun
        ];
        $this->load->view('upload_data/lrakabupaten/view_detail', $data);
    }

    public function load_anggaran()
    {
        $id_kabupaten = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $row_anggaran = $this->mquery->select_id('tbl_anggaran_wilayah', ['tahun' => $tahun, 'id_kabupaten' => $id_kabupaten]);
        $result = $this->mquery->select_by('tbl_realisasi_wilayah', ['tahun' => $tahun, 'id_kabupaten' => $id_kabupaten], "bulan ASC");
        $data = [];
        $no = 0;
        $total=0;
        $tahun_now=date('Y');
        $tgl_awal=$tahun."-12-31";
        $tgl_akhir=date('Y-m-d');
        $tanggal_awal = new DateTime($tgl_awal); 
        $tanggal_akhir = new DateTime($tgl_akhir);
        $perbedaan = $tanggal_awal->diff($tanggal_akhir);
        $selisih = $perbedaan->days;
        foreach ($result as $r) {
            $no++;
            if($tahun_now==$tahun)
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = action_edit(encrypt_url($r['no']));}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = action_delete(encrypt_url($r['no']));}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = action_edit(encrypt_url($r['no']));}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = action_delete(encrypt_url($r['no']));}
                    else{$delete = "-";}
                }

            if($row_anggaran['pendapatan']==0){$persen_pendapatan=0;}
            else{$persen_pendapatan = round(($r['pendapatan_realisasi'] / $row_anggaran['pendapatan'] * 100), 2);}
            $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_anggaran['pendapatan']) . "</td></tr>
                <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($r['pendapatan_realisasi']) . "</td></tr>
                <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>".$persen_pendapatan." %</td></tr>
            </table>";

            if($row_anggaran['belanja']==0){$persen_belanja=0;}
            else{$persen_belanja = round(($r['belanja_realisasi'] / $row_anggaran['belanja'] * 100), 2);}
            $tampil_belanja = "<table class='table-detail' style='width:100%;'>
                <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_anggaran['belanja']) . "</td></tr>
                <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($r['belanja_realisasi']) . "</td></tr>
                <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>".$persen_belanja." %</td></tr>
            </table>";

            $row = [
                'no' => $no,
                'tahun' => $r['tahun'],
                'bulan' => bulan($r['bulan']),
                'pendapatan' => $tampil_pendapatan,
                'belanja' => $tampil_belanja,
                'tanggal' => $r['tanggal'],
                'tgl_update' => $r['tgl_update'],
                'opsi' => $edit . ' ' . $delete
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form()
    {
        $opsi = htmlspecialchars($this->input->post('opsi', TRUE));
        $id_kabupaten = htmlspecialchars($this->input->post('id_kabupaten', TRUE));
        if ($opsi == "add") {
            $data = [
                "id_kabupaten" => $id_kabupaten
            ];
            $this->load->view('upload_data/lrakabupaten/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $data = [
                "tbl_realisasi_wilayah" => $this->mquery->select_id('tbl_realisasi_wilayah', ['no' => $id_no])
            ];
            $this->load->view('upload_data/lrakabupaten/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required|trim');
        $this->form_validation->set_rules('belanja', 'Belanja', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error($params)
    {
            $errors = [
                'tahun' => form_error('tahun'),
                'bulan' => form_error('bulan'),
                'pendapatan' => form_error('pendapatan'),
                'belanja' => form_error('belanja'),
                'tanggal' => form_error('tanggal')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function add()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $array =  [
                'id_kabupaten' => htmlspecialchars($post['id_kabupaten']),
                'tahun' => htmlspecialchars($post['tahun']),
                'bulan' => htmlspecialchars($post['bulan']),
                'pendapatan_realisasi' => htmlspecialchars($post['pendapatan']),
                'belanja_realisasi' => htmlspecialchars($post['belanja']),
                'tanggal' => htmlspecialchars($post['tanggal']),
                'tgl_update' => date('Y-m-d H:i:s')
            ];
            $string = ['tbl_realisasi_wilayah' => $array];
            $log = simpan_log("new tbl_realisasi_wilayah", json_encode($string));
            $res = $this->mquery->insert_data('tbl_realisasi_wilayah', $array, $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function edit()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error('default');
        } else {
            $post = $this->input->post(null, TRUE);
            $id_no = htmlspecialchars($post['id_no']);
            $array =  [
                'tahun' => htmlspecialchars($post['tahun']),
                'bulan' => htmlspecialchars($post['bulan']),
                'pendapatan_realisasi' => htmlspecialchars($post['pendapatan']),
                'belanja_realisasi' => htmlspecialchars($post['belanja']),
                'tanggal' => htmlspecialchars($post['tanggal']),
                'tgl_update' => date('Y-m-d H:i:s')
            ];
            $temp = $this->mquery->select_id('tbl_realisasi_wilayah', ['no' => $id_no]);
            $string = ['tbl_realisasi_wilayah' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update tbl_realisasi_wilayah", json_encode($string));
            $res = $this->mquery->update_data('tbl_realisasi_wilayah', $array, ['no' => $id_no], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
        $id_no = decrypt_url($encrypt_id);
        $temp = $this->mquery->select_id('tbl_realisasi_wilayah', ['no' => $id_no]);
        $string = ['tbl_realisasi_wilayah' => $temp];
        $log = simpan_log("delete tbl_realisasi_wilayah", json_encode($string));
        $res = $this->mquery->delete_data('tbl_realisasi_wilayah', ['no' => $id_no], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


}
