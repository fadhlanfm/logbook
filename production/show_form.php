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
	<meta charset="UTF-8">
	  <!--Import Google Icon Font-->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/googlefont.css"  media="screen,projection"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="materialize/js/jquery-3.0.0.min.js"></script>
    
    <!-- Compiled and minified CSS -->
	  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	  <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	  <script src="/pickadate.js-3.5.6/lib/picker.js"></script>
	  <script src="/pickadate.js-3.5.6/lib/picker.date.js"></script>
	  <script src="/pickadate.js-3.5.6/lib/picker.time.js"></script>
	  <script>
      window.liveSettings = {
        api_key: "a0b49b34b93844c38eaee15690d86413",
        picker: "bottom-right",
        detectlang: true,
        dynamic: true,
        autocollect: true
      };
    </script>
    <script type="text/javascript" src="materialize/js/live.js"></script>
    <script type="text/javascript" src="/leanModal.v1.1/jquery.leanModal.min.js"></script>
</head>
<body>
<div class="container">
<div class="center">
	<h1>Logbook</h1>
</div>
	<table class="striped">
		<tr>
			<th>Nomor</th>
			<th>Kode Unit</th>
			<th>Nama Unit</th>
			<th>Nama Program</th>
			<th>Mulai Program</th>
			<th>Berakhir Program</th>
			<th>Status</th>
			<th colspan="3" class="center">Aksi</th>
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
			echo'<br> <br>';
			// echo'Total Rows = '.$result->num_rows;
			$result->free();
			$db->close();
		?>
	</table>
	</div><br>
</body>
</html>
