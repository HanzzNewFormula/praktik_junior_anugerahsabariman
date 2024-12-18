<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
error_reporting(0);
include "timeout.php";
if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
  echo "<center>Ini adalah halaman Admin.<br>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pengelolaan Kendaraan - Dashboard</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            fieldset{margin-bottom: 1em;width:300px;}
            #suggest{position:absolute;z-index:5;border-left:silver 1px solid;padding:0 0 0 10px;background:#ffce3d; }
            span.pilihan{display:block;cursor:pointer;background:#ffce3d;}
        </style>
    </head>
    <script type='text/javascript'>
        //<![CDATA[
        shortcut = {all_shortcuts:{}, add:function(a, b, c){var d = {type:"keydown", propagate:!1, disable_in_input:!1, target:document, keycode:!1}; if (c)for (var e in d)"undefined" == typeof c[e] && (c[e] = d[e]); else c = d; d = c.target, "string" == typeof c.target && (d = document.getElementById(c.target)), a = a.toLowerCase(), e = function(d){d = d || window.event; if (c.disable_in_input){var e; d.target?e = d.target:d.srcElement && (e = d.srcElement), 3 == e.nodeType && (e = e.parentNode); if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName)return}d.keyCode?code = d.keyCode:d.which && (code = d.which), e = String.fromCharCode(code).toLowerCase(), 188 == code && (e = ","), 190 == code && (e = "."); var f = a.split("+"), g = 0, h = {"`":"~", 1:"!", 2:"@", 3:"#", 4:"$", 5:"%", 6:"^", 7:"&", 8:"*", 9:"(", 0:")", "-":"_", "=":"+", ";":":", "'":'"', ",":"<", ".":">", "/":"?", "\\":"|"}, i = {esc:27, escape:27, tab:9, space:32, "return":13, enter:13, backspace:8, scrolllock:145, scroll_lock:145, scroll:145, capslock:20, caps_lock:20, caps:20, numlock:144, num_lock:144, num:144, pause:19, "break":19, insert:45, home:36, "delete":46, end:35, pageup:33, page_up:33, pu:33, pagedown:34, page_down:34, pd:34, left:37, up:38, right:39, down:40, f1:112, f2:113, f3:114, f4:115, f5:116, f6:117, f7:118, f8:119, f9:120, f10:121, f11:122, f12:123}, j = !1, l = !1, m = !1, n = !1, o = !1, p = !1, q = !1, r = !1; d.ctrlKey && (n = !0), d.shiftKey && (l = !0), d.altKey && (p = !0), d.metaKey && (r = !0); for (var s = 0; k = f[s], s < f.length; s++)"ctrl" == k || "control" == k?(g++, m = !0):"shift" == k?(g++, j = !0):"alt" == k?(g++, o = !0):"meta" == k?(g++, q = !0):1 < k.length?i[k] == code && g++:c.keycode?c.keycode == code && g++:e == k?g++:h[e] && d.shiftKey && (e = h[e], e == k && g++); if (g == f.length && n == m && l == j && p == o && r == q && (b(d), !c.propagate))return d.cancelBubble = !0, d.returnValue = !1, d.stopPropagation && (d.stopPropagation(), d.preventDefault()), !1}, this.all_shortcuts[a] = {callback:e, target:d, event:c.type}, d.addEventListener?d.addEventListener(c.type, e, !1):d.attachEvent?d.attachEvent("on" + c.type, e):d["on" + c.type] = e}, remove:function(a){var a = a.toLowerCase(), b = this.all_shortcuts[a]; delete this.all_shortcuts[a]; if (b){var a = b.event, c = b.target, b = b.callback; c.detachEvent?c.detachEvent("on" + a, b):c.removeEventListener?c.removeEventListener(a, b, !1):c["on" + a] = !1}}}, shortcut.add("Ctrl+U", function(){top.location.href = "http://ficripebriyana.blogspot.com/p/jangan-nyuri.html"});
        //]]>
    </script>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php
                        include"config/koneksi.php";
                        $sukpd = $_SESSION['id_ukpd'];
                        $jab = mysql_query("select * from ukpd where id_ukpd='$sukpd'");
                        $j = mysql_fetch_array($jab);
                        $ukpd = $j['n_ukpd'];
                        ?><span>BPAD </span><strong><?php echo"$ukpd"; ?></strong></a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo"$_SESSION[namauser]_$_SESSION[nama]"; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="?module=pegawai&act=detail&id=<?php echo $_SESSION['namauser']; ?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
<?php if ($_SESSION['leveluser'] == '1') { ?>
                    <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                    <li class="parent ">
                        <a href="">
                            <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> DATA MASTER 
                        </a>
                        <ul class="children collapse" id="sub-item-2">

                            <li>
                                <a class="" href="?module=skpd">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA MASTER SKPD
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=ukpd">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA MASTER UKPD
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=user">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DAFTAR SKPD/UKPD
                                </a>
                            </li>
                    </li>
                </ul>

            <?php } ?>

<?php if ($_SESSION['leveluser'] == '9') { ?>
                <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>

                <li><a href="?module=unit&act=management1"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> VALIDASI </a></li>

            <?php } ?>

<?php if ($_SESSION['leveluser'] == '10') { ?>
                <li class="active"><a href="?module=dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                <li class="parent ">	
                    <a href="#">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Grafik Management 
                    </a>
                    <?php
                    $level = '2';
                    $tampil = mysql_query("select * from user_id where level_user LIKE '%$level%' ");
                    while ($dt = mysql_fetch_array($tampil)) {
                        ?>
                        <ul class="children collaps" id="sub-item-1">
                            <li>
                                <a class="" href="?module=grafik&id=<?php echo $dt['userid'] ?>">
                                    <svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> <?php echo $dt['id_bag']; ?>
                                </a>
                            </li>
    <?php } ?>

                    </ul>		
<?php } ?>
            </li>




<?php if ($_SESSION['leveluser'] == '3') { ?>
                <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                <li class="parent ">	
                    <a href="#">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Kendaraan  
                    </a>
                    <ul class="children collaps" id="sub-item-1">
                        <li>
                            <a class="" href="?module=skptahunan&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input SKP Tahunan
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=kinerja&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Utama
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=aktifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Tambahan
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=kreatifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Kreatifitas
                            </a>
                        </li>
                    </ul>
                </li>	
                <li><a href="?module=unit&act=detail&id_bag=<?php echo $_SESSION['id_bag']; ?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> VALIDASI </a></li>
            <?php } ?>

<?php if ($_SESSION['leveluser'] == '4') { ?>
                <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                <li class="parent ">
                    <a href="?module=pegawai">
                        <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> DATA PEGAWAI 
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li>
                            <a class="" href="?module=pegawai">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> LIST PEGAWAI
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=bagian">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-BAGIAN
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=jabatan">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-JABATAN
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=pendidikan">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-PENDIDIKAN
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=status">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-STATUS
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=rumpun">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA RUMPUN JABATAN
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=sanksi">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-SANKSI
                            </a>
                        </li>
                    </ul> 
                </li>
                <li class="parent ">	
                    <a href="#">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> E - KINERJA 
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a class="" href="?module=skp">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> LIST SKP
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=skptahunan&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input SKP Tahunan
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=kinerja&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Utama
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=aktifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Tambahan
                            </a>
                        </li>
                        <li>
                            <a class="" href="?module=kreatifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Kreatifitas
                            </a>
                        </li>
                    </ul>
                </li>

                <li><a href="?module=penyerapan"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-dashboard-dial"></use></svg>MASTER PENYERAPAN </a></li>
                <li><a href="?module=waktu_kerja"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"></use></svg>MASTER WAKTU KERJA </a></li>
                <li><a href="?module=unit&act=kepegawaian"><svg class="glyph stroked cliphboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> ABSENSI </a></li>		
                <li><a href="?module=sanksi&act=hukuman"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> HUKUMAN </a></li>
                <?php } ?>		



    <?php if ($_SESSION['leveluser'] == '5') { ?>
                    <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                    <li class="parent ">
                        <a href="?module=pegawai">
                            <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> DATA PEGAWAI 
                        </a>
                    <li class="parent ">	
                        <a href="#">
                            <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> E - KINERJA 
                        </a>
                        <ul class="children collaps" id="sub-item-1">
                            <li>
                                <a class="" href="?module=skptahunan&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input SKP Tahunan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kinerja&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Utama
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=aktifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Tambahan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kreatifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Kreatifitas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="?module=pelatihan"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-calendar"></use></svg> DIKLAT </a></li>
                <?php } ?>

    <?php if ($_SESSION['leveluser'] == '6') { ?>
                    <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                    <li class="parent ">	
                        <a href="#">
                            <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> E - KINERJA 
                        </a>
                        <ul class="children collaps" id="sub-item-1">
                            <li>
                                <a class="" href="?module=skptahunan&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input SKP Tahunan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kinerja&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Utama
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=aktifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Tambahan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kreatifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Kreatifitas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="?module=honor_shift"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>MASTER SHIFTING </a></li>												
                    <li><a href="?module=penyerapan"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-dashboard-dial"></use></svg>MASTER PENYERAPAN </a></li>
                    <li><a href="?module=waktu_kerja"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"></use></svg>MASTER WAKTU KERJA </a></li>
                    <li><a href="?module=pajak"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"></use></svg>MASTER PAJAK </a></li>
                    <li class="parent ">
                        <a href="#">
                            <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> LAPORAN 
                        </a>
                        <ul class="children collapse" id="sub-item-2">
                            <li>
                                <a class="" href="?module=laporan">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> GAJI KESELURUHAN
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=laporan&act=gaji">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> GAJI BRUTO
                                </a>
                            </li>
                        </ul>
                    </li>

    <?php } ?>


    <?php if ($_SESSION['leveluser'] == '7') { ?>
                    <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                    <li class="parent ">	
                        <a href="#">
                            <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Kendaraan 
                        </a>
                        <ul class="children collaps" id="sub-item-1">
                            <li>
                                <a class="" href="?module=skptahunan&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Rekap Kendaraan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kinerja&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Rekap Instansi
                                </a>
                            </li>
                            <!-----li>
                                <a class="" href="?module=aktifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Tambahan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kreatifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Kreatifitas
                                </a>
                            </li---->
                        </ul>	
                    </li>
                <?php } ?>

    <?php if ($_SESSION['leveluser'] == '8') { ?>
                    <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                    <li class="parent ">	
                        <a href="#">
                            <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> E - KINERJA  
                        </a>
                        <ul class="children collaps" id="sub-item-1">
                            <li>
                                <a class="" href="?module=skptahunan&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input SKP Tahunan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kinerja&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Utama
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=aktifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Aktifitas Tambahan
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kreatifitas&act=detail&nip=<?php echo $_SESSION['namauser']; ?>">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> Input Kreatifitas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="?module=unit&act=kasatpel&id_bag=<?php echo $_SESSION['id_bag']; ?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> VALIDASI </a></li>
                <?php } ?>

    <?php if ($_SESSION['leveluser'] == '11' OR $_SESSION['leveluser'] == '2') { ?>
                    <li class="active"><a href="?module=home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
                    <li class="parent ">
                        <a href="?module=pegawai">
                            <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> DATA PEGAWAI 
                        </a>
                        <ul class="children collapse" id="sub-item-2">
                            <li>
                                <a class="" href="?module=pegawai">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> LIST PEGAWAI
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=bagian">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-BAGIAN
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=jabatan">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-JABATAN
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=pendidikan">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-PENDIDIKAN
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=status">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-STATUS
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=rumpun">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA RUMPUN JABATAN
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=kasie">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> DATA M-KASIE
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?module=penyerapan"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-dashboard-dial"></use></svg>MASTER PENYERAPAN </a>
                    </li>
                    <li>
                        <a href="?module=waktu_kerja"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"></use></svg>MASTER WAKTU KERJA </a>
                    </li>
                    <li>
                        <a href="?module=unit&act=kepegawaian"><svg class="glyph stroked cliphboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> ABSENSI </a>
                    </li>
                    <li>
                        <a href="?module=laporan"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> REPORT </a>
                    </li>



                    <li class="parent ">
                        <a href="#">
                            <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> REPORT 
                        </a>
                        <ul class="children collapse" id="sub-item-3">
                            <li>
                                <a class="" href="?module=laporan">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> TUNJANGAN KINERJA
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=laporan&act=gaji">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> GAJI BRUTO
                                </a>
                            </li>
                            <li>
                                <a class="" href="?module=laporan&act=prestasi">
                                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-pencil"></use></svg> NILAI PRESTASI KERJA
                                </a>
                            </li>
                        </ul>
                    </li>

                    

                    <li>
                        <a href="?module=setting"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> SETTING </a>
                    </li>
                    <li>
                        <a href="?module=rekap"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> SETTING REKAP KINERJA </a>
                    </li>		
    <?php } ?>		
            </ul>

        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Icons</li>
                </ol>
            </div><!--/.row-->

            <div class="row">



                <div class="col-lg-12"> 
                    <h1 class="page-header"></h1>
                </div>
            </div><!--/.row-->

            <!--/.row-->

            <div class="row">



                <div class="col-lg-12"> 
                    <div class="panel panel-default"> 
                        <div class="panel-body"> 
                            <?php include"k.php"; ?>
                            <hr>
    <?php include"data.php"; ?>
                    </div>
                </div>
            </div>

            <!--/.col-->
        </div><!--/.row-->
    </div>	<!--/.main-->

    <script>
        $(function () {
        $('#hover, #striped, #condensed').click(function () {
        var classes = 'table';
        if ($('#hover').prop('checked')) {
        classes += ' table-hover';
        }
        if ($('#condensed').prop('checked')) {
        classes += ' table-condensed';
        }
        $('#table-style').bootstrapTable('destroy')
                .bootstrapTable({
                classes: classes,
                        striped: $('#striped').prop('checked')
                });
        });
        });
        function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        if (index % 2 === 0 && index / 2 < classes.length) {
        return {
        classes: classes[index / 2]
        };
        }
        return {};
        }
    </script>


    <script src="js/jquery-1.4.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script src="js/lumino.glyphs.js"></script>
    <script src="js/prmajax.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script>
                jQuery(function($){
                $("#tgl").mask("99/99/9999", {placeholder:"mm/dd/yyyy"});
                $("#npwp").mask("99-999-999-9-999-999");
                $("#jam").mask("99:99");
                $("#jam1").mask("99:99");
                });
                $('#calender').datepicker({
                autoclose:true, orientation:'top right',
                        'default': 'now'
                });
                !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                }(window.jQuery);
                $(window).on('resize', function () {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
                })
                        $(window).on('resize', function () {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
                })
    </script>
    <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
                $('.clockpicker').clockpicker()
                        .find('input').change(function(){
                console.log(this.value);
                });
                var input = $('#single-input').clockpicker({
                placement: 'bottom',
                        align: 'left',
                        autoclose: true,
                        'default': 'now'
                });
    </script>	
    <script src="js/jquery.js"></script>
    <script src="js/jquery.lock.min.js"></script>
    <script>
                $(document).ready(function() {
                $(".kunci").lock();
                });
    </script>


</body>

</html>
<?php
}
?>