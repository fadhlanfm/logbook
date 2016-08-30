<?php
session_start();
include_once('../Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");



if($_POST['submit']=='simpan')      { 
	$name = $_POST['name'];
	$unit = $_POST['unit'];
	
	$cekisi=mysqli_query($con,"SELECT * FROM unit_performance_upload where username='$name'");
	$rowc=mysqli_fetch_array($cekisi);

	$mydate=getdate(date("U"));
	$jam = date('H:i:s a');
	$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
	$uploadOk = 1;
	
	
	if($rowc['file2']==null || empty($rowc['file2'])){
		if (isset($_FILES['file2']['name'])&&!empty($_FILES['file2']['name'])) {
			$file2 = rand(1000,100000)."-".$_FILES['file2']['name'];
			$file_loc2 = $_FILES['file2']['tmp_name'];
			$file_size2 = $_FILES['file2']['size'];
			// Check file size
			if ($file_size2 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
			$folder2="uploads/";
		// new file size in KB
			$new_size = $file_size2/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name2 = strtolower($file2);
		// make file name in lower case

			$final_file2=str_replace(' ','-',$new_file_name2);
			// Allow certain file formats

			$target_file = $folder2 . basename($_FILES["file2"]["name"]);
			$file_type2 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type2 != "rar" && $file_type2 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type2;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				
				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc2,$folder2.$final_file2);
				$sql2= mysqli_query($con,"UPDATE unit_performance_upload SET file2='$final_file2', status_f2='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update2=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 2', '$final_file2', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);

				}
			}
		}

	}


	if($rowc['file3']==null || empty($rowc['file3'])){
		if (isset($_FILES['file3']['name'])&&!empty($_FILES['file3']['name'])) {
			$file3 = rand(1000,100000)."-".$_FILES['file3']['name'];
			$file_loc3 = $_FILES['file3']['tmp_name'];
			$file_size3 = $_FILES['file3']['size'];
			// Check file size
			if ($file_size3 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
			$folder3="uploads/";
		// new file size in KB
			$new_size = $file_size3/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name3 = strtolower($file3);
		// make file name in lower case

			$final_file3=str_replace(' ','-',$new_file_name3);
			// Allow certain file formats

			$target_file = $folder3 . basename($_FILES["file3"]["name"]);
			$file_type3 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type3 != "rar" && $file_type3 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type3;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				
				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc3,$folder3.$final_file3);
				$sql3= mysqli_query($con,"UPDATE unit_performance_upload SET file3='$final_file3', status_f3='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update3=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 3', '$final_file3', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);

				}
			}
		}

	} 

	if($rowc['file4']==null || empty($rowc['file4'])){
		if (isset($_FILES['file4']['name'])&&!empty($_FILES['file4']['name'])) {
			$file4 = rand(1000,100000)."-".$_FILES['file4']['name'];
			$file_loc4 = $_FILES['file4']['tmp_name'];
			$file_size4 = $_FILES['file4']['size'];
			$folder4="uploads/";
			// Check file size
			if ($file_size4 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
		// new file size in KB
			$new_size = $file_size2/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name4 = strtolower($file4);
		// make file name in lower case

			$final_file4=str_replace(' ','-',$new_file_name4);
			$target_file = $folder4 . basename($_FILES["file4"]["name"]);
			$file_type4 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type4 != "rar" && $file_type4 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type4;
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				

				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc4,$folder4.$final_file4);
				$sql4= mysqli_query($con,"UPDATE unit_performance_upload SET file4='$final_file4', status_f4='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update4=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 4', '$final_file4', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);

				}
			}
		}

	} 

	if($rowc['file5']==null || empty($rowc['file5'])){
		if (isset($_FILES['file5']['name'])&&!empty($_FILES['file5']['name'])) {
			$file5 = rand(1000,100000)."-".$_FILES['file5']['name'];
			$file_loc5 = $_FILES['file5']['tmp_name'];
			$file_size5 = $_FILES['file5']['size'];
			$folder5="uploads/";
			// Check file size
			if ($file_size5 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
		// new file size in KB
			$new_size = $file_size5/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name5 = strtolower($file5);
		// make file name in lower case

			$final_file5=str_replace(' ','-',$new_file_name5);
			$target_file = $folder5 . basename($_FILES["file5"]["name"]);
			$file_type5 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type5 != "rar" && $file_type5 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type5;
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				

				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc5,$folder5.$final_file5);
				$sql5= mysqli_query($con,"UPDATE unit_performance_upload SET file5='$final_file5', status_f5='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update5=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 5', '$final_file5', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);

				}
			}
		}

	}

	if($rowc['file6']==null || empty($rowc['file6'])){
		if (isset($_FILES['file6']['name'])&&!empty($_FILES['file6']['name'])) {
			$file6 = rand(1000,100000)."-".$_FILES['file6']['name'];
			$file_loc6 = $_FILES['file6']['tmp_name'];
			$file_size6 = $_FILES['file6']['size'];
			$folder6="uploads/";
			// Check file size
			if ($file_size6 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
		// new file size in KB
			$new_size = $file_size6/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name6 = strtolower($file6);
		// make file name in lower case

			$final_file6=str_replace(' ','-',$new_file_name6);
			$target_file = $folder6 . basename($_FILES["file6"]["name"]);
			$file_type6 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type6 != "rar" && $file_type6 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type6;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				
				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc6,$folder6.$final_file6);
				$sql6 = mysqli_query($con,"UPDATE unit_performance_upload SET file6='$final_file6', status_f6='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update6=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 6', '$final_file6', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);
				}
			}
		}
	}

	if($rowc['file7']==null || empty($rowc['file7'])){
		if (isset($_FILES['file7']['name'])&&!empty($_FILES['file7']['name'])) {
			$file7 = rand(1000,100000)."-".$_FILES['file7']['name'];
			$file_loc7 = $_FILES['file7']['tmp_name'];
			$file_size7 = $_FILES['file7']['size'];
			// Check file size
			if ($file_size7 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
			$folder7="uploads/";
		// new file size in KB
			$new_size = $file_size7/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name7 = strtolower($file7);
		// make file name in lower case

			$final_file7=str_replace(' ','-',$new_file_name7);
			// Allow certain file formats

			$target_file = $folder7 . basename($_FILES["file7"]["name"]);
			$file_type7 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type7 != "rar" && $file_type7 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type7;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				
				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc7,$folder7.$final_file7);
				$sql7= mysqli_query($con,"UPDATE unit_performance_upload SET file7='$final_file7', status_f7='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update7=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 7', '$final_file7', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);

				}
			}
		}

	}

	if($rowc['file8']==null || empty($rowc['file8'])){
		if (isset($_FILES['file8']['name'])&&!empty($_FILES['file8']['name'])) {
			$file8 = rand(1000,100000)."-".$_FILES['file8']['name'];
			$file_loc8 = $_FILES['file8']['tmp_name'];
			$file_size8 = $_FILES['file8']['size'];
			$folder8="uploads/";
			// Check file size
			if ($file_size8 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
		// new file size in KB
			$new_size = $file_size8/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name8 = strtolower($file8);
		// make file name in lower case

			$final_file8=str_replace(' ','-',$new_file_name8);
			$target_file = $folder8 . basename($_FILES["file8"]["name"]);
			$file_type8 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type8 != "rar" && $file_type8 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type8;
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				

				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc8,$folder8.$final_file8);
				$sql8 = mysqli_query($con,"UPDATE unit_performance_upload SET file8='$final_file8', status_f8='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update8=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 8', '$final_file8', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);
				}
			}

		} 
	}

	if($rowc['file9']==null || empty($rowc['file9'])){
		if (isset($_FILES['file9']['name'])&&!empty($_FILES['file9']['name'])) {
			$file9 = rand(1000,100000)."-".$_FILES['file9']['name'];
			$file_loc9 = $_FILES['file9']['tmp_name'];
			$file_size9 = $_FILES['file9']['size'];
			$folder9="uploads/";
			// Check file size
			if ($file_size9 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
		// new file size in KB
			$new_size = $file_size9/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name9 = strtolower($file9);
		// make file name in lower case

			$final_file9=str_replace(' ','-',$new_file_name9);
			$target_file = $folder9 . basename($_FILES["file9"]["name"]);
			$file_type9 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type9 != "rar" && $file_type9 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type9;
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				

				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc9,$folder9.$final_file9);
				$sql9 = mysqli_query($con,"UPDATE unit_performance_upload SET file9='$final_file9', status_f9='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update9 =mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 9', '$final_file9', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);
				}
			}

		} 
	}

	if($rowc['file10']==null || empty($rowc['file10'])){
		if (isset($_FILES['file10']['name'])&&!empty($_FILES['file10']['name'])) {
			$file10 = rand(1000,100000)."-".$_FILES['file10']['name'];
			$file_loc10 = $_FILES['file10']['tmp_name'];
			$file_size10 = $_FILES['file10']['size'];
			$folder10="uploads/";
			// Check file size
			if ($file_size10 > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['size']="Sorry, your file is too large.";
				$uploadOk = 0;
			}
		// new file size in KB
			$new_size = $file_size10/1024;  
		// new file size in KB

		// make file name in lower case
			$new_file_name10 = strtolower($file10);
		// make file name in lower case

			$final_file10=str_replace(' ','-',$new_file_name10);
			$target_file = $folder10 . basename($_FILES["file10"]["name"]);
			$file_type10 = pathinfo($target_file,PATHINFO_EXTENSION);;
			// Allow certain file formats
			if($file_type10 != "rar" && $file_type10 != "zip" ) {
				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type10;
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				

				header('location:unit_performance.php');
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc10,$folder10.$final_file10);
				$sql10 = mysqli_query($con,"UPDATE unit_performance_upload SET file10='$final_file10', status_f10='uploaded', last_modified='$date' where username='$name' and unit_name='$unit'");
				$update10=mysqli_query($con,"INSERT INTO unit_performance_activity (activity_detail, activity_file, username, status, last_modified) values ('$name menambahkan file baru kedalam Change Agent Event 10', '$final_file10', '$name', 'unread', '$date')");
				if (mysqli_affected_rows($con)>0){
					header('Location: unit_performance.php');
					echo "berhasil diedit";
				}
				else{
					echo "gagal edit";
					echo'</br>';
					// var_dump($sql);
				}
			}

		} 
	}

}
else {
	$_SESSION['surveyname'] = $name;

}




?>