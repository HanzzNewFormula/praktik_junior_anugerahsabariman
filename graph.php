<?php
error_reporting(0);
?><!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <head>
        <title>Grafik Penduduk Indonesia</title>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/highcharts.js" type="text/javascript"></script>
        <script src="js/exporting.js" type="text/javascript"></script>
        <script type="text/javascript">
            var chart1; // globally available
            $(document).ready(function () {
                chart1 = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Pencapaian Kinerja Pegawai '
                    },
                    xAxis: {
                        categories: ['Bulan']
                    },
                    yAxis: {
                        title: {
                            text: 'Nilai Presentase'
                        }
                    },
                    series:
                            [
<?php
// file koneksi php
include"config/koneksi.php";
$tgl = date('Y-m-d');
$per = explode('-', $tgl);
$bln = $per[1];
$thn = $per[0];
$dat = mktime(0, 0, 0, date("m") - 1, date("d"), date("Y"));
$tgl1 = date('Y-m-30', $dat);
$per1 = explode('-', $tgl1);
$bln1 = $per1[1];
$thn1 = $per1[0];
$waktu = date('H:i:s');
$nip = $_SESSION['namauser'];
$ukpd = $_SESSION['id_ukpd'];


$sql = "SELECT * from pencapaian where Year(pencapaian.tanggal)='$thn' and 
                                                        nip='$nip' order by tanggal ASC"; // file untuk mengakses ke tabel database
$query = mysql_query($sql) or die(mysql_error());
while ($ambil = mysql_fetch_array($query)) {
    $penyerapan = mysql_query("select * from penyerapan where id_penyerapan='$ambil[id_penyerapan]'");
    $b = mysql_fetch_array($penyerapan);
    $n_penyerapan = $b['nilai'] * 0.2;
    $provinsi = date("F Y", strtotime($ambil['tanggal']));
    $jumlahx = $ambil['bhu'];
    $sql_jumlah = "SELECT * from pencapaian where Year(pencapaian.tanggal)='$thn' and 
                                                         nip='$nip' order by tanggal ASC";
    $query_jumlah = mysql_query($sql_jumlah) or die(mysql_error());
    while ($data = mysql_fetch_array($query_jumlah)) {
        
    }
    ?>
                                    {
                                        name: '<?php echo $provinsi; ?>',
                                        data: [<?php echo $jumlahx; ?>],

                                    },
<?php } ?>
                            ]
                });
            });
        </script>
    </head>
    <body>
        <!-- fungsi yang di tampilkan dibrowser  -->
        <div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>
        <br> <?php 
        echo"
        <h6 class='head' font color='red'><font color='red'>HUKUMAN PEGAWAI</font></h6>
        <table data-toggle='table'>
        <thead>
        <tr>
        <th>No</th>
        <th>Tanggal SP</th>
        <th>Hukuman</th>
        <th>Aktif</th>
        <th>Note</th>

        </tr>
        </thead>";
        $no=1;
        $hukuman=mysql_query("select * from hukuman where nip='$nip' order by tanggal desc");
        while($hk=mysql_fetch_array($hukuman)){
        $aktif=$hk['aktif'];
        $tanggalan=substr($aktif,8,2);
        $bulan=substr($aktif,5,2);
        $tahunberjalan=substr($aktif,0,4);
        $nextbulan=$bulan+2;
        $sampaib="$tahunberjalan-$nextbulan-$tanggalan";
        echo "<tr>
        <td>$no</td>
        <td>".tgl_indo($hk['tanggal'])."</td>
        <td>$hk[n_sp]</td>
        <td>".bulan_indo($hk['aktif'])." - ".bulan_indo($sampaib)." </td>
        <td>$hk[note]</td>
        </tr>";
        $no++;
        }
        echo "  
        </table>	

        <h6 class='head' >REPORT ABSENSI</h6>
        ";
        $dat=mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
        $tgl1= date('Y-m-30',$dat);
        $per1=explode('-',$tgl1);
        $bln1=$per1[1];
        $thn1=$per1[0];
        $tgl= date('Y-m-d');
        $per=explode('-',$tgl);
        $bln=$per[1];
        $thn=$per[0];
        $nip=$_SESSION['namauser'];
        $ukpd=$_SESSION['id_ukpd'];
        $waktu= date ('H:i:s');
        $pegawai=mysql_query("select * from pegawai where nip='$nip'");
        while($pg=mysql_fetch_array($pegawai)){
        $bpjsks=$pg['bpjsks'];
        $bpjsjkk=$pg['bpjsjkk'];
        $bpjsjp=$pg['bpjsjp'];
        }

        echo"
        <table data-toggle='table' >
        <thead>
        <tr>
        <th>No </th>
        <th>Tanggal</th>
        <th>Alpha</th>
        <th>Sakit 1-2 Hr</th>
        <th>Sakit > 2 Hr</th>
        <th>Izin</th>
        <th>Izin 1/2 Hr</th>
        <th>Telat / Menit </th>
        </tr>
        </thead>";
        $no=1;
        $waktu_k1=mysql_query("select * from waktu_k where Year(waktu_k.tanggal)='$thn' and nip='$nip' 
        order by tanggal asc  ");
        while($wk1=mysql_fetch_array($waktu_k1)){
        $alpha=$wk1['alpha'];
        $sakit1=$wk1['sakit1'];
        $sakit2=$wk1['sakit2'];
        $izin=$wk1['izin'];
        $izin_s=$wk1['izin_s'];
        $telat=$wk1['telat'];
        $day1 = date('F Y', strtotime($wk1['tanggal']));
        echo"
        <tr>
        <td>$no</td>
        <td>$day1 Hari</td>
        <td>$alpha Hari</td>
        <td>$sakit1 Hari</td>
        <td>$sakit2 hari</td>
        <td>$izin Hari</td>
        <td>$izin_s Hari</td>
        <td>$telat Menit</td>
        </tr>
        ";
        $no++;
        }
        echo " 
        </table>";
        echo"
        <h6 class='head' >GAJI DAN TUNJANGAN</h6>
        <table data-toggle='table' > 
        <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Gaji</th>
        <th>Penyerapan</th>
        <th>Tunjangan (Sebelum Potongan)</th>
        <th>Gaji + Tunjangan (Sebelum Potongan)</th>
        </tr>
        </thead>";
        $no=1;
        $tampil=mysql_query("select * from pencapaian where Year(pencapaian.tanggal)='$thn' and
        nip='$nip' order by tanggal asc  ");

        while($dt=mysql_fetch_array($tampil)){
        $hukuman=mysql_query("select * from hukuman where  id_hukuman='$dt[id_hukuman]'");
        $h=mysql_fetch_array($hukuman);
        $sp=$h['nilai'];
        $penyerapan=mysql_query("select * from penyerapan where  id_penyerapan='$dt[id_penyerapan]'");
        $b=mysql_fetch_array($penyerapan);
        $n_penyerapan=$b['nilai']*0.2;
        $waktu_k=mysql_query("select * from waktu_k where nip='$nip' and tanggal='$tgl'");
        while($wk=mysql_fetch_array($waktu_k))
        $alpha=$wk['alpha'];
        $sakit1=$wk['sakit1'];
        $sakit2=$wk['sakit2'];
        $izin=$wk['izin'];
        $telat=$wk['telat'];
        $nilai=$dt['bhu'];
        if ($sp >1){
        $tun_val=($dt['tunjangan']*$nilai/100)*$sp;
        }
        else {
        $tun_val=$dt['tunjangan']*$nilai/100;
        }
        $tun_val1=number_format($tun_val,0);
        $hsakit1=($wk['sakit1']*0.01)*$tun_val;
        $hsakit1t=number_format($hsakit1,0);
        $hsakit2=($wk['sakit2']*0.02)*$tun_val;
        $hsakit2t=number_format($hsakit2,0);
        $htelat=(($wk['telat']/450)*0.025)*$tun_val;
        $htelat_t=number_format($htelat,0);
        $hizin=($wk['izin']*0.025)*$tun_val;
        $hizint=number_format($hizin,0);
        $halpha=($wk['alpha']*0.05)*$tun_val;
        $halphat=number_format($halpha,0);
        $potongan_tun=$htelat+$hsakit1+$hsakit2+$hizin+$halpha;
        $potongan=number_format($potongan_tun,0);
        $bpjskesehatan=$dt['gapok']*0.02;
        $bpjskes=number_format($bpjskesehatan,0);
        $bpjstenagakerja=$dt['gapok']*$bpjsks;
        $bpjsks=$dt['bruto']*$bpjsks;
        $bpjsjkk=$dt['bruto']*$bpjsjkk;
        $bpjsjp=$dt['bruto']*$bpjsjp;
        $bpjstenag=number_format($bpjstenagakerja,0);
        $potonganbersih=$potongan_tun+$bpjsks+$bpjsjkk+$bpjsjp;
        $potall=number_format($potonganbersih,0);
        $tunjangan_bersih=$tun_val-$potonganbersih;
        $tun_pendapatan=number_format($tunjangan_bersih,0);
        $tunjangan=number_format($dt['tunjangan'],0);
        $gapok1=number_format($dt['bruto'],0);
        $total=$dt['bruto']+$tunjangan_bersih;
        $total1=$dt['bruto']+$tun_val;
        $subtotal=number_format($total,0);
        $subtotal1=number_format($total1,0);
        $day = date('F Y', strtotime($dt['tanggal']));
        echo"
        <tr>
        <td>$no </td>
        <td> $day</td>
        <td>Rp.$gapok1</td>
        <td>$n_penyerapan%</td>
        <td>Rp.$tun_val1</td>
        <td>Rp.$subtotal1</td>
        </tr>
        ";
        $no++;
        }
        echo " 
        </table>";
        ?>
    </body>
</html>
