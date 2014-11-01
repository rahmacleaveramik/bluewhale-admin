<?php
	include("koneksi.php");
?>
<html>
<head>
<title>Laporan Data Mahasiswa</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<h2 align="center">Data Mahasiswa</h2>
<form action="?page=laporan&txtcari=1" method="post">
  Cari NIM/Nama 
    <input name="txtcari" type="text" id="txtcari" size="20" maxlength="30" value="">
  <input type="submit" name="Submit" value="Cari">
</form>
<form name="FLaporan" method="post" action="deleteall.php" onSubmit="return confirm('Hapus data terpilih?')">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" id="tabelwarna">
  <tr align="center">
    <th scope='col' align="center">&nbsp;</td>
    <th scope='col'>NIM</td>
    <th scope='col'>Nama</td>
    <th scope='col'>Tempat Lahir</td>
    <th scope='col' align="center">Tanggal Lahir</td>
    <th scope='col' align="center">Jenis Kelamin</td>
    <th scope='col'>Alamat</td>
    <th scope='col'>Jurusan</td>
	<th scope='col' align="center">Photo</td>
    <th scope='col' align="center">Koreksi</td>
    <th scope='col' align="center">Hapus</td>
  </tr>
<?php

	if(isset($_GET['txtcari']))
	{
		$myquery="select t.nim, t.nama, t.tempat_lahir, DATE_FORMAT( t.tanggal_lahir, '%d-%m-%Y' ) AS tanggal_lahir, t.jenis_kelamin, t.alamat, t.photo, j.nama_jurusan FROM tb_mahasiswa AS t LEFT JOIN jurusan AS j ON t.id_jurusan = j.id_jurusan where t.nim LIKE '%$_GET[txtcari]%' or t.nama LIKE '%$_GET[txtcari]%'";
	}
	else
	{
		$myquery="select t.nim, t.nama, t.tempat_lahir, DATE_FORMAT( t.tanggal_lahir, '%d-%m-%Y' ) AS tanggal_lahir, t.jenis_kelamin, t.alamat, t.photo, j.nama_jurusan FROM tb_mahasiswa AS t LEFT JOIN jurusan AS j ON t.id_jurusan = j.id_jurusan";
	}	
	$daftarsiswa=mysql_query($myquery) or die (mysql_error());
	while($dataku=mysql_fetch_object($daftarsiswa))
	{
?>
  <tr class="alt">
    <td align="center">
     <input type="checkbox" name="item[]" id="item[]" value="<?php echo $dataku->nim?>" /></td>
    <td><?php echo  $dataku->nim?></td>
    <td><?php echo  $dataku->nama?></td>
    <td><?php echo  $dataku->tempat_lahir?></td>
    <td align="center"><?php echo  $dataku->tanggal_lahir?></td>
    <td align="center"><?php echo  $dataku->jenis_kelamin?></td>
    <td><?php echo  $dataku->alamat?></td>
    <td><?php echo  $dataku->nama_jurusan?></td>
	<td align="center"><img src="<?php echo  $dataku->photo?>" alt="<?php echo  $dataku->nama?>" width="50" /></td>
    <td align="center"><a href="?page=edit&nim=<?php echo  $dataku->nim?>">Koreksi</a></td>
    <td align="center"><a href="?page=delete&nim=<?php echo  $dataku->nim?>">Hapus</a></td>
  </tr>
<?php
	}
?>
</table>
    <input name="btnHapus" type="submit" value="Delete">
  <p align="center"><a href="media.php">Menu Utama
  </a></p>
</form>
</body>
</html>