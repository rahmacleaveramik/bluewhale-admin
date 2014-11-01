<?php
include "../../konfigurasi/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Input kategori
if ($page=='kategori' AND $act=='input'){
  mysql_query("INSERT INTO jurusan(nama_jurusan) VALUES('$_POST[nama_jurusan]')");
  header('location:../../media.php?page='.$page);
}

// Update kategori
elseif ($page=='jurusan' AND $act=='update'){
  mysql_query("UPDATE jurusan SET nama_jurusan='$_POST[nama_jurusan]'
               WHERE id_jurusan = '$_POST[id]'");
  header('location:../../media.php?page='.$page);
}
?>
