<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/kode_auto_new.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
$id=$_SESSION['id_ukpd'];
$jab=mysql_query("select * from ukpd where id_ukpd='$id'");
				$j=mysql_fetch_array($jab);
				$ukpd=$j['n_ukpd']; 
	if ($_SESSION['leveluser']=='7' ){
		if($_GET['module']=="home"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
		include "graph.php";
		}
		else if($_GET['module']=="kinerja"){
		include "modul/kinerja/kinerja.php";
		}
		else if($_GET['module']=="skptahunan"){
		include "modul/skptahunan/skpt.php";
		}
		else if($_GET['module']=="aktifitas"){
		include "modul/aktifitas/aktifitas.php";
		}
		else if($_GET['module']=="pegawai"){
		include "modul/pegawai/pegawai.php";
		}
		else if($_GET['module']=="kreatifitas"){
		include "modul/kreatifitas/kreatifitas.php";
		}
	}

if ($_SESSION['leveluser']=='6' ){
		if($_GET['module']=="home"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
		include "graph.php";
		}
		else if($_GET['module']=="kinerja"){
		include "modul/kinerja/kinerja.php";
		}
		else if($_GET['module']=="skptahunan"){
		include "modul/skptahunan/skpt.php";
		}
		else if($_GET['module']=="aktifitas"){
		include "modul/aktifitas/aktifitas.php";
		}
		else if($_GET['module']=="pegawai"){
		include "modul/pegawai/pegawai.php";
		}
		else if($_GET['module']=="laporan"){
		include "modul/laporan/laporan.php";
		}
		else if($_GET['module']=="penyerapan"){
		include "modul/penyerapan/penyerapan.php";
		}
		else if($_GET['module']=="waktu_kerja"){
		include "modul/waktu_kerja/waktukerja.php";
		}
		else if($_GET['module']=="pajak"){
		include "modul/pajak/pajak.php";
		}
		else if($_GET['module']=="kreatifitas"){
		include "modul/kreatifitas/kreatifitas.php";
		}
		else if($_GET['module']=="honor_shift"){
		include "modul/honor_shift/hshift.php";
		}
}
	

if ($_SESSION['leveluser']=='5'){
		if($_GET['module']=="home"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
		include "graph.php";
		}
		else if($_GET['module']=="kinerja"){
		include "modul/kinerja/kinerja.php";
		}
		else if($_GET['module']=="skptahunan"){
		include "modul/skptahunan/skpt.php";
		}
		else if($_GET['module']=="aktifitas"){
		include "modul/aktifitas/aktifitas.php";
		}
		else if($_GET['module']=="pelatihan"){
		include "modul/pelatihan/pelatihan.php";
		}
		else if($_GET['module']=="pegawai"){
		include "modul/pegawai/pegawai.php";
		}
		else if($_GET['module']=="kreatifitas"){
		include "modul/kreatifitas/kreatifitas.php";
		}
}

if ($_SESSION['leveluser']=='4'){
		if($_GET['module']=="home"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
		include "graph.php";
		}
		else if($_GET['module']=="kinerja"){
		include "modul/kinerja/kinerja.php";
		}
		else if($_GET['module']=="skptahunan"){
		include "modul/skptahunan/skpt.php";
		}
		else if($_GET['module']=="skp"){
		include "modul/skp/skp.php";
		}
		else if($_GET['module']=="aktifitas"){
		include "modul/aktifitas/aktifitas.php";
		}
		else if($_GET['module']=="pelatihan"){
		include "modul/pelatihan/pelatihan.php";
		}
		else if($_GET['module']=="bagian"){
		include "modul/bagian/bagian.php";
		}
		else if($_GET['module']=="jabatan"){
		include "modul/jabatan/jabatan.php";
		}
		else if($_GET['module']=="sanksi"){
		include "modul/sanksi/sanksi.php";
		}
		else if($_GET['module']=="pegawai"){
		include "modul/pegawai/pegawai.php";
		}
		else if($_GET['module']=="pajak"){
		include "modul/pajak/pajak.php";
		}
		else if($_GET['module']=="kjb"){
		include "modul/k_jabatan/k_jabatan.php";
		}
		else if($_GET['module']=="pegawai"){
		include "modul/pegawai/pegawai.php";
		}
		else if($_GET['module']=="rumpun"){
		include "modul/rumpun/rumpun.php";
		}
		else if($_GET['module']=="penyerapan"){
		include "modul/penyerapan/penyerapan.php";
		}
		else if($_GET['module']=="status"){
		include "modul/status/status.php";
		}
		else if($_GET['module']=="waktu_kerja"){
		include "modul/waktu_kerja/waktukerja.php";
		}
		else if($_GET['module']=="pendidikan"){
		include "modul/pendidikan/pendidikan.php";
		}
		else if($_GET['module']=="unit"){
		include "modul/unit/unit.php";
		}
		else if($_GET['module']=="waktu"){
		include "modul/waktu/waktu.php";
		}
		else if($_GET['module']=="kreatifitas"){
		include "modul/kreatifitas/kreatifitas.php";
		}
		else if($_GET['module']=="honor_shift"){
		include "modul/honor_shift/hshift.php";
		}
}



if ($_SESSION['leveluser']=='3' or $_SESSION['leveluser']=='8'){
	if($_GET['module']=="home"){
	echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
	include "graph.php";
	}
	else if($_GET['module']=="kinerja"){
	include "modul/kinerja/kinerja.php";
	}
	else if($_GET['module']=="skptahunan"){
	include "modul/skptahunan/skpt.php";
	}
	else if($_GET['module']=="aktifitas"){
	include "modul/aktifitas/aktifitas.php";
	}
	else if($_GET['module']=="unit"){
	include "modul/unit/unit.php";
	}
	else if($_GET['module']=="waktu"){
	include "modul/waktu/waktu.php";
	}
	else if($_GET['module']=="disiplin"){
	include "modul/disiplin/disiplin.php";
	}
	else if($_GET['module']=="kompetensi"){
	include "modul/kompetensi/kompetensi.php";
	}
	else if($_GET['module']=="penyerapan"){
	include "modul/penyerapan/penyerapan.php";
	}
	else if($_GET['module']=="waktu_kerja"){
	include "modul/waktu_kerja/waktukerja.php";
	}
	else if($_GET['module']=="nilai"){
	include "modul/nilai/nilai.php";
	}
	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
	else if($_GET['module']=="kreatifitas"){
	include "modul/kreatifitas/kreatifitas.php";
	}
	else if($_GET['module']=="validasi"){
	include "modul/validasi/validasi.php";
	}
}
	
if ($_SESSION['leveluser']=='1' ){
	if($_GET['module']=="home"){
	echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";			
	}
	else if($_GET['module']=="absensi"){
		include "modul/absensi/absensi.php";
		}
	else if($_GET['module']=="dashboard"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
		}
	else if($_GET['module']=="tu"){
		include "graph3.php";
		}
		else if($_GET['module']=="jangmed"){
		include "graph4.php";
		}
		else if($_GET['module']=="yanmed"){
		include "graph5.php";
		}
	else if($_GET['module']=="bagian"){
	include "modul/bagian/bagian.php";
	}
	else if($_GET['module']=="skpd"){
	include "modul/skpd/skpd.php";
	}
	else if($_GET['module']=="ukpd"){
	include "modul/ukpd/ukpd.php";
	}
	else if($_GET['module']=="user"){
	include "modul/user/user.php";
	}
	else if($_GET['module']=="status"){
	include "modul/status/status.php";
	}
	else if($_GET['module']=="pendidikan"){
	include "modul/pendidikan/pendidikan.php";
	}
	else if($_GET['module']=="rumpun"){
	include "modul/rumpun/rumpun.php";
	}
	else if($_GET['module']=="jabatan"){
	include "modul/jabatan/jabatan.php";
	}

	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
	
	else if($_GET['module']=="waktu"){
	include "modul/waktu/waktu.php";
	}

	else if($_GET['module']=="pelatihan"){
	include "modul/pelatihan/pelatihan.php";
	}
	else if($_GET['module']=="kjb"){
	include "modul/k_jabatan/k_jabatan.php";
	}
	else if($_GET['module']=="lap_absensi"){
	include "menu_laporan.php";
	}
	else if($_GET['module']=="pelatihan"){
	include "modul/pelatihan/pelatihan.php";
	}
	else if($_GET['module']=="kinerja"){
	include "modul/kinerja/kinerja.php";
	}
	else if($_GET['module']=="skptahunan"){
	include "modul/skptahunan/skpt.php";
	}
	else if($_GET['module']=="unit"){
	include "modul/unit/unit.php";
	}
	else if($_GET['module']=="skp"){
	include "modul/skp/skp.php";
	}
	else if($_GET['module']=="aktifitas"){
	include "modul/aktifitas/aktifitas.php";
	}
	else if($_GET['module']=="kreatifitas"){
	include "modul/kreatifitas/kreatifitas.php";
	}
	else if($_GET['module']=="disiplin"){
	include "modul/disiplin/disiplin.php";
	}
	else if($_GET['module']=="kompetensi"){
	include "modul/kompetensi/kompetensi.php";
	}
	else if($_GET['module']=="penyerapan"){
	include "modul/penyerapan/penyerapan.php";
	}
	else if($_GET['module']=="waktu_kerja"){
	include "modul/waktu_kerja/waktukerja.php";
	}
	else if($_GET['module']=="laporan"){
	include "modul/laporan/laporan.php";
	}
	else if($_GET['module']=="nilai"){
	include "modul/nilai/nilai.php";
	}
	
 }
	
if ($_SESSION['leveluser']=='9' OR $_SESSION['leveluser']=='10' ){
	if($_GET['module']=="home"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
				include "graph2.php";
	}
	else if($_GET['module']=="absensi"){
		include "modul/absensi/absensi.php";
		}
	else if($_GET['module']=="dashboard"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA $ukpd</div><br><br><hr>";
		}
	else if($_GET['module']=="grafikk"){
		include "graph3.php";
		}
		else if($_GET['module']=="jangmed"){
		include "graph4.php";
		}
		else if($_GET['module']=="yanmed"){
		include "graph5.php";
		}
	else if($_GET['module']=="bagian"){
	include "modul/bagian/bagian.php";
	}
	else if($_GET['module']=="skpd"){
	include "modul/skpd/skpd.php";
	}
	else if($_GET['module']=="ukpd"){
	include "modul/ukpd/ukpd.php";
	}
	else if($_GET['module']=="user"){
	include "modul/user/user.php";
	}
	else if($_GET['module']=="status"){
	include "modul/status/status.php";
	}
	else if($_GET['module']=="pendidikan"){
	include "modul/pendidikan/pendidikan.php";
	}
	else if($_GET['module']=="rumpun"){
	include "modul/rumpun/rumpun.php";
	}
	else if($_GET['module']=="jabatan"){
	include "modul/jabatan/jabatan.php";
	}

	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
	
	else if($_GET['module']=="waktu"){
	include "modul/waktu/waktu.php";
	}

	else if($_GET['module']=="pelatihan"){
	include "modul/pelatihan/pelatihan.php";
	}
	else if($_GET['module']=="kjb"){
	include "modul/k_jabatan/k_jabatan.php";
	}
	else if($_GET['module']=="lap_absensi"){
	include "menu_laporan.php";
	}
	else if($_GET['module']=="pelatihan"){
	include "modul/pelatihan/pelatihan.php";
	}
	else if($_GET['module']=="kinerja"){
	include "modul/kinerja/kinerja.php";
	}
	else if($_GET['module']=="skptahunan"){
	include "modul/skptahunan/skpt.php";
	}
	else if($_GET['module']=="unit"){
	include "modul/unit/unit.php";
	}
	else if($_GET['module']=="skp"){
	include "modul/skp/skp.php";
	}
	else if($_GET['module']=="aktifitas"){
	include "modul/aktifitas/aktifitas.php";
	}
	else if($_GET['module']=="kreatifitas"){
	include "modul/kreatifitas/kreatifitas.php";
	}
	else if($_GET['module']=="disiplin"){
	include "modul/disiplin/disiplin.php";
	}
	else if($_GET['module']=="kompetensi"){
	include "modul/kompetensi/kompetensi.php";
	}
	else if($_GET['module']=="penyerapan"){
	include "modul/penyerapan/penyerapan.php";
	}
	else if($_GET['module']=="waktu_kerja"){
	include "modul/waktu_kerja/waktukerja.php";
	}
	else if($_GET['module']=="laporan"){
	include "modul/laporan/laporan.php";
	}
	else if($_GET['module']=="nilai"){
	include "modul/nilai/nilai.php";
	}
	
 }
 
 if ($_SESSION['leveluser']=='11'){
		if($_GET['module']=="home"){
		echo "<div class='home'><br>SELAMAT DATANG DI E-KINERJA NON PNS</div><br><br><hr>";
				
		}
	else if($_GET['module']=="kinerja"){
	include "modul/kinerja/kinerja.php";
	}
	else if($_GET['module']=="honor_shift"){
	include "modul/honor_shift/hshift.php";
	}
	else if($_GET['module']=="kasie"){
	include "modul/kasie/kasie.php";
	}
	else if($_GET['module']=="laporan"){
	include "modul/laporan/laporan.php";
	}
	else if($_GET['module']=="skptahunan"){
	include "modul/skptahunan/skpt.php";
	}
	else if($_GET['module']=="skp"){
	include "modul/skp/skp.php";
	}
	else if($_GET['module']=="aktifitas"){
	include "modul/aktifitas/aktifitas.php";
	}
	else if($_GET['module']=="pelatihan"){
	include "modul/pelatihan/pelatihan.php";
	}
	else if($_GET['module']=="bagian"){
	include "modul/bagian/bagian.php";
	}
	else if($_GET['module']=="waktu_kerja"){
	include "modul/waktu_kerja/waktukerja.php";
	}
	else if($_GET['module']=="jabatan"){
	include "modul/jabatan/jabatan.php";
	}
	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
	else if($_GET['module']=="kjb"){
	include "modul/k_jabatan/k_jabatan.php";
	}
	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
	else if($_GET['module']=="rumpun"){
	include "modul/rumpun/rumpun.php";
	}
	else if($_GET['module']=="pajak"){
	include "modul/pajak/pajak.php";
	}
	else if($_GET['module']=="penyerapan"){
	include "modul/penyerapan/penyerapan.php";
	}
	else if($_GET['module']=="status"){
	include "modul/status/status.php";
	}
	else if($_GET['module']=="pendidikan"){
	include "modul/pendidikan/pendidikan.php";
	}
	else if($_GET['module']=="unit"){
	include "modul/unit/unit.php";
	}
	else if($_GET['module']=="waktu"){
	include "modul/waktu/waktu.php";
	}
	else if($_GET['module']=="setting"){
	include "modul/setting/setting.php";
	}
	else if($_GET['module']=="kreatifitas"){
	include "modul/kreatifitas/kreatifitas.php";
	}
	else if($_GET['module']=="rekap"){
	include "modul/rekap_kinerja/rekap.php";
	}
}


?>