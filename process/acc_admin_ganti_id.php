<?php
	session_start();
	if(isset($_SESSION['id_admin']))
	{
	
	} 
	else
	{
		echo 'You are not logged In <br>';
		echo'<a href="../index.php">LOGIN</a>';
		exit;
	}
	include('../process/connect_db.php');
	$id_lama = mysqli_real_escape_string($mysqli, $_POST['id_lama']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$id_baru = mysqli_real_escape_string($mysqli, $_POST['id_baru']);
	/*$id_lama=$_POST['id_lama'];
	$password=$_POST['password'];
	$id_baru=$_POST['id_baru'];*/
	$cek = "SELECT password FROM admin WHERE id='$id_lama";
	if ($password==$cek) {
		$query = "UPDATE admin SET id='$id_baru' WHERE id='$id_lama'";
		$result = $db->query($query);
		if(!$result)
		{
			$message = "Password anda salah.\\nSilahkan coba kembali.";
  			echo "<script type='text/javascript'>alert('$message');
  			window.location = '../pages/admin_settings.php';
  			</script>";
			exit;
		}else
		{
			header("Location:../pages/admin_settings.php");
			exit;
		}
	}	
?>