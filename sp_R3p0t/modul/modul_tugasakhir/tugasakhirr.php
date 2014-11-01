<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/modul_tugasakhir/aksi_tugasakhir.php";
switch($_GET[act]){
  // Tampil User
  default:
echo "<div class='box round first fullpage'>
	  <h2>Daftar Tugas Akhir</h2>
	  <div class='block'>";
    echo "<a href='?module=tugasakhir&act=tambahtugasakhir' class='btn-icon btn-blue btn-star'><span></span>Add Tugas Akhir</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>NPM</th>
							<th>Nama Mahasiswa</th>
							<th>Judul Tugas Akhir</th>
							<th>Konsentrasi</th>
							<th>Jenis TA</th>
							<th>Tahun Lulus</th>
							<th>Pembimbing</th>
                            <th width='180'>Aksi</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM	tb_tugasakhir Inner Join tb_mhs
										Inner Join tb_pembimbing
										Inner Join tb_jenis ,
										tb_konsentrasi
										WHERE
										tb_tugasakhir.npm =  tb_mhs.npm AND
										tb_tugasakhir.nip =  tb_pembimbing.nip AND
										tb_tugasakhir.kd_jenis =  tb_jenis.kd_jenis AND
										tb_mhs.kd_konsentrasi =  tb_konsentrasi.kd_konsentrasi ORDER BY tb_tugasakhir.thn_lulus DESC");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
		$tanggal=tgl_indo($r['tgl_lhr_pem']);
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td>$r[npm]</td>
							<td>$r[nama]</td>
							<td>$r[judul]</td>
							<td>$r[konsentrasi]</td>
							<td>$r[jenis_ta]</td>
							<td>$r[thn_lulus]</td>
							<td>$r[nama_pem]</td>
                            <td class='center'><a href=?module=tugasakhir&act=edittugasakhir&id=$r[npm] class='btn btn-small btn-green' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?module=tugasakhir&act=hapus&id=$r[npm] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-small btn-maroon' title='Delete'><span></span>Delete</a></td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    break;
  
  case "tambahtugasakhir":  
  echo "<div class='box round first fullpage'>
                <h2>
                    Add Tugas Akhir</h2>
                <div class='block '>			
				<form method='post' action='$aksi?module=tugasakhir&act=input' onSubmit='return true;'>
						<table class='form'>
							<tr>
	                            <td>
	                                <label>
	                                    NPM</label></td>
	                            <td>
	                                <input type='text' name='npm' id='zipsearch' placeholder='Masukkan NPM' onkeypress='return numbersonly(event)' maxlength='10'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Judul</label>
	                            </td>
	                            <td>
	                                <input type='text' name='judul' id='judul' class='medium' placeholder='Judul Tugas Akhir'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Pembimbing</label>
	                            </td>
	                            <td><select name='nip'>
								<option value=''>- Pembimbing -</option>";
								$tampil=mysql_query("SELECT * FROM tb_pembimbing ORDER BY nip");
								while($k=mysql_fetch_array($tampil)){
										echo "<option value='$k[nip]'>$k[nama_pem]</option>";
								}
	                            echo "</select</td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Jenis Tugas Akhir</label>
	                            </td>
	                            <td><select name='jenis'><option value=''>- Jenis TA -</option>";
								$tampil=mysql_query("SELECT * FROM tb_jenis ORDER BY kd_jenis");
								while($r=mysql_fetch_array($tampil)){
										echo "<option value='$r[kd_jenis]'>$r[jenis_ta]</option>";
								}
	                            echo "</select</td>
                        	</tr>
							<tr>
							  <td><label>Tahun Lulus</label></td>
							  <td><select name='thn_lulus'><option value=''>- Tahun -</option>";
							   		$akhir=date("Y");
									  for ($i=$akhir-4; $i<=$akhir; $i++){
											echo "<option value=$i>$i</option>";
									}
						  echo "</select></td>
						  </tr>
							<tr>
	                            <td>
	                                <label>
	                                    Abstrak</label>
	                            </td>
	                            <td>
	                                <textarea name='abstrak' id='abstrak' class='tinymce'></textarea>
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
    
  case "edittugasakhir":
  $edit=mysql_query("SELECT * FROM tb_tugasakhir WHERE npm='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<div class='box round first fullpage'>
                <h2>
                    Update Tugas Akhir</h2>
                <div class='block '>			
				<form method='post' action='$aksi?module=tugasakhir&act=edit'>
				<input type=hidden name=id value='$r[npm]'>
						<table class='form'>
							<tr>
	                            <td>
	                                <label>
	                                    NPM</label></td>
	                            <td>
	                                <input type='text' name='npm' id='NPM' placeholder='NIDN / NIP' value='$r[npm]' readonly/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Judul</label>
	                            </td>
	                            <td>
	                                <input type='text' name='judul' id='judul' class='medium' placeholder='Judul Tugas Akhir' value='$r[judul]'/>
	                            </td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Pembimbing</label>
	                            </td>
	                            <td><select name='nip'>";
								$tampil=mysql_query("SELECT * FROM tb_pembimbing ORDER BY nip");
								while($k=mysql_fetch_array($tampil)){
									if($r['kd_pembimbing']==$k['kd_pembimbing']){
										echo "<option value='$k[nip]' selected>$k[nama_pem]</option>";
									}else{
										echo "<option value='$k[nip]'>$k[nama_pem]</option>";
									}
								}
	                            echo "</select</td>
                        	</tr>
							<tr>
	                            <td>
	                                <label>
	                                    Jenis Tugas Akhir</label>
	                            </td>
	                            <td><select name='jenis'>";
								$tampil=mysql_query("SELECT * FROM tb_jenis ORDER BY kd_jenis");
								while($q=mysql_fetch_array($tampil)){
									if($r['kd_jenis']==$q['kd_jenis']){
										echo "<option value='$q[kd_jenis]' selected>$q[jenis_ta]</option>";
									}else{
										echo "<option value='$q[kd_jenis]'>$q[jenis_ta]</option>";
									}
								}
	                            echo "</select</td>
                        	</tr>
							<tr>
							  <td><label>Tahun Lulus</label></td>
							  <td><select name='thn_lulus'>";
							   		$akhir=date("Y");
									  for ($i=$akhir-4; $i<=$akhir; $i++){
										  if($r['thn_lulus']==$i){
										  	echo "<option value=$i selected>$i</option>";
										  }else{
											echo "<option value=$i>$i</option>";
										  }
									}
						  echo "</select></td>
						  </tr>
							<tr>
	                            <td>
	                                <label>
	                                    Abstrak</label>
	                            </td>
	                            <td>
	                                <textarea name='abstrak' id='abstrak' class='tinymce'>$r[abstraksi]</textarea>
	                            </td>
                        	</tr>
						</table>
						
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
 