<?php
	include "koneksi.php";
	$nim = $_GET['nim'];
	$res = mysql_query("select photo from tb_mahasiswa where nim='".$_GET['nim']."' LIMIT 1");
	$d=mysql_fetch_object($res);
	if (strlen($d->photo)>3)
	{
		if (file_exists($d->photo)) unlink($d->photo);
	}
	
	$myquery =  "delete from tb_mahasiswa where nim ='$nim' limit 1"; 
	$hapus = mysql_query($myquery) or die ("gagal menghapus"); 
	header ("location:?page=laporan");
 ?>