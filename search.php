<?php
mysql_connect("localhost","root","");
mysql_select_db("kpi");
 
$term = $_GET['term'];
 
$query = mysql_query("select * from skp where skp like '%".$term."%'");
$json = array();
while($produk = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $produk['skp'].' - '.$produk['waktu'], // text sugesti saat user mengetik di input box
		'value' => $produk['skp'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama' => $produk['waktu']
	);
}
header("Content-Type: text/json");
echo json_encode($json);
?>