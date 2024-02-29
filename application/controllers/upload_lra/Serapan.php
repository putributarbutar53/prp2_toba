<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serapan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('M_fungsi', 'fungsi');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function detail2($encrypt_id, $tahun, $bulan)
    {
        if ($this->akses['akses'] == 'Y') {
            $id_skpd = decrypt_url($encrypt_id);
            $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => $tahun, 'bulan' => $bulan, 'st_data' => 2]);
            $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
            $data = [
                "menu_active" => "upload_data",
                "submenu_active" => "upload-lra-opd",
                "skpd" => $skpd,
                "tahun" => $tahun,
                "bulan" => $bulan,
                "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
            ];
            $this->load->view('upload_lra/serapan/view_detail2', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }

    public function load_apbd2()
    {
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('data_serapan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening']]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['kode_rekening' => $r['kode_rekening']]);
            
            if($row_anggaran['anggaran']==0){$persen=0;}
            else{$persen=round(($r['realisasi']/$row_anggaran['anggaran']*100),2);}

            if($tahun_now==$tahun)
            {
                $edit = action_edit(encrypt_url($r['id_serapan']));
                $delete = action_delete(encrypt_url($r['id_serapan']));
            }else
            {
                $edit = '-';
                $delete = '-';
            }

            $row = [
                'no' => $no,
                'tahun' => $tahun,
                'bulan' => bulan($bulan),
                'kode_rekening' => $r['kode_rekening'],
                'uraian' => $row_uraian['uraian'],
                'anggaran' => format_rupiah($row_anggaran['anggaran']),
                'realisasi' => format_rupiah($r['realisasi']),
                'persen' => format_rupiah($persen)." %",
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
        $id_skpd = htmlspecialchars($this->input->post('id_skpd', TRUE));
        $tahun = htmlspecialchars($this->input->post('tahun', TRUE));
        $bulan = htmlspecialchars($this->input->post('bulan', TRUE));
        if ($opsi == "add") {
            $data = [
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]),
                "uraian" => $this->mquery->select_data('data_kode_rekening'),
                "tahun" => $tahun,
                "bulan" => $bulan
            ];
            $this->load->view('upload_lra/serapan/form_add', $data);
        } elseif ($opsi == "edit") {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $id_no = decrypt_url($encrypt_id);
            $data_realisasi = $this->mquery->select_id('data_serapan_skpd', ['id_serapan' => $id_no]);
            $data = [
                "data_realisasi" => $data_realisasi,
                "skpd" => $this->mquery->select_id('data_skpd', ['id_skpd' => $data_realisasi['id_skpd']]),
                "uraian" => $this->mquery->select_data('data_kode_rekening')
            ];
            $this->load->view('upload_lra/serapan/form_edit', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('id_skpd', 'Satuan kerja', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('bulan', 'bulan', 'required|trim');
        $this->form_validation->set_rules('id_uraian', 'Uraian', 'required|trim');
        $this->form_validation->set_rules('realisasi', 'realisasi', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'id_skpd' => form_error('id_skpd'),
            'tahun' => form_error('tahun'),
            'bulan' => form_error('bulan'),
            'id_uraian' => form_error('id_uraian'),
            'realisasi' => form_error('realisasi')
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
            $id_uraian=htmlspecialchars($post['id_uraian']);
            $temp = $this->mquery->select_id('data_kode_rekening', ['id_uraian' => $id_uraian]);
            $realisasi = str_replace(".", "", htmlspecialchars($post['realisasi']));
            $array =  [
                'id_skpd' => htmlspecialchars($post['id_skpd']),
                'kode_rekening' => $temp['kode_rekening'],
                'realisasi' => $realisasi,
                'tahun' => htmlspecialchars($post['tahun']),
                'bulan' => htmlspecialchars($post['bulan'])
            ];

            $string = ['data_serapan_skpd' => $array];
            $log = simpan_log("insert data_serapan_skpd", json_encode($string));
            $res = $this->mquery->insert_data('data_serapan_skpd', $array, $log);
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
            $id_no = htmlspecialchars($post['id_no']);
            $realisasi = str_replace(".", "", htmlspecialchars($post['realisasi']));
            $array =  [
                'realisasi' => $realisasi
            ];
            $temp = $this->mquery->select_id('data_serapan_skpd', ['id_serapan' => $id_no]);
            $string = ['data_serapan_skpd' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update data_serapan_skpd", json_encode($string));
            $res = $this->mquery->update_data('data_serapan_skpd', $array, ['id_serapan' => $id_no], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete_data()
    {
        $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
        $id_uraian = decrypt_url($encrypt_id);
        $temp = $this->mquery->select_id('data_serapan_skpd', ['id_serapan' => $id_uraian]);
        $string = ['data_serapan_skpd' => $temp];
        $log = simpan_log("delete data_serapan_skpd", json_encode($string));
        $res = $this->mquery->delete_data('data_serapan_skpd', ['id_serapan' => $id_uraian], $log);
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


}
