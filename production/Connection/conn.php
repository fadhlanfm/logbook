<?php
//Koneksi ke Database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "culture_monitoring";
// Create connection
$con = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$con) die('Could not connect: ' . mysql_error());
$db_selected = mysql_select_db($dbname, $con);


	// $conn = new mysqli($db_host, $db_username, $db_password, $db_database);
	// 	$db = new mysqli($db_host, $db_username, $db_password, $db_database); 
	// 		if ($db->connect_errno){
	// 			die ("Could not connect to the databse: <br />". $db-> connect_error);
	// 		}
?>