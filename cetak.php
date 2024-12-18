<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="shortcut icon" href="favicon.ico">
        <link href="css/print.css" rel="stylesheet">
    </head>
    <style>
        body {
            font-family: "Arial", serif;
            line-height: 1.25;
            padding: 40px 20px;
        }
        .header{
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        table {
            border: 1px solid green;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        table caption {
            font-size: 1.5em;
            margin: .25em 0 .75em;
        }
        table tr {

            border: 1px solid green;
            padding: .35em;
        }
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;

        }
        table td img {
            text-align: center;
        }
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table caption {
                font-size: 1.3em;
            }
            table thead {
                display: none;
            }
            table tr {
                border-bottom: 3px solid ;
                display: block;
                margin-bottom: .725em;
            }
            table td {
                border-bottom: 1px solid ;
                display: block;
                font-size: .8em;
                text-align: right;
            }
            table td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
            table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
    <body >

        <?php
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Tunjangan Kinerja.xls");
		
		include"config/koneksi.php";
		include"modul/bagian/aksi_bagian.php";
		
        $tm = "$_POST[tahun]-$_POST[bulan]-30";
        $tgl = $tm;
        $periode = $_POST['bulan'] - $_POST['tahun'];
        $day = date('F Y', strtotime($periode));
        $ukpd = $_POST['ukpd'];
        $per = explode('-', $tgl);
        $bln = $per[1];
        $thn = $per[0];
        $waktu = date('H:i:s');
        $tampil = mysql_query("select * from pencapaian where 
        Month(pencapaian.tanggal)='$bln' 
        and Year(pencapaian.tanggal)='$thn' and id_ukpd LIKE '%$ukpd%' 
        order by id_pencapaian ASC  ");
        echo "
        <div class='header'>
        <h2 class='head' >LAPORAN TUNJANGAN KINERJA</h2><p>
        </div>
        Periode : $tgl
        <table class='tabel'>
        <thead>
        <tr> 
        <td rowspan='2'>No</td>
        <!-- <td rowspan='2'>NIP</td> -->
        <td  rowspan='2'>Nama </td>
        <td  rowspan='2'>Jabatan</td>
        <!-- <td  rowspan='2'>Npwp</td>
        <td rowspan='2'>Norek</td>
        <td  rowspan='2'>Masa Kerja</td>
        <td rowspan='2'>Gaji Pokok</td>
        <td rowspan='2'>Bruto</td> -->
        <td rowspan='2'>Tunjangan</td>
		<!-- <td rowspan='2'>Honor Shift</td> -->
        <td colspan='4'>Kehadiran</td>
        <td colspan='4'>Potongan</td>
        <td rowspan='2'>BPJS Kesehatan</td>
        <td colspan='3'>BPJS Ketenaga Kerjaan</td>
        <td rowspan='2'>Nilai Kinerja</td>
		<!-- <td rowspan='2'>Hukuman</td> --> 
        <td rowspan='2'>Tunj. Validasi</td>
        <td  rowspan='2'>PPH 21</td>
        <td  rowspan='2'>Tunj. Setelah Pajak</td>
        <td rowspan='2'>Tot. Pot Absensi &amp; BPJS</td>
        <td  rowspan='2'>Tunj Bersih</td>
        <td rowspan='2'>Tanda Tangan</td>
        <!-- <td rowspan='2'>Hasil</td> --> 
        </tr>
        <tr> 
        <td >Alpha</td>
        <td >Sakit</td>
        <td >Izin</td>
        <td >Telat</td>
        <td>Alpha</td>
        <td>Sakit</td>
        <td>Izin</td>
        <td >Telat</td>
        <td >JKK &amp; JKM</td>
        <td >IJHT</td>
        <td >JP</td>
        </tr>
        </thead>
        <tbody>";
        $no = 1;
        while ($dt = mysql_fetch_array($tampil)) {
            ;

            //query bagian
            $bag = mysql_query("select * from bagian where id_bag='$dt[id_bag]'");
            $bagian = mysql_fetch_array($bag);

            // quey honor shift
            $h_shift = mysql_query("select * from honor_shift where id_shift='$dt[id_shift]'");
            $hs = mysql_fetch_array($h_shift);
            $hs_hks = $hs['hks'];
            $hs_hkm = $hs['hkm'];
            $hs_hlp = $hs['hlp'];
            $hs_hls = $hs['hls'];
            $hs_hlm = $hs['hlm'];
            $hs_hrp = $hs['hrp'];
            $hs_hrs = $hs['hrs'];
            $hs_hrs = $hs['hrs'];
            $hs_hrm = $hs['hrm'];
            $hs_ns = '0';

            // query pegawai
            $peg = mysql_query("select * from pegawai where nip='$dt[nip]'");
            $pgw = mysql_fetch_array($peg);
            $bpjsks = $pgw['bpjsks'];
            $bpjsjkk = $pgw['bpjsjkk'];
            $bpjsijht = $pgw['bpjsijht'];
            $bpjsjp = $pgw['bpjsjp'];
            $id_pajak = $pgw['id_pajak'];


            // query hukuman
            $hukuman = mysql_query("select * from hukuman where id_hukuman='$dt[id_hukuman]'");
            $sp = mysql_fetch_array($hukuman);
            $nilai_huk = $sp['nilai'];
            $n_sp = $sp['n_sp'];
            if ($nilai_huk == '')
                $nilai_hukuman = '';
            else
                $nilai_hukuman = $nilai_huk;

            //query pajak
            $pjk = mysql_query("select * from pajak where id_pajak='$id_pajak'");
            $pj = mysql_fetch_array($pjk);
            $ptkp = $pj['ptkp'];

            // query jabatan
            $jab = mysql_query("select * from jabatan where id_jab='$dt[id_jab]'");
            $jabatan = mysql_fetch_array($jab);
           // $grading = $jabatan['nilai'];

            // query pengurangan waktu
            $waktu_k = mysql_query("select * from waktu_k where 
        Month(waktu_k.tanggal)='$bln' 
        and Year(waktu_k.tanggal)='$thn' and nip='$dt[nip]'
        order by id_waktu_k ASC ");

            // query shifting
            $waktu_s = mysql_query("select * from waktu_s where 
        Month(waktu_s.tanggal)='$bln' 
        and Year(waktu_s.tanggal)='$thn' and nip='$dt[nip]'
        order by id_waktu_s ASC ");

            // query penyerapan
            $penyerapan = mysql_query("select * from penyerapan where 
        Month(penyerapan.tanggal)='$bln' 
        and Year(penyerapan.tanggal)='$thn' and id_ukpd LIKE '%$ukpd%'");
            while ($pny = mysql_fetch_array($penyerapan)) {
                $n_penyerapan = $pny['nilai'];
            }
            // Hitung Shifting
            $ws = mysql_fetch_array($waktu_s);
            $honor_hks = $ws['j_hks'] * $hs_hks;
            $honor_hkm = $ws['j_hkm'] * $hs_hkm;
            $honor_hlp = $ws['j_hlp'] * $hs_hlp;
            $honor_hls = $ws['j_hls'] * $hs_hls;
            $honor_hlm = $ws['j_hlm'] * $hs_hlm;
            $honor_hrp = $ws['j_hrp'] * $hs_hrp;
            $honor_hrs = $ws['j_hrs'] * $hs_hrs;
            $honor_hrm = $ws['j_hrm'] * $hs_hrm;
            $honor_ns = $ws['j_ns'] * $hs_ns;
            $t_honor_shift = $honor_hks + $honor_hkm + $honor_hlp + $honor_hls + $honor_hlm + $honor_hrp + $honor_hrs + $honor_hrm + $honor_ns;
            $p_honor_shift = number_format($t_honor_shift, 0,',','.');

            // Pengurangan Waktu kerja
            $wk = mysql_fetch_array($waktu_k);
            $sakit1 = $wk['sakit1'];
            $sakit2 = $wk['sakit2'];
            $izin = $wk['izin'];
            $alpha = $wk['alpha'];
            $telat = $wk['telat'];

            // Penyerapan
            $anggaran = $n_penyerapan * 0.2;

            // BHU
            $nilai = $dt['bhu'];

            // Tunjangan
            $hitung_tun_val = $dt['tunjangan'] * $nilai / 100;
            $tun_ = $hitung_tun_val * $nilai_hukuman;
            $tun_val = $hitung_tun_val - $tun_;
            $tun_val1 = number_format($tun_val, 0,',','.');

            // Perhitungan Potongan absensi
            $hsakit1 = ($wk['sakit1'] * 0.01) * $tun_val;
            $hsakit1t = number_format($hsakit1, 0,',','.');
            $hsakit2 = ($wk['sakit2'] * 0.02) * $tun_val;
            $hsakit2t = number_format($hsakit2, 0,',','.');
            $htelat = (($wk['telat'] / 450) * 0.025) * $tun_val;
            $htelat_t = number_format($htelat, 0,',','.');
            $hizin = ($wk['izin'] * 0.02) * $tun_val;
            $hizint = number_format($hizin, 0,',','.');
            $halpha = ($wk['alpha'] * 0.05) * $tun_val;
            $halphat = number_format($halpha, 0,',','.');
            $potongan_tun = $htelat + $hsakit1 + $hsakit2 + $hizin + $halpha;
            $potongan = number_format($potongan_tun, 0,',','.');

            // Perhitungan BPJS
            $bpjskesehatan = $dt['bruto'] * $bpjsks;
            $bpjskes = number_format($bpjskesehatan, 0,',','.');
            $bpjsk1 = $dt['bruto'] * $bpjsjkk;
            $bpjsk2 = $dt['bruto'] * $bpjsijht;
            $bpjsk3 = $dt['bruto'] * $bpjsjp;
            // $bpjstenagakerja = $bpjsjkk + $bpjsijht + $bpjsjp;
            // total Potongan Tunjangan
            $potongan_tun = $htelat + $hsakit1 + $hsakit2 + $hizin + $halpha + $bpjskesehatan + $bpjsk1 + $bpjsk2 + $bpjsk3;
            $potongan = number_format($potongan_tun, 0,',','.');
            // $bpjstenag = number_format($bpjstenagakerja, 0,',','.');
            // Perhitungan PTKP 1 Tahun
            $tun_total = ($dt['bruto'] * 0.03) + $tun_val + $dt['bruto'] + $t_honor_shift;
            $pot_bpjsabsensi = $bpjskesehatan + $bpjsk1 + $bpjsk2 + $bpjsk3 + $potongan_tun;
            $gaji_tun_sebelum_pjk = $tun_total - $pot_bpjsabsensi;
            $besaran_gaji_tun_setahun = $gaji_tun_sebelum_pjk * 12;
            $peng_pajak_disetahunkan = $besaran_gaji_tun_setahun - $ptkp;
            if ($peng_pajak_disetahunkan <= 50000000) {
                $pph21_setahun = $peng_pajak_disetahunkan * 0.05;
                $pph21_perbulan = $pph21_setahun / 12;
                $pph21 = number_format($pph21_perbulan, 0,',','.');
            } elseif ($peng_pajak_disetahunkan <= 250000000) {
                $a = '50000000';
                $b = $peng_pajak_disetahunkan - $a;
                $c = $a * 0.05;
                $d = $b * 0.15;
                $pph21_setahun = $c + $d;
                $pph21_perbulan = $pph21_setahun / 12;
                $pph21 = number_format($pph21_perbulan, 0,',','.');
            } elseif ($peng_pajak_disetahunkan <= 500000000) {
                $a = '50000000';
                $a1 = '250000000';
                $b = $peng_pajak_disetahunkan - $a;
                $e = $b - $a1;
                $c = $a * 0.05;
                $d = $a1 * 0.15;
                $f = $e * 0.25;
                $pph21_setahun = $c + $d + $f;
                $pph21_perbulan = $pph21_setahun / 12;
                $pph21 = number_format($pph21_perbulan, 0,',','.');
            } else {
                echo"";
            }
            // format tampilan output
            $tunjangan_bersih = $tun_val - $potongan_tun;
            $tun_pendapatan = number_format($tunjangan_bersih, 0,',','.');
            $tunjangan = number_format($dt['tunjangan'], 0,',','.');
            $gapok = number_format($dt['gapok'], 0,',','.');
            $bruto = number_format($dt['bruto'], 0,',','.');
            $bpjsjkkt = number_format($bpjsk1, 0,',','.');
            $bpjsijhtt = number_format($bpjsk2, 0,',','.');
            $bpjsjpt = number_format($bpjsk3, 0,',','.');
            $total = $gaji_tun_sebelum_pjk - $pph21;
            $subtotal = number_format($total, 0,',','.');
            $idst = $dt['id_status'];
            $st = mysql_query("select * from status where id_status='$idst'");
            $b = mysql_fetch_array($st);
            $status = $b['nilai'];
            $nama = $dt['nama'];
            $nip = $dt['nip'];
            $npwp = $pgw['npwp'];
            $norek = $pgw['norek'];
            $masakerja = $dt['masa_kerja'];
            $pph21 =  $tun_val * 0.05;
            $tun_spjk = $tun_val - $pph21;
            $pph21 = number_format($pph21, 0,',','.'); 
            $tun_spjk = number_format($tun_spjk, 0,',','.'); 

            $data = mysql_query("select jabatan.n_jab as jabatan
                                   from pegawai,
                                        jabatan
                                  where pegawai.id_jab = jabatan.id_jab
                                    and pegawai.nip = '$nip'");
            $dat = mysql_fetch_array($data);
            $jabatan = $dat[jabatan];


            echo "<tr valign='middle' align='center'>
        <td scope='row' data-label='No'>$no</td>
        <!-- <td data-label='Nip'>'$nip</td> -->
        <td data-label='Nama'>$nama</td>
        <td data-label='Nama'>$jabatan</td>
        <!-- <td data-label='NPWP'>$npwp</td>
        <td data-label='Norek'>$norek</td>
        <td data-label='Masa Kerja'>$dt[masa_kerja]</td>
        <td data-label='Gaji Pokok'>$gapok</td>
        <td data-label='Gaji Pokok'>$bruto</td> -->
        <td data-label='Tunjangan'>$tunjangan</td>
		<!-- <td data-label='Total Honor Shift'>$p_honor_shift</td> -->
        <td data-label='Alpha'>$alpha Hari</td>
        <td data-label='Sakit 1-2 Hari'>$sakit1 Hari</td>
        <td data-label='Izin'>$izin Hari</td>
        <td data-label='Telat'>$telat Menit</td>
        <td data-label='Potongan Alpha'>$halphat</td>
        <td data-label='Potongan Sakit 1-2 Hari'>$hsakit1t</td>
        <td data-label='Potongan Izin'>$hizint</td>
        <td data-label='Potongan Telat'>$htelat_t</td>
        <td data-label='BPJS Kesehatan'>$bpjskes</td>
        <td data-label='BPJS JKK & JKM'>$bpjsjkkt</td>
        <td data-label='BPJS IJHT'>$bpjsijhtt</td>
        <td data-label='BPJS JP'>$bpjsjpt</td>
        <td data-label='Nilai Validasi'>$nilai%</td>
		<!-- <td data-label='Nilai Validasi'>$n_sp</td> --> 
        <td data-label='Tunjangan Validasi'>$tun_val1</td>
        <td data-label='Pph 21'>$pph21</td> 
        <td data-label='Pph 21'>$tun_spjk</td> 
        <td data-label='Total Potongan'>$potongan</td>
        <td data-label='Tunjangan Pendapatan'>$tun_pendapatan</td>
        <td data-label=#</td>
        <!-- <td data-label='Gapok + Tun.Bersih'>$subtotal</td> -->
        </tr>
        ";
            $no++;
        }
        echo"</tbody><table>";
        ?>
        <div style="text-align:center;padding:20px;">
            <input class="noPrint" type="button" value="Print Laporan" onclick="window.print()">
            <!--form action='cetak.php' method='post' enctype='multipart/form-data' >
                <input type="hidden" name="tanggal" value="<?php echo"$tgl"; ?>" ><input type=submit value="Export to Excel"> </form-->
        </div>
    </div>
</body>
</html>
