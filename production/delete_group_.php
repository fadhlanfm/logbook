<?php
include_once('Connection/conn.php');

$id=$_GET['id'];	
$sql = mysql_query("UPDATE Survey_group SET status='Disable' WHERE id_group='$id';");
if (mysql_affected_rows()>0){
	echo "berhasil dihapus";
	header('Location: list_group.php');
}
else{
	echo "gagal hapus";
}

?>