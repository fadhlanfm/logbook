<?php
	include 'connect_db.php';
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
	

		if(move_uploaded_file($file_loc,$folder.$final_file))
		{
		$query = "INSERT into logbook(kode_unit, 
									nama_program, 
									deskripsi_program, 
									start, 
									end, 
									tujuan_merubah_perilaku, 
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
									aktifitas5,
									target5,
									satuan5,
									tujuan_capai_kinerja_0,
									tujuan_capai_kinerja_1,
									tujuan_capai_kinerja_2,
									tujuan_capai_kinerja_3, 
									metode_monitoring, 
									metode_enforcement_positif, 
									metode_enforcement_negatif, 
									nama_ketua, 
									email_ketua, 
									nama_sekre_bendahara, 
									email_sekre_bendahara, 
									nama_dok_pub, 
									email_dok_pub, 
									nama_corp_prog, 
									email_corp_prog, 
									nama_pic_rate, 
									email_pic_rate, 
									nama_pic_dare, 
									email_pic_dare, 
									nama_prog_dukung, 
									email_prog_dukung, 
									nama_pic_share, 
									email_pic_share, 
									nama_pic_team, 
									email_pic_team, 
									nama_pic_standar, 
									email_pic_standar,
									file,
									type,
									size) 

									values ('$kode_unit', 
									'$nama_program', 
									'$deskripsi', 
									'$start_date', 
									'$end_date', 
									'$perilaku', 
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
									'$aktifitas5',
									'$target5',
									'$satuan5',
									'$kinerja0', 
									'$kinerja1', 
									'$kinerja2', 
									'$kinerja3', 
									'$monitoring', 
									'$positif', 
									'$negatif',
									'$nama_ketua', 
									'$email_ketua', 
									'$nama_sekre', 
									'$email_sekre', 
									'$nama_pdd', 
									'$email_pdd',
									'nama_corp', 
									'$email_corp', 
									'$nama_rating', 
									'$email_rating', 
									'$nama_dare', 
									'$email_dare', 
									'$nama_pendukung', 
									'$email_pendukung', 
									'$nama_share', 
									'$email_share', 
									'$nama_spirit', 
									'$email_spirit', 
									'$nama_standar', 
									'$email_standar',
									'$final_file',
									'$file_type',
									'$new_size')";

		$result = $db->query($query);
		if(!$result)
		{
			die("Could not query the database: <br />". $db->error);
		}else
		{
			echo 'Data Updated. </br>';
			echo '<a href="read_kategori.php">Lihat</a>';
			$db->close();
			exit;
		}	
	}
?>