<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script>
var tod=new Date();
var weekday=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
var monthname=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
var y = tod.getFullYear();
var m = tod.getMonth();
var d = tod.getDate();
var dow = tod.getDay();
var dispTime = " " + weekday[dow] + ", " + d + " " + monthname[m] + " " + y + " ";
if (dow==0) dispTime= "<font color=red>" + dispTime + "</font>"; else if (dow==5) dispTime= "<font color=green>" + dispTime + "</font>";
else dispTime= "<font color=black>" + dispTime + "</font>";
document.write(dispTime);
</script>  
</body>
</html>
