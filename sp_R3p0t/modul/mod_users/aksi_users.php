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
// Hapus member
if ($module=='user' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_user WHERE id_session='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
// Input user
elseif ($module=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
 // $level=$_POST[level];
  
//  $cek=mysql_query("SELECT * FROM tb_user where level=$level");
//  $r=mysql_fetch_array($cek);

  if ($_POST['level']=='direktur'){
//  	$error[] = 'Level ini sudah ada';
	echo "<script>alert('Maaf Direktur Tidak bisa duplicate');history.back();</script>";
	}else{
  mysql_query("INSERT INTO tb_user(username,
                                 password,
                                 nama,
                                 email, 
                                 level,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[level]',
                                '$pass')");
  header('location:../../media.php?module='.$module);
	}
}
// Update user
elseif ($module=='user' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE tb_user SET nama         = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  level          = '$_POST[level]'  
                           WHERE  id_session     = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE tb_user SET password    = '$pass',
                                 nama           = '$_POST[nama_lengkap]',
                                 email          = '$_POST[email]',  
                                 level          = '$_POST[level]'  
                           WHERE id_session     = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
