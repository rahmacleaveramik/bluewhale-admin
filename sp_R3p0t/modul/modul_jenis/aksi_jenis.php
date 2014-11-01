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
if ($module=='jenis' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_jenis WHERE kd_jenis='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?module='.$module);
}

// Input kategori
if ($module=='jenis' AND $act=='input'){
  mysql_query("INSERT INTO tb_jenis(kd_jenis,jenis_ta)VALUES('$_POST[kode]','$_POST[jenis]')");
  header('location:../../media.php?module='.$module);
}

// Update kategori
elseif ($module=='jenis' AND $act=='update'){
  mysql_query("UPDATE tb_jenis SET jenis_ta='$_POST[jenis]'
               WHERE kd_jenis = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
