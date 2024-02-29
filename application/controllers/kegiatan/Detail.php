<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->user = is_logged_in();
        $this->akses = cek_akses_user();
    }

    public function index($encrypt_id)
    {
        $id_kegiatan = decrypt_url($encrypt_id);
        $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kegiatan]);
        $skpd = $this->mquery->select_id('data_skpd', ['kd_urusan' => $ta_kontrak['kd_urusan'],'kd_bidang' => $ta_kontrak['kd_bidang'],'kd_unit' => $ta_kontrak['kd_unit'],'kd_sub' => $ta_kontrak['kd_sub']]);
        
        $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $id_kegiatan]);
            if($jml_kontrak_pa==0){$nama_pa="";}
            else{
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $id_kegiatan]);
                $nama_pa=$kontrak_pa['nama_pa'];
            }
        
            
            $hit_kontrak_real = $this->mquery->count_data('data_kontrak_real', ['id_kontrak' => $id_kegiatan]);
            if($hit_kontrak_real==0){$realisasi=0;}
            {
                $sum_kontrak_real = $this->mquery->sum_data('data_kontrak_real', 'nilai', ['id_kontrak' => $id_kegiatan]);
                $realisasi=$sum_kontrak_real['nilai'];
            }

            if($ta_kontrak['nilai']==0){$persen_real=0;}
            else{
                $persen_real=hitung_persen($realisasi, $ta_kontrak['nilai'], 2);
            }

        $data = [
            "menu_active" => "kegiatan_skpd",
            "submenu_active" => null,
            "nama_pa" => $nama_pa,
            "realisasi" => $realisasi,
            "persen_real" => $persen_real,
            "kegiatan" => $this->mquery->select_id('data_kegiatan', ['id_kegiatan' => $id_kegiatan]),
            "ta_kontrak" => $ta_kontrak,
            "skpd" => $skpd

        ];
        $this->load->view('kegiatan/detail/view', $data);
    }

    public function load()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kontrak]);
        $result = $this->mquery->select_by('data_kegiatan_detail', ['id_kegiatan' => $id_kontrak]);
        $data = [];
        $no = 0;
        $tgl_now=date('Y-m-d');
        $tahun_now=date('Y');
        foreach ($result as $r) {
            $no++;
            if($tahun_now==$ta_kontrak['tahun'])
                {
                    if ($this->akses['ubah'] == 'Y') 
                        {$edit = action_edit($r['id_kegiatan_detail']);}
                    else{$edit = "-";}

                    if ($this->akses['hapus'] == 'Y') 
                        {$delete = action_delete($r['id_kegiatan_detail']);}
                    else{$delete = "-";}
                }
                else
                {
                    if ($this->akses['ubah_1'] == 'Y') 
                        {$edit = action_edit($r['id_kegiatan_detail']);}
                    else{$edit = "-";}

                    if ($this->akses['hapus_1'] == 'Y') 
                        {$delete = action_delete($r['id_kegiatan_detail']);}
                    else{$delete = "-";}
                }

            $encrypt_id = encrypt_url($r['id_kegiatan_detail']);
            $target = number_format($r['target'], 2);
            $realisasi = number_format($r['realisasi'], 2);
            $persen_realisasi = $realisasi / $target * 100;
            $persen_deviasi = abs(100 - $persen_realisasi);

            $tgl_target=$r['jadwal_target'];
            if($tgl_now>$tgl_target)
            {
                if($realisasi>=$target){$tamp_persen_deviasi="<button class='btn btn-success btn-sm'>".number_format($persen_deviasi, 2)." %</button>";}
                else 
                {
                    if($persen_deviasi<20){$tamp_persen_deviasi="<button class='btn btn-warning btn-sm'>".number_format($persen_deviasi, 2)." %</button>";}
                    else{$tamp_persen_deviasi="<button class='btn btn-danger btn-sm'>".number_format($persen_deviasi, 2)." %</button>";}
                }
            }
            else{$tamp_persen_deviasi=" ";}
            

            $edit_realisasi = "<button id='tombol-realisasi' data-id='" . $r['id_kegiatan_detail'] . "' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-form-action' title='UBAH REALISASI'><i class='fa fa-edit'></i> Ubah Realisasi</button>";
            $dokumentasi = "<a href='" . site_url('kegiatan/dokumentasi/' . $encrypt_id) . "' class='btn btn-info btn-sm' title='DOKUMENTASI'><i class='fa fa-image'></i> Dokumentasi</a>";
            
            $row = [
                'no' => $no,
                'tahapan_target' => tipe_jadwal($r['jenis_target']) . ' ke-' . $r['tahapan_target'] . '<br>' . format_tanggal($r['jadwal_target']),
                'target' => $target . '%',
                'realisasi' => $realisasi . '%',
                'persen_deviasi' => $tamp_persen_deviasi,
                'keterangan_target' => $r['keterangan_target'],
                'opsi' => $edit_realisasi . ' ' . $dokumentasi,
                'aksi' => $edit . ' ' . $delete
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
            $id_kontrak = htmlspecialchars($this->input->post('id_kontrak', TRUE));
            $data = [
                'ta_kontrak' => $this->mquery->select_id('ta_kontrak', ['id_kontrak' => $id_kontrak])
            ];
            $this->load->view('kegiatan/detail/form_add', $data);
        } elseif ($opsi == "edit") {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $data = [
                'kegiatan' => $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id])
            ];
            $this->load->view('kegiatan/detail/form_edit', $data);
        } elseif ($opsi == "realisasi") {
            $id = htmlspecialchars($this->input->post('id', TRUE));
            $data = [
                'kegiatan' => $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id])
            ];
            $this->load->view('kegiatan/detail/form_realisasi', $data);
        } else {
            $this->load->view('blocked');
        }
    }

    private function _rule_form()
    {
        $this->form_validation->set_rules('jenis_target', 'Jenis target', 'required|trim');
        $this->form_validation->set_rules('tahapan_target', 'Tahapan target', 'required|trim');
        $this->form_validation->set_rules('jadwal_target', 'Jadwal target', 'required|trim');
        $this->form_validation->set_rules('target', 'Target Fisik (%)', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
    }

    private function _send_error()
    {
        $errors = [
            'jenis_target' => form_error('jenis_target'),
            'tahapan_target' => form_error('tahapan_target'),
            'jadwal_target' => form_error('jadwal_target'),
            'target' => form_error('target')
        ];
        $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function realisasi()
    {
        $this->form_validation->set_rules('realisasi', 'Realisasi', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $errors = [
                'realisasi' => form_error('realisasi')
            ];
            $data = ['status' => FALSE, 'errors' => $errors, 'pesan' => 'Data Gagal Disimpan'];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $post = $this->input->post(null, TRUE);
            $id_kegiatan_detail = htmlspecialchars($post['id_kegiatan_detail']);
            $array =  [
                'realisasi' => htmlspecialchars($post['realisasi']),
                'keterangan_target' => htmlspecialchars($post['keterangan'])
            ];
            $temp = $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id_kegiatan_detail]);
            $string = ['data_kegiatan_detail' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update realisasi", json_encode($string));
            $res = $this->mquery->update_data('data_kegiatan_detail', $array, ['id_kegiatan_detail' => $id_kegiatan_detail], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function add()
    {
        $this->_rule_form();
        if ($this->form_validation->run() == false) {
            $this->_send_error();
        } else {
            $post = $this->input->post(null, TRUE);
            $array =  [
                'id_kegiatan' => htmlspecialchars($post['id_kontrak']),
                'jenis_target' => htmlspecialchars($post['jenis_target']),
                'tahapan_target' => htmlspecialchars($post['tahapan_target']),
                'jadwal_target' => tanggal_database($post['jadwal_target']),
                'target' => htmlspecialchars($post['target']),
                'user_input' => $this->user['user'],
                'tgl_input' => date('Y-m-d H:i:s')
            ];
            $string = ['data_kegiatan_detail' => $array];
            $log = simpan_log("insert detail kegiatan", json_encode($string));
            $res = $this->mquery->insert_data('data_kegiatan_detail', $array, $log);
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
            $id_kegiatan_detail = htmlspecialchars($post['id_kegiatan_detail']);
            $array =  [
                'jenis_target' => htmlspecialchars($post['jenis_target']),
                'tahapan_target' => htmlspecialchars($post['tahapan_target']),
                'jadwal_target' => tanggal_database($post['jadwal_target']),
                'target' => htmlspecialchars($post['target'])
            ];
            $temp = $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id_kegiatan_detail]);
            $string = ['data_kegiatan_detail' => ['old' => $temp, 'new' => $array]];
            $log = simpan_log("update detail kegiatan", json_encode($string));
            $res = $this->mquery->update_data('data_kegiatan_detail', $array, ['id_kegiatan_detail' => $id_kegiatan_detail], $log);
            $data = ['status' => TRUE, 'notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $temp = $this->mquery->select_id('data_kegiatan_detail', ['id_kegiatan_detail' => $id]);
        $string = ['data_kegiatan_detail' => $temp];
        $log = simpan_log("delete detail kegiatan", json_encode($string));
        $res = $this->mquery->delete_data('data_kegiatan_detail', ['id_kegiatan_detail' => $id], $log);
        if ($res > 0) {
            $dokumentasi = $this->mquery->select_by('kegiatan_dokumentasi', ['id_kegiatan_detail' => $id]);
            foreach ($dokumentasi as $d) {
                if (file_exists(FCPATH . "uploads/dokumentasi/" . $d['file_dokumentasi'])) {
                    unlink(FCPATH . "uploads/dokumentasi/" . $d['file_dokumentasi']);
                }
            }
            $this->db->delete('kegiatan_dokumentasi', ['id_kegiatan_detail' => $id]);
        }
        $data = ['status' => TRUE, 'notif' => $res];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
