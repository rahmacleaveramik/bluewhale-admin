<?
include "koneksi.php";
$npm=$_GET['npm'];
$nip=$_GET['nip'];
$query = mysql_query("select * from tb_files
					left join tb_mhs on tb_files.npm=tb_mhs.npm
					left join tb_pembimbing on tb_files.nip=tb_pembimbing.nip
					 where tb_files.npm='$npm' and tb_files.nip ='$nip' " );
?>
<table>
<?
$no=1;
while($r=mysql_fetch_array($query))
{
	?>
		<tr>
			<td><?=$no;?></td>
			<td><?=$r['npm'];?></td>
			<td><?=$r['nama'];?></td>
			<td><?=$r['nama_pem'];?></td>
			<td><?=$r['bab'];?></td>
			<td><?=$r['status'];?></td>
			<td>
				<?
					$kd_encode=base64_encode($r['kd_files']);
					$link=base64_encode("http://localhost/bluewhale-admin/h.php?p=".$kd_encode."&status=".$r['status']);
				?>
				<a href="link.php?c=<?=$link;?>">Download</a>
			</td>
		</tr>	
	<?
$no++;
}
?>
</table>