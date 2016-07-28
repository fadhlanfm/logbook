<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
</head>
<body>
<?php
  session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
   {
      
   } else if ($_SESSION['role'] == -1) {
    echo 'You are not logged in as User <br>';
    echo'<a href="../process/acc_logout.php">LOGOUT</a><br>';
    echo'<a href="../production/index.php">BACK</a>';
    exit;
   }
   else
   {
    echo 'You are not logged In <br>';
     echo'<a href="../index.php">LOGIN</a>';
     exit;
    
   }
?>
<a href="../process/acc_logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="fa fa-power-off" aria-hidden="true"> LogOut </span>
              </a>
</body>
</html>
