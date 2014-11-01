<?  
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<center><color=white>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></color></center>";
}else{
$aksi="modul/modul_kti/aksi_data.php";
switch($_GET[act]){
  // Tampil Berita
  default:
	echo" <form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=page value=kti>
          <b>Masukkan NIM / Judul KTI : </b><input type=text name='kata' class='success1'>&nbsp;&nbsp; <input type=submit value=Cari class='btn btn-blue'>
          </form>";
    if (empty($_GET['kata'])){
	echo "<form name='FLaporan' method='post' action='$aksi?page=kti&act=deleteall' onSubmit=\"return confirm('Hapus kti terpilih?')\">";
	echo "<br><a href=?page=kti&act=tambahkti class='btn-mini btn-black btn-plus' title='Tambah Data KTI'><span></span>Tambah KTI</a>";
    echo "<table width='100%' align='center' cellpadding='3' cellspacing='0' id='tabelwarna'>
		  <tr align='center'>
			<th scope='col' align='center'>&nbsp;</td>
			<th scope='col'>Nama</td>
			<th scope='col'>Judul</td>
			<th scope='col'>Pembimbing 1</td>
			<th scope='col'>Pembimbing 2</td>
			<th scope='col' align='center'>Aksi</td>
		  </tr>";
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("select t.id_kti, t.nim, t.judul, t.pembimbing1, t.pembimbing2 FROM kti AS t ORDER BY t.id_kti DESC LIMIT $posisi,$batas");
    $no=$posisi+1;
	while($ktiku=mysql_fetch_object($tampil)){
//      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr class=alt>
			<td align=center>
			 <input type='checkbox' name='item[]' id='item[]' value='$ktiku->id_kti' /></td>
			<td>$ktiku->nim</td>
			<td>$ktiku->judul</td>
			<td>$ktiku->pembimbing1</td>
			<td>$ktiku->pembimbing2</td>
		            <td align='center' width='85'><a href=?page=kti&act=editkti&id_kti=$ktiku->id_kti class='btn-mini btn-black btn-check' title='Edit'><span></span>>Edit</a> 
		                <a href=$aksi?page=kti&act=hapus&id=$ktiku->id_kti onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn-mini btn-black btn-cross' title='Delete'><span></span>Delete</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kti"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman</div><br>
		 <input name='btnHapus' type='submit' value='Delete Selected' class='btn btn-purple'>
	</form>";
    break;    
    }
    else{
	echo "<form name='FLaporan' method='post' action='$aksi?page=kti&act=deleteall' onSubmit=\"return confirm('Hapus kti terpilih?')\">";
	echo "<br><a href=?page=kti&act=tambahkti class='btn-mini btn-black btn-plus' title='Tambah Data KTI'><span></span>Tambah KTI</a>";
    echo "<table width='100%' align='center' cellpadding='3' cellspacing='0' id='tabelwarna'>
		  <tr align='center'>
			<th scope='col' align='center'>&nbsp;</td>
			<th scope='col'>Nama</td>
			<th scope='col'>Judul</td>
			<th scope='col'>Pembimbing 1</td>
			<th scope='col'>Pembimbing 2</td>
			<th scope='col' align='center'>Aksi</td>
		  </tr>";
	$p      = new Paging9;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
      $tampil=mysql_query("select t.id_kti, t.nim, t.judul, t.pembimbing1, t.pembimbing2 FROM kti AS t where t.nim LIKE '%$_GET[kata]%' or t.judul LIKE '%$_GET[kata]%' ORDER BY id_kti DESC LIMIT $posisi,$batas");
	$no=$posisi+1;
	while($ktiku=mysql_fetch_object($tampil)){
//      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr class=alt>
			<td align=center>
			 <input type='checkbox' name='item[]' id='item[]' value='$ktiku->id_kti' /></td>
			<td>$ktiku->nim</td>
			<td>$ktiku->judul</td>
			<td>$ktiku->pembimbing1</td>
			<td>$ktiku->pembimbing2</td>
		            <td align='center' width='85'><a href=?page=kti&act=editkti&id_kti=$ktiku->id_kti class='btn-mini btn-black btn-check' title='Edit'><span></span>Edit</a> 
		                <a href=\"$aksi?page=kti&act=hapus&id=$ktiku->id_kti onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn-mini btn-black btn-cross' title='Delete'><span></span>Delete</a></td>
		        </tr>";
    }
    echo "</table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kti WHERE judul LIKE '%$_GET[kata]%' OR nim LIKE '%$_GET[kata]%'"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman</div><br>
	<input name='btnHapus' type='submit' value='Delete Selected' class='btn btn-purple'>
	</form>";
    break;    
    }
case "tambahkti":
?>
<form action="<? echo "$aksi?page=kti&act=input";?>" method="post" name="FMHS">
  <table class="form">
          <tr>
            <td><label>NIM</label></td>
            
            <td><input name="nim" type="text" id="grumble" size="15" maxlength="15"></td>
          </tr>
          <tr>
            <td><label>Judul</label></td>
            
            <td><textarea name="judul" class="tinymce"></textarea></td>
          </tr>
          <tr>
            <td><label>Pembimbing 1</label></td>
            
            <td><input name="pembimbing1" type="text" id="pembimbing1" size="30" maxlength="30" class="mini"></td>
          </tr>
          <tr>
            <td><label>Pembimbing 2</label></td>
            
            <td><input name="pembimbing2" type="text" id="pembimbing2" size="30" maxlength="30" class="mini"></td>
          </tr>
          <tr>
            <td><label>Abstrak</label></td>
            
            <td><textarea name="abstrak" cols="30" rows="5" id="abstrak" class="tinymce"></textarea></td>
          </tr>
  </table>
  <input name="ok" type="submit" id="fok" value="Simpan" class='btn btn-blue'>
  <input name="fulang" type="reset" id="fulang" value="Ulangi" class="btn btn-orange">
  <input name="fulang2" type="button" id="fulang2" value="Batal" onClick="javascript:history.back()" class="btn btn-red">
</form>
<?  break;
	case "editkti":
	$kti=$_GET['id_kti'];
	$qrykoreksi=mysql_query("select * from kti where id_kti='$kti'");
	$ktiku=mysql_fetch_object($qrykoreksi);
?>
<form action="?page=updatekti" method="post" name="FKoreksi">
<input type="hidden" name="id_kti" value="<? echo $ktiku->id_kti;?>" />
  <table class="form">
          <tr>
            <td><label>NIM</label></td>
            
            <td><input name="nim" type="text" id="nim" class="mini" size="15" maxlength="15" value="<?php echo $ktiku->nim?>" readonly></td>
          </tr>
          <tr>
            <td><label>Judul</label></td>
            
            <td><textarea name="judul" class="tinymce"><?php echo $ktiku->judul?></textarea></td>
          </tr>
          <tr>
            <td><label>Pembimbing 1</label></td>
            
            <td><input name="pembimbing1" type="text" id="pembimbing1" class="mini" size="30" maxlength="30" value="<?php echo $ktiku->pembimbing1?>"></td>
          </tr>
          <tr>
            <td><label>Pembimbing 2</label></td>
            
            <td><input name="pembimbing2" type="text" id="pembimbing2" class="mini" size="30" maxlength="30" value="<?php echo $ktiku->pembimbing2?>"></td>
          </tr>          
          <tr>
            <td><label>Abstrak</label></td>
            
            <td><textarea name="abstrak" class="tinymce"><?php echo $ktiku->abstrak?></textarea></td>
          </tr>
  </table>
  <input name="ok" type="submit" id="fok" value="Simpan" class='btn btn-blue'>
  <input name="fulang" type="reset" id="fulang" value="Ulangi" class="btn btn-orange">
  <input name="fulang2" type="button" id="fulang2" value="Batal" onClick="javascript:history.back()" class="btn btn-red">
</form>
<?
break;
}
}
?>
