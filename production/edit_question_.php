<?php
include_once('Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");
session_start();
$id=$_POST['descr'];	

$survey=$_POST['name'];
$grup=$_POST['grup'];
$mydate=getdate(date("U"));
$jam = date('H:i:s a');
$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
$sqls = mysql_query("SELECT * FROM survey_question WHERE id_question='$id';");
$rowx = mysql_fetch_array($sqls);
$detail= $rowx['question_detail'];

if($_POST['submit']=='simpan')      { 
	$sql=mysql_query("DELETE FROM q_type WHERE survey_name='$survey' and group_name='$grup' and question_detail='$detail'");
	var_dump($sql);
	if($_POST['hobby']) {

		$array=$_POST['hobby'];
		$array2=$_POST['hobby2'];
		$array3=$_POST['hobby3'];
		if($array3==null){
			$array3='Active';
		} else {
			$array3=$_POST['hobby3'];
		}

		if($array2=='1'){
			$array4=$_POST['tipe'];
			$array2='Single Choice';
			foreach($array4 as $hobby)
			{
				$result['x']=$hobby;
				$x=$result['x'];
				echo $x;

				$query=mysql_query("INSERT INTO q_type (id_type, question_detail, question_type, survey_name, group_name, type_1) VALUES ('', '$array', '$array2','$survey', '$grup','$x')");

				if (mysql_affected_rows()>0){
					$_SESSION['surveyname'] = $survey;
					$_SESSION['groupname'] = $grup;
					
					echo "berhasil";
				}else{
					echo "gagal edit";
				}
			}
		} else if($array2=='2'){
			$array4=$_POST['tipe'];
			$array2='Multiple Choice';
			foreach($array4 as $hobby)
			{
				$result['x']=$hobby;
				$x=$result['x'];
				echo $x;

				$query=mysql_query("INSERT INTO q_type (id_type, question_detail, question_type, survey_name, group_name, type_1) VALUES ('', '$array', '$array2','$survey', '$grup','$x')");

				if (mysql_affected_rows()>0){
					$_SESSION['surveyname'] = $survey;
					$_SESSION['groupname'] = $grup;
					
					echo "berhasil";
				}else{
					echo "gagal edit";
				}
			}
		} else if($array2=='3'){
			$array4=$_POST['tipe'];
			$array2='Ranking';
			foreach($array4 as $hobby)
			{
				$result['x']=$hobby;
				$x=$result['x'];
				echo $x;
				$query=mysql_query("INSERT INTO q_type (id_type, question_detail, question_type, survey_name, group_name, type_1) VALUES ('', '$array', '$array2','$survey', '$grup','$x')");

				if (mysql_affected_rows()>0){
					$_SESSION['surveyname'] = $survey;
					$_SESSION['groupname'] = $grup;
					
					echo "berhasil";
				}else{
					echo "gagal edit";
				}
				echo $array4;
				echo "berhasil";
			}
		} else if($array2=='4'){
			$array2='Free Text';
			$array4='';
			$_SESSION['surveyname'] = $survey;
			$_SESSION['groupname'] = $grup;
			$query=mysql_query("INSERT INTO q_type (id_type, question_detail, question_type, survey_name, group_name, type_1) VALUES ('', '$array', '$array2','$survey', '$grup','')");

			if (mysql_affected_rows()>0){
				$_SESSION['surveyname'] = $survey;
				$_SESSION['groupname'] = $grup;
				
				echo "berhasil";
			}else{
				echo "gagal edit";
			}

		} else if($array2=='5'){
			$array2='Likert Scale';
			$array4=$_POST['tipe'];
			$query=mysql_query("INSERT INTO q_type (id_type, question_detail, question_type, survey_name, group_name, type_1) VALUES ('', '$array', '$array2','$survey', '$grup','$array4')");

			if (mysql_affected_rows()>0){
				$_SESSION['surveyname'] = $survey;
				$_SESSION['groupname'] = $grup;

				echo "berhasil";
			}else{
				echo "gagal edit";
			}
			echo $array4;
			echo "berhasil";
		} else if($array2=='6'){
			$array2='Forced Choice';
			$array4=$_POST['tipe'];
			$query=mysql_query("INSERT INTO q_type (id_type, question_detail, question_type, survey_name, group_name, type_1) VALUES ('', '$array', '$array2','$survey', '$grup','$array4')");

			if (mysql_affected_rows()>0){
				$_SESSION['surveyname'] = $survey;
				$_SESSION['groupname'] = $grup;

				echo "berhasil";
			}else{
				echo "gagal edit";
			}
			echo $array4;
			echo "berhasil";
		} else {
			$array4='';
			$_SESSION['surveyname'] = $survey;
			$_SESSION['groupname'] = $grup;
			header('Location: list_question.php');

		} 

		$sql=mysql_query("UPDATE Survey_question SET survey_group='$grup', question_detail='$array', question_type='$array2' , survey_name='$survey', last_modified='$date' WHERE id_question='$id';");

		if (mysql_affected_rows()>0){
			$_SESSION['surveyname'] = $survey;
			$_SESSION['groupname'] = $grup;
			header('Location: list_question.php');
			echo "berhasil";
		}else{
			echo "gagal edit";
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