<?php
	$nim=$_GET['nim'];
	$qrykoreksi=mysql_query("select * from tb_mahasiswa where nim='$nim'");
	$dataku=mysql_fetch_object($qrykoreksi);
	list($tahun,$bulan,$tanggal) = explode('-',$dataku->tanggal_lahir);
?>
<form action="?page=update" method="post" name="FKoreksi" enctype="multipart/form-data">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="99">NIM</td>
            <td width="9">:</td>
            <td width="287"><input name="nim" type="text" id="nim" size="12" maxlength="12" value="<?php echo $dataku->nim?>" readonly=""></td>
            <td width="163" rowspan="7" align="center" valign="top"></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" size="30" maxlength="30" value="<?php echo $dataku->nama?>"></td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input name="tempat_lahir" type="text" id="tempat_lahir" size="30" maxlength="30" value="<?php echo $dataku->tempat_lahir?>"></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><select name="tgl" size="1" id="tgl">
                <?php

		     for ($i=1;$i<=31;$i++)

			 {

				if($tanggal==$i) {

					echo "<option value=".$i." selected>".$i."</option>";

				} else {

					echo "<option value=".$i.">".$i."</option>";

				}

			 }

		  ?>
              </select>
              <select name="bln" size="1" id="bln">
                <?php

		     $namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		     for ($i=1;$i<=12;$i++)

			 {

				if($bulan==$i) {

					echo "<option value=".$i." selected>".$namabulan[$i]."</option>";

				} else {

					echo "<option value=".$i.">".$namabulan[$i]."</option>";

				}

			 }

		  ?>
              </select>
              <select name="thn" size="1" id="thn">
                <?php

			  echo "<option value=".$tahun.">".$tahun."</option>";

		     for ($i=1985;$i<=2000;$i++)

			 {

				if($tahun==$i) {

					echo "<option value=".$i." selected>".$i."</option>";

				} else {

					echo "<option value=".$i.">".$i."</option>";

				}

			 }

		  ?>
              </select></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" cols="30" rows="5" id="alamat"><?php echo $dataku->alamat?></textarea></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input name="jenis_kelamin" id="jenis_kelamin" type="radio" value="L" <?php if($dataku->jenis_kelamin=='L') echo "checked";?>>
              Laki-laki
              <input name="jenis_kelamin" id="jenis_kelamin" type="radio" value="P" <?php if($dataku->jenis_kelamin=='P') echo "checked";?>>
              Perempuan </td>
          </tr>
          <tr><td>Jurusan</td><td>: </td><td><select name='jurusan'>
          <?
			$tampil=mysql_query("SELECT * FROM jurusan ORDER BY id_jurusan");
    		while($w=mysql_fetch_object($tampil)){
      		if ($dataku->id_jurusan==$w->id_jurusan){
        		echo "<option value='$w->id_jurusan' selected>$w->nama_jurusan</option>";
      		}
      		else{
        		echo "<option value='$w->id_jurusan'>$w->nama_jurusan</option>";
      			}
    		}
		  ?>
	</select></td></tr>
		  <tr>
            <td></td>
            <td></td>
            <td><img src="<?php echo  $dataku->photo?>" alt="<?php echo  $dataku->nama?>" width="250" /></td>
          </tr>
		  <tr>
            <td>Photo</td>
            <td>:</td>
            <td><input type="file" name="photo" id="photo"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Pilih photo jika ingin diganti</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="50" colspan="4" align="center"><input name="fok" type="submit" id="fok" value="OK">
              <input name="fulang" type="reset" id="fulang" value="Ulangi">
              <input name="fulang" type="button" id="fulang" value="Batal" onClick="javascript:history.back()"></td>
          </tr>
  </table>
</form>
