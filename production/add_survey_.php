<?php

	include_once('Connection/conn.php');
	date_default_timezone_set("Asia/Jakarta");
	

echo date(", h:i:s a");
if($_POST['submit']=='simpan')      { 
	$name = $_POST['name'];
	$f_date=$_POST['start'];
	$e_date=$_POST['end'];
	$url=$_POST['url'];
	$desc=$_POST['desc'];
	$mydate=getdate(date("U"));
	$jam = date('H:i:s a');
	$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";

$sql = mysql_query("INSERT INTO Survey_list (id_survey, survey_name, first_date, last_date, url, survey_desc, last_modified, status) VALUES ('', '$name', '$f_date', '$e_date', '$url', '$desc', '$jam', 'active')");
if (mysql_affected_rows()>0){
	echo "berhasil diedit";
	echo "$name";
	echo "$f_date";
	echo "$e_date";
	echo "$url";
	echo "$desc";
	header('Location: list_survey.php');
}
else{
	echo "gagal edit";
	echo'</br>';
	echo "$name";
	echo "$f_date";
	echo "$e_date";
	echo "$url";
	echo "$desc";
	
}

}
else if($_POST['submit']=='batal') {
	header('Location: list_survey.php');
}


	
	
?>