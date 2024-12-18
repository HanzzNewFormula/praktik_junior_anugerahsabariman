<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
	include "config/koneksi.php";
	$ambil=mysql_query("select * from pegawai where nip='$nip'");
	$t=mysql_fetch_array($ambil);
	$pnd=mysql_query("select * from pendidikan_t where id_pendidikan='$t[id_pendidikan]'");
	$b=mysql_fetch_array($pnd);
	$pendidikan=$b[n_pendidikan];
	$rm=mysql_query("select * from rumpun where id_rumpun='$t[id_rumpun]'");
	$b=mysql_fetch_array($rm);
	$rumpun=$b[nilai];
	$st=mysql_query("select * from status where id_status='$t[id_status]'");
	$b=mysql_fetch_array($st);
	$status=$b[nilai];
	$tmp =new datetime($t['tgl_masuk']);
	$today = new datetime();
	$masa= $today->diff($tmp);
	$tahun= $masa->y;
	$bulan= $masa->m;
	$mk=($tahun*12)+$bulan; 
	$gapok=''; 
	if ($pendidikan=="")
	echo "TMP Belum Di Input";
	elseif($pendidikan == 'SD' and $mk < 26 )
	$gapok=2719298;
	elseif($pendidikan === 'SD' and $mk > 26 and $mk <= 48)
	$gapok=2787281;
	elseif($pendidikan === 'SD' and  $mk > 48 and $mk <= 72 )
	$gapok=2856963;
	elseif($pendidikan == 'SD' and $mk > 72 and $mk <= 96 )
	$gapok=2928387;
	elseif($pendidikan === 'SD' and $mk > 96 and $mk <= 120)
	$gapok=3001596;
	elseif($pendidikan === 'SD' and $mk > 120 and $mk <= 144 )
	$gapok=3076636;
	elseif($pendidikan == 'SD' and $mk > 144 and $mk <= 168 )
	$gapok=3153552;
	elseif($pendidikan === 'SD' and $mk > 168 and $mk <= 192)
	$gapok=3232391;
	elseif($pendidikan === 'SD' and $mk > 192 and $mk <= 216 )
	$gapok=33313201;
	elseif($pendidikan == 'SD' and $mk > 216 and $mk <= 240 )
	$gapok=33396031;
	elseif($pendidikan === 'SD' and $mk > 240 and $mk <= 264)
	$gapok=3480932;
	elseif($pendidikan === 'SD' and $mk > 264 and $mk <= 288 )
	$gapok=3567955;
	elseif($pendidikan == 'SD' and $mk > 288 and $mk <= 312 )
	$gapok=3657154;
	elseif($pendidikan === 'SD' and $mk > 312 and $mk <= 336)
	$gapok=3748583;
	elseif($pendidikan === 'SD' and $mk > 336 and $mk <= 360 )
	$gapok=3842297;
	elseif($pendidikan == 'SD' and $mk > 360 and $mk <= 384 )
	$gapok=3938355;
	elseif($pendidikan == 'SD' and $mk > 384 and $mk <= 408)
	$gapok=4036814;
	
	elseif($pendidikan == 'SMP' and $mk < 26)
	$gapok=3263158;
	elseif($pendidikan === 'SMP' and $mk > 26 and $mk <= 48)
	$gapok=3344737;
	elseif($pendidikan === 'SMP' and $mk > 48 and $mk <= 72 )
	$gapok=3428355;
	elseif($pendidikan == 'SMP' and $mk > 72 and $mk <= 96 )
	$gapok=3514064;
	elseif($pendidikan === 'SMP' and $mk > 96 and $mk <= 120)
	$gapok=3601916;
	elseif($pendidikan === 'SMP' and $mk > 120 and $mk <= 144 )
	$gapok=3691964;
	elseif($pendidikan == 'SMP' and $mk > 144 and $mk <= 168 )
	$gapok=3784263;
	elseif($pendidikan === 'SMP' and $mk > 168 and $mk <= 192)
	$gapok=3878869;
	elseif($pendidikan === 'SMP' and $mk > 192 and $mk <= 216 )
	$gapok=3975841;
	elseif($pendidikan == 'SMP' and $mk > 216 and $mk <= 240 )
	$gapok=4075237;
	elseif($pendidikan === 'SMP' and $mk > 240 and $mk <= 264)
	$gapok=4177118;
	elseif($pendidikan === 'SMP' and $mk > 264 and $mk <= 288 )
	$gapok=4281546;
	elseif($pendidikan == 'SMP' and $mk > 288 and $mk <= 312 )
	$gapok=4388585;
	elseif($pendidikan === 'SMP' and $mk > 312 and $mk <= 336)
	$gapok=4498299;
	elseif($pendidikan === 'SMP' and $mk > 336 and $mk <= 360 )
	$gapok=4610757;
	elseif($pendidikan == 'SMP' and $mk > 360 and $mk <= 384 )
	$gapok=4726026;
	elseif($pendidikan == 'SMP' and $mk > 384 and $mk <= 408)
	$gapok=4844176;
	
	elseif($pendidikan == 'SLTA' and $mk < 26)
	$gapok=3807018;
	elseif($pendidikan === 'SLTA' and $mk > 26 and $mk <= 48)
	$gapok=3902193;
	elseif($pendidikan === 'SLTA' and $mk > 48 and $mk <= 72 )
	$gapok=3999748;
	elseif($pendidikan == 'SLTA' and $mk > 72 and $mk <= 96 )
	$gapok=4099742;
	elseif($pendidikan === 'SLTA' and $mk > 96 and $mk <= 120)
	$gapok=4202235;
	elseif($pendidikan === 'SLTA' and $mk > 120 and $mk <= 144 )
	$gapok=4307291;
	elseif($pendidikan == 'SLTA' and $mk > 144 and $mk <= 168 )
	$gapok=4414973;
	elseif($pendidikan === 'SLTA' and $mk > 168 and $mk <= 192)
	$gapok=4525348;
	elseif($pendidikan === 'SLTA' and $mk > 192 and $mk <= 216 )
	$gapok=4638481;
	elseif($pendidikan == 'SLTA' and $mk > 216 and $mk <= 240 )
	$gapok=4754443;
	elseif($pendidikan === 'SLTA' and $mk > 240 and $mk <= 264)
	$gapok=4873304;
	elseif($pendidikan === 'SLTA' and $mk > 264 and $mk <= 288 )
	$gapok=4995137;
	elseif($pendidikan == 'SLTA' and $mk > 288 and $mk <= 312 )
	$gapok=5120015;
	elseif($pendidikan === 'SLTA' and $mk > 312 and $mk <= 336)
	$gapok=5248016;
	elseif($pendidikan === 'SLTA' and $mk > 336 and $mk <= 360 )
	$gapok=5379216;
	elseif($pendidikan == 'SLTA' and $mk > 360 and $mk <= 384 )
	$gapok=5513697;
	elseif($pendidikan == 'SLTA' and $mk > 384 and $mk <= 408)
	$gapok=5651539;
	
	elseif($pendidikan == 'D III / D IV' and $mk < 26 )
	$gapok=4078947;
	elseif($pendidikan === 'D III / D IV' and $mk > 26 and $mk <= 48)
	$gapok=4180921;
	elseif($pendidikan === 'D III / D IV' and $mk > 48 and $mk <= 72 )
	$gapok=4285444;
	elseif($pendidikan == 'D III / D IV' and $mk > 72 and $mk <= 96 )
	$gapok=4392580;
	elseif($pendidikan === 'D III / D IV' and $mk > 96 and $mk <= 120)
	$gapok=4502395;
	elseif($pendidikan === 'D III / D IV' and $mk > 120 and $mk <= 144 )
	$gapok=4614955;
	elseif($pendidikan == 'D III / D IV' and $mk > 144 and $mk <= 168 )
	$gapok=4730328;
	elseif($pendidikan === 'D III / D IV' and $mk > 168 and $mk <= 192)
	$gapok=4848587;
	elseif($pendidikan === 'D III / D IV' and $mk > 192 and $mk <= 216 )
	$gapok=4969801;
	elseif($pendidikan == 'D III / D IV' and $mk > 216 and $mk <= 240 )
	$gapok=5094046;
	elseif($pendidikan === 'D III / D IV' and $mk > 240 and $mk <= 264)
	$gapok=5221937;
	elseif($pendidikan === 'D III / D IV' and $mk > 264 and $mk <= 288 )
	$gapok=5351932;
	elseif($pendidikan == 'D III / D IV' and $mk > 288 and $mk <= 312 )
	$gapok=5485731;
	elseif($pendidikan === 'D III / D IV' and $mk > 312 and $mk <= 336)
	$gapok=5622874;
	elseif($pendidikan === 'D III / D IV' and $mk > 336 and $mk <= 360 )
	$gapok=5763446;
	elseif($pendidikan == 'D III / D IV' and $mk > 360 and $mk <= 384 )
	$gapok=5907532;
	elseif($pendidikan == 'D III / D IV' and $mk > 384 and $mk <= 408)
	$gapok=6055220;
	
	elseif($pendidikan == 'S1' and $mk < 26 )
	$gapok=4350877;
	elseif($pendidikan === 'S1' and $mk > 26 and $mk <= 48)
	$gapok=4459649;
	elseif($pendidikan === 'S1' and $mk > 48 and $mk <= 72 )
	$gapok=4571140;
	elseif($pendidikan == 'S1' and $mk > 72 and $mk <= 96 )
	$gapok=4685419;
	elseif($pendidikan === 'S1' and $mk > 96 and $mk <= 120)
	$gapok=4802554;
	elseif($pendidikan === 'S1' and $mk > 120 and $mk <= 144 )
	$gapok=4922618;
	elseif($pendidikan == 'S1' and $mk > 144 and $mk <= 168 )
	$gapok=5045684;
	elseif($pendidikan === 'S1' and $mk > 168 and $mk <= 192)
	$gapok=5171826;
	elseif($pendidikan === 'S1' and $mk > 192 and $mk <= 216 )
	$gapok=5301121;
	elseif($pendidikan == 'S1' and $mk > 216 and $mk <= 240 )
	$gapok=5433649;
	elseif($pendidikan === 'S1' and $mk > 240 and $mk <= 264)
	$gapok=5569491;
	elseif($pendidikan === 'S1' and $mk > 264 and $mk <= 288 )
	$gapok=5708728;
	elseif($pendidikan == 'S1' and $mk > 288 and $mk <= 312 )
	$gapok=5851446;
	elseif($pendidikan === 'S1' and $mk > 312 and $mk <= 336)
	$gapok=5997732;
	elseif($pendidikan === 'S1' and $mk > 336 and $mk <= 360 )
	$gapok=6147676;
	elseif($pendidikan == 'S1' and $mk > 360 and $mk <= 384 )
	$gapok=6301367;
	elseif($pendidikan == 'S1' and $mk > 384 and $mk <= 408)
	$gapok=6458902;
	
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk < 26 )
	$gapok=4622807;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 26 and $mk <= 48)
	$gapok=4738377;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 48 and $mk <= 72 )
	$gapok=4856837;
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 72 and $mk <= 96 )
	$gapok=4978258;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 96 and $mk <= 120)
	$gapok=5102714;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 120 and $mk <= 144 )
	$gapok=5230282;
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 144 and $mk <= 168 )
	$gapok=5361039;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 168 and $mk <= 192)
	$gapok=5495065;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 192 and $mk <= 216 )
	$gapok=5632441;
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 216 and $mk <= 240 )
	$gapok=5773253;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 240 and $mk <= 264)
	$gapok=5917584;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 264 and $mk <= 288 )
	$gapok=6065523;
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 288 and $mk <= 312 )
	$gapok=6217161;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 312 and $mk <= 336)
	$gapok=6372591;
	elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 336 and $mk <= 360 )
	$gapok=6531905;
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 360 and $mk <= 384 )
	$gapok=6695203;
	elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk > 384 and $mk <= 408)
	$gapok=6862583;
	
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk < 26)
	$gapok=4894737;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 26 and $mk <= 48)
	$gapok=5017105;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 48 and $mk <= 72 )
	$gapok=5142533;
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk > 72 and $mk <= 96 )
	$gapok=5271096;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 96 and $mk <= 120)
	$gapok=5402874;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 120 and $mk <= 144 )
	$gapok=5537945;
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk > 144 and $mk <= 168 )
	$gapok=5676394;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 168 and $mk <= 192)
	$gapok=5818304;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 192 and $mk <= 216 )
	$gapok=5963762;
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk > 216 and $mk <= 240 )
	$gapok=6112856;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 240 and $mk <= 264)
	$gapok=6265677;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 264 and $mk <= 288 )
	$gapok=6422319;
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk > 288 and $mk <= 312 )
	$gapok=6582877;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 312 and $mk <= 336)
	$gapok=6747449;
	elseif($pendidikan === 'S3 / dr. Spesialis' and $mk > 336 and $mk <= 360 )
	$gapok=6916135;
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk > 360 and $mk <= 384 )
	$gapok=7089038;
	elseif($pendidikan == 'S3 / dr. Spesialis' and $mk > 384 and $mk <= 408)
	$gapok=7266264;
	else
	
	$gaji=number_format($gapok,0);
	$bruto=$gapok*$status;
	$bruto1=number_format($bruto,0);
	$tunjangan=$gapok*$rumpun;
	$tunjangan1=number_format($tunjangan,0);
	$tunjanganprolehan=$tunjangan*$jumlahx/100;
	$tun_pendapatan=number_format($tunjanganprolehan,0);
	$diterima=$bruto+$tunjangan;
	$pendapatan=number_format($diterima,0);
	echo"
	<table>
	<tr>
	<td>Masa Kerja kamu </td><td>: </td><td>"; echo $masa->y; echo" Tahun "; echo $masa->m; echo" Bulan "; echo"</td>
	</tr>
	<tr>
	<td>Gaji Bruto</td><td>: </td><td>"; echo"Rp.$bruto1"; echo"</td>
	</tr>
	<tr>
	<td>Besar Tunjangan</td><td>: </td><td>"; echo"Rp.$tun_pendapatan"; echo"</td>
	</tr>
	</table>";
	?>
</body>
</html>
