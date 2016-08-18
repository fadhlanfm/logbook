<?php
include_once('Connection/conn.php');

$id=$_GET['id'];	
$sql = mysql_query("UPDATE Survey_list SET status='Disable' WHERE id_survey='$id';");
if (mysql_affected_rows()>0){
	echo "berhasil dihapus";
}
else{
	echo "gagal hapus";
}
header('Location: list_survey.php');
?>