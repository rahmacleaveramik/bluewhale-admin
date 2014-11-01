<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/modul_files/aksi_files.php";
switch($_GET[act]){
  // Tampil Download
  default:
echo "<div class='box round first fullpage'>
	  <h2>Daftar File Tugas Akhir</h2>
	  <div class='block'>";
    echo "<a href='?module=files&act=tambahfiles' class='btn-icon btn-blue btn-star'><span></span>Add File Tugas Akhir</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>NPM</th>
							<th>Nama Mahasiswa</th>
							<th>Judul Tugas Akhir</th>
							<th>BAB</th>
							<th>Files</th>
							<th>Status</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM
						tb_files
						Inner Join tb_tugasakhir
						Inner Join tb_mhs
						WHERE
						tb_mhs.npm =  tb_tugasakhir.npm AND
						tb_tugasakhir.npm =  tb_files.npm");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
//		$tanggal=tgl_indo($r['tgl_lhr_pem']);
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td><a href=?module=files&act=editfiles&id=$r[npm] title='Edit'>$r[npm]</a></td>
							<td>$r[nama]</td>
							<td>$r[judul]</td>
							<td>$r[bab]</td>
							<td>$r[files]</td>
							<td>$r[status]</td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";    
    break;
  
  case "tambahfiles":
echo "<div class='box round first fullpage'>
	  <h2>Daftar File Tugas Akhir</h2>
	  <div class='block'>
	  <form method='post' action='$aksi?module=files&act=input' enctype='multipart/form-data' onsubmit='return true;'>
	  <label><b>NPM</b></label> : <input name='npm' id='todong' type='text' class='medium' placeholder=' Isikan nomor induk atau judul tugas akhir' onkeypress='return numbersonly(event)' maxlength='10'/>
    <br><br>
	<table class='data display datatable' id='example'>
	  <thead>
	  <tr>
		<th>No</th>
		<th>Nama File</th>
		<th>File</th>
		<th>Status</th>
	  </tr></thead>";
	  $n=5;
	  for($i=0;$i<$n;$i++){
		  $angka=$i+1;
	  echo "<tr>
		<td>$angka</td>
		<td><input type='text' name='bab$i' value='BAB $angka' size='10' readonly></td>
		<td><input type='file' name='fupload[]' size=50></td>
		<td><select name='status$i'>";
		if($i==0){
		echo "<option value='free' selected>Free</option>
			<option value='premium'>Premium</option>";
		}else{
		echo "<option value='free'>Free</option>
			<option value='premium' selected>Premium</option>";
		}
		echo "</select> </td></tr>";
	  }
	echo "</table>
	<input type='hidden' name='jum' value='$n'>
	<input type=submit value=Simpan class='btn btn-blue'>
	<input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
	</form>
                </div>
            </div>
        <div class='clear'>";
     break;
    
  case "editfiles":
    $edit = mysql_query("SELECT * FROM tb_files WHERE npm='$_GET[id]'");
//    $r    = mysql_fetch_array($edit);

    echo "<div class='box round first fullpage'>
	  <h2>Update File Tugas Akhir</h2>
	  <div class='block'>
	  <form method='post' action='$aksi?module=files&act=update' enctype='multipart/form-data' onsubmit='return true;'>
	<table class='data display datatable' id='example'>
	  <thead>
	  <tr>
		<th>No</th>
		<th>NPM</th>
		<th>Nama File</th>
		<th>File</th>
		<th>Status</th>
	  </tr></thead>";
    $i=1;
	while ($r=mysql_fetch_array($edit)){
		  //$angka = $i+1;
	  echo "<tr>
		<td>$i</td>
		<td>$r[npm]<input type='hidden' name='npm' maxlength='10' value='$r[npm]'></td>
		<td>$r[bab]<input type='hidden' name='bab$i' value='$r[bab]' size='10' readonly></td>
		<td><input type='file' name='fupload[]' size=50 value='$r[files]'>$r[files]</td>
		<td><select name='status$i'>";
		if($r['status']=='free'){
			echo "<option value='free' selected>Free</option>
				  <option value='premium'>Premium</option>";
		}else{
			echo "<option value='free'>Free</option>
	 		      <option value='premium' selected>Premium</option>";
		}
		echo "</select></td></tr>";
		$i++;
	  }
	  $jumFile=$i-1;
	echo "</table>
	<input type='hidden' name='n' value='$jumFile'>
	<input type=submit value=Update class='btn btn-blue'>
	<input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
	</form>
                </div>
            </div>
        <div class='clear'>";
    break;  
}
}
?>
