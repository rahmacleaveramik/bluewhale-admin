<?php
  $aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
  	$edit=mysql_query("SELECT * FROM tb_xnxx WHERE username='$_SESSION[username]'");
    $r=mysql_fetch_object($edit);
	$user = $r->username;
    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?page=user&act=update>
          <input type=hidden name=id value='$user'>
          <table class='form'>
          <tr><td class='col1'><label>Username</labe></td>     <td class='col2'> : <input type=text name='username' value='$r->username' disabled class='error'> **)</td></tr>
          <tr><td><label>Password</label></td>     <td> : <input type=text name='password' class='success'> *) </td></tr>
          <tr><td><label>Nama Lengkap</label></td> <td> : <input type=text name='nama' size=30  value='$r->nama' class='error'></td></tr>
          <tr><td><label>Level</label></td>       <td> : <input type=text name='level' size=30 value='$r->level' Readonly class='error'> **)</td></tr>";    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td colspan=2></td></tr>
          </table>
		  <input type=submit value=Update class='btn btn-blue'>
          <input type=button value=Batal onclick=self.history.back() class='btn btn-red'>
		  </form>";     
    
    break;  
}

?>
