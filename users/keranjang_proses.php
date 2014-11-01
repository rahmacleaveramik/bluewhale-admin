<?php
session_start();
include "../includes/config.php";
include "../includes/functions.php";

switch($_POST['proc']){	
	case 'delete' :
		$pos = $_POST['pos'];
		
		unset($_SESSION['s_bajuChart'][$pos]);
		unset($_SESSION['s_jumlahChart'][$pos]);
		
		$_SESSION['s_bajuChart'] 	= array_values($_SESSION['s_bajuChart']);
		$_SESSION['s_jumlahChart'] 	= array_values($_SESSION['s_jumlahChart']);
		
		header("location:keranjang.php");
		break;
		
	case 'refresh' :
		$pos 	= $_POST['pos'];
		$id		= $_POST['id'];
		$jumlah = $_POST['jumlah'];
		list($nama, $stok) = mysql_fetch_row(mysql_query("SELECT nama, stok FROM _baju WHERE id_baju = '$id'"));
		if($jumlah > $stok){
			echo "<script>alert('Stok maksimal $nama : $stok');</script>";
		}else{
			$_SESSION['s_jumlahChart'][$pos] = $jumlah;
		}
		echo "<script>sendRequest('users/keranjang.php', '', 'content', 'div', '');</script>";
		break;
		
	case 'finish' :
		//Masukkan ke pemesanan
		$id = uniqid("ORD");
		$tujuan = $_POST['tujuan'];
		$alamat	= $_POST['alamat'];
		$qData = "INSERT INTO _pemesanan VALUES('$id', NOW(), '$_SESSION[s_emailCust]', '$tujuan', '$alamat', '', '', '', '', '0')";
		$hqData = mysql_query($qData);
		
		//Masukkan ke pemesanan detail
		$x=0;
		if(isset($_SESSION['s_bajuChart'])){
			foreach($_SESSION['s_bajuChart'] as $idBaju){
				list($harga)= mysql_fetch_row(mysql_query("SELECT harga FROM _baju WHERE id_baju = '$idBaju'"));
				$jumlah 	= $_SESSION['s_jumlahChart'][$x];
				$subtotal	= $harga * $jumlah;
				$qData = "INSERT INTO _pemesanan_detail VALUES('$id', '$idBaju', '$jumlah', '$subtotal')";
				$hqData = mysql_query($qData);
				
				$x++;
			}
		}
		$_SESSION['s_bajuOrder'] = $id;
		unset($_SESSION['s_bajuChart']);
		unset($_SESSION['s_jumlahChart']);
		
		header("location:keranjang_finish.php");
		break;
		
	case 'confirm' :
		//Update ke tabel pemesanan
		$id			= $_POST['id'];
		$tanggal	= ExplodeDate($_POST['tanggal']);
		$bank 		= $_POST['bank'];
		$pemilik	= $_POST['pemilik'];
		$dana		= $_POST['dana'];
		
		$qData = "	UPDATE _pemesanan 
					SET tanggal_konfirmasi 	= '$tanggal',
						bank_konfirmasi		= '$bank',
						nama_konfirmasi		= '$pemilik',
						jumlah_konfirmasi	= '$dana'
					WHERE id_pemesanan = '$id'
				 ";
		$hqData = mysql_query($qData);
		
		header("location:history.php");
		break;
}
?>