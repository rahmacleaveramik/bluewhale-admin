<?

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
		    echo "<p><b>Kode verifikasi salah</b></p> <a href='http://localhost/bluewhale-admin/link2.php?c=$_POST[url]'>kembali</a>";
		}
	}
	else{
		echo "Anda belum memasukkan kode verifikasi <a href='http://localhost/bluewhale-admin/link2.php?c=$_POST[url]'>kembali</a>";
	}

?>
<script>
function pindah(){
	myWindow.close();  

}
</script>