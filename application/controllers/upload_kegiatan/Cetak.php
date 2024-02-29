<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->akses = is_logged_in();
    }

    public function index($bulan, $encrypt_id)
    {
        $id_skpd = decrypt_url($encrypt_id);
        $skpd = $this->mquery->select_id('data_skpd', ['id_skpd' => $id_skpd]);
        $tahun = 2021;
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("PRP2 PEMATANGSIANTAR");
        $objPHPExcel->getProperties()->setLastModifiedBy("PRP2 PEMATANGSIANTAR");
        $objPHPExcel->getProperties()->setTitle("PERKEMBANGAN PELAKSANAAN PROGRAM DAN KEGIATAN APBD KOTA PEMATANGSIANTAR");

        $gdImage = imagecreatefrompng(base_url('images/logo_pemkot.png'));
        $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
        $objDrawing->setImageResource($gdImage);
        $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
        $objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
        $objDrawing->setHeight(75);
        $objDrawing->setCoordinates('C4');
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();

        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(60);
        $sheet->getColumnDimension('E')->setWidth(10);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(10);
        $sheet->getColumnDimension('J')->setWidth(10);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(10);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('O')->setWidth(10);
        $sheet->getColumnDimension('P')->setWidth(20);
        $sheet->getColumnDimension('Q')->setWidth(10);

        $sheet->getStyle('C11:Q11')->getFont()->setSize(8);
        $sheet->getStyle('C12:Q12')->getFont()->setSize(8);
        $sheet->getStyle('C13:Q13')->getFont()->setSize(8);
        $sheet->getStyle('C14:Q14')->getFont()->setSize(8);
        $sheet->getStyle('C15:Q15')->getFont()->setSize(8);

        $center['alignment'] = array();
        $center['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
        $center['alignment']['vertical'] = PHPExcel_Style_Alignment::VERTICAL_CENTER;

        $v_center['alignment'] = array();
        $v_center['alignment']['vertical'] = PHPExcel_Style_Alignment::VERTICAL_CENTER;

        $right['alignment'] = array();
        $right['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;

        $thin = array();
        $thin['borders'] = array();
        $thin['borders']['allborders'] = array();
        $thin['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;

        $thick = array();
        $thick['borders'] = array();
        $thick['borders']['allborders'] = array();
        $thick['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THICK;

        $sheet->getStyle('C4:Q4')->applyFromArray($center);
        $sheet->getStyle('C5:Q5')->applyFromArray($center);
        $sheet->getStyle('C6:Q6')->applyFromArray($center);
        $sheet->getStyle('C7:Q7')->applyFromArray($center);
        $sheet->getStyle('C8:Q8')->applyFromArray($center);
        $sheet->mergeCells('C4:Q4');
        $sheet->mergeCells('C5:Q5');
        $sheet->mergeCells('C6:Q6');
        $sheet->mergeCells('C7:Q7');
        $sheet->mergeCells('C8:Q8');
        $sheet->setCellValue('C4', 'LAPORAN');
        $sheet->setCellValue('C5', 'PERKEMBANGAN PELAKSANAAN PROGRAM DAN KEGIATAN APBD KOTA PEMATANGSIANTAR');
        $sheet->setCellValue('C6', 'KEGIATAN DAN SUB KEGIATAN TAHUN ANGGARAN 2021');
        $sheet->setCellValue('C7', 'S K P D  :  ' . strtoupper($skpd['nama_skpd']) . '  KOTA  PEMATANGSIANTAR');
        $sheet->setCellValue('C8', 'BULAN  :  ' . strtoupper(bulan($bulan)) . ' ' . $tahun);

        $sheet->getStyle('C11:Q11')->applyFromArray($center);
        $sheet->getStyle('C11:Q11')->applyFromArray($thin);
        $sheet->getStyle('C12:Q12')->applyFromArray($center);
        $sheet->getStyle('C12:Q12')->applyFromArray($thin);
        $sheet->getStyle('C13:Q13')->applyFromArray($center);
        $sheet->getStyle('C13:Q13')->applyFromArray($thin);
        $sheet->getStyle('C14:Q14')->applyFromArray($center);
        $sheet->getStyle('C14:Q14')->applyFromArray($thin);
        $sheet->getStyle('C15:Q15')->applyFromArray($center);
        $sheet->getStyle('C15:Q15')->applyFromArray($thin);
        $sheet->mergeCells('C11:C14');
        $sheet->setCellValue('C11', "KODE REKENING");
        $sheet->mergeCells('D11:D14');
        $sheet->setCellValue('D11', "PROGRAM DAN KEGIATAN");
        $sheet->mergeCells('E11:E14');
        $sheet->setCellValue('E11', "SUMBER\nDANA\n(Rp)");
        $sheet->getStyle('E11')->getAlignment()->setWrapText(true);
        $sheet->mergeCells('F11:F14');
        $sheet->setCellValue('F11', "PAGU\nDALAM DPA\n(Rp)");
        $sheet->getStyle('F11')->getAlignment()->setWrapText(true);
        $sheet->mergeCells('G11:G14');
        $sheet->setCellValue('G11', "JUMLAH SP2D\n(Rp)");
        $sheet->getStyle('G11')->getAlignment()->setWrapText(true);
        $sheet->mergeCells('H11:H14');
        $sheet->setCellValue('H11', "SISA DANA\n(DPA)\n(Rp)");
        $sheet->getStyle('H11')->getAlignment()->setWrapText(true);
        $sheet->mergeCells('I11:O11');
        $sheet->setCellValue('I11', "PERKEMBANGAN KEMAJUAN");
        $sheet->mergeCells('P11:P14');
        $sheet->setCellValue('P11', "SISA DANA\nBELUM\nDIREALISASIKAN\n(Rp)");
        $sheet->getStyle('P11')->getAlignment()->setWrapText(true);
        $sheet->mergeCells('Q11:Q14');
        $sheet->setCellValue('Q11', "%");

        $sheet->mergeCells('I12:J12');
        $sheet->setCellValue('I12', 'FISIK');
        $sheet->mergeCells('K12:O12');
        $sheet->setCellValue('K12', 'KEUANGAN');

        $sheet->setCellValue('I13', 'RENC');
        $sheet->setCellValue('J13', 'REAL');
        $sheet->setCellValue('K13', 'S/D BULAN LALU');
        $sheet->mergeCells('L13:M13');
        $sheet->setCellValue('L13', 'BULAN INI');
        $sheet->mergeCells('N13:O13');
        $sheet->setCellValue('N13', 'S/D BULAN INI');

        $sheet->setCellValue('I14', '%');
        $sheet->setCellValue('J14', '%');
        $sheet->setCellValue('K14', '(Rp.)');
        $sheet->setCellValue('L14', '(Rp.)');
        $sheet->setCellValue('M14', '%');
        $sheet->setCellValue('N14', '(Rp.)');
        $sheet->setCellValue('O14', '%');

        $sheet->setCellValue('C15', '1');
        $sheet->setCellValue('D15', '2');
        $sheet->setCellValue('E15', '3');
        $sheet->setCellValue('F15', '4');
        $sheet->setCellValue('G15', '5');
        $sheet->setCellValue('H15', '6');
        $sheet->setCellValue('I15', '7');
        $sheet->setCellValue('J15', '8');
        $sheet->setCellValue('K15', '9');
        $sheet->setCellValue('L15', '10');
        $sheet->setCellValue('M15', '11');
        $sheet->setCellValue('N15', '12');
        $sheet->setCellValue('O15', '13');
        $sheet->setCellValue('P15', '14');
        $sheet->setCellValue('Q15', '15');

        $sheet->getStyle('C11:Q11')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C11:Q11')->getFill()->getStartColor()->setRGB('0f7aec');
        $sheet->getStyle('C11:Q11')->getFont()->setBold(true);
        $sheet->getStyle('C12:Q12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C12:Q12')->getFill()->getStartColor()->setRGB('0f7aec');
        $sheet->getStyle('C12:Q12')->getFont()->setBold(true);
        $sheet->getStyle('C13:Q13')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C13:Q13')->getFill()->getStartColor()->setRGB('0f7aec');
        $sheet->getStyle('C13:Q13')->getFont()->setBold(true);
        $sheet->getStyle('C14:Q14')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C14:Q14')->getFill()->getStartColor()->setRGB('0f7aec');
        $sheet->getStyle('C14:Q14')->getFont()->setBold(true);
        $sheet->getStyle('C15:Q15')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C15:Q15')->getFill()->getStartColor()->setRGB('0f7aec');
        $sheet->getStyle('C15:Q15')->getFont()->setBold(true);

        $baris = 16;
        $result_kegiatan = $this->mquery->select_by('detail_realisasi_skpd', ['id_skpd' => $skpd['id_skpd'], 'tahun' => $tahun, 'bulan' => $bulan]);
        foreach ($result_kegiatan as $r) {
            $periode = $tahun . '-' . $bulan;
            $periode_lalu = date('Y-m', strtotime(date($periode) . '- 1 month'));
            $explode_priode = explode("-", $periode_lalu);
            $tahun_lalu = $explode_priode[0];
            $bulan_lalu = $explode_priode[1];
            if ($r['level'] == 1) {
                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun, 'bulan' => $bulan, 'level' => 3]);
                $this->db->like('parent', $r['kode_rekening'], 'after');
                $query_realisasi = $this->db->get('detail_realisasi_skpd')->row_array();
                $realisasi = $query_realisasi['anggaran'];

                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun_lalu, 'bulan' => $bulan_lalu, 'level' => 3]);
                $this->db->like('parent', $r['kode_rekening'], 'after');
                $query_realisasi_sebelumnya = $this->db->get('detail_realisasi_skpd')->row_array();
                $realisasi_sebelumnya = $query_realisasi_sebelumnya['anggaran'];

                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun, 'level' => 3]);
                $this->db->like('parent', $r['kode_rekening'], 'after');
                $query_anggaran = $this->db->get('detail_kegiatan_skpd')->row_array();
                $anggaran = $query_anggaran['anggaran'];
            } elseif ($r['level'] == 2) {
                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun, 'bulan' => $bulan, 'level' => 3, 'parent' => $r['kode_rekening']]);
                $query_realisasi = $this->db->get('detail_realisasi_skpd')->row_array();
                $realisasi = $query_realisasi['anggaran'];

                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun_lalu, 'bulan' => $bulan_lalu, 'level' => 3, 'parent' => $r['kode_rekening']]);
                $query_realisasi_sebelumnya = $this->db->get('detail_realisasi_skpd')->row_array();
                $realisasi_sebelumnya = $query_realisasi_sebelumnya['anggaran'];

                $this->db->select_sum('anggaran');
                $this->db->where(['tahun' => $tahun, 'level' => 3, 'parent' => $r['kode_rekening']]);
                $query_anggaran = $this->db->get('detail_kegiatan_skpd')->row_array();
                $anggaran = $query_anggaran['anggaran'];
            } else {
                $realisasi = $r['anggaran'];

                $query_realisasi_sebelumnya = $this->mquery->select_id('detail_realisasi_skpd', ['tahun' => $tahun_lalu, 'bulan' => $bulan_lalu, 'level' => 3, 'kode_rekening' => $r['kode_rekening'], 'parent' => $r['parent']]);
                $realisasi_sebelumnya = $query_realisasi_sebelumnya['anggaran'];

                $query_anggaran = $this->mquery->select_id('detail_kegiatan_skpd', ['tahun' => $tahun, 'level' => 3, 'kode_rekening' => $r['kode_rekening'], 'parent' => $r['parent']]);
                $anggaran = $query_anggaran['anggaran'];
            }

            $sisa_dana = $anggaran - $realisasi;
            $persen_realisasi = $realisasi / $anggaran * 100;
            $realisasi_bulan_ini = $realisasi - $realisasi_sebelumnya;
            $persen_realisasi_bulan_ini = $realisasi_bulan_ini / $anggaran * 100;
            $persen_sisa = $sisa_dana / $anggaran * 100;
            $sheet->getStyle('C' . $baris . ':Q' . $baris)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            if ($r['level'] == 1) {
                $sheet->getStyle('C' . $baris . ':Q' . $baris)->getFill()->getStartColor()->setRGB('2be28e');
                $sheet->getStyle('C' . $baris . ':Q' . $baris)->getFont()->setBold(true);
            } elseif ($r['level'] == 2) {
                $sheet->getStyle('C' . $baris . ':Q' . $baris)->getFill()->getStartColor()->setRGB('ffff00');
                $sheet->getStyle('C' . $baris . ':Q' . $baris)->getFont()->setBold(true);
            }
            $sheet->getStyle('C' . $baris . ':Q' . $baris)->getFont()->setSize(8);
            $sheet->getStyle('C' . $baris . ':Q' . $baris)->applyFromArray($thin);
            $sheet->getStyle('C' . $baris . ':Q' . $baris)->applyFromArray($v_center);
            $sheet->getStyle('C' . $baris)->applyFromArray($center);
            $sheet->setCellValue('C' . $baris, $r['kode_rekening']);
            $sheet->getStyle('D' . $baris)->getAlignment()->setWrapText(true);
            $sheet->setCellValue('D' . $baris, $r['uraian']);
            $sheet->getStyle('E' . $baris)->applyFromArray($center);
            $sheet->setCellValue('E' . $baris, '-');
            $sheet->getStyle('F' . $baris . ':H' . $baris)->applyFromArray($right);
            $sheet->setCellValue('F' . $baris, format_rupiah($anggaran));
            $sheet->setCellValue('G' . $baris, format_rupiah($realisasi));
            $sheet->setCellValue('H' . $baris, format_rupiah($sisa_dana));
            $sheet->getStyle('I' . $baris . ':J' . $baris)->applyFromArray($center);
            $sheet->setCellValue('I' . $baris, '100%');
            $sheet->setCellValue('J' . $baris, number_format($persen_realisasi, 2));
            $sheet->getStyle('K' . $baris . ':L' . $baris)->applyFromArray($right);
            $sheet->setCellValue('K' . $baris, format_rupiah($realisasi_sebelumnya));
            $sheet->setCellValue('L' . $baris, format_rupiah($realisasi_bulan_ini));
            $sheet->getStyle('M' . $baris)->applyFromArray($center);
            $sheet->setCellValue('M' . $baris, number_format($persen_realisasi_bulan_ini, 2));
            $sheet->getStyle('N' . $baris)->applyFromArray($right);
            $sheet->setCellValue('N' . $baris, format_rupiah($realisasi));
            $sheet->getStyle('O' . $baris)->applyFromArray($center);
            $sheet->setCellValue('O' . $baris, number_format($persen_realisasi, 2));
            $sheet->getStyle('P' . $baris)->applyFromArray($right);
            $sheet->setCellValue('P' . $baris, format_rupiah($sisa_dana));
            $sheet->getStyle('Q' . $baris)->applyFromArray($center);
            $sheet->setCellValue('Q' . $baris, number_format($persen_sisa, 2));
            $baris++;
        }

        // $baris = $baris + 3;
        // $temp_pimpinan = $this->mquery->select_id('penanda_tangan', ['id_skpd' => $skpd['id_skpd'], 'is_active' => 'Y']);
        // $pimpinan = explode(".", $temp_pimpinan['ttd']);


        // $sheet->mergeCells('C' . $baris . ':I' . $baris);
        // $sheet->mergeCells('J' . $baris . ':Q' . $baris);
        // $sheet->setCellValue('J' . $baris, 'KEPALA ' . strtoupper($skpd['nama_skpd']));
        // $baris++;
        // $sheet->mergeCells('C' . $baris . ':I' . $baris);
        // $sheet->mergeCells('J' . $baris . ':Q' . $baris);
        // $sheet->setCellValue('J' . $baris, 'KOTA PEMATANGSIANTAR');
        // $baris++;

        // if ($pimpinan[1] == 'png') {
        //     $ttd_kepala = imagecreatefrompng(base_url('uploads/ttd/' . $temp_pimpinan['ttd']));
        //     $objDrawing->setImageResource($ttd_kepala);
        //     $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
        // } else {
        //     $ttd_kepala = imagecreatefromjpeg(base_url('uploads/ttd/' . $temp_pimpinan['ttd']));
        //     $objDrawing->setImageResource($ttd_kepala);
        //     $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
        // }

        // $objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
        // $sheet->mergeCells('C' . $baris . ':I' . $baris);
        // $sheet->mergeCells('J' . $baris . ':Q' . $baris);
        // $objDrawing->setHeight(75);
        // $objDrawing->setWidth(150);
        // $objDrawing->setCoordinates('J' . $baris);
        // $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

        $filename = "PERKEMBANGAN PELAKSANAAN PROGRAM DAN KEGIATAN APBD KOTA PEMATANGSIANTAR " . date('dmyHis') . '.xlsx';
        $sheet->setTitle("BPHTB BELUM BAYAR");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Chace-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
