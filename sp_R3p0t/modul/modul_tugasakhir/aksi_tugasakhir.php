<?php
include "../../conec/koneksi.php";
include "../../conec/function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus tulisan
if ($module=='tugasakhir' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_tugasakhir WHERE npm='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?module='.$module);
}

// Input tugasakhir
elseif ($module=='tugasakhir' AND $act=='input'){
	$npm=$_POST['npm'];
	$judul=$_POST['judul'];
	$nip=$_POST['nip'];
	$tahun= $_POST['thn_lulus']; 
	$abstrak=$_POST['abstrak'];
	$jenis=$_POST['jenis_ta'];
	
	$cek = mysql_query("SELECT * FROM tb_tugasakhir");
	$r	 = mysql_fetch_array($cek);
	
	if($npm==$r['npm']){
		$error[]='NPM ini sudah ada di database';
	}
	if (trim($npm)==""){
	  	$error[] = 'NPM harus diisi';
	}
	if (trim($judul)==""){
  		$error[] = 'Judul harus diisi';
	}
	if (trim($nip)==""){
	  	$error[] = 'Pembimbing harus diisi';
	}
	if (trim($tahun)==""){
  		$error[] = 'Tahun Lulus harus diisi';
	}
	if (trim($abstrak)==""){
  	$error[] = 'Abstraksi harus diisi';
	}
	if (trim($jenis)==""){
  	$error[] = 'Jenis TA harus diisi';
	}
	if ($error) {
		$salah=implode('\n',$error);
		echo "<script>alert('$salah');history.back();</script>";
	}else{
		mysql_query("INSERT INTO tb_tugasakhir(nip,npm,kd_jenis,username,judul,thn_lulus,abstraksi) VALUES('$nip','$npm','$jenis','$_SESSION[username]','$judul','$tahun','$abstrak')");
		  header('location:../../media.php?module='.$module);
	}
}

// Update tugasakhir
elseif ($module=='tugasakhir' AND $act=='update'){
$npm=$_POST['npm'];
$judul=$_POST['judul'];
$nip=$_POST['nip'];
$tahun= $_POST['thn_lulus']; 
$abstrak=$_POST['abstrak'];
$jenis=$_POST['jenis_ta'];

mysql_query("UPDATE tb_tugasakhir SET nip='$nip',npm='$npm',judul='$judul',thn_lulus='$tahun',abstraksi='$abstrak',kd_jenis='$jenis' WHERE npm='$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
