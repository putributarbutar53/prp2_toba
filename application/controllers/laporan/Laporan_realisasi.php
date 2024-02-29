<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_realisasi extends CI_Controller
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
                "menu_active" => "laporan",
                "submenu_active" => "laporan-realisasi-keuangan"
            ];
            $this->load->view('laporan/laporan_realisasi/view', $data);
        } else {
            redirect(site_url('blocked'));
        }
    }


    public function load()
    {
        if ($this->akses['akses'] == 'Y') {
            $tahun = $this->input->post('tahun');
            $result = $this->mquery->select_data("data_skpd", "id_skpd ASC");
            $data = [];
            $no = 0;
            foreach ($result as $r) {
                $encrypt_id = encrypt_url($r['id_skpd']);
                
                $keterangan="";
                $jumlah=0;
                for ($i = 1; $i < 13; $i++){
                    $cek_laporan = $this->mquery->count_data('data_realisasi_detail_skpd', ['id_skpd' => $r['id_skpd'], 'tahun' => $tahun, 'bulan' => $i]);
                    if($cek_laporan>0){$keterangan .= bulan($i).", "; $jumlah++;}
                    
                }
                
                $nama_skpd = "<a href=" . base_url("laporan-realisasi-keuangan/detail/" . $encrypt_id) . ">" . $r['nama_skpd'] . "</a>";
                
                    $no++;
                    $row = [
                        'no' => $no,
                        'nama_skpd' => $r['nama_skpd'] ,
                        'jumlah' => $jumlah,
                        'keterangan' => $keterangan
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
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "laporan_realisasi_keuangan",
            "skpd" => $skpd,
            "tahun" => $tahun
        ];
        $this->load->view('laporan/laporan_realisasi/view_detail', $data);
    }

    public function load_apbd()
    {
       // $tahun=2021;
        $skpd = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        //$skpd = 1;
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $skpd]);

        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('laporan_realisasi_keuangan', ['tahun' => $tahun, 'id_skpd' => $skpd], "bulan ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $nama_bulan = "<a href=" . base_url("laporan-realisasi-keuangan/detail2/" .$encrypt_id."/". $r['bulan']) . ">" . bulan($r['bulan']) . "</a>";
            
            $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
            $tgl_papbd=$cek_papbd['papbd'];
            $cek_tanggal_data = $this->mquery->select_id('log_upload', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'bulan'=> $r['bulan']]);
            $tanggal_data=$cek_tanggal_data['tgl_data'];

            if($tanggal_data<$tgl_papbd){$hsl_stanggaran=1;}
            else{$hsl_stanggaran=2;}

            $row_data_uraian_belanja = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'kode_rekening' => 5,'st_anggaran' => $hsl_stanggaran]);
            $total_belanja=$row_data_uraian_belanja['anggaran'];
            $row_data_uraian_pendapatan = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'kode_rekening' => 4,'st_anggaran' => $hsl_stanggaran]);
            $total_pendapatan=$row_data_uraian_pendapatan['anggaran'];
            
            $row_realisasi_pendapatan = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 4]);
            $row_realisasi_belanja = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $r['bulan'], 'kode_rekening' => 5]);
            $row_users = $this->mquery->select_id('users', ['id_user' => $r['user_input']]);
            
            $persen_total_belanja = round(($row_realisasi_belanja['realisasi'] / $total_belanja * 100), 2);
            if($total_pendapatan==0){$persen_total_pendapatan=0;}
            else{$persen_total_pendapatan = round(($row_realisasi_pendapatan['realisasi'] / $total_pendapatan * 100), 2);}

            $tampil_pendapatan = "<table class='table-detail' style='width:100%;'>
                <tr><td>Target</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_pendapatan) . "</td></tr>
                <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_pendapatan['realisasi']) . "</td></tr>
                <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_pendapatan . "%</td></tr>
            </table>";

            $tampil_belanja = "<table class='table-detail' style='width:100%;'>
                <tr><td>Anggaran</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($total_belanja) . "</td></tr>
                <tr><td>Realisasi</td><td style='text-align:right; font-weight:bold;'>Rp" . format_rupiah($row_realisasi_belanja['realisasi']) . "</td></tr>
                <tr><td>Persen</td><td style='text-align:right; font-weight:bold;'>" . $persen_total_belanja . "%</td></tr>
            </table>";

            $row = [
                'no' => $no,
                'bulan' => $nama_bulan,
                'pendapatan' => $tampil_pendapatan,
                'belanja' => $tampil_belanja,
                'tanggal_input' => $r['tanggal_input'],
                'user_input' => $row_users['nama_user']
            ];
            
            $data[] = $row;
        }

        $output['data'] = $data;
        echo json_encode($output);
    }

    public function detail2($encrypt_id, $bulan)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $row_log_upload = $this->mquery->select_id('log_upload', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan, 'st_data' => 2]);
        $row_laporan = $this->mquery->select_id('laporan_realisasi_keuangan', ['id_skpd' => $id_skpd, 'tahun' => 2021, 'bulan' => $bulan]);
        $row_kepala = $this->mquery->select_id('penanda_tangan', ['id_ttd' => $row_laporan['id_kepala']]);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $data = [
            "menu_active" => "laporan",
            "submenu_active" => "laporan_realisasi_keuangan",
            "skpd" => $skpd,
            "bulan" => $bulan,
            "level" => $row_laporan['level'],
            "tanggal_input" => substr($row_laporan['tanggal_input'],0,10),
            "nip_kepala" => $row_kepala['nip_ttd'],
            "nama_kepala" => $row_kepala['nama_ttd'],
            "nama_periode" => $this->fungsi->nama_bulan($row_log_upload['tgl_data'])
        ];
        $this->load->view('laporan/laporan_realisasi/view_detail2', $data);
    }

    public function load_apbd2()
    {
        
        $tahun=2021;
        $skpd = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        $level = $this->input->post('level');
        $bulan_1=$bulan-1;

        $cek_papbd = $this->mquery->select_id('setting_anggaran', ['tahun' => $tahun]);
        $tgl_papbd=$cek_papbd['papbd'];

        $cek_tanggal_data = $this->mquery->select_id('log_upload', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'bulan'=> $bulan]);
        $tanggal_data=$cek_tanggal_data['tgl_data'];

        if($tanggal_data<$tgl_papbd){$hsl_stanggaran=1;}
        else{$hsl_stanggaran=2;}

        $cek_tanggal_data_1 = $this->mquery->select_id('log_upload', ['id_skpd' => $skpd, 'tahun'=> $tahun, 'bulan'=> $bulan_1]);
        $tanggal_data_1=$cek_tanggal_data_1['tgl_data'];

        if($tanggal_data_1<$tgl_papbd){$hsl_stanggaran_1=1;}
        else{$hsl_stanggaran_1=2;}

        $encrypt_id = encrypt_url($skpd);
        $result = $this->mquery->select_by('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan], "kode_rekening ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $row_anggaran = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran]);
            $row_anggaran_1 = $this->mquery->select_id('data_uraian_kegiatan_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'kode_rekening' => $r['kode_rekening'], 'st_anggaran' => $hsl_stanggaran_1]);
            $row_uraian = $this->mquery->select_id('data_uraian_kegiatan_pemko', ['tahun' => $tahun, 'kode_rekening' => $r['kode_rekening']]);
            
            $result_realisasi_1 = $this->mquery->select_id('data_realisasi_detail_skpd', ['id_skpd' => $skpd, 'tahun' => $tahun, 'bulan' => $bulan_1, 'kode_rekening' => $r['kode_rekening']]);

            if($row_anggaran['anggaran']==0){$persen_anggaran=0;}
            else
            {
                $persen_anggaran = round(($r['realisasi'] / $row_anggaran['anggaran'] * 100), 2);
            }

            if($row_anggaran_1['anggaran']==0){$persen_anggaran_1=0;}
            else
            {
                $persen_anggaran_1 = round(($result_realisasi_1['realisasi'] / $row_anggaran_1['anggaran'] * 100), 2);
            }

            if($row_uraian['level']<=$level)
            {
                $row = [
                    'no' => $no,
                    'kode_rekening' => $r['kode_rekening'],
                    'uraian' => $row_uraian['uraian'],
                    'anggaran' => format_rupiah($row_anggaran['anggaran']),
                    'realisasi_1' => format_rupiah($result_realisasi_1['realisasi']),
                    'persen_1' => format_rupiah($persen_anggaran_1)." %",
                    'realisasi' => format_rupiah($r['realisasi']),
                    'persen' => format_rupiah($persen_anggaran)." %"
                ];
                $data[] = $row;
            }
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

}
