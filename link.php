<?
include"class-capctha.php";
$captcha1 = new mathcaptcha();
    // panggil method untuk mengenerate kode
    $captcha1->generatekode();
$urldownload = base64_decode($_GET['c']);
if(empty($_SESSION['username']) && empty($_SESSION['password'])){
	?>
<script>window.location.href='login.php?redirect=<?=$urldownload;?>';</script>
<?
}else{
	

?>
	<form method="post" action="ferivikasi.php">
          
			<input type="hidden" name="url" value=<?=$_GET['c'];?>
            <p><b>Masukkan Kode Verifikasi di bawah ini untuk download</b></p>
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
<?
}
?>