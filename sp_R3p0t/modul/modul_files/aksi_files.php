<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../conec/koneksi.php";
include "../../conec/function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus files
if ($module=='files' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_files WHERE npm='$_GET[id]' and bab='$_GET[bab]'");
  header('location:../../media.php?module='.$module);
}

// Input files
elseif ($module=='files' AND $act=='input'){
	
	if($_POST['npm']==''){
		echo "<script>window.alert('NPM Tidak boleh kosong');
        window.location=('../../media.php?module=files')</script>";	
	}else{
		$data = mysql_query("select * from tb_files where npm='$_POST[npm]'");
    	$query=mysql_num_rows($data);
	
    	if($query>0) {
        	echo "<script>window.alert('Upload Gagal, NPM sudah ada');
				window.location=('../../media.php?module=files')</script>";
    	} else {
		  $lokasi_file = $_FILES['fupload']['tmp_name'];
		//  $lokasi_file = '../../../files/';
		  $nama_file   = $_FILES['fupload']['name'];
		
		  // Apabila ada gambar yang diupload
		  if (!empty($lokasi_file)){
		  
		  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
		
		  switch($file_extension){
			case "pdf": $ctype="application/pdf"; break;
			case "exe": $ctype="application/octet-stream"; break;
			case "zip": $ctype="application/zip"; break;
			case "rar": $ctype="application/rar"; break;
			case "doc": $ctype="application/msword"; break;
			case "xls": $ctype="application/vnd.ms-excel"; break;
			case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
			case "gif": $ctype="image/gif"; break;
			case "png": $ctype="image/png"; break;
			case "jpeg":
			case "jpg": $ctype="image/jpg"; break;
			default: $ctype="application/proses";
		  }
		
		  if ($file_extension=='php'){
		   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PDF');
				window.location=('../../media.php?module=files')</script>";
		  }
		  else{
		   $cek = mysql_query("SELECT nip FROM tb_tugasakhir WHERE npm='$_POST[npm]'");
		   $r = mysql_fetch_array($cek);
		   
			$n = $_POST['jum'];
			for($i=0;$i<$n;$i++){
			$npm = $_POST['npm'];
			$nip=$r['nip'];
			$bab = $_POST['bab'.$i];
			$namafile = $nama_file[$i];
			$status = $_POST['status'.$i];
			$file_basename = substr($namafile, 0, strripos($namafile, '.')); // strip extention 
			$file_ext = substr($namafile, strripos($namafile, '.')); // strip name
			$namabaru = $npm."_".$bab.$file_ext;
			move_uploaded_file($lokasi_file[$i],"../../../files/$namabaru");
			mysql_query("INSERT INTO tb_files(npm,nip,bab,files,status) 
									VALUES('$npm','$nip','$bab','$namabaru','$status')");
		  header('location:../../media.php?module='.$module);								   
			}
		  }
		  }
		  else{
			$cek = mysql_query("SELECT nip FROM tb_tugasakhir WHERE npm='$_POST[npm]'");
		   $r = mysql_fetch_array($cek);
		   
			$n = $_POST['jum'];
			for($i=0;$i<$n;$i++){
			$npm = $_POST['npm'];
			$nip=$r['nip'];
			$bab = $_POST['bab'.$i];
			$namafile = $nama_file[$i];
			$status = $_POST['status'.$i];
			$file_basename = substr($namafile, 0, strripos($namafile, '.')); // strip extention 
			$file_ext = substr($namafile, strripos($namafile, '.')); // strip name
			$namabaru = $npm."_".$bab.$file_ext;
			move_uploaded_file($lokasi_file[$i],"../../../files/$namabaru");
			mysql_query("INSERT INTO tb_files(npm,nip,bab,
											status) 
									VALUES('$npm','$nip',
										   '$bab','$status')");
			header('location:../../media.php?module='.$module);
			}
		  }
		}
	}
}
// Update donwload
elseif ($module=='files' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  $n = $_POST['n'];
  // Apabila file tidak diganti
  if (empty($lokasi_file)){
	  for($i=1;$i<=$n;$i++){
		  $npmMhs=$_POST['npm'.$i];
		  $bab=$_POST['bab'.$i];
    	mysql_query("UPDATE tb_files SET bab = '$bab'
                             WHERE npm='$npmMhs'");
  		header('location:../../media.php?module='.$module);
	  }
  }
  else{
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media.php?module=files')</script>";
  }
  else{
	  $cek = mysql_query("SELECT nip FROM tb_tugasakhir WHERE npm='$_POST[npm]'");
		   $r = mysql_fetch_array($cek);
		   
			$n = $_POST['n'];
			for($i=1;$i<=$n;$i++){
			$npm = $_POST['npm'.$i];
			$nip=$r['nip'.$i];
			$bab = $_POST['bab'.$i];
			$namafile = $nama_file[$i];
			$status = $_POST['status'.$i];
			$file_basename = substr($namafile, 0, strripos($namafile, '.')); // strip extention 
			$file_ext = substr($namafile, strripos($namafile, '.')); // strip name
			$namabaru = $npm."_".$bab.$file_ext;
			move_uploaded_file($lokasi_file[$i],"../../../files/$namabaru");
			
    //UploadFile($nama_file);
    mysql_query("UPDATE tb_files SET npm='$npm',nip='$nip',bab='$bab',file='$namabaru',status='$status'
                             WHERE npm = '$npm'");
  header('location:../../media.php?module='.$module);
			}
  }
  }
}
}
?>
