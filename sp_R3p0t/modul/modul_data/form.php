<?  
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<center><color=white>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></color></center>";
}else{
$aksi="modul/modul_data/aksi_data.php";
switch($_GET[act]){
  // Tampil Berita
  default:
	echo" <form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=page value=data >
          <b>Masukkan NIM / Nama : </b><input type=text name='kata' class='success1'> &nbsp;&nbsp;<input type=submit value=Cari class='btn btn-blue'>
          </form>";
    if (empty($_GET['kata'])){
	echo "<form name='FLaporan' method='post' action='$aksi?page=data&act=deleteall' onSubmit=\"return confirm('Hapus data terpilih?')\">";
	echo "<br><a href=?page=data&act=tambahdata class='btn-mini btn-black btn-plus' title='Tambah Data'><span></span>Tambah Data</a>";
    echo "<table width='100%' align='center' cellpadding='3' cellspacing='0' id='tabelwarna'>
		  <tr align='center'>
			<th scope='col' align='center'>&nbsp;</th>
			<th scope='col'>NIM</th>
			<th scope='col'>Nama</th>
			<th scope='col'>Tempat Lahir</th>
			<th scope='col' align='center'>Tanggal Lahir</th>
			<th scope='col'>Alamat</th>
			<th scope='col' align='center'>Aksi</th>
		  </tr>";
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("select t.nim, t.nama, t.tmp_lhr, DATE_FORMAT( t.tgl_lhr, '%d-%m-%Y' ) AS tanggal_lahir, t.alamat FROM mhs AS t ORDER BY nim DESC LIMIT $posisi,$batas");
    $no=$posisi+1;
	while($dataku=mysql_fetch_object($tampil)){
//      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr class=alt>
			<td align=center>
			 <input type='checkbox' name='item[]' id='item[]' value='$dataku->nim' /></td>
			<td>$dataku->nim</td>
			<td>$dataku->nama</td>
			<td>$dataku->tmp_lhr</td>
			<td align='center'>$dataku->tanggal_lahir</td>
			<td>$dataku->alamat</td>
		    <td align='center' width='85'><a href=?page=data&act=editdata&nim=$dataku->nim class='btn-mini btn-black btn-check' title='Edit'><span></span>Edit</a>&nbsp; <a href=$aksi?page=data&act=hapus&id=$dataku->nim onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn-mini btn-black btn-cross' title='Delete'><span></span>Delete</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM mhs"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "<div class=pagination>$linkHalaman</div><br>
		 <input name='btnHapus' type='submit' value='Delete Selected' class='btn btn-purple'>
	</form>";
    break;    
    }
    else{
	echo "<form name='FLaporan' method='post' action='$aksi?page=data&act=deleteall' onSubmit=\"return confirm('Hapus data terpilih?')\">";
	echo "<br><a href=?page=data&act=tambahdata class='btn-mini btn-black btn-plus' title='Tambah Data'><span></span>Tambah Data</a>";
    echo "<table width='100%' align='center' cellpadding='3' cellspacing='0' id='tabelwarna'>
		  <tr align='center'>
			<th scope='col' align='center'>&nbsp;</td>
			<th scope='col'>NIM</td>
			<th scope='col'>Nama</td>
			<th scope='col'>Tempat Lahir</td>
			<th scope='col' align='center'>Tanggal Lahir</td>
			<th scope='col'>Alamat</td>
			<th scope='col' align='center'>Aksi</td>
		  </tr>";
	$p      = new Paging9;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
      $tampil=mysql_query("select t.nim, t.nama, t.tmp_lhr, DATE_FORMAT( t.tgl_lhr, '%d-%m-%Y' ) AS tanggal_lahir, t.alamat FROM mhs AS t where t.nim LIKE '%$_GET[kata]%' or t.nama LIKE '%$_GET[kata]%' ORDER BY nim LIMIT $posisi,$batas");
	$no=$posisi+1;
	while($dataku=mysql_fetch_object($tampil)){
//      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr class=alt>
			<td align=center>
			 <input type='checkbox' name='item[]' id='item[]' value='$dataku->nim' /></td>
			<td>$dataku->nim</td>
			<td>$dataku->nama</td>
			<td>$dataku->tempat_lahir</td>
			<td align='center'>$dataku->tanggal_lahir</td>
			<td>$dataku->alamat</td>
		            <td align='center' width='85'><a href=?page=data&act=editdata&nim=$dataku->nim class='btn-mini btn-black btn-check' title='Edit'><span></span>Edit</a> 
		                <a href=\"$aksi?page=data&act=hapus&id=$dataku->nim onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn-mini btn-black btn-cross' title='Delete'><span></span>Delete</a></td>
		        </tr>";
    }
    echo "</table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM mhs WHERE nim LIKE '%$_GET[kata]%' OR nama LIKE '%$_GET[kata]%'"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman</div><br>
	<input name='btnHapus' type='submit' value='Delete Selected' class='btn btn-purple'>
	</form>";
    break;    
    }
case "tambahdata":
?>
<form action="<? echo "$aksi?page=data&act=input";?>" method="post" name="FMHS" >
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    NIM</label></td>
                            <td class="col2"><input type="text" id="grumble" size="19" maxlength="15" name="nim"/>
                          </td>
                        </tr>
                        <tr>
                            <td><label>Nama</label></td>
                            <td><input type="text" class="mini" name="nama"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Tempat Lahir</label>
                            </td>
                            <td><input type="text" class="error" name="tempat_lahir"/></td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Tanggal Lahir</label>
                            </td>
                            <td><input type="text" id="date-picker" name="tgl"/>
                          </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;"><label>Alamat</label></td>
                            <td><textarea class="tinymce" name="alamat"></textarea>
                          </td>
                        </tr>
                        <tr>
                        	<td></td><td></td>
                        </tr>
                    </table>
                    <input name="ok" type="submit" id="fok" value="Simpan" class='btn btn-blue'>
              <input name="fulang" type="reset" id="fulang" value="Ulangi" class="btn btn-orange">
              <input name="fulang2" type="button" id="fulang2" value="Batal" onClick="javascript:history.back()" class="btn btn-red">
                    </form>
<?  break;
	case "editdata":
	$nim=$_GET['nim'];
	$qrykoreksi=mysql_query("select * from mhs where nim='$nim'");
	$dataku=mysql_fetch_object($qrykoreksi);
	$data_tanggal_db = $dataku->tgl_lhr; // YYYY-MM-DD
	$data_tanggal_tampil = jin_date_str($data_tanggal_db); // hasilnya: 23/02/2009 = DD/MM/YYYY

	
	list($tahun,$bulan,$tanggal) = explode('-',$dataku->tanggal_lahir);
?>
<form action="?page=update" method="post" name="FKoreksi" enctype="multipart/form-data">
  <table class="form">
          <tr>
            <td><label>NIM</label></td>
            <td><input name="nim" type="text" id="grumble" size="19" maxlength="19" value="<?php echo $dataku->nim?>" readonly=""></td>
          <tr>
            <td><label>Nama</label></td>
            <td><input name="nama" type="text" id="nama" class="mini" size="30" maxlength="30" value="<?php echo $dataku->nama?>"></td>
          </tr>
          <tr>
            <td><label>Tempat Lahir</label></td>
            <td><input name="tempat_lahir" type="text" id="tempat_lahir" class="error" size="30" maxlength="30" value="<?php echo $dataku->tmp_lhr?>"></td>
          </tr>
          <tr>
            <td><label>Tanggal Lahir</label></td>
            <td><input type="text" id="date-picker" name="tgl" value="<? echo $data_tanggal_tampil?>"/></td>
          </tr>
          <tr>
            <td><label>Alamat</label></td>
            <td><textarea name="alamat" cols="30" rows="5" id="alamat" class="tinymce"><?php echo $dataku->alamat?></textarea></td>
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
