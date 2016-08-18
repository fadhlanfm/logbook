<?php
include_once('Connection/conn.php');
session_start();

$id=$_GET['id'];	
// $query = mysql_query("SELECT * FROM Survey_question WHERE id_question='$id';");
// $row = mysql_fetch_array($query);
// $surveyname="$row[survey_name]";
// $groupname="$row[survey_group]";


// $_SESSION['surveyname'] = $surveyname;
// $_SESSION['groupname'] = $groupname;
$sql = mysql_query("UPDATE survey_question SET status='Disable' WHERE id_question='$id';");
if (mysql_affected_rows()>0){
	echo "berhasil dihapus"; 
	header('Location: list_question.php');
}else{
	echo "gagal hapus";
}

?>