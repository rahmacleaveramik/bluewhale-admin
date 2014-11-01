<script language="javascript">
function numbersonly(e){
   // deal with unicode character sets
   var unicode = e.charCode ? e.charCode : e.keyCode;

   // if the key is backspace, tab, or numeric
   if( unicode == 8 || unicode == 9 || ( unicode >= 48 && unicode <= 57 ) )
   {
      // we allow the key press
      return true;
   }
   else
   {
      // otherwise we don't
      return false;
   }
}
</script>
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/modul_mahasiswa/aksi_mahasiswa.php";
switch($_GET[act]){
  // Tampil User
  default:
echo "<div class='box round first fullpage'>
	  <h2>User</h2>
	  <div class='block'>";
    echo "<a href='?module=mahasiswa&act=tambahmahasiswa' class='btn-icon btn-blue btn-person'><span></span>Add Mahasiswa</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>NPM</th>
							<th>Nama Mahasiswa</th>
							<th>Tempat, Tgl. Lahir</th>
							<th>Jenis Kelamin</th>
							<th>No Telp/Hp</th>
							<th>Konsentrasi</th>
							<th>Alamat</th>
                            <th width='180'>Aksi</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM tb_mhs ORDER BY npm");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
		$tanggal=tgl_indo($r['tgl_lhr']);
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td>$r[npm]</td>
							<td>$r[nama]</td>
							<td>$r[tmp_lhr], $tanggal</td>
							<td>$r[jk_mhs]</td>
							<td>$r[no_telpon]</td>
							<td>$r[kd_konsentrasi]</td>
							<td>$r[alamat]</td>
                            <td class='center'><a href=?module=mahasiswa&act=editmahasiswa&id=$r[npm] class='btn btn-small btn-green' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?module=mahasiswa&act=hapus&id=$r[npm] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-small btn-maroon' title='Delete'><span></span>Delete</a></td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    break;
  
  case "tambahmahasiswa":
  echo "<div class='box round first fullpage'>
                <h2>
                    Input Data Mahasiswa</h2>
                <div class='block '>			
				<form method='post' action='$aksi?module=mahasiswa&act=input'>
						<table class='form'>
							<tr>
	                            <td>
	                                <label>
	                                    NPM</label></td>
	                            <td>
	                                <input type='text' name='npm' id='NPM' placeholder='ex. 2012041012' onkeypress='return numbersonly(event)' maxlength='10'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Nama Mahasiswa</label>
	                            </td>
	                            <td>
	                                <input type='text' name='nama' id='nama' class='mini' placeholder='Nama Mahasiswa' />
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Tempat, Tgl Lahir</label>
	                            </td>
	                            <td>
	                                <input type='text' name='tmp_lhr' id='TempatLahir'  placeholder='Tempat'/>
	                                <input type='date' name='tgl_lhr' id='TanggalLahir'/>
	                            </td>
                        	</tr>
							<tr>
							  <td><label> Jenis Kelasmin</label></td>
							  <td><input  type='radio' name='jk_mhs'  id='JK' value='L'/>
							    Laki-laki
							    <input  type='radio' name='jk_mhs'  id='JK' value='P'/>
							    Perempuan </td>
						  </tr>
							<tr>
							  <td><label>No. Telp/HP</label></td>
							  <td><input type='text' name='no_telpon' id='no_telpon' class='mini' placeholder='Nomor Telpon' onkeypress='return numbersonly(event)' maxlength='12'/></td>
						  </tr>
						  <tr>
	                            <td>
	                                <label>
	                                    Konsentrasi</label>
	                            </td>
	                            <td><select name='konsentrasi'>
								<option value='' selected>- Konsentrasi -</option>";
								$tampil=mysql_query("SELECT * FROM tb_konsentrasi ORDER BY konsentrasi");
								while($r=mysql_fetch_array($tampil)){
								  echo "<option value='$r[kd_konsentrasi]'>$r[konsentrasi]</option>";
								}
	                            echo "</select>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Alamat</label>
	                            </td>
	                            <td>
	                                <textarea name='alamat' id='alamat' class='tinymce'></textarea>
	                            </td>
                        	</tr>
						</table>
						
				<input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
					</form>
                </div>
            </div>
        <div class='clear'>";
  break;
    
  case "editmahasiswa":
  $edit=mysql_query("SELECT * FROM tb_mhs WHERE npm='$_GET[id]'");
  $r=mysql_fetch_array($edit);
	
  $data_tanggal_db = $r['tgl_lhr']; // YYYY-MM-DD
  $data_tanggal_tampil = jin_date_str($data_tanggal_db); // hasilnya: 23/02/2009 = DD/MM/YYYY
  echo "<div class='box round first fullpage'>
                <h2>
                    Input Data Mahasiswa</h2>
                <div class='block '>			
				<form method='post' action='$aksi?module=mahasiswa&act=update'>
				<input type=hidden name=id value='$r[npm]'>
						<table class='form'>
							<tr>
	                            <td>
	                                <label>
	                                    NPM</label></td>
	                            <td>
	                                <input type='text' name='npm' id='NPM' placeholder='NPM' value='$r[npm]' onkeypress='return numbersonly(event)' maxlength='10'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Nama Mahasiswa</label>
	                            </td>
	                            <td>
	                                <input type='text' name='nama' id='nama' class='mini' placeholder='Nama Mahasiswa' value='$r[nama]'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Tempat, Tgl Lahir</label>
	                            </td>
	                            <td>
	                                <input type='text' name='tmp_lhr' id='TempatLahir'  placeholder='Tempat Lahir' value='$r[tmp_lhr]'/>
	                                <input type='text' name='tgl_lhr' id='TanggalLahir' class='datepicker' placeholder='Tanggal Lahir' value='$data_tanggal_tampil'/>
	                            </td>
                        	</tr>
							<tr>
							  <td><label>Jenis Kelasmin</label></td>
							  <td>";
							  if($r['jk_mhs']=='L'){
								echo "<input  type='radio' name='jk_mhs'  id='JK' value='L' checked> Laki-laki
							    <input  type='radio' name='jk_mhs'  id='JK' value='P'> Perempuan";
							  }else{
							  	echo "<input  type='radio' name='jk_mhs'  id='JK' value='L'> Laki-laki
							    <input  type='radio' name='jk_mhs'  id='JK' value='P' checked> Perempuan";
							  }
							  echo "</td>
						  </tr>
							<tr>
							  <td><label>No. Telp/HP</label></td>
							  <td><input type='text' name='no_telpon' id='no_telpon' class='mini' placeholder='Nomor Telpon' value='$r[no_telpon]' onkeypress='return numbersonly(event)' maxlength='12'/></td>
						  </tr>
						  <tr>
	                            <td>
	                                <label>
	                                    Konsentrasi</label>
	                            </td>
	                            <td><select name='konsentrasi'>";
								$tampil=mysql_query("SELECT * FROM tb_konsentrasi ORDER BY konsentrasi");
								while($k=mysql_fetch_array($tampil)){
									if($r['konsentrasi']==$k['konsentrasi']){
										echo "<option value='$k[konsentrasi]' selected>$k[konsentrasi]</option>";
									}else{
										echo "<option value='$k[konsentrasi]'>$k[konsentrasi]</option>";
									}
								}
	                            echo "</select</td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Alamat</label>
	                            </td>
	                            <td>
	                                <textarea name='alamat' id='alamat' class='tinymce'>$r[alamat]</textarea>
	                            </td>
                        	</tr>
						</table>
						
				<input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
					</form>
                </div>
            </div>
        <div class='clear'>";
    break;  
	}
}
?>
