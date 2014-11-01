<?  
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<center><color=white>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></color></center>";
}else{
$aksi="modul/modul_dosen/aksi_dosen.php";
switch($_GET[act]){
  // Tampil Berita
  default:
	echo" <form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=dosen>
          <b>Masukkan Kode / Nama Dosen : </b><input type=text name='kata' class='success1'> &nbsp;&nbsp<input type=submit value=Cari class='btn btn-blue'>
          </form>";
    if (empty($_GET['kata'])){
	echo "<form name='FLaporan' method='post' action='$aksi?module=dosen&act=deleteall' onSubmit=\"return confirm('Hapus dosen terpilih?')\">";
	echo "<br><a href=?module=dosen&act=tambahdosen class='btn-mini btn-black btn-plus' title='Tambah Data'><span></span>Tambah Dosen</a>";
    echo "<table width='100%' align='center' cellpadding='3' cellspacing='0' id='tabelwarna'>
		  <tr align='center'>
			<th scope='col' align='center'>&nbsp;</td>
			<th scope='col'>Kode Dosen</td>
			<th scope='col'>Nama</td>
			<th scope='col'>Tempat Lahir</td>
			<th scope='col' align='center'>Tanggal Lahir</td>
			<th scope='col'>Alamat</td>
			<th scope='col' align='center'>Aksi</td>
		  </tr>";
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("select t.kd_dosen, t.nama_dosen, t.tmp_lhr_dsn, DATE_FORMAT( t.tgl_lhr_dsn, '%d-%m-%Y' ) AS tanggal_lahir, t.alamat_dsn FROM dosen AS t LIMIT $posisi,$batas");
    $no=$posisi+1;
	while($dosenku=mysql_fetch_object($tampil)){
//      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr class=alt>
			<td align=center>
			 <input type='checkbox' name='item[]' id='item[]' value='$dosenku->kd_dosen' /></td>
			<td>$dosenku->kd_dosen</td>
			<td>$dosenku->nama_dosen</td>
			<td>$dosenku->tmp_lhr_dsn</td>
			<td align='center'>$dosenku->tanggal_lahir</td>
			<td>$dosenku->alamat_dsn</td>
		            <td align='center' width='85'><a href=?module=dosen&act=editdosen&kd_dosen=$dosenku->kd_dosen class='btn-mini btn-black btn-check' title='Edit'><span></span>Edit</a>&nbsp;
		                <a href=$aksi?module=dosen&act=hapus&id=$dosenku->kd_dosen onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn-mini btn-black btn-cross' title='Delete'><span></span>Delete</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM dosen"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman</div><br>
		 <input name='btnHapus' type='submit' value='Delete Selected' class='btn btn-purple'>
	</form>";
    break;    
    }
    else{
	echo "<form name='FLaporan' method='post' action='$aksi?module=dosen&act=deleteall' onSubmit=\"return confirm('Hapus dosen terpilih?')\">";
	echo "<br><a href=?module=dosen&act=tambahdosen class='btn-mini btn-black btn-plus' title='Tambah Data'><span></span>Tambah Dosen</a>";
    echo "<table width='100%' align='center' cellpadding='3' cellspacing='0' id='tabelwarna'>
		  <tr align='center'>
			<th scope='col' align='center'>&nbsp;</td>
			<th scope='col'>Kode</td>
			<th scope='col'>Nama</td>
			<th scope='col'>Tempat Lahir</td>
			<th scope='col' align='center'>Tanggal Lahir</td>
			<th scope='col'>Alamat</td>
			<th scope='col' align='center'>Aksi</td>
		  </tr>";
	$p      = new Paging9;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
      $tampil=mysql_query("select t.kd_dosen, t.nama_dosen, t.tmp_lhr_dsn, DATE_FORMAT( t.tgl_lhr_dsn, '%d-%m-%Y' ) AS tanggal_lahir, t.alamat_dsn FROM dosen AS t where t.kd_dosen LIKE '%$_GET[kata]%' or t.nama_dosen LIKE '%$_GET[kata]%' ORDER BY kd_dosen DESC LIMIT $posisi,$batas");
	$no=$posisi+1;
	while($dosenku=mysql_fetch_object($tampil)){
//      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr class=alt>
			<td align=center>
			 <input type='checkbox' name='item[]' id='item[]' value='$dosenku->kd_dosen' /></td>
			<td>$dosenku->kd_dosen</td>
			<td>$dosenku->nama_dsn</td>
			<td>$dosenku->tempat_lahir_dsn</td>
			<td align='center'>$dosenku->tanggal_lahir</td>
			<td>$dosenku->alamat_dsn</td>
		            <td align='center' width='85'><a href=?module=dosen&act=editdosen&kd_dosen=$dosenku->kd_dosen class='btn-mini btn-black btn-check' title='Edit'><span></span>Edit</a>&nbsp;
		                <a href=\"$aksi?module=dosen&act=hapus&id=$dosenku->kd_dosen onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn-mini btn-black btn-cross' title='Delete'><span></span>Delete</a></td>
		        </tr>";
    }
    echo "</table>";
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM dosen WHERE kd_dosen LIKE '%$_GET[kata]%' OR nama_dosen LIKE '%$_GET[kata]%'"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman</div><br>
	<input name='btnHapus' type='submit' value='Delete Selected' class='btn btn-purple'>
	</form>";
    break;    
    }
case "tambahdosen":
?>
<form action="<? echo "$aksi?module=dosen&act=input";?>" method="post" name="FMHS">
  <table class="form">
          <tr>
            <td><label>Kode</label></td>
            
            <td><input name="kd_dosen" type="text" id="kd_dosen" size="12" maxlength="12" id="grumble"></td>
          </tr>
          <tr>
            <td><label>Nama</label></td>
            
            <td><input name="nama" type="text" id="nama" size="30" maxlength="30" class="mini"></td>
          </tr>
          <tr>
            <td><label>Tempat Lahir</label></td>
            
            <td><input name="tmp_lhr_dsn" type="text" id="tmp_lhr_dsn" size="30" maxlength="30" class="error"></td>
          </tr>
          <tr>
            <td><label>Tanggal Lahir</label></td>
            
            <td><input type="text" id="date-picker" name="tgl"/></td>
          </tr>
          <tr>
            <td><label>Alamat</label></td>
            
            <td><textarea name="alamat_dsn" class="tinymce"></textarea></td>
          </tr>
  </table>
  <input name="ok" type="submit" id="fok" value="Simpan" class='btn btn-blue'>
  <input name="fulang" type="reset" id="fulang" value="Ulangi" class="btn btn-orange">
  <input name="fulang2" type="button" id="fulang2" value="Batal" onClick="javascript:history.back()" class="btn btn-red">
</form>
<?  break;
	case "editdosen":
	$kd_dosen=$_GET['kd_dosen'];
	$qrykoreksi=mysql_query("select * from dosen where kd_dosen='$kd_dosen'");
	$dosenku=mysql_fetch_object($qrykoreksi);
	$data_tanggal_db = $dosenku->tgl_lhr_dsn; // YYYY-MM-DD
	$data_tanggal_tampil = jin_date_str($data_tanggal_db); // hasilnya: 23/02/2009 = DD/MM/YYYY
?>
<form action="?module=updatedsn" method="post">
  <table class="form">
          <tr>
            <td><label>Kode<label></td>
            
            <td><input name="kd_dosen" type="text" id="kd_dosen" id="grumble" size="15" maxlength="15" value="<?php echo $dosenku->kd_dosen?>" readonly></td>
          <tr>
            <td><label>Nama<label></td>
            
            <td><input name="nama" type="text" id="nama" class="mini" size="30" maxlength="30" value="<?php echo $dosenku->nama_dosen?>"></td>
          </tr>
          <tr>
            <td><label>Tempat Lahir<label></td>
            
            <td><input name="tmp_lhr_dsn" type="text" class="error" id="tmp_lhr_dsn" size="30" maxlength="30" value="<?php echo $dosenku->tmp_lhr_dsn?>"></td>
          </tr>
          <tr>
            <td><label>Tanggal Lahir<label></td>
            
            <td><input type="text" id="date-picker" name="tgl" value="<? echo $data_tanggal_tampil?>"/></td>
          </tr>
          <tr>
            <td><label>Alamat<label></td>
            
            <td><textarea name="alamat_dsn" cols="30" rows="5" id="alamat_dsn" class="tinymce"><?php echo $dosenku->alamat_dsn?></textarea></td>
          </tr>
  </table>
  <p>
    <input name="fok" type="submit" id="fok2" value="Simpan" class='btn btn-blue'/>
    <input name="fulang3" type="reset" id="fulang3" value="Ulangi" class="btn btn-orange"/>
    <input name="fulang3" type="button" id="fulang3" value="Batal" onclick="javascript:history.back()" class="btn btn-red"/>
  </p>
</form>
<?
break;
}
}
?>
