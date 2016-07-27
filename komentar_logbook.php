<?php
	include('connect_db.php');
	$id = $_GET['id'];
	$query = "SELECT * FROM logbook WHERE id = '$id'";
	$result = $db->query($query);
	if (!$result)
		{
			die("could not query the database: <br />".$db->error);
		}
	$logbook = $result->fetch_object();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>