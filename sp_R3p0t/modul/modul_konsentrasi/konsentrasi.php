<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/modul_konsentrasi/aksi_konsentrasi.php";
switch($_GET[act]){
  // Tampil konsentrasi
  default:
echo "<div class='box round first fullpage'>
	  <h2>Data Konsentrasi</h2>
	  <div class='block'>"; 
    echo "<a href='?module=konsentrasi&act=tambahkonsentrasi' class='btn-icon btn-blue btn-star'><span></span>Add Konsentrasi</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Konsentrasi</th>
							<th>Nama Konsentrasi</th>
                            <th width='180'>Aksi</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM tb_konsentrasi ORDER BY kd_konsentrasi ASC");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td>$r[kd_konsentrasi]</td>
							<td>$r[konsentrasi]</td>
                            <td class='center'><a href=?module=konsentrasi&act=editkonsentrasi&id=$r[kd_konsentrasi] class='btn btn-small btn-green' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?module=konsentrasi&act=hapus&id=$r[kd_konsentrasi] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-small btn-maroon' title='Delete'><span></span>Delete</a></td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    break;
  
  // Form Tambah konsentrasi
  case "tambahkonsentrasi":
	$query = "select max(kd_konsentrasi) as maxKode from tb_konsentrasi";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kd_tunjangan = $data['maxKode'];
	$nourut = (int) substr($kd_tunjangan,2,3);
	$nourut ++;
	$char = "K";
	$newid = $char.sprintf("%03s",$nourut); 
    echo "<div class='box round first fullpage'>
	  <h2>Input Konsentrasi</h2>
	  <div class='block'>
          <form method=POST action='$aksi?module=konsentrasi&act=input'>
          <table class='form'>
		  <tr><td><label>Kode Konsentrasi</label></td><td> <input type=text name='kode' value='$newid' readonly size=5></td></tr>
          <tr><td><label>Nama Konsentrasi</label></td><td> <input type=text name='konsentrasi' placeholder='Nama Konsentrasi'></td></tr>
          </table>
		  				<input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()></form>
	   </div></div>";
     break;
  
  // Form Edit konsentrasi  
  case "editkonsentrasi":
    $edit=mysql_query("SELECT * FROM tb_konsentrasi WHERE kd_konsentrasi='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$kat = $r['kd_konsentrasi'];

    echo "<div class='box round first fullpage'>
	  <h2>Edit Konsentrasi</h2>
	  <div class='block'>
          <form method=POST action='$aksi?module=konsentrasi&act=update'>
		  <input type=hidden name=id value='$kat'>
          <table class='form'>
		  <tr><td><label>Kode Konsentrasi</label></td><td> <input type=text name='kode' value='$kat' readonly size=5></td></tr>
          <tr><td><label>Nama Konsentrasi</label></td><td> <input type=text name='konsentrasi' placeholder='Nama Konsentrasi' value='$r[konsentrasi]'></td></tr>
          </table>
		  				<input type=submit value=Update class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()></form>
	   </div></div>";
    break;  
}
}
?>
