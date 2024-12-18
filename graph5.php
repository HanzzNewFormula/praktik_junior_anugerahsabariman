<!DOCTYPE html>
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
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Rata-Rata Pencapaian Kinerja Pegawai KaSie.Pelayanan Medis'
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
    $tgl= date('Y-m-d');
	$per=explode('-',$tgl);
	$bln=$per[1];
	$thn=$per[0];
	$waktu= date ('H:i:s');
	$nip=$_SESSION['namauser'];
$sql   = "SELECT AVG(nilai) from pencapaian where Year(pencapaian.tanggal)='$thn' and 
						penilai='178901' order by tanggal ASC"; // file untuk mengakses ke tabel database
$query = mysql_query( $sql ) or die(mysql_error());         
while($ambil = mysql_fetch_array($query)){
	$provinsi=date("F",strtotime($ambil['tanggal']));
	$jumlahx = $ambil[0];
	$sql_jumlah   = "SELECT * from pencapaian where Year(pencapaian.tanggal)='$thn' and 
						 penilai='178901' order by tanggal ASC";        
	$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
	while( $data = mysql_fetch_array( $query_jumlah ) ){
	                
	  }             
	  
	  ?>
	  {
		  name: '<?php echo $provinsi ;  ?>',
		  data: [<?php echo $jumlahx  ; ?>],
		  
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

</body>
</html>
