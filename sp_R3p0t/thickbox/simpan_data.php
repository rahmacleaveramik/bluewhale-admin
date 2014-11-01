<?php
include "koneksi.php";
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl']; 
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$jurusan=$_POST['jurusan'];

if (empty($nim)){
	echo "<script>alert('Maaf NIM harus di isi!');history.back();</script>";
}elseif (empty($nama)){
	echo "<script>alert('Nama harus diisi');history.back();</script>";
}elseif (empty($tempat_lahir)){
	echo "<script>alert('Tempat lahir tidak boleh kosong');history.back();</script>";
}elseif (empty($alamat)){
	echo "<script>alert('Alamat tidak boleh kosong');history.back();</script>";
}elseif (empty($jurusan)){
	echo "<script>alert('Jurusan tidak boleh kosong');history.back();</script>";
}else
{
	
	$cekdata="select nim from tb_mahasiswa where nim='$nim'";

	$ada=mysql_query($cekdata) or die(mysql_error());

	if(mysql_num_rows($ada)>0)

	{ echo "<script>alert('NIM telah Terdaftar!');history.back();</script>"; }

	else

	{
		if (!empty($_FILES["photo"]["tmp_name"]))

		{

			$namafolder="photo/"; //tempat menyimpan file

			$jenis_gambar=$_FILES['photo']['type'];          

				$photo = $namafolder . basename($_FILES['photo']['name']);       

				if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) 

				{

				   {echo "<script>alert('Gambar gagal dikirim');history.back();</script>";}

				}

			} 

		mysql_query("insert into tb_mahasiswa(nim,nama,tempat_lahir,tanggal_lahir,alamat,photo,jenis_kelamin,id_jurusan) " . 

					"values('$nim','$nama','$tempat_lahir','$tanggal_lahir','$alamat','$photo','$jenis_kelamin','$jurusan')") or die(mysql_error());

header('location:media.php?page=laporan');

	} //end if terdaftar
}
?>
