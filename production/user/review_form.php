<?php
	include '../../connect_db.php';
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	
	$kode_unit = (isset($_POST['kode_unit']) ? $_POST['kode_unit'] : '');
	$nama_program = (isset($_POST['nama_program']) ? $_POST['nama_program'] : '');
	$deskripsi = (isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '');
	$start_date = (isset($_POST['start_date']) ? $_POST['start_date'] : '');
	$end_date = (isset($_POST['end_date']) ? $_POST['end_date'] : '');
	$perilaku = (isset($_POST['perilaku']) ? $_POST['perilaku'] : '');
	$aktifitas1 = (isset($_POST['aktifitas1']) ? $_POST['aktifitas1'] : '');
	$target1 = (isset($_POST['target1']) ? $_POST['target1'] : '');
	$satuan1 = (isset($_POST['satuan1']) ? $_POST['satuan1'] : '');
	$aktifitas2 = (isset($_POST['aktifitas2']) ? $_POST['aktifitas2'] : '');
	$target2 = (isset($_POST['target2']) ? $_POST['target2'] : '');
	$satuan2 = (isset($_POST['satuan2']) ? $_POST['satuan2'] : '');
	$aktifitas3 = (isset($_POST['aktifitas3']) ? $_POST['aktifitas3'] : '');
	$target3 = (isset($_POST['target3']) ? $_POST['target3'] : '');
	$satuan3 = (isset($_POST['satuan3']) ? $_POST['satuan3'] : '');
	$aktifitas4 = (isset($_POST['aktifitas4']) ? $_POST['aktifitas4'] : '');
	$target4 = (isset($_POST['target4']) ? $_POST['target4'] : '');
	$satuan4 = (isset($_POST['satuan4']) ? $_POST['satuan4'] : '');
	$aktifitas5 = (isset($_POST['aktifitas5']) ? $_POST['aktifitas5'] : '');
	$target5 = (isset($_POST['target5']) ? $_POST['target5'] : '');
	$satuan5 = (isset($_POST['satuan5']) ? $_POST['satuan5'] : '');
	$kinerja0 = (isset($_POST['kinerja'][0]) ? $_POST['kinerja'][0] : '');
	$kinerja1 = (isset($_POST['kinerja'][1]) ? $_POST['kinerja'][1] : '');
	$kinerja2 = (isset($_POST['kinerja'][2]) ? $_POST['kinerja'][2] : '');
	$kinerja3 = (isset($_POST['kinerja'][3]) ? $_POST['kinerja'][3] : '');
	$monitoring = (isset($_POST['monitoring']) ? $_POST['monitoring'] : '');
	$positif = (isset($_POST['positif']) ? $_POST['positif'] : '');
	$negatif = (isset($_POST['negatif']) ? $_POST['negatif'] : '');
	$nama_ketua = (isset($_POST['nama_ketua']) ? $_POST['nama_ketua'] : '');
	$email_ketua = (isset($_POST['email_ketua']) ? $_POST['email_ketua'] : '');
	$nama_sekre = (isset($_POST['nama_sekre']) ? $_POST['nama_sekre'] : '');
	$email_sekre = (isset($_POST['email_sekre']) ? $_POST['email_sekre'] : '');
	$nama_pdd = (isset($_POST['nama_pdd']) ? $_POST['nama_pdd'] : '');
	$email_pdd = (isset($_POST['email_pdd']) ? $_POST['email_pdd'] : '');
	$nama_corp = (isset($_POST['nama_corp']) ? $_POST['nama_corp'] : '');
	$email_corp = (isset($_POST['email_corp']) ? $_POST['email_corp'] : '');
	$nama_rating = (isset($_POST['nama_rating']) ? $_POST['nama_rating'] : '');
	$email_rating = (isset($_POST['email_rating']) ? $_POST['email_rating'] : '');
	$nama_dare = (isset($_POST['nama_dare']) ? $_POST['nama_dare'] : '');
	$email_dare = (isset($_POST['email_dare']) ? $_POST['email_dare'] : '');
	$nama_pendukung = (isset($_POST['nama_pendukung']) ? $_POST['nama_pendukung'] : '');
	$email_pendukung = (isset($_POST['email_pendukung']) ? $_POST['email_pendukung'] : '');
	$nama_share = (isset($_POST['nama_share']) ? $_POST['nama_share'] : '');
	$email_share = (isset($_POST['email_share']) ? $_POST['email_share'] : '');
	$nama_spirit = (isset($_POST['nama_spirit']) ? $_POST['nama_spirit'] : '');
	$email_spirit = (isset($_POST['email_spirit']) ? $_POST['email_spirit'] : '');
	$nama_standar = (isset($_POST['nama_standar']) ? $_POST['nama_standar'] : '');
	$email_standar = (isset($_POST['email_standar']) ? $_POST['email_standar'] : '');

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Review Form
	</title>
</head>
<body>
	<a href="javascript:window.print()">
	<h1>Apakah Anda yakin untuk submit form ini?</h1>
	<table>
		<tr>
			<th colspan="3">Log Book</th>
		</tr>
		<tr>
			<th>Kode Unik Log Book</th>
			<td><input disabled value="<?php echo ''.$kode_unit.''; ?>" id="disabled" type="text" class="validate"></td>
		</tr>
		<tr>
			<th>Kode Unit</th>
			<td><input disabled value="<?php echo ''.$kode_unit.''; ?>" id="disabled" type="text" class="validate"></td>
		</tr>
		<tr>
			<th>Nama Program</th>
			<td><input disabled value="<?php echo ''.$nama_program.''; ?>" id="disabled" type="text" class="validate"></td>
		</tr>
		<tr>
			<th>Deskripsi Program</th>
			<td><input disabled value="<?php echo ''.$deskripsi.''; ?>" id="disabled" type="text" class="validate"></td>
		</tr>
		<tr>
			<th>Start</th>
			<td><input disabled value="<?php echo ''.$start_date.''; ?>" id="disabled" type="text" class="validate"></td>
		</tr>		
		<tr>
			<th>End</th>
			<td><input disabled value="<?php echo ''.$end_date.''; ?>" id="disabled" type="text" class="validate"></td>
		</tr>
	</table>
	</a>
</body>
</html>
