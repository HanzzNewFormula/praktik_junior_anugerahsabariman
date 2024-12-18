<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<head>
<title>Grafik Penduduk Indonesia</title>

</head>
<body>
<!-- fungsi yang di tampilkan dibrowser  -->

<?php
include"config/koneksi.php";
    $tgl= date('Y-m-d');
	$per=explode('-',$tgl);
	$bln=$per[1];
	$thn=$per[0];
	$waktu= date ('H:i:s');
	$nip=$_SESSION['namauser'];

echo"
<table class='table table-bordered table-hover table-striped'>
<tr>
<td>Nilai Avarage Kinerja</td>
<td>Nilai Avarage Prilaku</td>
<td>Pegawai</td>
</tr>";
$sql1   = mysql_query("SELECT AVG(nskp) from pencapaian where Year(pencapaian.tanggal)='$bln' and 
						penilai='$nip' order by tanggal ASC"); // file untuk mengakses ke tabel database
while($n1=mysql_fetch_array($sql1)){
$nskp=$n1[0];

$sql2   = mysql_query("SELECT AVG(nprilaku) from pencapaian where Year(pencapaian.tanggal)='$bln' and 
						penilai='$nip' order by tanggal ASC"); // file untuk mengakses ke tabel database
$n2=mysql_fetch_array($sql2);
$nprilaku=$n2[0];

$sql3   = mysql_query("SELECT count(penilai) from pencapaian where Year(pencapaian.tanggal)='$bln' and 
						penilai='$nip' order by tanggal ASC"); // file untuk mengakses ke tabel database
$n3=mysql_fetch_array($sql3);
$pegawai=$n3[0];
echo"

<tr>
<td>$nskp</td>
<td>$nprilaku</td>
<td>$pegawai</td>
</tr>
</table>";
}




?>
</body>
</html>
