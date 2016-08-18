<?php session_start();
	session_destroy();
	$message = "Anda telah logout. Terimakasih";
  			echo "<script type='text/javascript'>alert('$message');
  			window.location = '../index.php';
  			</script>";
  			exit; ?>