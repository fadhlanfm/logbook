<?php
include_once('Connection/conn.php');
session_start();

$id=$_GET['id'];	
// $query = mysqli_query($con,"SELECT * FROM Survey_question WHERE id_question='$id';");
// $row = mysqli_fetch_array($query);
// $surveyname="$row[survey_name]";
// $groupname="$row[survey_group]";


// $_SESSION['surveyname'] = $surveyname;
// $_SESSION['groupname'] = $groupname;
$sql = mysqli_query($con,"UPDATE survey_question SET status='Disable' WHERE id_question='$id';");
if (mysqli_affected_rows($con)>0){
	echo "berhasil dihapus"; 
	header('Location: list_question.php');
}else{
	echo "gagal hapus";
}

?>