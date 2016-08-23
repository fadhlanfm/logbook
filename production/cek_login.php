<?php 
session_start();
include('conn.php');
if(isset($_POST['id']) && isset($_POST['password']))
{
	$id_resp = $_POST['id'];
	$pass_resp =  $_POST['password'];
	echo $id_resp;
	echo $pass_resp;
	$q = mysql_query("SELECT * FROM user WHERE nopeg = '$id_resp' AND password = '$pass_resp'");
	
	if($row = mysql_num_rows($q)>0)
	{
		$check=mysql_fetch_array($q);
		$user=$check['nopeg'];
		$unit=$check['unit'];
		$_SESSION['id'] = $user;
		$_SESSION['unit'] = $unit;
		header("Location:survey.php");
		exit;
	}
	else
	{
		$message = "ID atau Password anda salah.\\nSilahkan coba kembali.";
		echo "<script type='text/javascript'>alert('$message');
		window.location = 'login.php';
	</script>";
	exit;
}
}

?>
