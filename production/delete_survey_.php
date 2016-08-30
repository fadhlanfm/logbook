<?php
include_once('Connection/conn.php');

$id=$_GET['id'];	
$sql = mysqli_query($con,"UPDATE Survey_list SET status='Disable' WHERE id_survey='$id';");
if (mysqli_affected_rows($con)>0){
	echo "berhasil dihapus";
}
else{
	echo "gagal hapus";
}
header('Location: list_survey.php');
?>