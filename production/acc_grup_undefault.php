<?php
session_start();
$id_kat = $_GET['id'];
include('connect_db.php');
$query = "UPDATE aktivitas SET default2=0 WHERE id_aktivitas=$id_kat";
$result = $db->query($query);
if(!$result)
{
    die("Could not query the database: <br />". $db->error);
} else
{
    header('Location: grup_aktivitas.php');
    exit;
}   
?>
