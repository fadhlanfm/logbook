<?php
//Koneksi ke Database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test2";
// Create connection
$con = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$con) die('Could not connect: ' . mysql_error());
$db_selected = mysql_select_db($dbname, $con);

?>
