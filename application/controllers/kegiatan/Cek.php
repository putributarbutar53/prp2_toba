<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'kegiatan');
        $this->akses = is_logged_in();
    }

    function nama_kegiatan()
    {
        $id_skpd = $this->input->post('skpd', TRUE);
        $jenis_kegiatan = $this->input->post('jenis_kegiatan', TRUE);
        $id_kegiatan = $this->input->post('id_kegiatan', TRUE);
        if ($jenis_kegiatan == 1) {
            $result = $this->mquery->select_by('detail_kegiatan_skpd', ['id_skpd' => $id_skpd], 'kode_rekening ASC');
            echo "<option value=''>Pilih Kegiatan SKPD</option>";
            foreach ($result as $r) {
                if ($r['id_kegiatan_skpd'] == $id_kegiatan) {
                    echo "<option value='" . $r['id_kegiatan_skpd'] . "' selected>" . $r['uraian'] . "</option>";
                } else {
                    echo "<option value='" . $r['id_kegiatan_skpd'] . "'>" . $r['uraian'] . "</option>";
                }
            }
        } elseif ($jenis_kegiatan == 2) {
            $result = $this->mquery->select_by('data_sirup_skpd', ['id_skpd' => $id_skpd]);
            echo "<option value=''>Pilih Kegiatan Sirup</option>";
            foreach ($result as $r) {
                if ($r['id_kegiatan_sirup'] == $id_kegiatan) {
                    echo "<option value='" . $r['id_kegiatan_sirup'] . "' selected>" . $r['nama_paket'] . "</option>";
                } else {
                    echo "<option value='" . $r['id_kegiatan_sirup'] . "'>" . $r['nama_paket'] . "</option>";
                }
            }
        } else {
            echo "<option value='0'>Pilih Kegiatan</option>";
        }
    }
}
