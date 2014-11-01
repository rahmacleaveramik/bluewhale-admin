<?php
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tgl']; 
$alamat=$_POST['alamat'];

$data_tanggal_form = $tanggal_lahir; // DD/MM/YYYY
$data_tanggal_mysql = jin_date_sql($data_tanggal_form);

if (empty($nim))
{	
	die("Isikan NIM!");
} 
elseif(empty($nama))
{
	die("Isikan Nama!");
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
*/	$myqry="UPDATE mhs SET nama='$nama',tmp_lhr='$tempat_lahir',".
			"tgl_lhr='$data_tanggal_mysql',alamat='$alamat' WHERE nim='$nim' LIMIT 1";
	mysql_query($myqry) or die(mysql_error());

	header('location:?page=data');		
	exit;
}
?>