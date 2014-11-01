<ul class="categories_list">
	<?php
	$qData = "SELECT kd_jenis, jenis_ta FROM tb_jenis ORDER BY jenis_ta ASC";
	$hqData = mysql_query($qData);
	while(list($kd_jenis, $jenis_ta) = mysql_fetch_row($hqData)){
		echo "<li><a style='cursor:pointer;' onclick=\"javascript: sendRequest('users/kategori.php', 'id=$kd_jenis', 'content', 'div', '');\">$jenis_ta</a></li>";
	}
	?>
</ul>