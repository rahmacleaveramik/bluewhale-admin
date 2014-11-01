<?
				$module=$_REQUEST['module'];
  		echo "<li class='ic-dashboard'><a href='?module='><span>Dashboard</span></a> </li>
                <li class='ic-gallery dd'><a href='?module=user'><span>Profil</span></a>
                </li>                
                <li class='ic-form-style'><a href='javascript:'><span>Controls</span></a>
                    <ul>
                        <li><a href='?module=konsentrasi'>Konsentrasi</a> </li>
						<li><a href='?module=jenis'>Jenis Tugas Akhir</a> </li>
						<li><a href='?module=dosen'>Dosen</a> </li>
                        <li><a href='?module=mahasiswa'>Mahasiswa</a> </li>
                    </ul>
                </li>
                <li class='ic-grid-tables'><a href='javascript:'><span>Tugas Akhir</span></a>
					<ul>
                        <li><a href='?module=tugasakhir'>Judul Tugas Akhir</a> </li>
						<li><a href='?module=files'>File Tugas Akhir</a> </li>
                    </ul>
				</li>
                <li class='ic-notifications'><a href='javascript:'><span>Laporan</span></a>
                    <ul>
                        <li><a href='?module=lap_dsn'>Data Dosen</a> </li>
                        <li><a href='?module=lap_mhs'>Data Mahasiswa</a> </li>
                        <li><a href='?module=lap_ta'>Tugas Akhir</a> </li>                        
                    </ul>                
                </li>";
?>
