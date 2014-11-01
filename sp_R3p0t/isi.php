<?
include "conec/koneksi.php";
include "conec/library.php";
include "conec/fungsi_indotgl.php";
include "conec/function.php";
//include "conec/fungsi_combobox.php";
include "class_paging.php";

// Bagian Home
if ($_GET['module']==''){
echo "<div class='box round first fullpage'>
      <h2>Repository AMIK Ibrahimy</h2>
      <div class='block'>
      <!-- paragraphs -->
      <p class='start' >Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator Repository AMIK Ibrahimy.<br> 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola website.</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
        <p align=left>Login : "; 
		  echo $hari = hari(date("w"));
		  echo ", ";
		  echo $tgl = tgl_indo(date("Y-m-d")); 
		  echo " | "; 
		  echo date("H:i:s");
		  echo " WIB</p>
	<!-- end headings -->
    	</div>
        </div>";
}
// Bagian User
elseif ($_GET['module']=='user'){
    include "modul/mod_users/users.php";
}
//bagian data dosen
elseif ($_GET['module']=='dosen'){
    include "modul/modul_dosen/dosen.php";
}
//bagian data mahasiswa
elseif ($_GET['module']=='mahasiswa'){
    include "modul/modul_mahasiswa/mahasiswa.php";
}
//bagian data konsentrasi
elseif ($_GET['module']=='konsentrasi'){
    include "modul/modul_konsentrasi/konsentrasi.php";
}
//bagian jenis tugas akhir
elseif ($_GET['module']=='jenis'){
    include "modul/modul_jenis/jenis.php";
}
//bagian tugas akhir
elseif ($_GET['module']=='tugasakhir'){
    include "modul/modul_tugasakhir/tugasakhir.php";
}
//bagian file tugas akhir
elseif ($_GET['module']=='files'){
    include "modul/modul_files/files.php";
}
//bagian Laporan tugas akhir
elseif ($_GET['module']=='lap_ta'){
    include "lap_ta.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<div class='box round first fullpage'>
                <h2>
                    Warning....</h2>
                <div class='block '>
				<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>
				</div>
				</div>";
}
?>