<?php
	session_start();
	$iduser=$_POST['iduser'];
	$username=$_POST['username'];
	include('../../connect_db.php');
	$query = "UPDATE user SET username='$username' WHERE iduser=$iduser";
		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
		} else
		{
			$query2 = "SELECT username FROM user WHERE username='$username' AND iduser=$iduser";
			$result2 = $db->query($query2);
			$row2 = $result2->fetch_object();
			$_SESSION['id'] = $row2->username;
			header('Location: index.php');
			exit;
		}	
?>
