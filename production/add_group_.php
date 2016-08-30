<?php

	include_once('Connection/conn.php');
	date_default_timezone_set("Asia/Jakarta");
	session_start();


if($_POST['submit']=='simpan')      { 
	$name = $_POST['name'];
	$grup = $_POST['grup'];
	$desc=$_POST['desc'];
	$mydate=getdate(date("U"));
	$jam = date('H:i:s a');
	$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";

$sql = mysqli_query($con,"INSERT INTO survey_group (id_group, group_name, group_desc, survey_name, last_modified, status) VALUES ('', '$grup', '$desc','$name', '$date', 'active')");
if (mysqli_affected_rows($con)>0){
	$_SESSION['surveyname'] = $name;
	echo "berhasil diedit";
	echo "$name";
	echo "$grup";
	echo "$desc";
	header('Location: list_group.php');
}
else{
	echo "gagal edit";
	echo'</br>';
	echo "$name";
	echo "$grup";
	echo "$desc";
	
}

}
else if($_POST['submit']=='batal') {
	$_SESSION['surveyname'] = $name;
	header('Location: list_group.php');
}


	
	
?>