<?php
error_reporting(0);
//Koneksi ke database
//Host local
$host 	= "localhost";
$user	= "root";
$pass	= "";
$db		= "db_repository";

mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($db) or die ("Tidak terdapat database dengan nama <b><i>\"$db\"</i></b>");

//Setting
$limit				= 2; //--> Limit data per halaman
$file_size_foto		= 50000; //--> Maksimal ukuran file foto

//Administrator
$admin	= "admin"; //--> Folder Administrator
$header	= "Cloting Store"; //--> Header Administrator
$footer_left	= "Cloting Store";
$footer_right	= "Clothing Store";

//Users
$user 	= "user"; //--> Folder User
$footer	= "Clothing Store";

//Biaya pengiriman
$biayaDalam = 10000;
$biayaLuar	= 15000;

//Info Contact
//$email		= "admin@suwondo.net";
$email		= "suwondo.7@gmail.com";
$messenger	= "rpl.suwondo";
$facebook	= "http://www.facebook.com/suwondo.7";
$twitter	= "http://www.twitter.com/soewondosp";
?>