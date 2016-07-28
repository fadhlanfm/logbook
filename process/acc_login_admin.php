<?php
include('../process/connect_db.php');
if(isset($_POST['id']) && isset($_POST['password']))
{
	
	$id_admin = secure($_POST['id'], $mysqli);
	$pass_admin =  secure($_POST['password'], $mysqli);
	
	$q = "SELECT * FROM user WHERE username = '$id_admin' AND password = '$pass_admin'";
	if($res = $mysqli->query($q))
	{
		if($res->num_rows > 0)
		{
			$_SESSION['id_admin'] = $id_admin;
			header("Location:../production/index.php");
			exit;
		}
		else
		{
			$message = "ID atau Password anda salah.\\nSilahkan coba kembali.";
  			echo "<script type='text/javascript'>alert('$message');
  			window.location = '../pages/login_admin.php';
  			</script>";
  			exit;
		}
	}
}
?>
