<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lrapemko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Instansi_model', 'instansi');
        $this->load->model('Detail_model', 'detail');
		$this->load->library('PHPExcel');
        $this->akses = is_logged_in();
    }

    public function index()
    {
        $data = [
            "menu_active" => "upload_data",
            "submenu_active" => "upload_rla_pemko"
        ];
        $this->load->view('lrapemko/view', $data);
    }

    public function load()
    {
        $tahun = 2021;
        $result = $this->mquery->select_by("data_alokasi_pemko", ['tahun' => $tahun], "id_alokasi_pemko ASC");
        $data = [];
        $no = 0;
        foreach ($result as $r) {
            $no++;
            $delete = action_delete(encrypt_url($r['id_realisasi']));
            $row = [
                'no' => $no,
                'tahun' => $r['tahun'],
                'pendapatan' => number_format($r['pendapatan'],0,',','.'),
                'pad' => number_format($r['pad'],0,',','.'),
                'transfer' => number_format($r['transfer'],0,',','.'),
                'pad_lain' => number_format($r['pad_lain'],0,',','.'),
                'belanja' => $r['belanja'],
                'opsi' => $delete
            ];
            $data[] = $row;
        }
        $output['data'] = $data;
        echo json_encode($output);
    }

    public function form_upload()
    {
            $encrypt_id = htmlspecialchars($this->input->post('id', TRUE));
            $data = [
                'id_skpd' => $encrypt_id
            ];
            $this->load->view('apbd/form_upload', $data);
    }

    function add_upload()
    {
        $post = $this->input->post(null, TRUE);
        $id_skpd = decrypt_url($post['id_skpd']);
        $bulan = $post['bulan'];
        $object = new PHPExcel();
        $new_file = "";

        $config['upload_path'] = "./uploads/berkas/excel/";
        $config['allowed_types'] = 'xls';
        $config['file_name'] = $id_skpd . '-' . date("Ymd-His");
        $config['max_size'] = 512;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file_upload')) 
        {
            $this->_send_error("file");
        } 
        else 
        {
                $upload = $this->upload->data();
                $new_file=$upload['file_name'];	

                if($new_file != "" || $new_file != NULL)
                {
                     $excelreader     = new PHPExcel_Reader_Excel5();
					 $loadexcel         = $excelreader->load('./uploads/berkas/excel/'.$new_file); 
                     $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                     $data = array();
                     $this->db->trans_start();
                     $numrow = 0;
                     $row_mulai=0;
                     $row_batas=0;
                     $pendapatan=0;
                     $realisasi_pendapatan=0;
                     $belanja=0;
                     $realisasi_belanja=0;
                     $pad=0;
                     $realisasi_pad=0;
                     $transfer=0;
                     $realisasi_transfer=0;
                     $pad_lain=0;
                     $realisasi_pad_lain=0;
                     $operasi=0;
                     $realisasi_operasi=0;
                     $modal=0;
                     $realisasi_modal=0;
                     $takterduga=0;
                     $realisasi_takterduga=0;
                     $pusat=0;
                     $realisasi_pusat=0;
                     $dbh_daerah=0;
                     $realisasi_dbh_daerah=0;
                     $dbh=0;
                     $realisasi_dbh=0;
                     $dau=0;
                     $realisasi_dau=0;
                     $dak=0;
                     $realisasi_dak=0;
                     $daknon=0;
                     $realisasi_daknon=0;
                    foreach($sheet as $row)
                    {
                        if($numrow > 8)
                        {
                            $pagu = $row['H'];
                            if($pagu=="PENDAPATAN DAERAH")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $pendapatan=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_pendapatan=$filter/100;
                            }
                            if($pagu=="BELANJA DAERAH")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $belanja=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_belanja=$filter/100;
                            }
                            if($pagu=="SISA LEBIH/KURANG PEMBIAYAAN TAHUN BERKENAAN")
                            {
                                $insert1 =  [
                                    'id_skpd' => $id_skpd,
                                    'tahun' => 2021,
                                    'bulan' => $bulan,
                                    'pagu' => 0,
                                    'realisasi_atbulan' => 0,
                                    'realisasi_sdbulan' => 0,
                                    'sisa' => 0,
                                    'pendapatan' => $pendapatan,
                                    'realisasi_pendapatan' => $realisasi_pendapatan,
                                    'belanja' => $belanja,
                                    'realisasi_belanja' => $realisasi_belanja,
                                    'pad' => $pad,
                                    'realisasi_pad' => $realisasi_pad,
                                    'transfer' => $transfer,
                                    'realisasi_transfer' => $realisasi_transfer,
                                    'pad_lain' => $pad_lain,
                                    'realisasi_pad_lain' => $realisasi_pad_lain,
                                    'operasi' => $operasi,
                                    'realisasi_operasi' => $realisasi_operasi,
                                    'modal' => $modal,
                                    'realisasi_modal' => $realisasi_modal,
                                    'takterduga' => $takterduga,
                                    'realisasi_takterduga' => $realisasi_takterduga,
                                    'pusat' => $pusat,
                                    'realisasi_pusat' => $realisasi_pusat,
                                    'dbh_daerah' => $dbh_daerah,
                                    'realisasi_dbh_daerah' => $realisasi_dbh_daerah,
                                    'dbh' => $dbh,
                                    'realisasi_dbh' => $realisasi_dbh,
                                    'dau' => $dau,
                                    'realisasi_dau' => $realisasi_dau,
                                    'dak' => $dak,
                                    'realisasi_dak' => $realisasi_dak,
                                    'daknon' => $daknon,
                                    'realisasi_daknon' => $realisasi_daknon,
                                    'tanggal_input' => date('Y-m-d H:i:s')
                                ];
                                $this->db->insert('data_realisasi', $insert1);
                            }

                            $pagu = $row['I'];
                            if($pagu=="PENDAPATAN ASLI DAERAH (PAD)")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $pad=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_pad=$filter/100;
                            }
                            if($pagu=="PENDAPATAN TRANSFER")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $transfer=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_transfer=$filter/100;
                            }
                            if($pagu=="LAIN-LAIN PENDAPATAN DAERAH YANG SAH")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $pad_lain=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_pad_lain=$filter/100;
                            }
                            if($pagu=="BELANJA OPERASI")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $operasi=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_operasi=$filter/100;
                            }
                            if($pagu=="BELANJA MODAL")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $modal=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_modal=$filter/100;
                            }
                            if($pagu=="BELANJA TIDAK TERDUGA")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $takterduga=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_takterduga=$filter/100;
                            }

                            $pagu = $row['J'];
                            if($pagu=="Pendapatan Transfer Pemerintah Pusat")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $pusat=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_pusat=$filter/100;
                            }
                            if($pagu=="Pendapatan Transfer Antar Daerah")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $dbh_daerah=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_dbh_daerah=$filter/100;
                            }
                            
                            $pagu = $row['L'];
                            if($pagu=="Dana Transfer Umum-Dana Bagi Hasil (DBH)")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $dbh=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_dbh=$filter/100;
                            }
                            if($pagu=="Dana Transfer Umum-Dana Alokasi Umum (DAU)")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $dau=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_dau=$filter/100;
                            }
                            if($pagu=="Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Fisik")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $dak=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_dak=$filter/100;
                            }
                            if($pagu=="Dana Transfer Khusus-Dana Alokasi Khusus (DAK) Non Fisik")
                            {
                                $filter=preg_replace("/[^0-9]/", '', $row['Q']);
                                $daknon=$filter/100;
                                $filter=preg_replace("/[^0-9]/", '', $row['U']);
                                $realisasi_daknon=$filter/100;
                            }
                        }
                        $numrow++; //
                    }
                $this->db->trans_complete();
                $res= $this->db->trans_status();
                //$res=1;
                $data = ['status' => TRUE, 'notif' => $res];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } 
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->post('id', TRUE));
        $id_realisasi = decrypt_url($id);
        if ($id_realisasi == "error") {
            $data = ['notif' => FALSE, 'pesan' => "blocked"];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $temp = $this->detail->get_realisasi_id($id_realisasi)->row_array();
            $string = ['realisasi' => $temp];
            $log = simpan_log("delete realisasi", json_encode($string));
            $res = $this->mquery->delete_data('data_realisasi', ['id_realisasi' => $id_realisasi], $log);
            $data = ['notif' => $res];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
}