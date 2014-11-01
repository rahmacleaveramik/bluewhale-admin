<?php
	session_start();
	ob_start();
	$dbserver="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="db_repository";
	mysql_connect($dbserver,$dbusername,$dbpassword) or die(mysql_error()." Gagal koneksi server mysql");
	mysql_select_db($dbname) or die (mysql_error()." Gagal koneksi database");
?>