<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/modul_jenis/aksi_jenis.php";
switch($_GET[act]){
  // Tampil jenis
  default:
echo "<div class='box round first fullpage'>
	  <h2>Jenis Tugas Akhir</h2>
	  <div class='block'>"; 
    echo "<a href='?module=jenis&act=tambahjenis' class='btn-icon btn-blue btn-heart'><span></span>Add Jenis TA</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Jenis TA</th>
							<th>Jenis Tugas Akhir</th>
                            <th width='180'>Aksi</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM tb_jenis ORDER BY kd_jenis ASC");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td>$r[kd_jenis]</td>
							<td>$r[jenis_ta]</td>
                            <td class='center'><a href=?module=jenis&act=editjenis&id=$r[kd_jenis] class='btn btn-small btn-green' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?module=jenis&act=hapus&id=$r[kd_jenis] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-small btn-maroon' title='Delete'><span></span>Delete</a></td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    break;
  
  // Form Tambah jenis
  case "tambahjenis":
	$query = "select max(kd_jenis) as maxKode from tb_jenis";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kd_tunjangan = $data['maxKode'];
	$nourut = (int) substr($kd_tunjangan,2,3);
	$nourut ++;
	$char = "J";
	$newid = $char.sprintf("%03s",$nourut); 
    echo "<div class='box round first fullpage'>
	  <h2>Input Jenis Tugas Akhir</h2>
	  <div class='block'>
          <form method=POST action='$aksi?module=jenis&act=input'>
          <table class='form'>
		  <tr><td><label>Kode Jenis Tugas Akhir</label></td><td> <input type=text name='kode' value='$newid' readonly size=5></td></tr>
          <tr><td><label>Jenis Tugas Akhir</label></td><td> <input type=text name='jenis' class='mini' placeholder='Nama Jenis Tugas Akhir'></td></tr>
          </table>
		  				<input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()></form>
	   </div></div>";
     break;
  
  // Form Edit jenis  
  case "editjenis":
    $edit=mysql_query("SELECT * FROM tb_jenis WHERE kd_jenis='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$kat = $r['kd_jenis'];

    echo "<div class='box round first fullpage'>
	  <h2>Edit Konsentrasi</h2>
	  <div class='block'>
          <form method=POST action='$aksi?module=jenis&act=update'>
		  <input type=hidden name=id value='$kat'>
          <table class='form'>
		  <tr><td><label>Kode Jenis Tugas Akhir</label></td><td> <input type=text name='kode' value='$kat' readonly size=5></td></tr>
          <tr><td><label>Jenis Tugas Akhir</label></td><td> <input type=text name='jenis' placeholder='Jenis Tugas Akhir' class='mini' value='$r[jenis]'></td></tr>
          </table>
		  				<input type=submit value=Update class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()></form>
	   </div></div>";
    break;  
}
}
?>
