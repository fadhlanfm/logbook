<?php
session_start();
$id_sub = $_GET['id'];
include('connect_db.php');
$query = "UPDATE subaktivitas SET default2=1 WHERE id_subaktivitas=$id_sub";
$result = $db->query($query);
if(!$result)
{
    die("Could not query the database: <br />". $db->error);
} else
{
    header('Location: aktivitas.php');
    exit;
}   
?>
