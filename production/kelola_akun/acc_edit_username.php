<?php
	$iduser=$_POST['iduser'];
	$username=$_POST['username'];
	include('../connect_db.php');
	$query = "UPDATE user SET username='$username' WHERE iduser=$iduser";
		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
		}else
		{
			echo 'Data Updated. </br>';
			echo '<a href="	user_management.php">Lihat</a>';
			$db->close();
			exit;
		}	
?>
