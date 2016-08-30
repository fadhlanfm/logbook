<?php
include_once('Connection/conn.php');

$id=$_GET['id'];	
$sql = mysqli_query($con,"UPDATE Survey_group SET status='Disable' WHERE id_group='$id';");
if (mysqli_affected_rows($con)>0){
	echo "berhasil dihapus";
	header('Location: list_group.php');
}
else{
	echo "gagal hapus";
}

?>