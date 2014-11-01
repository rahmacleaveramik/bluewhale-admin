<?php
session_start();
include "../../konfigurasi/koneksi.php";
include "../../konfigurasi/function.php";

$page=$_GET[page];
$act=$_GET[act];

// Hapus tulisan
if ($page=='data' AND $act=='hapus'){
  mysql_query("DELETE FROM mhs WHERE nim='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?page='.$page);
}

elseif ($page=='data' AND $act=='deleteall'){
  $jumlah = count($_POST["item"]);
	for($i=0; $i < $jumlah; $i++) 
	{
		$nim=$_POST["item"][$i];	
		$myquery =  "delete from mhs where nim ='$nim' limit 1"; 
		$hapus = mysql_query($myquery) or die ("gagal menghapus"); 
	}  
  header('location:../../media.php?page='.$page);
}

// Input tulisan
elseif ($page=='data' AND $act=='input'){
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tgl']; 
$alamat=$_POST['alamat'];

$data_tanggal_form = $tanggal_lahir; // DD/MM/YYYY
$data_tanggal_mysql = jin_date_sql($data_tanggal_form);

if (empty($nim)){
	echo "<script>alert('Maaf NIM harus di isi!');history.back();</script>";
}elseif (empty($nama)){
	echo "<script>alert('Nama harus diisi');history.back();</script>";
}elseif (empty($tempat_lahir)){
	echo "<script>alert('Tempat lahir tidak boleh kosong');history.back();</script>";
}elseif (empty($alamat)){
	echo "<script>alert('Alamat tidak boleh kosong');history.back();</script>";
}else
{
	
	$cekdata="select nim from mhs where nim='$nim'";

	$ada=mysql_query($cekdata) or die(mysql_error());

	if(mysql_num_rows($ada)>0)

	{ echo "<script>alert('NIM telah Terdaftar!');history.back();</script>"; }

	else

	{
		mysql_query("insert into mhs(nim,nama,tmp_lhr,tgl_lhr,alamat) " . 

					"values('$nim','$nama','$tempat_lahir','$data_tanggal_mysql','$alamat')") or die(mysql_error());

  header('location:../../media.php?page='.$page);

	} //end if terdaftar
}

}

?>
