<?php
	session_start();
	$iduser=$_POST['iduser'];
	$newpass=$_POST['newpass'];
	include('../../connect_db.php');
	$query = "UPDATE user SET password='$newpass' WHERE iduser=$iduser";
		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
		}else
		{

			header('Location: index.php');

			$db->close();
			exit;
		}	
?>
