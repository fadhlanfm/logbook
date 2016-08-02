<?php
	$db_host ="localhost";
	$db_username ="root";
	$db_database ="culture_monitoring";
	$db_password ='';
	$conn = new mysqli($db_host, $db_username, $db_password, $db_database);
		$db = new mysqli($db_host, $db_username, $db_password, $db_database); 
			if ($db->connect_errno){
				die ("Could not connect to the databse: <br />". $db-> connect_error);
			}
?>
