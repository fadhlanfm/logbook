<?php
	include 'connect_db.php';
	$perilaku = (isset($_POST['perilaku']) ? $_POST['perilaku'] : '$perilaku');
	$aktifitas1 = (isset($_POST['aktifitas1']) ? $_POST['aktifitas1'] : '$aktifitas1');
	$kinerja = (isset($_POST['kinerja']) ? $_POST['kinerja'] : '$kinerja');
	
		
		$query = "INSERT into logbook(tujuan_merubah_perilaku,tujuan_nilai_tambah,tujuan_capai_kinerja) values('$perilaku','$aktifitas1','$kinerja')";
		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
		}else
		{
			echo 'Data Updated. </br>';
			echo '<a href="read_kategori.php">Lihat</a>';
			$db->close();
			exit;
		}	
?>