<?php
	include 'connect_db.php';
	$monitoring = (isset($_POST['monitoring']) ? $_POST['monitoring'] : '$monitoring');
	$positif = (isset($_POST['positif']) ? $_POST['positif'] : '$positif');
	$negatif = (isset($_POST['negatif']) ? $_POST['negatif'] : '$negatif');
		
		$query = "INSERT into logbook(metode_monitoring,metode_enforcement_positif,metode_enforcement_negatif) values('$monitoring','$positif','$negatif')";
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