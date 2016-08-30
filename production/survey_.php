<?php

	include_once('conn.php');
	date_default_timezone_set("Asia/Jakarta");
	session_start();

	$id = $_POST['id'];
	$jawab1=$_POST['range1'];
	$jawab2=$_POST['range2'];
	$jawab3=$_POST['range3'];
	$jawab4=$_POST['range4'];
	
	$mydate=getdate(date("U"));
	$jam = date('H:i:s a');
	$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";

$sql = mysqli_query($con,"INSERT INTO jawaban (id_jawab, id_user, jawaban1, jawaban2, jawaban3, jawaban4, last_modified) VALUES ('', '$id', '$jawab1','$jawab2', $jawab3, $jawab4, '$date')");
if (mysqli_affected_rows()>0){

	echo "berhasil diedit";
	
}
else{
	echo "gagal edit";

}




	
	
?>