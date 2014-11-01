<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
echo "<div class='box round first fullpage'>
	  <h2>User</h2>
	  <div class='block'>";
    echo "<a href='?module=user&act=tambahuser' class='btn-icon btn-blue btn-person'><span></span>Add User</a><br>
                    <table class='data display datatable' id='example'>
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Level</th>
                            <th width='180'>Aksi</th>
						</tr>
					</thead><tbody>"; 
	$tampil=mysql_query("SELECT * FROM tb_user ORDER BY username");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
       echo "<tr class='odd gradeX'>
							<td>$no</td>
							<td>$r[username]</td>
							<td>$r[nama]</td>
							<td class='center'><a href=mailto:$r[email]>$r[email]</a></td>
							<td class='center'>$r[level]</td>
                            <td class='center'><a href=?module=user&act=edituser&id=$r[id_session] class='btn btn-small btn-green' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?module=user&act=hapus&id=$r[id_session] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn-small btn-maroon' title='Delete'><span></span>Delete</a></td>
						</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    break;
  
  case "tambahuser":
  echo "<div class='box round first fullpage'>
                <h2>
                    Form User</h2>
                <div class='block '>
                    <form method=POST action='$aksi?module=user&act=input'>
                    <table class='form'>
                        <tr>
                            <td class='col1'>Username</td>
                            <td class='col2'>
                                <input type='text' id='username' name='username' />
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type='text' name='password'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <input type='text' name='nama_lengkap'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type='text' name='email'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <input type='radio' name='level' value='admin' />
                                Administrator
                                <input type='radio' name='level' value='direktur'/>
                                Direktur
								<input type='radio' name='level' value='kaprodi'/>
								Kaprodi
                            </td>
                        </tr>
                    </table>
                    <input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
                    </form>
                </div>
            </div>";
  break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM tb_user WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "<div class='box round first fullpage'>
                <h2>
                    Edit User</h2>
                <div class='block '>
                    <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
                    <table class='form'>
                        <tr>
                            <td class='col1'>Username</td>
                            <td class='col2'>
                                <input type='text' id='username' name='username' value='$r[username]' disabled /> **)
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type='text' name='password'/> *)
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <input type='text' name='nama_lengkap' value='$r[nama]'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type='text' name='email' value='$r[email]'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>";
											if ($r['level']=='admin'){
											echo "<input type='radio' name='level' value='admin' checked/>
                                                    Administrator
                                                    <input type='radio' name='level' value='direktur'/>
                                                    Direktur
													<input type='radio' name='level' value='kaprodi'/>
                                                    Kaprodi";
											}else{
												echo "<input type='radio' name='level' value='admin'/>
                                                    Administrator
                                                    <input type='radio' name='level' value='direktur' checked/>
                                                    Direktur
													<input type='radio' name='level' value='kaprodi' checked/>
                                                    Kaprodi";
											}
                        echo "</td>
                        </tr>
                        <tr><td scope='col' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
                    </table>
                    <input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
                    </form>
                </div>
            </div>";     
    }
    else{
    echo "<div class='box round first fullpage'>
                <h2>
                    Edit User</h2>
                <div class='block '>
                    <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
                    <table class='form'>
                        <tr>
                            <td class='col1'>Username</td>
                            <td class='col2'>
                                <input type='text' id='username' name='username' value='$r[username]' disabled /> **)
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type='text' name='password'/> *)
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <input type='text' name='nama_lengkap' value='$r[nama]'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type='text' name='email' value='$r[email]'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>";
											if ($r['level']=='admin'){
											echo "<input type='radio' name='level' value='admin' checked/>
                                                    Administrator
                                                    <input type='radio' name='level' value='direktur'/>
                                                    Direktur
													<input type='radio' name='level' value='kaprodi'/>
                                                    Kaprodi";
											}else{
												echo "<input type='radio' name='level' value='admin'/>
                                                    Administrator
                                                    <input type='radio' name='level' value='direktur' checked/>
                                                    Direktur
													<input type='radio' name='level' value='Kaprodi'/>
                                                    Kaprodi";
											}
                        echo "</td>
                        </tr>
                        <tr><td scope='col' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
                    </table>
                    <input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
                    </form>
                </div>
            </div>";     
    }
    break;  
	
	case "obeuser":
    $edit=mysql_query("SELECT * FROM tb_user where id_session='$_SESSION[id_session]'");
    $r=mysql_fetch_array($edit);
	
	echo "<div class='box round first fullpage'>
                <h2>
                    Edit Akun</h2>
                <div class='block '>
				$r[username]
				<p>$r[nama]</p>
				</div><div";
/*
    echo "<div class='box round first fullpage'>
                <h2>
                    Edit Akun</h2>
                <div class='block '>
                    <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
                    <table class='form'>
                        <tr>
                            <td class='col1'>Username</td>
                            <td class='col2'>
                                <input type='text' id='username' name='username' value='$r[username]' disabled /> **)
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type='text' name='password'/> *)
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <input type='text' name='nama_lengkap' value='$r[nama]'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type='text' name='email' value='$r[email]'/>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>";
											if ($r['level']=='admin'){
											echo "<input type='radio' name='level' value='admin' checked/>
                                                    Administrator
                                                    <input type='radio' name='level' value='direktur'/>
                                                    Direktur
													<input type='radio' name='level' value='kaprodi'/>
                                                    Kaprodi";
											}else{
												echo "<input type='radio' name='level' value='admin'/>
                                                    Administrator
                                                    <input type='radio' name='level' value='direktur' checked/>
                                                    Direktur
													<input type='radio' name='level' value='kaprodi'/>
                                                    Kaprodi";
											}
                        echo "</td>
                        </tr>
                        <tr><td scope='col' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
                    </table>
                    <input type=submit value=Simpan class='btn btn-blue'>
                            <input type=button value=Batal class='btn btn-red' onclick=self.history.back()>
                    </form>
                </div>
            </div>";     */
    break;
}
}
?>
