<?php
	include('../connect_db.php');
	$id = $_GET['id'];
	$query = "SELECT status FROM logbook WHERE id = '$id'";
	$result = $db->query($query);
	$status = $result->fetch_object();
	$status = $status->status;

	if($status   == 1){
		$query2 = "UPDATE logbook SET status='0' WHERE id = '$id'";
	}

	if(!isset($query2)){
		header('Location: show_form.php');
	}else{
		$result2 = $db->query($query2);
		if($result2){
			header('Location: show_form.php');
		}else{
			echo $id;
		}
	}
	$db->close();
?>
