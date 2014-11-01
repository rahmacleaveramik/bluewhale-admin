<?php
//include "koneksi.php";
$id_kti=$_POST['id_kti'];
$nim=$_POST['nim'];
$judul=$_POST['judul'];
$pembimbing1=$_POST['pembimbing1'];
$pembimbing2=$_POST['pembimbing2'];
$abstrak=$_POST['abstrak'];

if (empty($nim))
{	
	die("Isikan NIM!");
} 
elseif(empty($judul))
{
	die("Isikan judul!");
}/*
elseif(empty($tanggal_lahir))
{
	die("Isikan Tanggal Lahir");
}
elseif(empty($alamat))
{
	die("Isikan Alamat");
}*/
else //bisa tambahkan pengecekan yang lain jika perlu
{
/*	//proses upload photo jika ada
	if (!empty($_FILES["photo"]["tmp_name"]))
	{
		$namafolder="photo/"; //tempat menyimpan file
		$jenis_gambar=$_FILES['photo']['type'];
		
		$photo = $namafolder . basename($_FILES['photo']['name']);       
			if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) 
			{
			   die("Gambar gagal dikirim");
			}
			//Hapus photo yang lama jika ada
			$res = mysql_query("select photo from mhs where nim='$nim' LIMIT 1");
			$d=mysql_fetch_object($res);
			if (strlen($d->photo)>3)
			{
				if (file_exists($d->photo)) unlink($d->photo);
			}					
			//update photo dengan yang baru
			mysql_query("UPDATE tb_mahasiswa SET photo='$photo' WHERE nim='$nim' LIMIT 1");
		
	} //end if cek file upload
*/	$myqry="UPDATE kti SET judul='$judul',nim='$nim',".
			"pembimbing1='$pembimbing1',pembimbing2='$pembimbing2' WHERE id_kti='$id_kti' LIMIT 1";
	mysql_query($myqry) or die(mysql_error());

	header('location:?page=kti');		
	exit;
}
?>