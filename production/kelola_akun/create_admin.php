<?php
//connect database
include('../connect_db.php');
$db = new mysqli($db_host,$db_username, $db_password, $db_database);
if ($db->connect_errno)
	{
		die("Could not connect to teh database: <br />".$db->connect_error);
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Create Account</title>
    <meta charset="UTF-8">
  </head>
  <body>
  <div class="container">
  <div class="row">

    <form class="col s12" action="acc_create_admin.php" method="POST">
                <input type="text" name="username" placeholder="username"></input>
                </div>
                <div class="row">
                <input type="text" name="password" placeholder="password"></input>
                </div>
    <button type="submit" value="Submit" class="right btn waves-effect waves-light">Submit</button>
  </form>
  </div>
  </body>
</html>