<?php
	include '../connect_db.php';
	$direktorat = (isset($_POST['direktorat']) ? $_POST['direktorat'] : '');
	$unit = (isset($_POST['unit']) ? $_POST['unit'] : '');
	$branch = (isset($_POST['branch']) ? $_POST['branch'] : '');
	$username = (isset($_POST['username']) ? $_POST['username'] : '');
	$password = (isset($_POST['password']) ? $_POST['password'] : '');
	$role=1;

		$query = "INSERT into user(username,
									password,
									role, 
									dir,
									unit,
									branch 
									) 

									values ('$username',
									'$password',
									'$role', 
									'$direktorat',
									'$unit',
									'$branch')";

		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
		}else
		{
			header ('Location: user_management.php');
			$db->close();
			exit;
		}	
?>
