<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="shortcut icon" href="favicon.ico">
        <link href="css/print.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
    </head>
    <style>
        body {
            font-family: "Arial", serif;
            line-height: 1.25;
            padding: 40px 20px;
        }
        .header{
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        table {
            border: 1px solid green;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        table caption {
            font-size: 1.5em;
            margin: .25em 0 .75em;
        }
        table tr {
            border: 1px solid green;
            padding: .35em;
        }
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;

        }
        table td img {
            text-align: center;
        }
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table caption {
                font-size: 1.3em;
            }
            table thead {
                display: none;
            }
            table tr {
                border-bottom: 3px solid ;
                display: block;
                margin-bottom: .725em;
            }
            table td {
                border-bottom: 1px solid ;
                display: block;
                font-size: .8em;
                text-align: right;
            }
            table td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
            table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
    <body >

        <?php 
        include"config/koneksi.php";
        $tukpd=$_POST['ukpd'];
        $tm="$_POST[tahun]-$_POST[bulan]-30";
        $tgl=$tm;
        $bulan=$_POST['bulan'];
        $tahun=$_POST['tahun'];
        $day = date('F Y', strtotime($periode));
        $status='NON PNS';
        $tampil=mysql_query("select * from pegawai where id_ukpd LIKE '%$tukpd%' and status LIKE '%$status%' ");
        echo "<h2 class='head'>LAPORAN GAJI BRUTO</h2>
        Periode : $bulan - $tahun
        <table class='tabel'>
        <thead>
        <tr>
        <td>No</td>
        <td>Nip</td>
        <td>Nama </td>
        <td>Bagian</td>
        <td>Pendidikan</td>
        <td>Masa Kerja</td>
        <td>Status</td>
        <td>Gaji Pokok</td>
		<td>Gaji Bruto</td>
        </tr>
        </thead>";
        $no=1;
        while($dt=mysql_fetch_array($tampil)){
        $pimpinan=mysql_query("select * from user_id where userid='$dt[kasie]'");
        $b=mysql_fetch_array($pimpinan);
        $pp=$b['nama'];
        $st=mysql_query("select * from status where id_status='$dt[id_status]'");
        $s=mysql_fetch_array($st);
        $sts=$s['n_status'];
        $pndd=mysql_query("select * from pendidikan_t where id_pendidikan='$dt[id_pendidikan]'");
        $pndk=mysql_fetch_array($pndd);
        $pndkn=$pndk['n_pendidikan'];
        $rmp=mysql_query("select * from rumpun where id_rumpun='$dt[id_rumpun]'");
        $rmpn=mysql_fetch_array($rmp);
        $rmpnn=$rmpn['n_rumpun'];
        echo "<tr>
        <td>$no</td>
        <td>'$dt[nip]</td>
        <td>$dt[nama]</td>
        <td>";
        $bag=mysql_query("select * from bagian where id_bag='$dt[id_bag]'");
        $b=mysql_fetch_array($bag);
        echo "$b[n_bag]";	
        echo "</td>
        <td>$pndkn</td>
        <td>";
        $tmp =new datetime($dt['tgl_masuk']);
        $today = new datetime($tgl);
        $masa= $today->diff($tmp);
        $tahun= $masa->y;
        $bulan= $masa->m;
        $mk=($tahun*12)+$bulan; 
        echo $masa->y; echo" Tahun "; echo $masa->m; echo" Bulan ";	
        echo "</td>
        <td>";
        $st=mysql_query("select * from status where id_status='$dt[id_status]'");
        $b=mysql_fetch_array($st);
        $status=$b['nilai'];
        echo "$b[n_status]";	
        echo "</td>
        <td>";
        $pnd=mysql_query("select * from pendidikan_t where id_pendidikan='$dt[id_pendidikan]'");
        $b=mysql_fetch_array($pnd);
        $pendidikan=$b['n_pendidikan'];
        $gapok=''; 
        if ($pendidikan=="")
        echo "TMP Belum Di Input";
		elseif($pendidikan == 'SD' and $mk <= 3 )
		$gapok=2719298*0.75;
        elseif($pendidikan == 'SD' and $mk <= 24 )
        $gapok=2719298;
        elseif($pendidikan === 'SD' and $mk >= 25 and $mk <= 48)
        $gapok=2787281;
        elseif($pendidikan === 'SD' and  $mk >= 49 and $mk <= 72 )
        $gapok=2856963;
        elseif($pendidikan == 'SD' and $mk >= 73 and $mk <= 96 )
        $gapok=2928387;
        elseif($pendidikan === 'SD' and $mk >= 97 and $mk <= 120)
        $gapok=3001596;
        elseif($pendidikan === 'SD' and $mk >= 121 and $mk <= 144 )
        $gapok=3076636;
        elseif($pendidikan == 'SD' and $mk >= 145 and $mk <= 168 )
        $gapok=3153552;
        elseif($pendidikan === 'SD' and $mk >= 169 and $mk <= 192)
        $gapok=3232391;
        elseif($pendidikan === 'SD' and $mk >= 193 and $mk <= 216 )
        $gapok=33313201;
        elseif($pendidikan == 'SD' and $mk >= 217 and $mk <= 240 )
        $gapok=33396031;
        elseif($pendidikan === 'SD' and $mk >= 241 and $mk <= 264)
        $gapok=3480932;
        elseif($pendidikan === 'SD' and $mk >= 265 and $mk <= 288 )
        $gapok=3567955;
        elseif($pendidikan == 'SD' and $mk >= 289 and $mk <= 312 )
        $gapok=3657154;
        elseif($pendidikan === 'SD' and $mk >= 313 and $mk <= 336)
        $gapok=3748583;
        elseif($pendidikan === 'SD' and $mk >= 337 and $mk <= 360 )
        $gapok=3842297;
        elseif($pendidikan == 'SD' and $mk > 361 and $mk <= 384 )
        $gapok=3938355;
        elseif($pendidikan == 'SD' and $mk > 385 and $mk <= 408)
        $gapok=4036814;
		
		elseif($pendidikan == 'SMP' and $mk <= 3)
		$gapok=3263158*0.75;
        elseif($pendidikan == 'SMP' and $mk <= 24)
        $gapok=3263158;
        elseif($pendidikan === 'SMP' and $mk >= 25 and $mk <= 48)
        $gapok=3344737;
        elseif($pendidikan === 'SMP' and $mk >= 49 and $mk <= 72 )
        $gapok=3428355;
        elseif($pendidikan == 'SMP' and $mk >= 73 and $mk <= 96 )
        $gapok=3514064;
        elseif($pendidikan === 'SMP' and $mk >= 97 and $mk <= 120)
        $gapok=3601916;
        elseif($pendidikan === 'SMP' and $mk >= 121 and $mk <= 144 )
        $gapok=3691964;
        elseif($pendidikan == 'SMP' and $mk >= 145 and $mk <= 168 )
        $gapok=3784263;
        elseif($pendidikan === 'SMP' and $mk >= 169 and $mk <= 192)
        $gapok=3878869;
        elseif($pendidikan === 'SMP' and $mk >= 193 and $mk <= 216 )
        $gapok=3975841;
        elseif($pendidikan == 'SMP' and $mk >= 217 and $mk <= 240 )
        $gapok=4075237;
        elseif($pendidikan === 'SMP' and $mk >= 241 and $mk <= 264)
        $gapok=4177118;
        elseif($pendidikan === 'SMP' and $mk >= 265 and $mk <= 288 )
        $gapok=4281546;
        elseif($pendidikan == 'SMP' and $mk >= 289 and $mk <= 312 )
        $gapok=4388585;
        elseif($pendidikan === 'SMP' and $mk >= 313 and $mk <= 336)
        $gapok=4498299;
        elseif($pendidikan === 'SMP' and $mk >= 337 and $mk <= 360 )
        $gapok=4610757;
        elseif($pendidikan == 'SMP' and $mk >= 361 and $mk <= 384 )
        $gapok=4726026;
        elseif($pendidikan == 'SMP' and $mk >= 385 and $mk <= 408)
        $gapok=4844176;
		
		elseif($pendidikan == 'SLTA' and $mk <= 3)
		$gapok=3807018*0.75;
        elseif($pendidikan == 'SLTA' and $mk <= 24)
        $gapok=3807018;
        elseif($pendidikan === 'SLTA' and $mk >= 25 and $mk <= 48)
        $gapok=3902193;
        elseif($pendidikan === 'SLTA' and $mk >= 49 and $mk <= 72 )
        $gapok=3999748;
        elseif($pendidikan == 'SLTA' and $mk >= 73 and $mk <= 96 )
        $gapok=4099742;
        elseif($pendidikan === 'SLTA' and $mk >= 97 and $mk <= 120)
        $gapok=4202235;
        elseif($pendidikan === 'SLTA' and $mk >= 121 and $mk <= 144 )
        $gapok=4307291;
        elseif($pendidikan == 'SLTA' and $mk >= 145 and $mk <= 168 )
        $gapok=4414973;
        elseif($pendidikan === 'SLTA' and $mk >= 169 and $mk <= 192)
        $gapok=4525348;
        elseif($pendidikan === 'SLTA' and $mk >= 193 and $mk <= 216 )
        $gapok=4638481;
        elseif($pendidikan == 'SLTA' and $mk >= 217 and $mk <= 240 )
        $gapok=4754443;
        elseif($pendidikan === 'SLTA' and $mk >= 241 and $mk <= 264)
        $gapok=4873304;
        elseif($pendidikan === 'SLTA' and $mk >= 265 and $mk <= 288 )
        $gapok=4995137;
        elseif($pendidikan == 'SLTA' and $mk >= 289 and $mk <= 312 )
        $gapok=5120015;
        elseif($pendidikan === 'SLTA' and $mk >= 313 and $mk <= 336)
        $gapok=5248016;
        elseif($pendidikan === 'SLTA' and $mk >= 337 and $mk <= 360 )
        $gapok=5379216;
        elseif($pendidikan == 'SLTA' and $mk >= 361 and $mk <= 384 )
        $gapok=5513697;
        elseif($pendidikan == 'SLTA' and $mk > 385 and $mk <= 408)
        $gapok=5651539;
		
		elseif($pendidikan == 'D III / D IV' and $mk <= 3 )
		$gapok=4078947*0.75;
        elseif($pendidikan == 'D III / D IV' and $mk <= 24 )
        $gapok=4078947;
        elseif($pendidikan === 'D III / D IV' and $mk >= 25 and $mk <= 48)
        $gapok=4180921;
        elseif($pendidikan === 'D III / D IV' and $mk >= 49 and $mk <= 72 )
        $gapok=4285444;
        elseif($pendidikan == 'D III / D IV' and $mk >= 73 and $mk <= 96 )
        $gapok=4392580;
        elseif($pendidikan === 'D III / D IV' and $mk >= 97 and $mk <= 120)
        $gapok=4502395;
        elseif($pendidikan === 'D III / D IV' and $mk >= 121 and $mk <= 144 )
        $gapok=4614955;
        elseif($pendidikan == 'D III / D IV' and $mk >= 145 and $mk <= 168 )
        $gapok=4730328;
        elseif($pendidikan === 'D III / D IV' and $mk >= 169 and $mk <= 192)
        $gapok=4848587;
        elseif($pendidikan === 'D III / D IV' and $mk >= 193 and $mk <= 216 )
        $gapok=4969801;
        elseif($pendidikan == 'D III / D IV' and $mk >= 217 and $mk <= 240 )
        $gapok=5094046;
        elseif($pendidikan === 'D III / D IV' and $mk >= 241 and $mk <= 264)
        $gapok=5221937;
        elseif($pendidikan === 'D III / D IV' and $mk >= 265 and $mk <= 288 )
        $gapok=5351932;
        elseif($pendidikan == 'D III / D IV' and $mk >= 289 and $mk <= 312 )
        $gapok=5485731;
        elseif($pendidikan === 'D III / D IV' and $mk >= 313 and $mk <= 336)
        $gapok=5622874;
        elseif($pendidikan === 'D III / D IV' and $mk >= 337 and $mk <= 360 )
        $gapok=5763446;
        elseif($pendidikan == 'D III / D IV' and $mk > 361 and $mk <= 384 )
        $gapok=5907532;
        elseif($pendidikan == 'D III / D IV' and $mk >= 385 and $mk <= 408)
        $gapok=6055220;
		
		elseif($pendidikan == 'S1' and $mk <= 3 )
		$gapok=4350877*0.75;
        elseif($pendidikan == 'S1' and $mk <= 24 )
        $gapok=4350877;
        elseif($pendidikan === 'S1' and $mk >= 25 and $mk <= 48)
        $gapok=4459649;
        elseif($pendidikan === 'S1' and $mk >= 49 and $mk <= 72 )
        $gapok=4571140;
        elseif($pendidikan == 'S1' and $mk >= 73 and $mk <= 96 )
        $gapok=4685419;
        elseif($pendidikan === 'S1' and $mk >= 97 and $mk <= 120)
        $gapok=4802554;
        elseif($pendidikan === 'S1' and $mk >= 121 and $mk <= 144 )
        $gapok=4922618;
        elseif($pendidikan == 'S1' and $mk >= 145 and $mk <= 168 )
        $gapok=5045684;
        elseif($pendidikan === 'S1' and $mk >= 169 and $mk <= 192)
        $gapok=5171826;
        elseif($pendidikan === 'S1' and $mk >= 193 and $mk <= 216 )
        $gapok=5301121;
        elseif($pendidikan == 'S1' and $mk >= 217 and $mk <= 240 )
        $gapok=5433649;
        elseif($pendidikan === 'S1' and $mk >= 241 and $mk <= 264)
        $gapok=5569491;
        elseif($pendidikan === 'S1' and $mk >= 265 and $mk <= 288 )
        $gapok=5708728;
        elseif($pendidikan == 'S1' and $mk >= 289 and $mk <= 312 )
        $gapok=5851446;
        elseif($pendidikan === 'S1' and $mk >= 313 and $mk <= 336)
        $gapok=5997732;
        elseif($pendidikan === 'S1' and $mk >= 337 and $mk <= 360 )
        $gapok=6147676;
        elseif($pendidikan == 'S1' and $mk >= 361 and $mk <= 384 )
        $gapok=6301367;
        elseif($pendidikan == 'S1' and $mk >= 385 and $mk <= 408)
        $gapok=6458902;
		
		elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk <= 3 )
		$gapok=4622807*0.75;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk <= 24 )
        $gapok=4622807;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 25 and $mk <= 48)
        $gapok=4738377;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 49 and $mk <= 72 )
        $gapok=4856837;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 73 and $mk <= 96 )
        $gapok=4978258;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 97 and $mk <= 120)
        $gapok=5102714;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 121 and $mk <= 144 )
        $gapok=5230282;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 145 and $mk <= 168 )
        $gapok=5361039;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 169 and $mk <= 192)
        $gapok=5495065;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 193 and $mk <= 216 )
        $gapok=5632441;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 217 and $mk <= 240 )
        $gapok=5773253;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 241 and $mk <= 264)
        $gapok=5917584;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 265 and $mk <= 288 )
        $gapok=6065523;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 289 and $mk <= 312 )
        $gapok=6217161;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 313 and $mk <= 336)
        $gapok=6372591;
        elseif($pendidikan === 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 337 and $mk <= 360 )
        $gapok=6531905;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 361 and $mk <= 384 )
        $gapok=6695203;
        elseif($pendidikan == 'S2 / dr./ drg./ Apoteker/ Ners' and $mk >= 385 and $mk <= 408)
        $gapok=6862583;
		
		elseif($pendidikan == 'S3 / dr. Spesialis' and $mk <= 3)
		$gapok=4894737*0.75;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk <= 24)
        $gapok=4894737;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 25 and $mk <= 48)
        $gapok=5017105;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 49 and $mk <= 72 )
        $gapok=5142533;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk >= 73 and $mk <= 96 )
        $gapok=5271096;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 97 and $mk <= 120)
        $gapok=5402874;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 121 and $mk <= 144 )
        $gapok=5537945;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk >= 145 and $mk <= 168 )
        $gapok=5676394;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 169 and $mk <= 192)
        $gapok=5818304;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 193 and $mk <= 216 )
        $gapok=5963762;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk >= 217 and $mk <= 240 )
        $gapok=6112856;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 241 and $mk <= 264)
        $gapok=6265677;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 265 and $mk <= 288 )
        $gapok=6422319;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk >= 289 and $mk <= 312 )
        $gapok=6582877;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 313 and $mk <= 336)
        $gapok=6747449;
        elseif($pendidikan === 'S3 / dr. Spesialis' and $mk >= 337 and $mk <= 360 )
        $gapok=6916135;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk >= 361 and $mk <= 384 )
        $gapok=7089038;
        elseif($pendidikan == 'S3 / dr. Spesialis' and $mk >= 385 and $mk <= 408)
        $gapok=7266264;
        else
        echo"eror";
        $gaji=number_format($gapok,0);
        $bruto=$gapok*$status;
        $terima=number_format($bruto);	
        echo "$gaji</td>
		<td>$terima</td>
        </tr>";
        $no++;
        }
        echo "  
        </table>
        "; ?>
    </div>
</body>
</html>
