<?php
session_start();
include "../../konfigurasi/koneksi.php";

$page=$_GET['page'];
$act=$_GET['act'];

// Input user
if ($page=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
  mysql_query("INSERT INTO tb_xnxx(username,
                                 password,
                                 nama,
                                 level) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama]',
                                '$_POST[level]')");
  header('location:../../media.php?page='.$page);
}

// Update user
elseif ($page=='user' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE tb_xnxx SET nama   = '$_POST[nama]',
                                  level          = '$_POST[level]'  
                           WHERE  username     = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE tb_xnxx SET password        = '$pass',
                                 nama    = '$_POST[nama]',
                                 level           = '$_POST[level]'  
                           WHERE username      = '$_POST[id]'");
  }
  header('location:../../media.php?page='.$page);
}
?>
