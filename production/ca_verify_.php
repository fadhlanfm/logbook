<?php
include_once('Connection/conn.php');
session_start();
$user=$_SESSION['userca'];
$notif=$_SESSION['notif'];
$status=$_GET['id'];

	$getsql=mysql_query("SELECT * FROM ca_performance_upload where username='$user'");
	$getisi=mysql_fetch_array($getsql);
	$total=$getisi['total'];
	$totalnew=$total+1;
	$sql=mysql_query("UPDATE ca_performance_upload SET $status='verified', total='$totalnew' where username='$user'");
	if (mysql_affected_rows()>0){
		echo "berhasil";
		header('location:ca_performance_display.php?id='.$notif);
	}
	else{
		echo "gagal setel";
	}

?>