<?php
session_start();
//connect database
include('../process/connect_db.php');
$db = new mysqli($db_host,$db_username, $db_password, $db_database);
if ($db->connect_errno)
	{
		die("Could not connect to teh database: <br />".$db->connect_error);
	}

    if(isset($_SESSION['role']) && $_SESSION['role'] = -1)
    {
    header("Location:/garuda/pages/admin.php");
    exit;
    } else if (isset($_SESSION['role']) && $_SESSION['role'] = 1)
    {
    header("Location:/garuda/pages/survey.php");
    exit;
    }
?>

<html>
<head>
	<title>Login Responden</title>
	<link rel="stylesheet" type="text/css" href="../assets/css_login.css">
	<script type="text/javascript">
		$('.message a').click(function(){
  	 		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
	</script>
</head>
<body>
	<div class="login-page">
  	<div class="form">
    	<form class="login-form" action="../process/acc_login_responden.php" method="POST">
    		<h1>Login Responden</h1>
			<input type="text" placeholder="Nomor ID" name="id" required>
			<input type="password" placeholder="Password" name="password" required>
			<button type="submit">Masuk</button>
			<h6 align="right"><a href="../index.php">Kembali</a></h6>
		</form>
  	</div>
	</div>
</body>
</html>
