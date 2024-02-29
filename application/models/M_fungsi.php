<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fungsi extends CI_Model {
	public function __construct(){
			parent::__construct();			
	}

    public function nama_bulan($tanggal)
    {
      if(empty($tanggal))
      {$tanggal=date('Y')."-01-01";}
          $bulan = array (1 =>   'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
            );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    public function nama_hari($tanggal)
    {
        $hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);

        $num = date('N', strtotime($tanggal)); 
        return $hari[$num]; 
    }

    public function datediff($tgl1, $tgl2)
    {
        $tgl1 = strtotime($tgl1);
        $tgl2 = strtotime($tgl2);
        $diff_secs = abs($tgl1 - $tgl2);
        $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
        $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
        return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
    }

    
    public function get_semester($mhs_nim, $bulan_tahun)
    {
        $kode_nim=substr($mhs_nim,0,2);
        $tahun_nim=substr($mhs_nim,2,2);

        $hasil_bulan_now=substr($bulan_tahun,0,2);
        $hasil_tahun_now=substr($bulan_tahun,5,2);
        $hasil_tahun_now_1=$hasil_tahun_now-1;
        $hasil_tahun_now_2=$hasil_tahun_now-2;
        $hasil_tahun_now_3=$hasil_tahun_now-3;
        $hasil_tahun_now_4=$hasil_tahun_now-4;
        $hasil_tahun_now_5=$hasil_tahun_now-5;
        $hasil_tahun_now_6=$hasil_tahun_now-6;
        $hasil_tahun_now_7=$hasil_tahun_now-7;

        if($kode_nim=="71")
        {
          if($tahun_nim==$hasil_tahun_now)
          {
            $semester="1";
          }
          else if($tahun_nim==$hasil_tahun_now_1)
          {
            if($hasil_bulan_now=="01"){$semester="1";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="2";}else{$semester="3";}
          }
          else if($tahun_nim==$hasil_tahun_now_2)
          {
            if($hasil_bulan_now=="01"){$semester="3";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="4";}else{$semester="5";}
          }
          else if($tahun_nim==$hasil_tahun_now_3)
          {
            if($hasil_bulan_now=="01"){$semester="5";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="6";}else{$semester="7";}
          }
          else if($tahun_nim==$hasil_tahun_now_4)
          {
            if($hasil_bulan_now=="01"){$semester="7";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="8";}else{$semester="9";}
          }
          else if($tahun_nim==$hasil_tahun_now_5)
          {
            if($hasil_bulan_now=="01"){$semester="9";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="10";}else{$semester="11";}
          }
          else if($tahun_nim==$hasil_tahun_now_6)
          {
            if($hasil_bulan_now=="01"){$semester="11";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="12";}else{$semester="13";}
          }
          else if($tahun_nim==$hasil_tahun_now_7)
          {
            if($hasil_bulan_now=="01"){$semester="13";}
            elseif($hasil_bulan_now=="02" || $hasil_bulan_now=="03" || $hasil_bulan_now=="04" || $hasil_bulan_now=="05" || $hasil_bulan_now=="06" )
            {$semester="14";}else{$semester="15";}
          }
          else {$semester="Alumni";}
        }
        else {$semester="Alumni";}
        return $semester;
    }

    
    
    public function konvhijriah($tanggal)
    {
        function makeInt($angka)
        {
          if ($angka < -0.0000001)
          {return ceil($angka-0.0000001);}else{return floor($angka+0.0000001);}
        }

        $array_bulan = array("Muharram", "Safar", "Rabiul Awwal", "Rabiul Akhir",
        "Jumadil Awwal","Jumadil Akhir", "Rajab", "Sya’ban",
        "Ramadhan","Syawwal", "Zulqaidah", "Zulhijjah");
        $date = makeInt(substr($tanggal,8,2));
        $month = makeInt(substr($tanggal,5,2));
        $year = makeInt(substr($tanggal,0,4));
        if (($year>1582)||(($year == "1582") && ($month > 10))||(($year == "1582") && ($month=="10")&&($date >14)))
        {
          $jd = makeInt((1461*($year+4800+makeInt(($month-14)/12)))/4)+
          makeInt((367*($month-2-12*(makeInt(($month-14)/12))))/12)-
          makeInt( (3*(makeInt(($year+4900+makeInt(($month-14)/12))/100))) /4)+
          $date-32075;
        }
        else
        {
          $jd = 367*$year-makeInt((7*($year+5001+makeInt(($month-9)/7)))/4)+
          makeInt((275*$month)/9)+$date+1729777;
        }
        $wd = $jd%7;
        $l = $jd-1948440+10632;
        $n=makeInt(($l-1)/10631);
        $l=$l-10631*$n+354;
        $z=(makeInt((10985-$l)/5316))*(makeInt((50*$l)/17719))+(makeInt($l/5670))*(makeInt((43*$l)/15238));
        $l=$l-(makeInt((30-$z)/15))*(makeInt((17719*$z)/50))-(makeInt($z/16))*(makeInt((15238*$z)/43))+29;
        $m=makeInt((24*$l)/709);
        $d=$l-makeInt((709*$m)/24);
        $y=30*$n+$z-30;
        $g = $m-1;
        $final = "$d $array_bulan[$g] $y H";
        return $final;
    }

}