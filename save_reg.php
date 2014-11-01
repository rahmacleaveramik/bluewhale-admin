<?
include "koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];

$username_falid = $username;//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($username.ENT_QUOTES))));
	$password_falid = md5($password);//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars(md5($password).ENT_QUOTES))));

		$query = mysql_query("select * from tb_member where username ='".$username_falid."' and password='".$password_falid."' and aktif='aktif'");
		
		$ketemu = mysql_num_rows($query);
		$r = mysql_fetch_array($query);
		if($ketemu>0)
		{
			"username : $username sudah terpakai, silahkan coba yang lain";
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

?>