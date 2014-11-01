<?
 $m=$_GET['m'];  
if($m=="home"){
	if(empty($_SESSION['username']) && empty($_SESSION['password'])){
		echo "<a href='index.php?m=login'>Login</a><br><Br><br>";
	}else{
		?>
			<a href="logout.php">Keluar</a><br><Br><Br>
		<?
	}
	   $query=mysql_query("select * from tb_tugasakhir
                            left join tb_mhs on tb_tugasakhir.npm=tb_mhs.npm
                            left join tb_pembimbing on tb_tugasakhir.nip=tb_pembimbing.nip
                            left join tb_jenis on tb_tugasakhir.kd_jenis=tb_jenis.kd_jenis");
                ?>
                   <table border=1 cellspasing=0>
                      <tr>
                        <th height="20" width="20">No</th><th height="30" width="20">NPM</th><th width="100">Jenis</th><th width="300" height="20">Judul</th><th width="40" height="30">Lihat file TA</th>
                      </tr> 
                    <?
                    $no=1;
                    while($r=mysql_fetch_array($query))
                    {
                      ?>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$r['npm'];?></td>
                          <td><?=$r['jenis_ta'];?></td>
                          <td><?=$r['judul'];?></td>
                          <td><a href="index.php?m=list&npm=<?=$r['npm'];?>&nip=<?=$r['nip'];?>">view</a></td>
                        </tr>   
                      <?
                    $no++;
                    }
                    ?>
                    </table>
<?
} 
elseif($m=="list")
{

	$npm=$_GET['npm'];
	$nip=$_GET['nip'];
	$query = mysql_query("select * from tb_files
						left join tb_mhs on tb_files.npm=tb_mhs.npm
						left join tb_pembimbing on tb_files.nip=tb_pembimbing.nip
						 where tb_files.npm='$npm' and tb_files.nip ='$nip' " );
	?>
	<table border=1 style="line-height:2;" width="100%">
		<tr>
			<th>No</th><th>NPM</th><th>Nama</th><th>Pembimbing TA</th><th>Bab</th><th>Status</th><th>Option</th>
		</tr>
	<?
	$no=1;
	while($r=mysql_fetch_array($query))
	{
		?>
			<tr>
				<td><?=$no;?></td>
				<td><?=$r['npm'];?></td>
				<td><?=$r['nama'];?></td>
				<td><?=$r['nama_pem'];?></td>
				<td><?=$r['bab'];?></td>
				<td><?=$r['status'];?></td>
				<td>
					<?
						$kd_encode=base64_encode($r['kd_files']);
						$link=base64_encode("http://localhost/bluewhale-admin/h.php?p=".$kd_encode."&status=".$r['status']);
						if($r['status']=="free"){
							?>
								<a href="http://localhost/bluewhale-admin/h.php?p=<?=$kd_encode;?>&status=<?=$r['status'];?>">Download</a>							
							<?
						}else{
							?>
								<a href="index.php?m=link&c=<?=$link;?>">Download</a>							
							<?
						}
					?>
				</td>
			</tr>	
		<?
	$no++;
	}
	?>
	</table>
<?
}   
elseif($m=="link")
{

include "class-capctha.php";
	$captcha1 = new mathcaptcha();
	    // panggil method untuk mengenerate kode
	$captcha1->generatekode();
	$urldownload = base64_decode($_GET['c']);
	if(empty($_SESSION['username']) && empty($_SESSION['password'])){
		?>
		<script>window.location.href='index.php?m=login&redirect=<?=$urldownload;?>';</script>
		<?
	}else{
		

	?>
        <div class="form-container">

			<form class="form" method="post" action="index.php?m=verifikasi">
	          
				<input type="hidden" name="url" value=<?=$_GET['c'];?>
	            <p><b>Masukkan Kode Verifikasi di bawah ini untuk download</b></p><br><Br>
	            <p>
	              <?php
	                   // menampilkan kode captcha berisi soal matematika
	                   $captcha1->showcaptcha();
	              ?>
	            <br>
	            <input type="text" name="kode">
	            </p>
	            <p><input type="submit" name="submit" value="Download"><a href='index.php'>Kembali</a></p>

	        </form>
	    </div>
<?
	}
} 
elseif($m=="verifikasi")
{

include"class-capctha.php";
$captcha1 = new mathcaptcha();
$urldownload = base64_decode($_POST['url']);
		//$captcha2 = new mathcaptcha();
	if(isset($_POST['kode'])){	
		// jika kode hasil perhitungan dari session sama dengan kode
		// yang dimasukkan user, maka kode captcha cocok
		if ($captcha1->resultcaptcha() == $_POST['kode'])
		{
		   ?>
			<a onclick="javascript:history.back()" href='<?=$urldownload;?>' target='_blank' >download</a>
			<!--input type="button" onclick="javascript:history.back()" value="tutup">-->
			<?

		}
		else
		{
		    // jika kode captcha salah
		    echo "<p><b>Kode verifikasi salah</b></p> <a href='http://localhost/bluewhale-admin/index.php?m=link&c=$_POST[url]'>kembali</a>";
		}
	}
	else{
		echo "Anda belum memasukkan kode verifikasi <a href='http://localhost/bluewhale-admin/index.php?m=link&c=$_POST[url]'>kembali</a>";
	}
}
elseif($m=="login")
{
	?>
	 <!-- Begin Form -->
                <div class="form-container">
                  <div class="response"></div>
                  <form class="forms" action="ceklogin.php" method="post">
                  	<?
						if(isset($_GET['redirect']) and !empty($_GET['redirect']))
						{
							?>
								<input type="hidden" name="redirect_link" value="<?=$_GET['redirect'];?>">
							<?
						}
					?>
                    <fieldset>
                      <ol>
                        <li class="form-row text-input-row">
                          <label>Username*</label>
                          <input type="text" name="username" class="text-input" />
                        </li>
                        <li class="form-row text-input-row">
                          <label>Password*</label>
                          <input type="password" name="password" class="text-input" />
                          <input type="submit" value="Login" name="submit" class="btn-submit" />

							Belum punya Akun? <a href="index.php?m=register">Daftar</a>                        </li>
                      </ol>
                    </fieldset>
                  </form>
                </div>
                <!-- End Form --> 
	<?
}
elseif($m=="register")
{
	?>
		<form method="post" action="index.php?m=save_reg">
			<h3> Sign Up </h3><br>
			Username : <input type="text" name="username"> <br><br>
			Password : <input type="text" name="password"><br>
			<input type="submit" value="Send">
		</form>
	<?
}
elseif($m=="save_reg")
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$username_falid = $username;//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($username.ENT_QUOTES))));
		$password_falid = md5($password);//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars(md5($password).ENT_QUOTES))));

			$query = mysql_query("select * from tb_member where username ='".$username_falid."' and password='".$password_falid."' and aktif='aktif'");
			
			$ketemu = mysql_num_rows($query);
			$r = mysql_fetch_array($query);
			if($ketemu>0)
			{
				echo "username : $username sudah terpakai, silahkan coba yang lain";
			}
			else
			{
				// ambil kode member
				$ambil = mysql_query("select max(kd_member) as KDM from tb_member");
				$ram=mysql_fetch_array($ambil);
				$kd_member = $ram['KDM']+1;
				$sukses=mysql_query("insert into tb_member(kd_member,username,password,aktif) 
							value('$kd_member','$username_falid','$password_falid','tidak aktif')");
				if($sukses)
				{
					echo "Pendaftaran Anda sudah kami simpan";
				}
				echo"<script>window.location.href='login.php';</script>";

			}

}
else{

	header("location:index.php?m=home");
}
?>    
