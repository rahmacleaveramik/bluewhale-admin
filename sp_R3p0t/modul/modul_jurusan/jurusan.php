<?php
$aksi="modul/modul_jurusan/aksi_jurusan.php";
switch($_GET[act]){
  // Tampil jurusan
  default:
    echo "<input type=button value='Tambah Jurusan' 
          onclick=\"window.location.href='?page=jurusan&act=tambahjurusan';\"><br><br>
          <table width=100% align='center' cellpadding=3 cellspacing=0 id='tabelwarna'>
          <tr><th width=20>no</th><th>nama jurusan</th><th width=100>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM jurusan ORDER BY id_jurusan DESC");
    $no=1;
    while ($r=mysql_fetch_object($tampil)){
		$kat = $r->id_jurusan;
       echo "<tr><td>$no</td>
             <td>$r->nama_jurusan</td>
             <td align=center><a href=?page=jurusan&act=editjurusan&id=$kat>Edit</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    echo "<div id=paging>*) Data pada jurusan tidak bisa dihapus</div><br>";
    break;
  
  // Form Tambah jurusan
  case "tambahjurusan":
    echo "<h2>Tambah Jurusan</h2>
          <form method=POST action='$aksi?page=jurusan&act=input'>
          <table>
          <tr><td>Nama jurusan</td><td> : <input type=text name='nama_jurusan'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit jurusan  
  case "editjurusan":
    $edit=mysql_query("SELECT * FROM jurusan WHERE id_jurusan='$_GET[id]'");
    $r=mysql_fetch_object($edit);
	$kat = $r->id_jurusan;

    echo "<form method=POST action='$aksi?page=jurusan&act=update'>
          <input type=hidden name=id value='$kat'>
          <table>
          <tr><td>Nama jurusan</td><td> : <input type=text name='nama_jurusan' value='$r->nama_jurusan'></td></tr>";
    echo "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
