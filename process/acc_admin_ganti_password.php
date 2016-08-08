<?php
	session_start();
	if(isset($_SESSION['id_admin']))
	{
	
	} 
	else
	{
		header ('Location: ../page_4033.php');
		exit;
	}
	include('../process/connect_db.php');
	$password_lama=$_POST['password_lama'];
	$password_baru=$_POST['password_baru'];
	$password_baru_konfirm=$_POST['password_baru_konfirm'];
	$cek = "SELECT password FROM admin WHERE id='$id_lama";
	if ($password==$cek) {
		$query = "UPDATE admin SET id='$id_baru' WHERE id='$id_lama'";
		$result = $db->query($query);
		if(!$result)
		{
			$message = "ID atau Password anda salah.\\nSilahkan coba kembali.";
  			echo "<script type='text/javascript'>alert('$message');
  			window.location = '../pages/login_admin.php';
  			</script>";
			exit;
		}else
		{
			header("Location:../pages/admin_settings.php");
			exit;
		}
	}	
?>
