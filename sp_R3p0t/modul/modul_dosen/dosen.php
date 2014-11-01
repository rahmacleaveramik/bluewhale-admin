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

$aksi="modul/modul_dosen/aksi_dosen.php";
switch($_GET[act]){
  // Tampil User
  default:
echo "<div class='box round first fullpage'>
	  <h2>User</h2>
	  <div class='block'>";
    echo "<a href='?module=dosen&act=tambahdosen' class='btn-icon btn-blue btn-person'><span></span>Add Dosen</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>Nama Dosen</th>
							<th>Tempat, Tgl. Lahir</th>
							<th>Jenis Kelamin</th>
							<th>No. Telp</th>
							<th>Alamat</th>
                            <th width='180'>Aksi</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM tb_pembimbing ORDER BY nama_pem");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
		$tanggal=tgl_indo($r['tgl_lhr_pem']);
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td>$r[nip]</td>
							<td>$r[nama_pem]</td>
							<td>$r[tmpt_lhr_pem], $tanggal</td>
							<td>$r[jk]</td>
							<td>$r[no_telp_pem]</td>
							<td>$r[alamat_pem]</td>
                            <td class='center'><a href=?module=dosen&act=editdosen&id=$r[nip] class='btn btn-small btn-green' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?module=dosen&act=hapus&id=$r[nip] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-small btn-maroon' title='Delete'><span></span>Delete</a></td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    break;
  
  case "tambahdosen":
  echo "<div class='box round first fullpage'>
                <h2>
                    Input Data Dosen</h2>
                <div class='block '>			
				<form method='post' action='$aksi?module=dosen&act=input'>
						<table class='form'>
							<tr>
	                            <td>
	                                <label>
	                                    NIDN</label>
	                            / NIP</td>
	                            <td>
	                                <input type='text' name='nip' id='NIDN' placeholder='NIDN / NIP' maxlength='12'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Nama Dosen</label>
	                            </td>
	                            <td>
	                                <input type='text' name='nama_pem' id='nama_pem' class='mini' placeholder='Nama Dosen' />
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Tempat, Tgl Lahir</label>
	                            </td>
	                            <td>
	                                <input type='text' name='tmpt_lhr_pem' id='TempatLahir'  placeholder='Tempat'/>
	                                <input type='date' name='tgl_lhr_pem' id='TanggalLahir'/>
	                            </td>
                        	</tr>
							<tr>
							  <td><label> Jenis Kelasmin</label></td>
							  <td><input  type='radio' name='jk'  id='JK' value='L'/>
							    Laki-laki
							    <input  type='radio' name='jk'  id='JK' value='P'/>
							    Perempuan </td>
						  </tr>
							<tr>
							  <td><label>No. Telp/HP</label></td>
							  <td><input type='text' name='no_telp_pem' id='no_telp_pem' class='mini' placeholder='Nomor Telpon' /></td>
						  </tr>
							<tr>
	                            <td>
	                                <label>
	                                    Alamat</label>
	                            </td>
	                            <td>
	                                <textarea name='alamat_pem' id='alamat_pem' class='tinymce'></textarea>
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
    
  case "editdosen":
  $edit=mysql_query("SELECT * FROM tb_pembimbing WHERE nip='$_GET[id]'");
  $r=mysql_fetch_array($edit);
	
  $data_tanggal_db = $r['tgl_lhr_pem']; // YYYY-MM-DD
  $data_tanggal_tampil = jin_date_str($data_tanggal_db); // hasilnya: 23/02/2009 = DD/MM/YYYY
  echo "<div class='box round first fullpage'>
                <h2>
                    Input Data Dosen</h2>
                <div class='block '>			
				<form method='post' action='$aksi?module=dosen&act=update'>
				<input type=hidden name=id value='$r[nip]'>
						<table class='form'>
							<tr>
	                            <td>
	                                <label>
	                                    NIDN
	                            / NIP</label></td>
	                            <td>
	                                <input type='text' name='nip' id='NIDN' placeholder='NIDN / NIP' value='$r[nip]' maxlength='12'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Nama Dosen</label>
	                            </td>
	                            <td>
	                                <input type='text' name='nama_pem' id='nama_pem' class='mini' placeholder='Nama Dosen' value='$r[nama_pem]' maxlength='30'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Tempat, Tgl Lahir</label>
	                            </td>
	                            <td>
	                                <input type='text' name='tmpt_lhr_pem' id='TempatLahir'  placeholder='Tempat' value='$r[tmpt_lhr_pem]'/>
	                                <input type='text' name='tgl_lhr_pem' id='TanggalLahir' class='datepicker' placeholder='Tanggal Lahir' value='$data_tanggal_tampil'/>
	                            </td>
                        	</tr>
							<tr>
							  <td><label>Jenis Kelasmin</label></td>
							  <td>";
							  if($r['jk']=='L'){
								echo "<input  type='radio' name='jk'  id='JK' value='L' checked> Laki-laki
							    <input  type='radio' name='jk'  id='JK' value='P'> Perempuan";
							  }else{
							  	echo "<input  type='radio' name='jk'  id='JK' value='L'> Laki-laki
							    <input  type='radio' name='jk'  id='JK' value='P' checked> Perempuan";
							  }
							  echo "</td>
						  </tr>
							<tr>
							  <td><label>No. Telp/HP</label></td>
							  <td><input type='text' name='no_telp_pem' id='no_telp_pem' class='mini' placeholder='Nomor Telpon' value='$r[no_telp_pem]' onkeypress='return numbersonly(event)' maxlength='12'/></td>
						  </tr>
							<tr>
	                            <td>
	                                <label>
	                                    Alamat</label>
	                            </td>
	                            <td>
	                                <textarea name='alamat_pem' id='alamat_pem' class='tinymce'>$r[alamat_pem]</textarea>
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
