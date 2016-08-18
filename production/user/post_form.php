<?php
include '../../connect_db.php';

$direktorat = (isset($_POST['direktorat']) ? $_POST['direktorat'] : '');
$unit = (isset($_POST['unit']) ? $_POST['unit'] : '');
$branch = (isset($_POST['branch']) ? $_POST['branch'] : '');
$nama_program = (isset($_POST['nama_program']) ? $_POST['nama_program'] : '');
$deskripsi = (isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '');
$startdate = (isset($_POST['start_date']) ? $_POST['start_date'] : '');
$start_date = DateTime::createFromFormat('m/d/Y', $startdate);
$start_date = $start_date->format('Y-m-d');
$enddate = (isset($_POST['end_date']) ? $_POST['end_date'] : '');
$end_date = DateTime::createFromFormat('m/d/Y', $enddate);
$end_date = $end_date->format('Y-m-d');
$perilaku = (isset($_POST['perilaku']) ? $_POST['perilaku'] : '');
if (isset($_POST['aktifitas'][0])) {
	$aktifitas0 = $_POST['aktifitas'][0];
} else {
	$aktifitas0 = null;
}
if (isset($_POST['target'][0])) {
	$target0 = $_POST['target'][0];
} else {
	$target0 = null;
}
if (isset($_POST['satuan'][0])) {
	$satuan0 = $_POST['satuan'][0];
} else {
	$satuan0 = null;
}

if (isset($_POST['aktifitas'][1])) {
	$aktifitas1 = $_POST['aktifitas'][1];
} else {
	$aktifitas1 = null;
}
if (isset($_POST['target'][1])) {
	$target1 = $_POST['target'][1];
} else {
	$target1 = null;
}
if (isset($_POST['satuan'][1])) {
	$satuan1 = $_POST['satuan'][1];
} else {
	$satuan1 = null;
}

if (isset($_POST['aktifitas'][2])) {
	$aktifitas2 = $_POST['aktifitas'][2];
} else {
	$aktifitas2 = null;
}
if (isset($_POST['target'][2])) {
	$target2 = $_POST['target'][2];
} else {
	$target2 = null;
}
if (isset($_POST['satuan'][2])) {
	$satuan2 = $_POST['satuan'][2];
} else {
	$satuan2 = null;
}
if (isset($_POST['aktifitas'][3])) {
	$aktifitas3 = $_POST['aktifitas'][3];
} else {
	$aktifitas3 = null;
}
if (isset($_POST['target'][3])) {
	$target3 = $_POST['target'][3];
} else {
	$target3 = null;
}
if (isset($_POST['satuan'][3])) {
	$satuan3 = $_POST['satuan'][3];
} else {
	$satuan3 = null;
}
if (isset($_POST['aktifitas'][4])) {
	$aktifitas4 = $_POST['aktifitas'][4];
} else {
	$aktifitas4 = null;
}
if (isset($_POST['target'][4])) {
	$target4 = $_POST['target'][4];
} else {
	$target4 = null;
}
if (isset($_POST['satuan'][4])) {
	$satuan4 = $_POST['satuan'][4];
} else {
	$satuan4 = null;
}

$kinerja0 = (isset($_POST['kinerja'][0]) ? $_POST['kinerja'][0] : '');
$kinerja1 = (isset($_POST['kinerja'][1]) ? $_POST['kinerja'][1] : '');
$kinerja2 = (isset($_POST['kinerja'][2]) ? $_POST['kinerja'][2] : '');
$kinerja3 = (isset($_POST['kinerja'][3]) ? $_POST['kinerja'][3] : '');
$monitoring = (isset($_POST['monitoring']) ? $_POST['monitoring'] : '');
$other0 = (isset($_POST['other0']) ? $_POST['other0'] : '');
$positif = (isset($_POST['positif']) ? $_POST['positif'] : '');
$other1 = (isset($_POST['other1']) ? $_POST['other1'] : '');
$negatif = (isset($_POST['negatif']) ? $_POST['negatif'] : '');
$other2 = (isset($_POST['other2']) ? $_POST['other2'] : '');
$nama_ketua = (isset($_POST['nama_ketua']) ? $_POST['nama_ketua'] : '');
$email_ketua = (isset($_POST['email_ketua']) ? $_POST['email_ketua'] : '');
$nama_sekre = (isset($_POST['nama_sekre']) ? $_POST['nama_sekre'] : '');
$email_sekre = (isset($_POST['email_sekre']) ? $_POST['email_sekre'] : '');
$posisi_0 = (isset($_POST['posisi_'][0]) ? $_POST['posisi_'][0] : '');
$nama_0 = (isset($_POST['nama_'][0]) ? $_POST['nama_'][0] : '');
$email_0 = (isset($_POST['email_'][0]) ? $_POST['email_'][0] : '');
$posisi_1 = (isset($_POST['posisi_'][1]) ? $_POST['posisi_'][1] : '');
$nama_1 = (isset($_POST['nama_'][1]) ? $_POST['nama_'][1] : '');
$email_1 = (isset($_POST['email_'][1]) ? $_POST['email_'][1] : '');
$posisi_2 = (isset($_POST['posisi_'][2]) ? $_POST['posisi_'][2] : '');
$nama_2 = (isset($_POST['nama_'][2]) ? $_POST['nama_'][2] : '');
$email_2 = (isset($_POST['email_'][2]) ? $_POST['email_'][2] : '');
$posisi_3 = (isset($_POST['posisi_'][3]) ? $_POST['posisi_'][3] : '');
$nama_3 = (isset($_POST['nama_'][3]) ? $_POST['nama_'][3] : '');
$email_3 = (isset($_POST['email_'][3]) ? $_POST['email_'][3] : '');
$posisi_4 = (isset($_POST['posisi_'][4]) ? $_POST['posisi_'][4] : '');
$nama_4 = (isset($_POST['nama_'][4]) ? $_POST['nama_'][4] : '');
$email_4 = (isset($_POST['email_'][4]) ? $_POST['email_'][4] : '');
$posisi_5 = (isset($_POST['posisi_'][5]) ? $_POST['posisi_'][5] : '');
$nama_5 = (isset($_POST['nama_'][5]) ? $_POST['nama_'][5] : '');
$email_5 = (isset($_POST['email_'][5]) ? $_POST['email_'][5] : '');
$posisi_6 = (isset($_POST['posisi_'][6]) ? $_POST['posisi_'][6] : '');
$nama_6 = (isset($_POST['nama_'][6]) ? $_POST['nama_'][6] : '');
$email_6 = (isset($_POST['email_'][6]) ? $_POST['email_'][6] : '');
$posisi_7 = (isset($_POST['posisi_'][7]) ? $_POST['posisi_'][7] : '');
$nama_7 = (isset($_POST['nama_'][7]) ? $_POST['nama_'][7] : '');
$email_7 = (isset($_POST['email_'][7]) ? $_POST['email_'][7] : '');
$target_flyhi0 = (isset($_POST['target_flyhi'][0]) ? $_POST['target_flyhi'][0] : '');
$target_flyhi1 = (isset($_POST['target_flyhi'][1]) ? $_POST['target_flyhi'][1] : '');
$target_flyhi2 = (isset($_POST['target_flyhi'][2]) ? $_POST['target_flyhi'][2] : '');
$target_flyhi3 = (isset($_POST['target_flyhi'][3]) ? $_POST['target_flyhi'][3] : '');
$target_flyhi4 = (isset($_POST['target_flyhi'][4]) ? $_POST['target_flyhi'][4] : '');
$satuan_flyhi0 = (isset($_POST['satuan_flyhi'][0]) ? $_POST['satuan_flyhi'][0] : '');
$satuan_flyhi1 = (isset($_POST['satuan_flyhi'][1]) ? $_POST['satuan_flyhi'][1] : '');
$satuan_flyhi2 = (isset($_POST['satuan_flyhi'][2]) ? $_POST['satuan_flyhi'][2] : '');
$satuan_flyhi3 = (isset($_POST['satuan_flyhi'][3]) ? $_POST['satuan_flyhi'][3] : '');
$satuan_flyhi4 = (isset($_POST['satuan_flyhi'][4]) ? $_POST['satuan_flyhi'][4] : '');
$target_financial0 = (isset($_POST['target_financial'][0]) ? $_POST['target_financial'][0] : '');
$target_financial1 = (isset($_POST['target_financial'][1]) ? $_POST['target_financial'][1] : '');
$target_financial2 = (isset($_POST['target_financial'][2]) ? $_POST['target_financial'][2] : '');
$target_financial3 = (isset($_POST['target_financial'][3]) ? $_POST['target_financial'][3] : '');
$target_financial4 = (isset($_POST['target_financial'][4]) ? $_POST['target_financial'][4] : '');
$satuan_financial0 = (isset($_POST['satuan_financial'][0]) ? $_POST['satuan_financial'][0] : '');
$satuan_financial1 = (isset($_POST['satuan_financial'][1]) ? $_POST['satuan_financial'][1] : '');
$satuan_financial2 = (isset($_POST['satuan_financial'][2]) ? $_POST['satuan_financial'][2] : '');
$satuan_financial3 = (isset($_POST['satuan_financial'][3]) ? $_POST['satuan_financial'][3]: '');
$satuan_financial4 = (isset($_POST['satuan_financial'][4]) ? $_POST['satuan_financial'][4] : '');
$target_customer0 = (isset($_POST['target_customer'][0]) ? $_POST['target_customer'][0] : '');
$target_customer1 = (isset($_POST['target_customer'][1]) ? $_POST['target_customer'][1] : '');
$target_customer2 = (isset($_POST['target_customer'][2]) ? $_POST['target_customer'][2] : '');
$target_customer3 = (isset($_POST['target_customer'][3]) ? $_POST['target_customer'][3] : '');
$target_customer4 = (isset($_POST['target_customer'][4]) ? $_POST['target_customer'][4] : '');
$target_customer5 = (isset($_POST['target_customer'][5]) ? $_POST['target_customer'][5] : '');
$satuan_customer0 = (isset($_POST['satuan_customer'][0]) ? $_POST['satuan_customer'][0] : '');
$satuan_customer1 = (isset($_POST['satuan_customer'][1]) ? $_POST['satuan_customer'][1] : '');
$satuan_customer2 = (isset($_POST['satuan_customer'][2]) ? $_POST['satuan_customer'][2] : '');
$satuan_customer3 = (isset($_POST['satuan_customer'][3]) ? $_POST['satuan_customer'][3] : '');
$satuan_customer4 = (isset($_POST['satuan_customer'][4]) ? $_POST['satuan_customer'][4] : '');
$target_ibp0 = (isset($_POST['target_ibp'][0]) ? $_POST['target_ibp'][0] : '');
$target_ibp1 = (isset($_POST['target_ibp'][1]) ? $_POST['target_ibp'][1] : '');
$target_ibp2 = (isset($_POST['target_ibp'][2]) ? $_POST['target_ibp'][2] : '');
$target_ibp3 = (isset($_POST['target_ibp'][3]) ? $_POST['target_ibp'][3] : '');
$target_ibp4 = (isset($_POST['target_ibp'][4]) ? $_POST['target_ibp'][4] : '');
$satuan_ibp0 = (isset($_POST['satuan_ibp'][0]) ? $_POST['satuan_ibp'][0] : '');
$satuan_ibp1 = (isset($_POST['satuan_ibp'][1]) ? $_POST['satuan_ibp'][1] : '');
$satuan_ibp2 = (isset($_POST['satuan_ibp'][2]) ? $_POST['satuan_ibp'][2] : '');
$satuan_ibp3 = (isset($_POST['satuan_ibp'][3]) ? $_POST['satuan_ibp'][3] : '');
$satuan_ibp4 = (isset($_POST['satuan_ibp'][4]) ? $_POST['satuan_ibp'][4] : '');
$target_lg0 = (isset($_POST['target_lg'][0]) ? $_POST['target_lg'][0] : '');
$target_lg1 = (isset($_POST['target_lg'][1]) ? $_POST['target_lg'][1] : '');
$target_lg2 = (isset($_POST['target_lg'][2]) ? $_POST['target_lg'][2] : '');
$target_lg3 = (isset($_POST['target_lg'][3]) ? $_POST['target_lg'][3] : '');
$target_lg4 = (isset($_POST['target_lg'][4]) ? $_POST['target_lg'][4] : '');
$satuan_lg0 = (isset($_POST['satuan_lg'][0]) ? $_POST['satuan_lg'][0] : '');
$satuan_lg1 = (isset($_POST['satuan_lg'][1]) ? $_POST['satuan_lg'][1] : '');
$satuan_lg2 = (isset($_POST['satuan_lg'][2]) ? $_POST['satuan_lg'][2] : '');
$satuan_lg3 = (isset($_POST['satuan_lg'][3]) ? $_POST['satuan_lg'][3] : '');
$satuan_lg4 = (isset($_POST['satuan_lg'][4]) ? $_POST['satuan_lg'][4] : '');


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


$file_monitoring = rand(1000,100000)."-".$_FILES['file1']['name'];
$file_loc_monitoring = $_FILES['file1']['tmp_name'];
$file_size_monitoring = $_FILES['file1']['size'];
$file_type_monitoring = $_FILES['file1']['type'];
$folder_monitoring="uploads/";
	// new file size in KB
$new_size_monitoring = $file_size_monitoring/1024;  
	// new file size in KB

	// make file name in lower case
$new_file_name_monitoring = strtolower($file_monitoring);
	// make file name in lower case

$final_file_monitoring=str_replace(' ','-',$new_file_name_monitoring);

move_uploaded_file($file_loc_monitoring,$folder_monitoring.$final_file_monitoring);


$file_positif = rand(1000,100000)."-".$_FILES['file2']['name'];
$file_loc_positif = $_FILES['file2']['tmp_name'];
$file_size_positif = $_FILES['file2']['size'];
$file_type_positif = $_FILES['file2']['type'];
$folder_positif="uploads/";
	// new file size in KB
$new_size_positif = $file_size_positif/1024;  
	// new file size in KB

	// make file name in lower case
$new_file_name_positif = strtolower($file_positif);
	// make file name in lower case

$final_file_positif=str_replace(' ','-',$new_file_name_positif);

move_uploaded_file($file_loc_positif,$folder_positif.$final_file_positif);


$file_negatif = rand(1000,100000)."-".$_FILES['file3']['name'];
$file_loc_negatif = $_FILES['file3']['tmp_name'];
$file_size_negatif = $_FILES['file3']['size'];
$file_type_negatif = $_FILES['file3']['type'];
$folder_negatif="uploads/";
	// new file size in KB
$new_size_negatif = $file_size_negatif/1024;  
	// new file size in KB

	// make file name in lower case
$new_file_name_negatif = strtolower($file_negatif);
	// make file name in lower case

$final_file_negatif=str_replace(' ','-',$new_file_name_negatif);

move_uploaded_file($file_loc_negatif,$folder_negatif.$final_file_negatif);

$query = "INSERT into logbook(
kode_dir,
kode_unit,
kode_branch, 
nama_program, 
deskripsi_program, 
start, 
end, 
tujuan_merubah_perilaku, 
aktifitas0,
target0,
satuan0,
aktifitas1,
target1,
satuan1,
aktifitas2,
target2,
satuan2,
aktifitas3,
target3,
satuan3,
aktifitas4,
target4,
satuan4,
tujuan_capai_kinerja_0,
tujuan_capai_kinerja_1,
tujuan_capai_kinerja_2,
tujuan_capai_kinerja_3, 
metode_monitoring,
other0, 
metode_enforcement_positif, 
other1,
metode_enforcement_negatif, 
other2,
nama_ketua, 
email_ketua, 
nama_sekre_bendahara, 
email_sekre_bendahara, 
posisi_0,
nama_0,
email_0,
posisi_1,
nama_1,
email_1,
posisi_2,
nama_2,
email_2,
posisi_3,
nama_3,
email_3,
posisi_4,
nama_4,
email_4,
posisi_5,
nama_5,
email_5,
posisi_6,
nama_6,
email_6,
posisi_7,
nama_7,
email_7,
file,
type,
size,
file_monitoring,
type_monitoring,
size_monitoring,
file_positif,
type_positif,
size_positif,
file_negatif,
type_negatif,
size_negatif,
target_flyhi0, 
target_flyhi1, 
target_flyhi2, 
target_flyhi3, 
target_flyhi4, 
satuan_flyhi0,
satuan_flyhi1,
satuan_flyhi2,
satuan_flyhi3,
satuan_flyhi4,
target_financial0, 
target_financial1, 
target_financial2, 
target_financial3, 
target_financial4, 
satuan_financial0,
satuan_financial1,
satuan_financial2,
satuan_financial3,
satuan_financial4,
target_customer0, 
target_customer1, 
target_customer2, 
target_customer3, 
target_customer4, 
satuan_customer0,
satuan_customer1,
satuan_customer2,
satuan_customer3,
satuan_customer4,
target_ibp0, 
target_ibp1, 
target_ibp2, 
target_ibp3, 
target_ibp4, 
satuan_ibp0,
satuan_ibp1,
satuan_ibp2,
satuan_ibp3,
satuan_ibp4,
target_lg0, 
target_lg1, 
target_lg2, 
target_lg3, 
target_lg4, 
satuan_lg0,
satuan_lg1,
satuan_lg2,
satuan_lg3,
satuan_lg4
) 

values (
'$direktorat',
'$unit',
'$branch', 
'$nama_program', 
'$deskripsi', 
'$start_date', 
'$end_date', 
'$perilaku', 
'$aktifitas0',
'$target0',
'$satuan0',
'$aktifitas1',
'$target1',
'$satuan1',
'$aktifitas2',
'$target2',
'$satuan2',
'$aktifitas3',
'$target3',
'$satuan3',
'$aktifitas4',
'$target4',
'$satuan4',
'$kinerja0', 
'$kinerja1', 
'$kinerja2', 
'$kinerja3', 
'$monitoring', 
'$other0',
'$positif',
'$other1', 
'$negatif',
'$other2',
'$nama_ketua', 
'$email_ketua', 
'$nama_sekre', 
'$email_sekre', 
'$posisi_0',
'$nama_0',
'$email_0',
'$posisi_1',
'$nama_1',
'$email_1',
'$posisi_2',
'$nama_2',
'$email_2',
'$posisi_3',
'$nama_3',
'$email_3',
'$posisi_4',
'$nama_4',
'$email_4',
'$posisi_5',
'$nama_5',
'$email_5',
'$posisi_6',
'$nama_6',
'$email_6',
'$posisi_7',
'$nama_7',
'$email_7',
'$final_file',
'$file_type',
'$new_size',
'$final_file_monitoring',
'$file_type_monitoring',
'$new_size_monitoring',
'$final_file_positif',
'$file_type_positif',
'$new_size_positif',
'$final_file_negatif',
'$file_type_negatif',
'$new_size_negatif',
'$target_flyhi0',
'$target_flyhi1',  
'$target_flyhi2', 
'$target_flyhi3', 
'$target_flyhi4', 
'$satuan_flyhi0',
'$satuan_flyhi1',
'$satuan_flyhi2',
'$satuan_flyhi3',
'$satuan_flyhi4',
'$target_financial0', 
'$target_financial1', 
'$target_financial2', 
'$target_financial3', 
'$target_financial4', 
'$satuan_financial0',
'$satuan_financial1',
'$satuan_financial2',
'$satuan_financial3',
'$satuan_financial4',
'$target_customer0', 
'$target_customer1', 
'$target_customer2', 
'$target_customer3', 
'$target_customer4', 
'$satuan_customer0',
'$satuan_customer1',
'$satuan_customer2',
'$satuan_customer3',
'$satuan_customer4',
'$target_ibp0', 
'$target_ibp1', 
'$target_ibp2', 
'$target_ibp3', 
'$target_ibp4', 
'$satuan_ibp0',
'$satuan_ibp1',
'$satuan_ibp2',
'$satuan_ibp3',
'$satuan_ibp4',
'$target_lg0', 
'$target_lg1', 
'$target_lg2', 
'$target_lg3', 
'$target_lg4', 
'$satuan_lg0',
'$satuan_lg1',
'$satuan_lg2',
'$satuan_lg3',
'$satuan_lg4'
)";

$result = $db->query($query);
if(!$result)
{
	die("Could not query the database: <br />". $db->error);
}else
{
	$message = "Program berhasil tersubmit";
	echo "<script type='text/javascript'>alert('$message');
	window.location = 'index.php';
</script>";
exit;
}	
?>
