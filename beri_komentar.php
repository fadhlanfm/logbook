<?php
	include('connect_db.php');
	$id = $_GET['id'];
	$query = "SELECT * FROM logbook WHERE id = '$id'";
	$result = $db->query($query);
	if (!$result)
		{
			die("could not query the database: <br />".$db->error);
		}
	$row = $result->fetch_object();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="post_komentar_logbook.php" method="POST">
		<table>
			<tr>
			<td>ID LogBook</td>
			<td>: </td>
			<td> <input type="text" name="id" readonly value="<?php if (isset($row->id)) {echo $row->id;} else {echo '';}?>">
			</td>
			</tr>
			
			<tr>
			<td>Kode Unit</td>
			<td>: </td>
			<td> <input type="text" name="kode_unit" disabled value="<?php if (isset($row->kode_unit)) {echo $row->kode_unit;} else {echo '';}?>"></td>
			</tr>

			<tr>
			<td>Nama Program</td>
			<td>: </td>
			<td> <input type="text" name="nama_program" disabled value="<?php if (isset($row->nama_program)) {echo $row->nama_program;} else {echo '';}?>"></td>
			</tr>

			<tr>
			<td>Komentar</td>
			<td>: </td>
			<td> <input type="text" name="komentar" value="<?php if (isset($row->komentar)) {echo $row->komentar;} else {echo '';}?>"></td>
			</tr>

		</table>
		<input type="submit" value="Submit">
	</form>
</body>
</html>