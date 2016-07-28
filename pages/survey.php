<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
</head>
<body>
<?php
    session_start();
    echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";
?>
<a href="../process/acc_logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="fa fa-power-off" aria-hidden="true"> LogOut </span>
              </a>
</body>
</html>
