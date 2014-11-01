<?
error_reporting(0);
include "koneksi.php";
$redirect_link = $_POST['redirect_link'];
$username=$_POST['username'];
$password=$_POST['password'];

if(!isset($redirect_link) or empty($redirect_link))
{
	if(trim($username)==""){
		$error[]="Error! Username is null";
	}
	if(trim($password)==""){
		$error[]="Error! Password is null";
	}
	if($error)
	{
		echo"error";
	}
	else
	{
	$username_falid = $username;//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($username.ENT_QUOTES))));
	$password_falid = md5($password);//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars(md5($password).ENT_QUOTES))));

		$query = mysql_query("select * from tb_member where username='".$username_falid."' and password='".$password_falid."' and aktif='aktif'");
		
		$ketemu = mysql_num_rows($query);
		$r = mysql_fetch_array($query);
		if($ketemu>0)
		{
			session_start();
			$_SESSION['username'] = $r['username'];
			$_SESSION['password'] = $r['password'];
			
			?>
			<script>window.location.href='index.php';</script>
			<?
		}
		else
		{
		echo "<div id='dataerror'>Error! username / Password is not Valid</div>";
			
		}
	}
}
else
{
	if(trim($username)==""){
		$error[]="Error! Username is null";
	}
	if(trim($password)==""){
		$error[]="Error! Password is null";
	}
	if($error)
	{
		echo"error";
	}
	else
	{
	$username_falid = $username;//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($username.ENT_QUOTES))));
	$password_falid = md5($password);//mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars(md5($password).ENT_QUOTES))));

		$query = mysql_query("select * from tb_member where username ='".$username_falid."' and password='".$password_falid."' and aktif='aktif'");
		
		$ketemu = mysql_num_rows($query);
		$r = mysql_fetch_array($query);
		if($ketemu>0)
		{
			session_start();
			$_SESSION['username'] = $r['username'];
			$_SESSION['password'] = $r['password'];
			//header('location:$redirect_link');
			$link  = base64_encode($redirect_link);
			?>
			<script>window.location.href='http://localhost/bluewhale-admin/index.php?m=link&c=<? echo $link;?>';</script>
			<?
		}
		else
		{
		echo "<div id='dataerror'>Error! username / Password is not Valid</div>";
			
		}
	}
}
?>