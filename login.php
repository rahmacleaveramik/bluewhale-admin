<form method="post" action="ceklogin.php">
	<?
	if(isset($_GET['redirect']) and !empty($_GET['redirect']))
	{
		?>
			<input type="hidden" name="redirect_link" value="<?=$_GET['redirect'];?>">
		<?
	}
	?>
	Username:<input type="text" name="username"><br>
	Password:<input type="text" name="password"><br>
	<input type="submit" value="Login"> <br>
	punya akun? <a href="form_register.php">Daftar</a>
</form>