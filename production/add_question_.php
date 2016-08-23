<?php
include_once('Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");
session_start();

$survey=$_POST['name'];
$grup=$_POST['grup'];
$mydate=getdate(date("U"));
$jam = date('H:i:s a');
$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
if($_POST['submit']=='simpan')      { 
	if($_POST['hobby']) {

		$array=$_POST['hobby'];
		$array2=$_POST['hobby2'];
		

		$array3=$_POST['hobby3'];

		$i=0;
		foreach($array as $hobby)
		{

			$result['x']=$hobby;
			$result['y']=$array2[$i];
			$result['z']=$array3[$i];
			$i++;


			$x=$result['x'];
			$y=$result['y'];
			$z=$result['z'];
			echo $survey;
			echo $grup;
			echo $x;
			echo $y;
			echo $z;
			echo $date;
			$sql=mysql_query("INSERT INTO survey_question (id_question, question_detail, question_type, survey_name, survey_group, status, last_modified) VALUES ('', '$x', '$y','$survey', '$grup', '$z','$date')");

			if (mysql_affected_rows()>0){
				$_SESSION['surveyname'] = $survey;
				$_SESSION['groupname'] = $grup;
				header('Location: list_question.php');

			}else{
				echo "gagal edit";
			}

		}

	} else {
		echo 'no data';
	}
}
else if($_POST['submit']=='batal') {
	$_SESSION['surveyname'] = $survey;
	$_SESSION['groupname'] = $grup;
	header('Location: list_question.php');
}

?>