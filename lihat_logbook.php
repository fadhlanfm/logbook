<?php
	include('connect_db.php');
	$id = $_GET['id'];
	$query = "SELECT * FROM logbook WHERE id = '$id'";
	$result = $db->query($query);
	if (!$result)
		{
			die("could not query the database: <br />".$db->error);
		}
	$row = $result->fetch_object();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lihat LogBook</title>
</head>
<body>

	<table border="1">
		<tr>
			<th colspan="3">Log Book</th>
		</tr>
		<tr>
			<th>Kode Unik Log Book</th>
			<td><?php echo''.$row->id.'';?></td>
		</tr>
		<tr>
			<th>Kode Unit</th>
			<td><?php echo''.$row->kode_unit.'';?></td>
		</tr>
		<tr>
			<th>Nama Program</th>
			<td><?php echo''.$row->nama_program.'';?></td>
		</tr>
		<tr>
			<th>Deskripsi Program</th>
			<td><?php echo''.$row->deskripsi_program.'';?></td>
		</tr>
		<tr>
			<th>Start</th>
			<td><?php echo''.$row->start.'';?></td>
		</tr>		
		<tr>
			<th>End</th>
			<td><?php echo''.$row->end.'';?></td>
		</tr>
	</table>

	<br><br><br>

	<table border="1">
		<tr>
			<th colspan="3">Tujuan & Target Program</th>
		</tr>
		<tr>
			<th>Tujuan Merubah Perilaku</th>
			<td><?php echo''.$row->tujuan_merubah_perilaku.'';?></td>
		</tr>
		<tr>
			<th>Target Merubah Perilaku</th>
			<td><?php echo''.$row->target_merubah_perilaku.'';?></td>
		</tr>
		<tr>
			<th>Tujuan Nilai Tambah</th>
			<td><?php echo''.$row->tujuan_nilai_tambah.'';?></td>
		</tr>
		<tr>
			<th>Target Nilai Tambah</th>
			<td><?php echo''.$row->target_nilai_tambah.'';?></td>
		</tr>		
		<tr>
			<th>Tujuan Capai Kinerja</th>
			<td><?php echo''.$row->tujuan_capai_kinerja_0.','.$row->tujuan_capai_kinerja_1.','.$row->tujuan_capai_kinerja_2.','.$row->tujuan_capai_kinerja_3.'';?></td>
		</tr>
		<tr>
			<th>Target Capai Kinerja</th>
			<td><?php echo''.$row->target_capai_kinerja.'';?></td>
		</tr>
	</table>

	<br><br><br>

	<table border="1">
		<tr>
			<th colspan="3">Metode Monitoring & Reinforcement</th>
		</tr>
		<tr>
			<th>Metode Monitoring</th>
			<td><?php echo''.$row->metode_monitoring.'';?></td>
		</tr>
		<tr>
			<th>Metode Enforcement Positif</th>
			<td><?php echo''.$row->metode_enforcement_positif.'';?></td>
		</tr>
		<tr>
			<th>Metode Enforcement Negatif</th>
			<td><?php echo''.$row->metode_enforcement_negatif.'';?></td>
		</tr>
	</table>

	<br><br><br>

	<table border="1">
		<tr>
			<th colspan="3">Change Agent Team</th>
		</tr>
		<tr>
			<th rowspan="2">Ketua</th>
			<td><?php echo''.$row->nama_ketua.'';?></td>
			<tr>
			<td><?php echo''.$row->email_ketua.'';?></td>
			</tr>
		</tr>
		<tr>
			<th rowspan="2">Sekretaris & Bendahara</th>
			<td><?php echo''.$row->nama_sekre_bendahara.'';?></td>
			<tr>
			<td><?php echo''.$row->email_sekre_bendahara.'';?></td>
			</tr>
		</tr>
			<tr>
			<th rowspan="2">Dokumentasi & Publikasi</th>
			<td><?php echo''.$row->nama_dok_pub.'';?></td>
			<tr>
			<td><?php echo''.$row->email_dok_pub.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Corporate Program</th>
			<td><?php echo''.$row->nama_corp_prog.'';?></td>
			<tr>
			<td><?php echo''.$row->email_corp_prog.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Pic Rating</th>
			<td><?php echo''.$row->nama_pic_rate.'';?></td>
			<tr>
			<td><?php echo''.$row->email_pic_rate.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Pic I-Dare</th>
			<td><?php echo''.$row->nama_pic_dare.'';?></td>
			<tr>
			<td><?php echo''.$row->email_pic_dare.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Program Pendukung</th>
			<td><?php echo''.$row->nama_prog_dukung.'';?></td>
			<tr>
			<td><?php echo''.$row->email_prog_dukung.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Pic Sharing Session</th>
			<td><?php echo''.$row->nama_pic_share.'';?></td>
			<tr>
			<td><?php echo''.$row->email_pic_share.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Pic One Team One Spirit One Goal Program</th>
			<td><?php echo''.$row->nama_pic_team.'';?></td>
			<tr>
			<td><?php echo''.$row->email_pic_team.'';?></td>
			</tr>
		</tr>
		</tr>
			<tr>
			<th rowspan="2">Pic Standar Layanan</th>
			<td><?php echo''.$row->nama_pic_standar.'';?></td>
			<tr>
			<td><?php echo''.$row->email_pic_standar.'';?></td>
			</tr>
		</tr>
	</table>

	<br><br>

	<form action="post_komentar_logbook.php" method="POST"><br>
		<input type="text" readonly name="id" value="<?php if (isset($row->id)) {echo $row->id;} else {echo '';}?>"></input>
		<input type="text" name="komentar" value="Isi Komentar"></input>
    <button type="submit" value="Submit" class="btn waves-effect waves-light">Submit</button>
	</form>

</body>
</html>