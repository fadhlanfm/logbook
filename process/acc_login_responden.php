<?php 
session_start();
include('../process/connect_db.php');
if(isset($_POST['id']) && isset($_POST['password']))
{
	$id_resp = secure($_POST['id'], $mysqli);
	$pass_resp =  secure($_POST['password'], $mysqli);
	
	$q = "SELECT * FROM user WHERE BINARY username = '$id_resp' AND BINARY password = '$pass_resp' AND role = 1";
	$result = $db->query($q);
	$row = $result->fetch_object();
	if($res = $mysqli->query($q))
	{
		if($res->num_rows > 0)
		{
			$_SESSION['id'] = $id_resp;
			$_SESSION['role'] = $row->role;
			$_SESSION['unit'] = $row->unit;
			header("Location:../production/user/index.php");
			exit;
		}
		else
		{
			$message = "ID atau Password anda salah.\\nSilahkan coba kembali.";
  			echo "<script type='text/javascript'>alert('$message');
  			window.location = '../pages/login_responden.php';
  			</script>";
  			exit;
		}
	}
}
?>
