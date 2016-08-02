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
    <script type="text/javascript" src="../materialize/js/jquery-3.0.0.min.js"></script>
	  <script>
      //function for dependent dropdown option
      function getSecond(val)
      {
        $.ajax({
          type: "POST",
          url: "get_second.php",
          data: 'kode='+val,
          success: function(data) {
            $("#second-choice").html(data);
          }
        });
      }

      function getThird(val)
      {
        $.ajax({
          type: "POST",
          url: "get_third.php",
          data: 'kode='+val,
          success: function(data) {
            $("#third-choice").html(data);
          }
        });
      }
 	  </script>
  </head>
  <body>
  <div class="container">
  <div class="row">

    <form class="col s12" action="acc_create_user.php" method="POST">
                <div class="row">
                <select class="browser-default" name="direktorat" id="first-choice" onclick="getSecond(this.value);">
                  <option default>Pilih Direktorat</option>
                  <?php 
                    $query = " SELECT * FROM direktorat ";
                    //execute the query
                    $result = $db->query( $query );
                    if (!$result)
                    {
                      die("could not query the database: <br />".$db->error);
                    }
                    $i = 1;
                    while ($row = $result->fetch_object())
                    {
                      echo '<option value="'.$row->kode.'">'.$row->kode.' - '.$row->nama.'</option>';
                    }
                  ?>
                </select>
                </div>
                <div class="row">
                <select class="browser-default" name="unit" id="second-choice" onclick="getThird(this.value);">
                  <option default>Pilih Unit</option>
                </select>
                </div>
                <div class="row">
                <select class="browser-default" name="branch" id="third-choice">
                  <option default >Pilih Cabang</option>
                </select>
                </div>
                <div class="row">
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