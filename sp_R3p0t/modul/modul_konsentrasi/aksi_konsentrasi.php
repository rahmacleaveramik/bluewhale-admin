<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../conec/koneksi.php";
$module=$_GET[module];
$act=$_GET[act];

// Hapus tulisan
if ($module=='konsentrasi' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_konsentrasi WHERE kd_konsentrasi='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?module='.$module);
}

// Input konsentrasi
if ($module=='konsentrasi' AND $act=='input'){
  mysql_query("INSERT INTO tb_konsentrasi(kd_konsentrasi,konsentrasi)VALUES('$_POST[kode]','$_POST[konsentrasi]')");
  header('location:../../media.php?module='.$module);
}

// Update konsentrasi
elseif ($module=='konsentrasi' AND $act=='update'){
  mysql_query("UPDATE tb_konsentrasi SET konsentrasi='$_POST[konsentrasi]'
               WHERE kd_konsentrasi = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
