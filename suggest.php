<?php

include"config/koneksi.php";

$src 	= addslashes($_POST['src']);
$query 	= mysql_query('select * 
						 from skp 
						where skp like "' . $src . '%" ');
while ($data = mysql_fetch_array($query)) {
    echo '<span class="pilihan" data-waktu="' 
    // . $data['waktu'] . '"  onclick="pilih_kota(\'' . $data['skp'] . '\',\''.$data['waktu'] .'\');'
    . $data['waktu'] . '"  onclick="pilih_kota2(\'' . $data['skp'] . '\',\''.$data['waktu'] .'\',\''.$data['kd_skp'] .'\');'
    . 'hideStuff(\'suggest\');">' . $data['skp'] . '</span>';
}

?>