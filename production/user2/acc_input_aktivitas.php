<?php
session_start();
// initialize var from the submitted form
$idid = $_POST['id_user'];
$id_subaktivitas = $_POST['id_subaktivitas'];
$newfreq = $_POST['frekuensi'];
include('../../connect_db.php');

// file attachment initialize
$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="uploads/";
	// new file size in KB
$new_size = $file_size/1024;  
	// new file size in KB

	// make file name in lower case
$new_file_name = strtolower($file);
	// make file name in lower case

$final_file=str_replace(' ','-',$new_file_name);

move_uploaded_file($file_loc,$folder.$final_file);

// check if there is already a record for this activity
$query2 = "SELECT * from aktivitas_employee WHERE id_user = '$idid'";
$result2 = $db->query($query2);
if(!$result2)
{
	die("Could not query the database: <br />". $db->error);
}
$checker = 0;
while ($row2 = $result2->fetch_object()) {
	if ($id_subaktivitas == $row2->id_subaktivitas) {
		$checker=1;
		break;
	}
}
// end check

// if there is already a record for this activity do
if ($checker == 1) {
	$query = "UPDATE aktivitas_employee SET freq='$newfreq', akt_attachment='$final_file', type='$file_type', size='$new_size' WHERE id_user='$idid' and id_subaktivitas='$id_subaktivitas'";
	$result = $db->query($query);
	if(!$result)
	{
		die("Could not query the database: <br />". $db->error);
	}else
	{

		header('Location: aktivitas.php');

		$db->close();
		exit;
	}
// if there is no record for this activity yet do	
} else {
	$query = "INSERT INTO `aktivitas_employee` (`id_user`, `id_subaktivitas`, `freq`, `akt_attachment`, `type`, `size`) VALUES ('$idid', '$id_subaktivitas', '$newfreq', '$final_file', '$file_type', '$new_size');";
	$result = $db->query($query);
	if(!$result)
	{
		die("Could not query the database: <br />". $db->error);
	}else
	{

		header('Location: aktivitas.php');

		$db->close();
		exit;
	}	
}


?>
