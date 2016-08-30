<?php
//Koneksi ke Database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "culture_monitoring";
// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if (!$con) die('Could not connect: ' . mysqli_error());


?>