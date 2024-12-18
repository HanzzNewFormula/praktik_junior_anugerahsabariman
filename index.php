<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
    if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser]))
    {
?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                <title>BPAD DKI Jakarta</title>
                <link rel="stylesheet" type="text/css" href="style_login.css" />

                <link rel="shortcut icon" href="images/logo.png" />

                <script type="text/javascript">
                    function validasi(form) {
                        if (form.username.value == "") {
                            alert("Anda belum mengisikan Username");
                            form.username.focus();
                            return (false);
                        }

                        if (form.password.value == "") {
                            alert("Anda belum mengisikan Password");
                            form.password.focus();
                            return (false);
                        }
                        return (true);
                    }
                </script>

            </head>

           
                
                   <marquee><font size ="4">SELAMAT DATANG DI APLIKASI PENGELOLAAN KENDARAAN DINAS PROVINSI DKI JAKARTA</font></marquee>
               
           

            <body OnLoad="document.login.username.focus();">
                <div id="main">

                    <!-- Header -->
                    <div id="header"><img src="images/images_login/logo_2.png" width="50" height="40" align="left"/><img src="images/images_login/logo_1.png" width="50" height="50" align="right"/> .:: LOGIN USER ::.</div>

                    <!-- Middle -->
                    <div id="middle">
                        <form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">

                            <img src="images/images_login/img_login_user.png" align="absmiddle" class="img_user" />
                            <input type="text" name="username" size="29" id="input" />
                            <br />

                            <img src="images/images_login/img_login_pass.png" align="absmiddle" class="img_pass" />
                            <input type="password" name="password" size="29" id="input" />
                            <br />

                            <input name="Submit" type="image" value="Submit" src="images/images_login/button_login3.png" id="submit" align="absmiddle" />
                        </form>
                        silahkan login menggunakan NIP dan password * 
        				</div>

                    <!-- don't Change ;) -->
                    <div class="clear"></div>

                    <!-- Footer -->
                    <div id="footer">Copyright &copy; 2024 by Anugerah Sabariman</div>

                    <!-- vertical_effect -->
                    <div id="vertical_effect">&nbsp;</div>

                </div>
            </body>
        </html>
<?php 
    }else{
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
?>