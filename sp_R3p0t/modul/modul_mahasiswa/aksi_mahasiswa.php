<?php
include "../../conec/koneksi.php";
include "../../conec/function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus tulisan
if ($module=='mahasiswa' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_mhs WHERE npm='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?module='.$module);
}

// Input mahasiswa
elseif ($module=='mahasiswa' AND $act=='input'){
$kd_mahasiswa=$_POST['npm'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tmp_lhr'];
$tanggal_lahir = $_POST['tgl_lhr']; 
$jk=$_POST['jk_mhs'];
$telpon=$_POST['no_telpon'];
$konsentrasi = $_POST['konsentrasi'];
$alamat=$_POST['alamat'];


$data_tanggal_form = $tanggal_lahir; // DD/MM/YYYY
$data_tanggal_mysql = jin_date_sql($data_tanggal_form);

  mysql_query("INSERT INTO tb_mhs(npm,nama,tmp_lhr,tgl_lhr,jk_mhs,no_telpon,kd_konsentrasi,alamat) VALUES('$kd_mahasiswa','$nama','$tempat_lahir','$data_tanggal_form','$jk','$telpon','$konsentrasi','$alamat')");
  header('location:../../media.php?module='.$module);
}

// Update mahasiswa
elseif ($module=='mahasiswa' AND $act=='update'){
$kd_mahasiswa=$_POST['npm'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tmp_lhr'];
$tanggal_lahir = $_POST['tgl_lhr']; 
$jk=$_POST['jk_mhs'];
$telpon=$_POST['no_telpon'];
$konsentrasi=$_POST['konsentrasi'];
$alamat=$_POST['alamat'];

$data_tanggal_form = $tanggal_lahir; // DD/MM/YYYY
$data_tanggal_mysql = jin_date_sql($data_tanggal_form);

mysql_query("UPDATE tb_mhs SET npm='$kd_mahasiswa',nama='$nama',tmp_lhr='$tempat_lahir',tgl_lhr='$tanggal_lahir',jk_mhs='$jk',no_telpon='$telpon',kd_konsentrasi='$konsentrasi',alamat='$alamat' WHERE npm= '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
