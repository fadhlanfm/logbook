<?php

include_once('Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");
session_start();

if($_POST['submit']=='simpan'){ 
	$name = $_POST['name'];
	$f_date=$_POST['start'];
	$survey=$_SESSION['surveyname'];
	$e_date=$_POST['end'];
	$url=$_POST['url'];
	$desc=$_POST['desc'];
	$mydate=getdate(date("U"));
	$jam = date('H:i:s a');
	$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
	$id=$_POST['descr'];	
	echo "$name";
	echo "$f_date";
	echo "$e_date";
	echo "$url";
	echo "$desc";
	echo "$date";
	echo "$id";
	echo "$survey";
	$sql = mysql_query("UPDATE Survey_list SET survey_name='$name', first_date='$f_date', last_date='$e_date', url='$url', survey_desc='$desc', last_modified='$date' WHERE id_survey='$id';"); 
	$sql2 = mysql_query("UPDATE Survey_group SET survey_name='$name', last_modified='$date' WHERE survey_name='$survey'; ");
	$sql3 = mysql_query("UPDATE Survey_question SET survey_name='$name', last_modified='$date' WHERE survey_name='$survey';");

	if (mysql_affected_rows()>0){
		echo "berhasil diedit";
		echo "$name";
		echo "$f_date";
		echo "$e_date";
		echo "$url";
		echo "$desc";
		echo "$date";
		echo "$id";
		header('Location: list_survey.php');
		session_destroy();
	}
	else{
		echo "gagal edit";
		echo'</br>';
		echo "$name";
		echo "$f_date";
		echo "$e_date";
		echo "$url";
		echo "$desc";
		echo "$date";
		echo "$id";
	}

}
else if($_POST['submit']=='batal') {
	header('Location: list_survey.php');
}




?>