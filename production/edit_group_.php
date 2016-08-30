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
	$id=$_POST['descr'];

$sql = mysqli_query($con,"UPDATE Survey_group SET group_name='$grup', group_desc='$desc', survey_name='$name', last_modified='$date' WHERE id_group='$id';");

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