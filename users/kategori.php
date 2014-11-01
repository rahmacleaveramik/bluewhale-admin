<?php
session_start();
include "../includes/config.php";
include "../includes/functions.php";

$_SESSION['s_page'] = "home.php";
$id = $_POST['id'];
list($bajuKategori) = mysql_fetch_row(mysql_query("SELECT jenis_ta FROM tb_jenis WHERE kd_jenis = '$id'"));
?>
<h2><?php echo $taJenis; ?></h2>
<?php
//Awal paging
if($_POST['start']=='') $start = 0;
else $start = $_POST['start'];

//Tampilkan semua data
$qData = "SELECT kd_jenis FROM tb_jenis WHERE kd_jenis = '$id' ORDER BY jenis_ta DESC";
$hqData = mysql_query($qData) or die (mysql_error());
$totalData = mysql_num_rows($hqData);

if($totalData=='0'){
	echo "<p>Maaf, Berkas belum ada</p>";
}else{
	//Batasi dengan limit
	$qData .= " LIMIT $start, $limit";
	$hqData = mysql_query($qData);
	while($rqData = mysql_fetch_array($hqData)){
		$idBaju[] 			= $rqData[0];
		//$fotoPath = explode("/", $rqData[1]);
		//$fotoBaju[]			= $fotoPath[1]."/".$fotoPath[2];
		//$namaBaju[]			= $rqData[2];
		//$keteranganBaju[]	= substr($rqData[3], 0, 40)."...";
		//$hargaBaju[]		= number_format($rqData[4], 0, ',', '.');
		list($bajuKat) = mysql_fetch_row(mysql_query("SELECT nama FROM _baju_kategori WHERE id_baju_kategori = '$rqData[5]'"));
		$kategoriBaju[]		= $bajuKat;
	}
}
?>