<?php
session_start();
include "../../konfigurasi/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Hapus tulisan
if ($page=='kti' AND $act=='hapus'){
  mysql_query("DELETE FROM kti WHERE id_kti='$_GET[id]'");
//  unlink("photo/$_GET[namafile]");  
  header('location:../../media.php?page='.$page);
}

elseif ($page=='kti' AND $act=='deleteall'){
  $jumlah = count($_POST["item"]);
	for($i=0; $i < $jumlah; $i++) 
	{
		$id_kti=$_POST["item"][$i];	
		if (strlen($d->photo)>3)
		{
			if (file_exists($d->photo)) unlink($d->photo);
		}
		$myquery =  "delete from kti where id_kti ='$id_kti' limit 1"; 
		$hapus = mysql_query($myquery) or die ("gagal menghapus"); 
	}  
  header('location:../../media.php?page='.$page);
}

// Input tulisan
elseif ($page=='kti' AND $act=='input'){
$nim=$_POST['nim'];
$judul=$_POST['judul'];
$pembimbing1=$_POST['pembimbing1'];
$abstrak=$_POST['abstrak'];
$pembimbing2=$_POST['pembimbing2'];

if (empty($judul)){
	echo "<script>alert('Judul harus diisi');history.back();</script>";
}elseif (empty($nim)){
	echo "<script>alert('NIM tidak boleh kosong');history.back();</script>";
}/*elseif (empty($alamat)){
	echo "<script>alert('Alamat tidak boleh kosong');history.back();</script>";
}elseif (empty($jurusan)){
	echo "<script>alert('Jurusan tidak boleh kosong');history.back();</script>";
}*/else
{
	
	$cekkti="select nim from kti where nim='$nim'";

	$ada=mysql_query($cekkti) or die(mysql_error());

	if(mysql_num_rows($ada)>0)

	{ echo "<script>alert('NIM telah Terdaftar!');history.back();</script>"; }

	else

	{
		mysql_query("insert into kti(id_kti,nim,judul,pembimbing1,pembimbing2,abstrak) " . 

					"values('$id_kti','$nim','$judul','$pembimbing1','$pembimbing2','$abstrak')") or die(mysql_error());

  header('location:../../media.php?page='.$page);

	} //end if terdaftar
}

}

?>
