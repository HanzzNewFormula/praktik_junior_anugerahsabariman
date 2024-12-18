<?php
include "config/koneksi.php";

$username = mysql_real_escape_string($_POST['username']);
$pass     = mysql_real_escape_string($_POST['password']);

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM user_id WHERE userid='$username' AND passid='$pass'");
$ketemu=mysql_num_rows($login);


// Apabila username dan password ditemukan
if ($ketemu > 0){
 while($r = mysql_fetch_array($login)){
  session_start();
  $_SESSION['namauser']     = $r['userid'];
  $_SESSION['passuser']     = $r['passid'];
  $_SESSION['leveluser']    = $r['level_user'];
  $_SESSION['id_bag']    = $r['id_bag'];
  $_SESSION['id_skpd']    = $r['id_skpd'];
  $_SESSION['id_ukpd']    = $r['id_ukpd'];
 
   $_SESSION['nama']    = $r['nama'];
  }
if($_SESSION[leveluser]==1){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==2){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==3){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==4){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==5){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==6){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==7){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==8){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==9){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==10){
	header('location:media.php?module=home');
  } else if($_SESSION['leveluser']==11){
	header('location:media.php?module=home');
}
}
else
{
  include "error-login.php";
}
?>
