<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Tunjangan Kinerja.xls");

// nama file
 
$namaFile = "Laporan Tunjangan Kinerja.xls";
 
// Function penanda awal file (Begin Of File) Excel
 
function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}
 
// Function penanda akhir file (End Of File) Excel
 
function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}
 
// Function untuk menulis data (angka) ke cell excel
 
function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}
 
// Function untuk menulis data (text) ke cell excel
 
function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}
 
// header file excel
 
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,
 pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
 
// header untuk nama file
header("Content-Disposition: attachment;
 filename=".$namaFile."");
 
header("Content-Transfer-Encoding: binary ");
 
// memanggil function penanda awal file excel
xlsBOF();
 
// ------ membuat kolom pada excel --- //
 
// mengisi pada cell A1 (baris ke-0, kolom ke-0)
xlsWriteLabel(0,0,"NO");
 
// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,1,"NIP");
 
// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,2,"NAMA");
 
// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,3,"NPWP");
 
// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,4,"NO. REK");

// mengisi pada cell A1 (baris ke-0, kolom ke-0)
xlsWriteLabel(0,5,"MASA KERJA");
 
// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,6,"GAPOK");
 
// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,7,"BRUTO");
 
// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,8,"TUNJANGAN");
 
// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,9,"ALPHA");

// mengisi pada cell A1 (baris ke-0, kolom ke-0)
xlsWriteLabel(0,10,"SAKIT 1-2 HR");
 
// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,11,"SAKIT > 2 HR");
 
// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,12,"IZIN");
 
// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,13,"TELAT");
 
// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,14,"BPJS KESEHATAN");

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,15,"JKK & JKM");

// mengisi pada cell A1 (baris ke-0, kolom ke-0)
xlsWriteLabel(0,16,"IJHT");
 
// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,17,"JP");
 
// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,18,"BHU");
 
// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,19,"TUN VALIDASI");
 
// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,20,"TOT POT ABSENSI & BPJS");

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,21,"TUN BERSIH");
 
// -------- menampilkan data --------- //
 
// koneksi ke mysql
 
include"config/koneksi.php";
	$tgl=$_POST['tanggal'];
	$ukpd=$_POST['ukpd'];
	$per=explode('-',$tgl);
	$bln=$per[1];
	$thn=$per[0];
	$waktu= date ('H:i:s');
// query menampilkan semua data
 $penyerapan=mysql_query("select * from penyerapan where 
						 Month(penyerapan.tanggal)='$bln' 
						 and Year(penyerapan.tanggal)='$thn' and id_ukpd LIKE '%$_SESSION[id_ukpd]%'");
	while($pny=mysql_fetch_array($penyerapan));
	$n_penyerapan=$pny['nilai'];
	$bag=mysql_query("select * from bagian where id_bag='$dt[id_bag]'");
	$bagian=mysql_fetch_array($bag);
		
	$peg=mysql_query("select * from pegawai where nip='$dt[nip]'");
	$pgw=mysql_fetch_array($peg);
	$bpjsks=$pgw[bpjsks];
	$bpjsjkk=$pgw[bpjsjkk];
	$bpjsijht=$pgw[bpjsijht];
	$bpjsjp=$pgw[bpjsjp];
	
	$jab=mysql_query("select * from jabatan where id_jab='$dt[id_jab]'");
	$jabatan=mysql_fetch_array($jab);
	
	
	$waktu_k=mysql_query("select * from waktu_k where 
						 Month(waktu_k.tanggal)='$bln' 
						 and Year(waktu_k.tanggal)='$thn' and nip='$dt[nip]'
						 order by id_waktu_k ASC ");
						    $wk=mysql_fetch_array($waktu_k);
		$sakit1=$wk[sakit1];
		$sakit2=$wk[sakit2];
		$izin=$wk[izin];
		$alpha=$wk[alpha];
		$telat=$wk[telat];
		$anggaran=$n_penyerapan*0.2;	
	$st=mysql_query("select * from status where id_status='$t[id_status]'");
	$b=mysql_fetch_array($st);
	$status=$b[nilai];
$tampil=mysql_query("select * from pencapaian where 
						 Month(pencapaian.tanggal)='$bln' 
						 and Year(pencapaian.tanggal)='$thn' and id_ukpd LIKE '%$ukpd%' 
						 order by id_pencapaian ASC  ");
while($dt=mysql_fetch_array($tampil)){			 
     
		$nilai=$dt[nskp]+$dt[nprilaku]+$anggaran;
		$tun_val=$dt[tunjangan]*$nilai/100;
		$tun_val1=number_format($tun_val,2,',','.');
		$hsakit1=($wk[sakit1]*0.01)*$tun_val;
		$hsakit1t=number_format($hsakit1,0);
		$hsakit2=($wk[sakit2]*0.02)*$tun_val;
		$hsakit2t=number_format($hsakit2,0);
		$htelat=(($wk[telat]/450)*0.025)*$tun_val;
		$htelat_t=number_format($htelat,0);
		$hizin=($wk[izin]*0.025)*$tun_val;
		$hizint=number_format($hizin,0);
		$halpha=($wk[alpha]*0.05)*$tun_val;
		$halphat=number_format($halpha,0);
		$potongan_tun=$htelat+$hsakit1+$hsakit2+$hizin+$halpha;
		$potongan=number_format($potongan_tun,0);
		$bpjskesehatan=$dt[bruto]*$bpjsks;
		$bpjskes=number_format($bpjskesehatan,0);
		$bpjsk1=$dt[bruto]*$bpjsjkk;
		$bpjsk2=$dt[bruto]*$bpjsijht;
		$bpjsk3=$dt[bruto]*$bpjsjp;
		$bpjstenagakerja=$bpjsjkk+$bpjsijht+$bpjsjp;
		$potongan_tun=$htelat+$hsakit1+$hsakit2+$hizin+$halpha+$bpjsk1+$bpjsk2+$bpjsk3;
		$potongan=number_format($potongan_tun,0);
		$bpjstenag=number_format($bpjstenagakerja,0);
		$tunjangan_bersih=$tun_val-$potongan_tun-$bpjskesehatan-$bpjsk1-$bpjsk2-$bpjsk3;
		$tun_pendapatan=number_format($tunjangan_bersih,0);
		$tunjangan=number_format($dt[tunjangan],0);
		$gapok=number_format($dt[gapok],0);
		$bruto=number_format($dt[bruto],0);
		$bpjsjkkt=number_format($bpjsk1,0);
		$bpjsijhtt=number_format($bpjsk2,0);
		$bpjsjpt=number_format($bpjsk3,0);
		$total=$dt[gapok]+$tunjangan_bersih;
		$subtotal=number_format($total,0);
// nilai awal untuk baris cell
$noBarisCell = 1;
 
// nilai awal untuk nomor urut data
$noData = 1;
 
 // menampilkan no. urut data
 xlsWriteNumber($noBarisCell,0,$noData);
 
// menampilkan data nim
 xlsWriteLabel($noBarisCell,1,$dt['nip']);
 
// menampilkan data nama mahasiswa
 xlsWriteLabel($noBarisCell,2,$dt['nama']);
 
// menampilkan data nilai
 xlsWriteNumber($noBarisCell,3,$dt['npwp']);

// menampilkan data nilai
 xlsWriteNumber($noBarisCell,4,$dt['norek']); 
 
 // menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,5,$dt['masa_kerja']);
 
// menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,6,$gapok); 
 
// menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,7,$bruto);
 
  // menampilkan no. urut data
 xlsWriteNumber($noBarisCell,8,$dt['tunjangan']);
 
// menampilkan data nim
 xlsWriteLabel($noBarisCell,9,$halphat);
 
// menampilkan data nama mahasiswa
 xlsWriteLabel($noBarisCell,10,$hsakit1t);
 
// menampilkan data nilai
 xlsWriteNumber($noBarisCell,11,$hsakit2t);
 
 // menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,12,$hizint);
 
// menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,13,$htelat_t); 
 
// menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,14,$bpjskes);
 
  // menampilkan no. urut data
 xlsWriteNumber($noBarisCell,15,$bpjsjkkt);
 
// menampilkan data nim
 xlsWriteLabel($noBarisCell,16,$bpjsijhtt);
 
// menampilkan data nama mahasiswa
 xlsWriteLabel($noBarisCell,17,$bpjsjpt);
 
// menampilkan data nilai
 xlsWriteNumber($noBarisCell,18,$nilai);
 
 // menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,19,$tun_val1);
 
// menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,20,$potongan); 
 
// menampilkan status kelulusan
 xlsWriteLabel($noBarisCell,21,$tun_pendapatan);
 
 
// increment untuk no. baris cell dan no. urut data
 $noBarisCell++;
 $noData++;
}
 
// memanggil function penanda akhir file excel
xlsEOF();
exit();
 
?>