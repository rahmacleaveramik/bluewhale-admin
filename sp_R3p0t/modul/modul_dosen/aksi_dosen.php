<?php
include "../../conec/koneksi.php";
include "../../conec/function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus tulisan
if ($module=='dosen' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_pembimbing WHERE nip='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?module='.$module);
}

// Input dosen
elseif ($module=='dosen' AND $act=='input'){
$kd_dosen=$_POST['nip'];
$nama=$_POST['nama_pem'];
$tempat_lahir=$_POST['tmpt_lhr_pem'];
$tanggal_lahir = $_POST['tgl_lhr_pem']; 
$jk=$_POST['jk'];
$telpon=$_POST['no_telp_pem'];
$alamat=$_POST['alamat_pem'];


$data_tanggal_form = $tanggal_lahir; // DD/MM/YYYY
$data_tanggal_mysql = jin_date_sql($data_tanggal_form);

  mysql_query("INSERT INTO tb_pembimbing(nip,nama_pem,tmpt_lhr_pem,tgl_lhr_pem,jk,no_telp_pem,alamat_pem) VALUES('$kd_dosen','$nama','$tempat_lahir','$data_tanggal_form','$jk','$telpon','$alamat')");
  header('location:../../media.php?module='.$module);
}

// Update dosen
elseif ($module=='dosen' AND $act=='update'){
$kd_dosen=$_POST['nip'];
$nama=$_POST['nama_pem'];
$tempat_lahir=$_POST['tmpt_lhr_pem'];
$tanggal_lahir = $_POST['tgl_lhr_pem'];
$jk=$_POST['jk'];
$telpon=$_POST['no_telp_pem']; 
$alamat=$_POST['alamat_pem'];

$data_tanggal_form = $tanggal_lahir; // DD/MM/YYYY
$data_tanggal_mysql = jin_date_sql($data_tanggal_form);

mysql_query("UPDATE tb_pembimbing SET nip='$kd_dosen',nama_pem='$nama',tmpt_lhr_pem='$tempat_lahir',tgl_lhr_pem='$data_tanggal_form',alamat_pem='$alamat',no_telp_pem='$telpon',jk='$jk' WHERE nip= '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
