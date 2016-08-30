<form method="post" action="">
	<input type="text" name="nopeg" placeholder="input nopeg">
	<button type="submit" name="submit" value="submit">Submit</button>
</form>

<?php
include_once('../Connection/conn.php');

session_start();
date_default_timezone_set("Asia/Jakarta");
$mydate=getdate(date("U"));
$jam = date('H:i:s a');
$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
if ($_POST['submit']=='submit') {
	$nopeg=$_POST['nopeg'];
	echo $nopeg;

	$update1=mysqli_query($con,"INSERT INTO ca_user (ca_nopeg, ca_password, last_modified) values ('$nopeg', '$nopeg', '$date')");
	$update2=mysqli_query($con,"SELECT * FROM ca_user JOIN employee on ca_user.ca_nopeg=employee.NIP JOIN unit on employee.unit=unit.kode where ca_nopeg='$nopeg'");
	$isi_u2=mysqli_fetch_array($update2);
	$kode=$isi_u2['kode_ca'];
	$unit=$isi_u2['unit'];
	$username=$isi_u2['NIP'];
	echo $unit;
	$update3=mysqli_query($con,"UPDATE ca_performance_upload SET username='$username', last_modified='$date' where unit_name='$unit'");
	if (mysqli_affected_rows($con)>0){

		echo "berhasil diedit";
	}
	else{
		echo "gagal edit";
		echo'</br>';
					// var_dump($sql);

	}
}
?>