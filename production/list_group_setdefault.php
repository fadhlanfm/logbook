<?php
include_once('Connection/conn.php');
session_start();
$survey=$_POST['survey-'];
$grup=$_POST['grup-'];
$_SESSION['surveyname'] = $survey;
$_SESSION['groupname'] = $grup;
if($_POST['submit']=='Jadikan Default')      { 
	if(!empty($_POST['node_types'])) {
		foreach($_POST['node_types'] as $check) {
			echo $check;
			echo '</br>'; 
		
			$sql = mysql_query("UPDATE survey_group SET status='Default' WHERE id_group='$check'");
			if (mysql_affected_rows()>0){
				echo "berhasil dihapus";


			}

			else{
				echo "gagal setel";
			}
			header('Location:list_group.php');
		}
	} else {
		header('Location:list_group.php');
			
	}
} 
else if($_POST['submit']=='Reset') {

	$sql = mysql_query("UPDATE survey_group SET status='Active'");
	if (mysql_affected_rows()>0){
		echo "berhasil dihapus";
		header('Location:list_group.php');	
	}
	else{
		echo "gagal setel";
		header('Location:list_group.php');	
	}
}

?>