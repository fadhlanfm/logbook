<?php
include_once('../Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");
session_start();

$username=$_POST['name'];
$unit=$_POST['unit'];
$mydate=getdate(date("U"));
$jam = date('H:i:s a');
$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";

if($_POST['submit']=='simpan')      { 
	if($_POST['hambatan']) {

		$array=$_POST['hambatan'];
		$array2=$_POST['solusi'];
		$array3=$_POST['start'];
		$array4=$_POST['end'];
		$array5=$_POST['followup'];

		$i=0;
		foreach($array as $hambatan)
		{

			$result['x']=$hambatan;
			$result['y']=$array2[$i];
			$result['z']=$array3[$i];
			$result['a']=$array4[$i];
			$result['b']=$array5[$i];
			$i++;


			$x=$result['x'];
			$y=$result['y'];
			$z=$result['z'];
			$a=$result['a'];
			$b=$result['b'];
			echo $username;
			echo $unit;
			echo $x;
			echo $y;
			echo $z;
			echo $a;
			echo $b;
			echo $date;
			$sql=mysqli_query($con,"INSERT INTO unit_performance_report ( username, unit_name, hambatan, solusi, solusi_mulai, solusi_akhir, follow_up, last_modified) VALUES ( '$username', '$unit','$x', '$y', '$z', '$a', '$b','$date')");

			if (mysqli_affected_rows($con)>0){
				
				header('Location: unit_performance.php');

			}else{
				var_dump($sql);
				echo "gagal edit";
			}

		}

	} else {
		echo 'no data';	
	}
}
else if($_POST['submit']=='batal') {
	header('Location: unit_performance.php');
}

?>