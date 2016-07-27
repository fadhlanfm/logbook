<?php
	include 'connect_db.php';
	$db = new mysqli($db_host,$db_username, $db_password, $db_database);
	if ($db->connect_errno)
	{
		die("Could not connect to teh database: <br />".$db->connect_error);
	}
	//asign a query
	$query = "SELECT logbook.id, logbook.kode_unit, unit.nama, logbook.nama_program, logbook.start, logbook.end, logbook.status, logbook.last_update FROM logbook INNER JOIN unit WHERE logbook.kode_unit=unit.kode";
	//execute the query
	$result = $db->query( $query );
	if (!$result)
	{
		die("could not query the database: <br />".$db->error);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Log Book</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Nomor</th>
			<th>Kode Unit</th>
			<th>Nama Unit</th>
			<th>Nama Program</th>
			<th>Mulai Program</th>
			<th>Berakhir Program</th>
			<th>Status</th>
			<th colspan="3">Aksi</th>
			<th colspan="3">Ubah Status</th>			
		</tr>
		<?php
			$i = 1;
			while($row = $result->fetch_object())
			{
			$status = $row->status;
			if($status == 0){
				$status = 'Belum Diverifikasi';
			}else{
				$status = 'Sudah Diverifikasi';
			}
				echo'<tr>';
				echo'<td>'.$i.'</td>';
				echo'<td>'.$row->kode_unit.'</td>';
				echo'<td>'.$row->nama.'</td>';
				echo'<td>'.$row->nama_program.'</td>';
				echo'<td>'.$row->start.'</td>';
				echo'<td>'.$row->end.'</td>';
				echo'<td>'.$status.'</td>';
				echo'<td><a href="lihat_logbook.php ?id='.$row->id.'">Lihat</a></td>';
				echo'<td><a href="beri_komentar.php ?id='.$row->id.'">Beri Komentar</a></td>';
				echo'<td><a href="verif_logbook.php ?id='.$row->id.'">Verifikasi</a></td>';
				echo'<td><a class="btn-floating" href="status_logbook.php?id='.$row->id.'"><i class="material-icons">done</i></a></td>';
				echo'<td><a class="btn-floating red lighten-2" href="status1_logbook.php?id='.$row->id.'"><i class="material-icons">clear</i></a></td>';
				echo'</tr>';
				$i++;
			}
			echo'<br />';
			echo'Total Rows = '.$result->num_rows;
			$result->free();
			$db->close();
		?>
	</table>
</body>
</html>