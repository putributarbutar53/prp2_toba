<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penanggulangan_covid19 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Belanja_model', 'belanja');
        $this->load->model('M_fungsi', 'fungsi');
    }

    public function index()
    {
        $row_skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => 25]);
        $data = [
            "skpd" => $row_skpd
        ];
        $this->load->view('publik/penanggulangan_covid19/view', $data);
    }

    public function load_kegiatan()
    {
        $id_pri=2;
        $id_stra=12;
        $result = $this->mquery->select_by('ta_kontrak', ['id_prioritas' => $id_pri, 'id_kegiatan' => $id_stra], 'id_prioritas ASC, id_kegiatan ASC');
        $data = [];
        $no = 0;
        $realisasi_total=0;
        $nilai_total=0;
        $fisik_total=0;
        $jml_input_data=0;
        foreach ($result as $r) {
            $no++;
            $skpd = $this->mquery->select_id('data_skpd', ['kd_urusan' => $r['kd_urusan'],'kd_bidang' => $r['kd_bidang'],'kd_unit' => $r['kd_unit'],'kd_sub' => $r['kd_sub']]);
            $encrypt_id = encrypt_url($r['id_kontrak']);
            $jml_kontrak_pa = $this->mquery->count_data('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
            
            if($jml_kontrak_pa==0){$nama_pa="";}
            else{
                $kontrak_pa = $this->mquery->select_id('ta_kontrak_pa', ['id_kontrak' => $r['id_kontrak']]);
                $nama_pa=$kontrak_pa['nama_pa'];
            }

            $no_kontrak=$r['no_kontrak'];

            $hit_kontrak_real = $this->mquery->count_data('data_kontrak_real', ['id_kontrak' => $r['id_kontrak']]);
            if($hit_kontrak_real==0){$realisasi=0;}
            {
                $sum_kontrak_real = $this->mquery->sum_data('data_kontrak_real', 'nilai', ['id_kontrak' => $r['id_kontrak']]);
                $realisasi=$sum_kontrak_real['nilai'];
                $realisasi_total=$realisasi_total+$realisasi;
            }

            if($r['nilai']==0){$persen_real=0;}
            else{
                $persen_real=hitung_persen($realisasi, $r['nilai'], 2);
            }

            $jml_fisik = $this->mquery->count_data('data_kegiatan_detail', ['id_kegiatan' => $r['id_kontrak']]);
            
            if($jml_fisik==0){$realisasi_fisik=0;}
            else{
                $max_realisasi = $this->mquery->max_data_where('data_kegiatan_detail', 'realisasi', ['id_kegiatan' => $r['id_kontrak']]);
                $realisasi_fisik=$max_realisasi['realisasi'];
                $jml_input_data++;
            }

            if($realisasi_fisik>=$persen_real){$tamp_realisasi_fisik="<button class='btn btn-success btn-sm'>".$realisasi_fisik." %</button>";}
            else {$tamp_realisasi_fisik="<button class='btn btn-danger btn-sm'>".$realisasi_fisik." %</button>";}

            if($jml_fisik==0){$tamp_realisasi_fisik="-";}

            $data_kontrak="Nomor : ".$r['no_kontrak']."<br>Tanggal : ".substr($r['tgl_kontrak'],0,10);
            $nilai_total=$nilai_total+$r['nilai'];
            $fisik_total=$fisik_total+$realisasi_fisik;

            
            $keperluan=$r['keperluan'];
            if($r['id_prioritas']!=0)
            {
                if($r['id_prioritas']==1){$keperluan=$keperluan." <img src=".cek_file('images/1.png')." height='20';>";}
                elseif($r['id_prioritas']==2){$keperluan=$keperluan." <img src=".cek_file('images/2.png')." height='20';>";}
                elseif($r['id_prioritas']==3){$keperluan=$keperluan." <img src=".cek_file('images/3.png')." height='20';>";}
                elseif($r['id_prioritas']==4){$keperluan=$keperluan." <img src=".cek_file('images/4.png')." height='20';>";}
                elseif($r['id_prioritas']==5){$keperluan=$keperluan." <img src=".cek_file('images/5.png')." height='20';>";}
                elseif($r['id_prioritas']==6){$keperluan=$keperluan." <img src=".cek_file('images/6.png')." height='20';>";}
                elseif($r['id_prioritas']==7){$keperluan=$keperluan." <img src=".cek_file('images/7.png')." height='20';>";}
                elseif($r['id_prioritas']==8){$keperluan=$keperluan." <img src=".cek_file('images/8.png')." height='20';>";}
                
            }
            $row = [
                'no' => $no,
                'skpd' => $skpd['nama_skpd'],
                'keperluan' => $keperluan,
                'waktu' => $r['waktu'],
                'nilai' => 'Rp '.format_rupiah($r['pagu']).' <br>Rp '.format_rupiah($r['nilai']),
                'realisasi' => format_rupiah($realisasi)."<br>Persen : ".$persen_real." %",
                'persen' => $tamp_realisasi_fisik
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    function cek_kegiatan()
    {
        $id_kegiatan=0;
        $id_prioritas = $this->input->post('id_prioritas', TRUE);
        $result = $this->mquery->select_by('kegiatan_strategis', ['id_prioritas' => $id_prioritas], 'id_kegiatan ASC');
        echo "<option value=''>Pilih Kegiatan Strategis</option>";
        foreach ($result as $r) {
            if ($r['id_kegiatan'] == $id_kegiatan) {
                echo "<option value='" . $r['id_kegiatan'] . "' selected>" . $r['nama_kegiatan'] . "</option>";
            } else {
                echo "<option value='" . $r['id_kegiatan'] . "'>" . $r['nama_kegiatan'] . "</option>";
            }
        }
    }

    public function load_rekap()
    {
        $id_pri=2;
        $id_stra=12;
        $jumlah_kegiatan = $this->mquery->count_data('ta_kontrak', ['id_prioritas' => $id_pri, 'id_kegiatan' => $id_stra]);
                $result_skpd = $this->mquery->select_data('data_skpd');
                $total_kontrak_all=0;
                $realisasi_total_all=0;
                $realisasi_fisik_total_all=0;
                $data = [];
                foreach ($result_skpd as $skpd) {
                    $jumlah_kegiatan_opd = $this->mquery->count_data('ta_kontrak', ['kd_urusan' => $skpd['kd_urusan'],'kd_bidang' => $skpd['kd_bidang'],'kd_unit' => $skpd['kd_unit'],'kd_sub' => $skpd['kd_sub'], 'id_prioritas' => $id_pri, 'id_kegiatan' => $id_stra], 'id_prioritas ASC, id_kegiatan ASC');
                    $result_kegiatan = $this->mquery->select_by('ta_kontrak', ['kd_urusan' => $skpd['kd_urusan'],'kd_bidang' => $skpd['kd_bidang'],'kd_unit' => $skpd['kd_unit'],'kd_sub' => $skpd['kd_sub'], 'id_prioritas' => $id_pri, 'id_kegiatan' => $id_stra], 'id_prioritas ASC, id_kegiatan ASC');
                    $total_kontrak=0;
                    $realisasi_total=0;
                    $realisasi_fisik_total=0;
                    foreach ($result_kegiatan as $kegi) {
                        $kontrak=$kegi['nilai'];
                        if($kontrak==0){$kontrak=$kegi['pagu'];}
                        $total_kontrak=$total_kontrak+$kontrak;

                        $hit_kontrak_real = $this->mquery->count_data('data_kontrak_real', ['id_kontrak' => $kegi['id_kontrak']]);
                        if($hit_kontrak_real==0){$realisasi=0;}
                        {
                            $sum_kontrak_real = $this->mquery->sum_data('data_kontrak_real', 'nilai', ['id_kontrak' => $kegi['id_kontrak']]);
                            $realisasi=$sum_kontrak_real['nilai'];
                            $realisasi_total=$realisasi_total+$realisasi;
                        }
                        $jml_fisik = $this->mquery->count_data('data_kegiatan_detail', ['id_kegiatan' => $kegi['id_kontrak']]);
                        if($jml_fisik==0){$realisasi_fisik=0;}
                        else{
                            $max_realisasi = $this->mquery->max_data_where('data_kegiatan_detail', 'realisasi', ['id_kegiatan' => $kegi['id_kontrak']]);
                            $realisasi_fisik=$max_realisasi['realisasi'];
                            $realisasi_fisik_total=$realisasi_fisik_total+$realisasi_fisik;
                        }
                    }
                    if($jumlah_kegiatan_opd==0){$persen_fisik=0;}
                    else{$persen_fisik=round(($realisasi_fisik_total/$jumlah_kegiatan_opd),1);}
                    $total_kontrak_all=$total_kontrak_all+$total_kontrak;
                    $realisasi_total_all=$realisasi_total_all+$realisasi_total;
                    $realisasi_fisik_total_all=$realisasi_fisik_total_all+$realisasi_fisik_total;
                    if($total_kontrak==0){$persen=0;}
                    else{$persen=hitung_persen($realisasi_total,$total_kontrak,1);}
                    $row = [
                        'nama_skpd' => $skpd['nama_skpd'],
                        'total_kontrak' => $total_kontrak,
                        'realisasi_total' => $realisasi_total,
                        'total_kontrak_sort' => $total_kontrak,
                        'persen' => $persen,
                        'persen_fisik' => $persen_fisik
                    ];
                    $data[] = $row;
                }

        $sorting_data = array_sort($data, 'total_kontrak_sort', SORT_DESC);
        $nama_skpd = null;
        $kontrak_skpd = null;
        $realisasi_skpd = null;
        $persen_skpd = null;
        $persen_fisik_skpd = null;
        foreach ($sorting_data as $sort) {
            if($sort['total_kontrak']!=0)
            {
                $nama_skpd .= "'".$sort['nama_skpd']."',";
                $kontrak_skpd .= $sort['total_kontrak'].",";
                $realisasi_skpd .= $sort['realisasi_total'].",";
                $persen_skpd .= $sort['persen'].",";
                $persen_fisik_skpd .= $sort['persen_fisik'].",";
            }
        }
        
        $tahun=2022;
        $this->db->select_max('tgl_data');
        $this->db->from('log_upload');
        $this->db->where(['tahun' => $tahun, 'st_data' => 2]);
        $tanggal_temp = $this->db->get()->row_array();
        $tanggal_data = $tanggal_temp['tgl_data'];
        
        if($jumlah_kegiatan==0){$persen_fisik_all=0;}
        else{$persen_fisik_all=round(($realisasi_fisik_total_all/$jumlah_kegiatan),1);}

        $data_kirim = [
            "nama_skpd" => $nama_skpd,
            "kontrak_skpd" => $kontrak_skpd,
            "realisasi_skpd" => $realisasi_skpd,
            "tanggal_data" => $tanggal_data,
            "jumlah_kegiatan" => $jumlah_kegiatan,
            "total_kontrak_all" => $total_kontrak_all,
            "realisasi_total_all" => $realisasi_total_all,
            "persen_skpd" => $persen_skpd,
            "persen_fisik_skpd" => $persen_fisik_skpd,
            "persen_fisik_all" => $persen_fisik_all
        ];

        $this->load->view('publik/penanggulangan_covid19/view_rekap', $data_kirim);
    }

}
