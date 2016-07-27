<?php
	include('connect_db.php');
	$id = (isset($_POST['id']) ? $_POST['id'] : '$id');
	$komentar = (isset($_POST['komentar']) ? $_POST['komentar'] : '$komentar');

		$query = "UPDATE logbook SET komentar='$komentar' WHERE id='$id'";
		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
			exit;
		}else
		{
			header('Location: show_form.php');
			exit;
		}	

	$db->close();
?>