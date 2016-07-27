<?php
	include 'connect_db.php';
	$kode_unit = (isset($_POST['kode_unit']) ? $_POST['kode_unit'] : '$kode_unit');
	$nama_program = (isset($_POST['nama_program']) ? $_POST['nama_program'] : '$nama_program');
	$deskripsi = (isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '$deskripsi');
	$start_date = (isset($_POST['start_date']) ? $_POST['start_date'] : '$start_date');
	$end_date = (isset($_POST['end_date']) ? $_POST['end_date'] : '$end_date');
	
		
		$query = "INSERT into logbook(kode_unit,nama_program,deskripsi_program,start,end) values('$kode_unit','$nama_program','$deskripsi','$start_date','$end_date')";
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