<?php
	$db_host ="localhost";
	$db_username ="root";
	$db_database ="culture_monitoring";
	$db_password ='';
	$conn = new mysqli($db_host, $db_username, $db_password, $db_database);
		$db = new mysqli($db_host, $db_username, $db_password, $db_database); 
			if ($db->connect_errno){
				die ("Could not connect to the database: <br />". $db-> connect_error);
			}

	$mysqli = new mysqli($db_host, $db_username, $db_password,$db_database);
	
	function secure($str,$sqlHandle)
	{
		$secured = strip_tags($str);
		$secured = htmlspecialchars($secured);
		$secured = mysqli_real_escape_string($sqlHandle,$secured);
		
		return $secured;
	}
?>
