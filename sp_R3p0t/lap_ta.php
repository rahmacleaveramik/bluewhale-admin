<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN DATA TUGAS AKHIR</title>
<link rel="stylesheet" href="css/print.css" type="text/css"  />
</head>
<style>
@media print {
input.noPrint { display: none; }
}
</style>
<body class="body">
<div id="wrapper">
<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
$tampil=mysql_query("select * from tb_tugasakhir Inner Join tb_mhs
										Inner Join tb_pembimbing
										Inner Join tb_jenis ,
										tb_konsentrasi
										WHERE
										tb_tugasakhir.npm =  tb_mhs.npm AND
										tb_tugasakhir.nip =  tb_pembimbing.nip AND
										tb_tugasakhir.kd_jenis =  tb_jenis.kd_jenis AND
										tb_mhs.kd_konsentrasi =  tb_konsentrasi.kd_konsentrasi ORDER BY tb_tugasakhir.thn_lulus");
	echo "<h2 class='head'>LAPORAN DATA TUGAS AKHIR</h2>
	<table class='tabel'>
	<thead>
  <tr>
	<td>No</td>
    <td>NPM</td>
	<td>Nama </td>
    <td>Judul</td>
	<td>Konsentrasi</td>
  </tr>
  </thead>";
  $no=1;
  function jk($var){
	if($var=="P"){
		echo "Perempuan";
	}else {
		echo "Laki-Laki";
	}
  }
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
	<td>$no</td>
    <td>$dt[npm]</td>
    <td>$dt[nama]</td>
    <td>$dt[judul]</td>
	<td>$dt[konsentrasi]</td>
	
  </tr>";
  $no++;
  }
echo "  
</table>

	";
	?>
	<div style="text-align:center;padding:20px;">
	<input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
	</div>
</div>
</body>
</html>
