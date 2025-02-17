<?php
	 
// nama file
$namaFile = "report.xls";
 
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
xlsWriteLabel(0,1,"ID Kinerja");
 
// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,2,"Tanggal");
 
// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,3,"Kode SKP");
 
// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,4,"Uraian");

// mengisi pada cell A1 (baris ke-0, kolom ke-5)
xlsWriteLabel(0,5,"Jam Mulai");
 
// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,6,"Jam Selesai");
 
// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,7,"Durasi Pekerjaan");
 
// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,8,"Volume");
 
// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,9,"Tanggal Penginputan");


// -------- menampilkan data --------- //
 
// koneksi ke mysql
 
include"config/koneksi.php";

	$nip = $_POST['nip'];
	$thn = $_POST['thn'];
	$bln = $_POST['bln'];


// query menampilkan semua data
 $kinerja=mysql_query("select 	* 
 					   from 	kinerja ");
	while($kin=mysql_fetch_array($kinerja)){
		$id_kinerja = $kin[id_kinerja];
		$kd_skp = $kin[kd_skp];
		$waktu_e = $kin[waktu_e];
		$uraian = $kin[uraian];
		$jam_mulai = $kin[jam_mulai];
		$jam_akhir = $kin[jam_akhir];
		$jumlah = $kin[jumlah];
		$tanggal = $kin[tanggal];
		$vol = $jumlah/$waktu_e;	

		// nilai awal untuk baris cell
		$noBarisCell = 1;
		 
		// nilai awal untuk nomor urut data
		$noData = 1;

		// menampilkan no. urut data
		xlsWriteNumber($noBarisCell,0,$noData);
		 
		// menampilkan data id_kinerja
		xlsWriteLabel($noBarisCell,1,$id_kinerja);
		 
		// menampilkan data nama mahasiswa
		xlsWriteLabel($noBarisCell,2,$tanggal);
		 
		// menampilkan data nilai
		xlsWriteNumber($noBarisCell,3,$kd_skp);

		// menampilkan data nilai
		xlsWriteNumber($noBarisCell,4,$uraian); 
		 
		// menampilkan status kelulusan
		xlsWriteLabel($noBarisCell,5,$jam_mulai);
		 
		// menampilkan status kelulusan
		xlsWriteLabel($noBarisCell,6,$jam_akhir); 
		 
		// menampilkan status kelulusan
		xlsWriteLabel($noBarisCell,7,$jumlah);
		 
		// menampilkan status kelulusan
		xlsWriteLabel($noBarisCell,8,$vol); 
 
		// menampilkan status kelulusan
		xlsWriteLabel($noBarisCell,9,$tanggal); 

		// increment untuk no. baris cell dan no. urut data
		$noBarisCell++;
		$noData++;

	}
	
 
// memanggil function penanda akhir file excel
xlsEOF();
exit();
 

	
?>