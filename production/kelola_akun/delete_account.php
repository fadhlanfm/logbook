<?php
	$iduser=$_GET['iduser'];
	include('../connect_db.php');
	$query = "DELETE FROM user WHERE iduser=$iduser";
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
