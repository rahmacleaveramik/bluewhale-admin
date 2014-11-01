<?php

include "koneksi.php";

$jumlah = count($_POST["item"]);

for($i=0; $i < $jumlah; $i++) 

{

    $nim=$_POST["item"][$i];
	
	if (strlen($d->photo)>3)

	{

		if (file_exists($d->photo)) unlink($d->photo);

	}

	$myquery =  "delete from tb_mahasiswa where nim ='$nim' limit 1"; 

	$hapus = mysql_query($myquery) or die ("gagal menghapus"); 

}

header ("location:?page=laporan");

 ?>