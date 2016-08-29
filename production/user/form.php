<?php
session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
{ 

} else if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
  header ('Location: ../../page_403.php');
  exit;
} else if (isset($_SESSION['role']) && $_SESSION['role'] == -1) {
  header ('Location: ../../page_403.php');
  exit;
}
else
{
  header ('Location: ../../page_4033.php');
  exit;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="../../assets/gi.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- coba komen -->

	<title>Mengajukan Program Baru</title>
	
	<!-- DATEPICKER -->
	
	
	<!-- Bootstrap -->
	<link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../../build/css/custom.min.css" rel="stylesheet">

	<!-- QUERIES -->
	<?php
	include_once('../Connection/dbconn.php');

	$coba = $_SESSION['id'];
	$query2 = "SELECT * FROM user WHERE username = '$coba'";
				//execute the query
	$result2 = $db->query( $query2 );
	if (!$result2)
	{
		die("could not query the database: <br />".$db->error);
	}
	$row2 = $result2->fetch_object();
	$unit2 = $row2->unit;

	$query = " SELECT * FROM logbook ";
				//execute the query
	$result = $db->query( $query );
	if (!$result)
	{
		die("could not query the database: <br />".$db->error);
	}

	$message = "Anda akan submit program untuk ".$row2->username.". Pastikan Anda menginput form dengan tepat dan benar. Klik OK untuk melanjutkan ke halaman form";
  			echo "<script type='text/javascript'>alert('$message');
  			</script>";
	?>



	<script>
			// add
			// function displayadd() {
			//     document.getElementById("noned").style.display = "block";
			//     document.getElementById("noned1[0]").style.display = "none";
			// }
			
			// function for others
			function yesnocheck(that) {
				if (that.value == "Others (...)") {
					document.getElementById("ifyes").style.display = "block";
				} else {
					document.getElementById("ifyes").style.display = "none";
				}
			}

			function yesnocheck1(that) {
				if (that.value == "Others (...)") {
					document.getElementById("ifyes1").style.display = "block";
				} else {
					document.getElementById("ifyes1").style.display = "none";
				}
			}

			function yesnocheck2(that) {
				if (that.value == "Others (...)") {
					document.getElementById("ifyes2").style.display = "block";
				} else {
					document.getElementById("ifyes2").style.display = "none";
				}
			} 
			
			// function for checkbox checker
			$(function(){

				var requiredCheckboxes = $(':checkbox[required]');

				requiredCheckboxes.change(function(){

					if(requiredCheckboxes.is(':checked')) {
						requiredCheckboxes.removeAttr('required');
					}

					else {
						requiredCheckboxes.attr('required', 'required');
					}
				});

			});

			//function for dependent dropdown option
			function getSecond(val)
			{
				$.ajax({
					type: "POST",
					url: "get_second.php",
					data: 'kode='+val,
					success: function(data) {
						$("#second-choice").html(data);
					}
				});
			}

			function getThird(val)
			{
				$.ajax({
					type: "POST",
					url: "get_third.php",
					data: 'kode='+val,
					success: function(data) {
						$("#third-choice").html(data);
					}
				});
			}

			window.liveSettings = {
				api_key: "a0b49b34b93844c38eaee15690d86413",
				picker: "bottom-right",
				detectlang: true,
				dynamic: true,
				autocollect: true
			};
		</script>
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="index.php" class="site_title"> <span>Garuda Indonesia</span></a>
						</div>

						<div class="clearfix"></div>         

						<br />

						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">

								<ul class="nav side-menu">
									<li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="index.php">Halaman Utama</a></li>
										</ul>
									</li>
									<li><a><i class="fa fa-edit"></i> CC Program <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="programs.php">Corporate Culture Program</a></li>
										</ul>
									</li>
									<li><a><i class="fa fa-cog"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="edit_username2.php">Ubah Username</a></li>
											<li><a href="edit_password2.php">Ubah Password</a></li>
										</ul>
									</li>
								</ul>
							</div>

						</div>
						<!-- /sidebar menu -->

					</div>
				</div>

				<!-- top navigation -->
      <div class="top_nav hidden-print">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../images/img.jpg" alt=""><?php

                  echo''.$row2->username.'';
                  ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="../acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
              <li role="presentation">
                <a href="javascript:window.print()">
                  <i class="fa fa-print"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
						</div>
						<div class="clearfix"></div>
						<form id="form" class="form-horizontal form-label-left" action="post_form.php" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>CULTURE MONITORING PROGRAM</h2>
											<ul class="nav navbar-right panel_toolbox">
												<li><a href="programs.php"><button type="button" class="btn btn-primary btn-xs">Kembali</button></a>
												</li>
											</ul>
											<div class="x_content bs-example-popovers">
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
								                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
								                    </button>
								                    <strong> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Pastikan Anda mengisi form ini dengan tepat sesuai dengan program <?php echo $row2->username;?>. Periksalah kembali sebelum Anda submit <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> </strong>
								                  </div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<div class="ln_solid"></div>
											<h4>Deskripsi Program</h4>
											<div class="ln_solid"></div>

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direktorat <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input readonly class="form-control" type="text" name="direktorat" id="direktorat" value="<?php echo $row2->dir; ?>">

												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input readonly class="form-control type="text" name="unit" id="unit" value="<?php echo $row2->unit; ?>">

												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cabang<span class="required"></span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input readonly class="form-control" type="text" name="branch" id="branch" value="<?php echo $row2->branch; ?>">

												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Program <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" id="nama_program" name="nama_program" required="required" class="form-control col-md-7 col-xs-12">

												</div>
											</div>
											<div class="form-group">
												<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Program</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<textarea id="deskripsi" class="form-control col-md-7 col-xs-12" type="text" name="deskripsi" required="required"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Mulai <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input id="start_date" name="start_date" class="form-control col-md-7 col-xs-12" required="required" type="text" placeholder="MM/DD/YYYY">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Selesai <span class="required" >*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input id="end_date" name="end_date" class="form-control col-md-7 col-xs-12" required="required" type="text" placeholder="MM/DD/YYYY">
												</div>
											</div>
											<div class="ln_solid"></div>
											<h4>Tujuan dan Target</h4>
											<div class="ln_solid"></div>
											<div class="form-group">
												<table class="table">
													<thead>
														<tr>
															<th>
																Aspek
															</th>
															<th>
																Tujuan
															</th>
															<th></th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																Merubah Perilaku
															</td>

															<td>
																<p>
																	<input class="with-gap" type="radio" id="perilaku1" name="perilaku" required="required" value="F (Efficient & Effective)">
																	<label for="perilaku1">F (Efficient & Effective)</label>
																</p>
																<p>
																	<input class="with-gap" type="radio" id="perilaku2" name="perilaku" value="L (Loyalty)">
																	<label for="perilaku2">L (Loyalty)</label>
																</p>
																<p>
																	<input class="with-gap" type="radio" id="perilaku3" name="perilaku" value="Y (Customer Centricity)">
																	<label for="perilaku3">Y (Customer Centricity)</label>
																</p>
																<p>
																	<input class="with-gap" type="radio" id="perilaku4" name="perilaku" value="H (Honesty & Openness)">
																	<label for="perilaku4">H (Honesty & Openness)</label>
																</p>
																<p>
																	<input class="with-gap" type="radio" id="perilaku5" name="perilaku" value="I (Integrity)">
																	<label for="perilaku5">I (Integrity)</label>
																</p><td>
																<div class="row clone3">
																<div class="col-xs-3">
																<label for="target1">Target</label>
																<input type="text" id="target" name="target_flyhi[]" class="form-control" required="required">
																</div>
																<div class="col-xs-5">
																<label>Satuan Target</label>
																	<select class="form-control" name="satuan_flyhi[]" required="required">
																		<option value="" disabled selected>Choose your option</option>
																		<option value="Rupiah">Uang (Rupiah)</option>
																		<option value="Hari">Waktu (Hari)</option>
																		<option value="%">Persentase (%)</option>
																		<option value="Kali">Jumlah (Kali)</option>
																	</select>
																</div>
															</div><a href="#" class="add" rel=".clone3">
																	<button id="buttonadd" type="button" class="right btn waves-effect waves-light">Tambah item baru</button></a></td>
															</td>
														</tr>
													</tbody>
												</table>		
											</div>
											<div class="ln_solid"></div>
												<table class="table">
													<tbody>
															<tr>
																<td width="24%">
																	<h4>Memberikan Nilai Tambah Bagi Perusahaan</h4></div></td>
																	<td colspan="2">
																	<div class="row clone_nilaitambah"> 
																	<div class="col-xs-5">
																		<label>Aktifitas</label>
																		<select class="form-control" name="aktifitas[]" required="required">
																			<option value="" disabled selected>Choose your option</option>
																			<option value="Percepatan Proses"><a href="#modal1">Percepatan Proses</a></option>
																			<option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Menjaga Reputasi/Image Perusahaan</a></option>
																			<option value="Penurunan Error Rate"><a href="#modal3">Penurunan Error Rate</a></option>
																			<option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Peningkatan Produktivitas Pegawai</a></option>
																			<option value="Terpenuhinya SLA"><a href="#modal5">Terpenuhinya SLA</a></option>
																			<option value="Meminimalkan Kerugian Finansial"><a href="#modal6">Meminimalkan Kerugian Finansial</a></option>
																			<option value="Meningkatkan Layanan Kualitas"><a href="#modal7">Meningkatkan Layanan Kualitas</a></option>
																			<option value="Efisiensi"><a href="#modal8">Efisiensi</a></option>
																			<option value="Others (...)"><a href="#modal9">Others (...)</a></option>
																		</select>
																	</div>
																	<div class="col-xs-3">
																		<div class="input-field">
																			<label for="target1">Target</label>
																			<input type="text" id="target" name="target[]" class="form-control" required>
																		</div>
																	</div>
																	<div class="col-xs-3">
																		<label>Satuan Target</label>
																		<select class="form-control" name="satuan[]" required="required">
																			<option value="" disabled selected>Choose your option</option>
																			<option value="Rupiah">Uang (Rupiah)</option>
																			<option value="Hari">Waktu (Hari)</option>
																			<option value="%">Persentase (%)</option>
																			<option value="Kali">Jumlah (Kali)</option>
																		</select>
																		</div>
																		</div>
																		<a href="#" class="add" rel=".clone_nilaitambah">
																	<button id="buttonadd" type="button" class="right btn waves-effect waves-light">Tambah item baru</button></a>
																</td>
															</div>
														</tr>
														<tr>
															<td rowspan="5">Mendorong Tercapainya Kinerja Terbaik</td>
															<td>
																<input name="kinerja[]" type="checkbox" value="1">
																<label for="financial">Financial</label>
															</td>
															<td>
																<div class="row clone_kinerja1">
																<div class="col-xs-5">
																<label for="target1">Target</label>
																<input type="text" id="target" name="target_financial[]" class="form-control">
																</div>
																<div class="col-xs-5">
																<label>Satuan Target</label>
																	<select class="form-control" name="satuan_financial[]">
																		<option value="" disabled selected>Choose your option</option>
																		<option value="Rupiah">Uang (Rupiah)</option>
																		<option value="Hari">Waktu (Hari)</option>
																		<option value="%">Persentase (%)</option>
																		<option value="Kali">Jumlah (Kali)</option>
																	</select> 	
																</div>
																</div>
																<a href="#" class="add" rel=".clone_kinerja1">
																	<button id="buttonadd" type="button" class="right btn waves-effect waves-light">Tambah item baru</button></a>
															</td>
														</tr>
														<tr>
															<td>
																<input name="kinerja[]" type="checkbox" value="1">
																<label for="customer">Customer</label>
															</td>
															<td>
																<div class="row clone_kinerja2">
																<div class="col-xs-5">
																<label for="target1">Target</label>
																<input type="text" id="target" name="target_customer[]" class="form-control">
																</div>
																<div class="col-xs-5">
																<label>Satuan Target</label>
																	<select class="form-control" name="satuan_customer[]">
																		<option value="" disabled selected>Choose your option</option>
																		<option value="Rupiah">Uang (Rupiah)</option>
																		<option value="Hari">Waktu (Hari)</option>
																		<option value="%">Persentase (%)</option>
																		<option value="Kali">Jumlah (Kali)</option>
																	</select> 	
																</div>
																</div>
																<a href="#" class="add" rel=".clone_kinerja2">
																	<button id="buttonadd" type="button" class="right btn waves-effect waves-light">Tambah item baru</button></a>
															</td>
														</tr>
														<tr>
															<td>
																<input name="kinerja[]" type="checkbox" value="1">
																<label for="internal">Internal Business Process</label>
															</td>
															<td>
																<div class="row clone_kinerja3">
																<div class="col-xs-5">
																<label for="target1">Target</label>
																<input type="text" id="target" name="target_ibp[]" class="form-control">
																</div>
																<div class="col-xs-5">
																<label>Satuan Target</label>
																	<select class="form-control" name="satuan_ibp[]">
																		<option value="" disabled selected>Choose your option</option>
																		<option value="Rupiah">Uang (Rupiah)</option>
																		<option value="Hari">Waktu (Hari)</option>
																		<option value="%">Persentase (%)</option>
																		<option value="Kali">Jumlah (Kali)</option>
																	</select> 	
																</div>
																</div>
																<a href="#" class="add" rel=".clone_kinerja3">
																	<button id="buttonadd" type="button" class="right btn waves-effect waves-light">Tambah item baru</button></a>
															</td>
														</tr>
														<tr>
															<td>
																<input name="kinerja[]" type="checkbox" value="1">
																<label for="learning">Learning & Growth</label>
															</td>
															<td>
																<div class="row clone_kinerja4">
																<div class="col-xs-5">
																<label for="target1">Target</label>
																<input type="text" id="target" name="target_lg[]" class="form-control">
																</div>
																<div class="col-xs-5">
																<label>Satuan Target</label>
																	<select class="form-control" name="satuan_lg[]">
																		<option value="" disabled selected>Choose your option</option>
																		<option value="Rupiah">Uang (Rupiah)</option>
																		<option value="Hari">Waktu (Hari)</option>
																		<option value="%">Persentase (%)</option>
																		<option value="Kali">Jumlah (Kali)</option>
																	</select> 	
																</div>
																</div>
																<a href="#" class="add" rel=".clone_kinerja4">
																	<button id="buttonadd" type="button" class="right btn waves-effect waves-light">Tambah item baru</button></a>
															</td>
														</tr>
													</tbody>
												</table>
											<div class="ln_solid"></div>
											<h4>Metode Monitoring dan Reinforcement</h4>
											<div class="ln_solid"></div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Metode Monitoring <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<select class="form-control" name="monitoring" required="required" onchange="yesnocheck(this);">
														<option value="" disabled selected>Choose your option</option>
														<option value="Monitoring pencapaian atau realisasi KPI">Monitoring pencapaian atau realisasi KPI</option>
														<option value="Monitoring schedule pelaksanaan program dibandingkan target dan realisasi">Monitoring schedule pelaksanaan program dibandingkan target dan realisasi</option>
														<option value="Laporan Pelaksanan Kegiatan">Laporan Pelaksanan Kegiatan</option>
														<option value="Minutes of Meeting">Minutes of Meeting</option>
														<option value="Program Documentation">Program Documentation</option>
														<option value="Monitoring Pengendalian Biaya">Monitoring Pengendalian Biaya</option>
														<option value="Monitoring Laporan Pemenuhan SLA">Monitoring Laporan Pemenuhan SLA</option>
														<option value="Monitoring Penurunan Error Rate">Monitoring Penurunan Error Rate</option>
														<option value="Simple Behavior Survey">Simple Behavior Survey</option>
														<option value="Simple Customer Survey (Internal/External)">Simple Customer Survey (Internal/External)</option>
														<option value="Others (...)">Others (...)</option>
													</select>
												</div>
												<div class="col-md-1 col-sm-1 col-xs-12">
													<input class="btn" type="file" name="file1" />
												</div>
											</div>
											<!-- bookmark -->
											<div class="form-group" id="ifyes" style="display: none;">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Others</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="other0" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Metode Enforcement Positif <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<select class="form-control" name="positif" required="required" onchange="yesnocheck1(this);">
														<option value="" disabled selected>Choose your option</option>
														<option value="Sertifikat, Plakat, Pin, Banner, Ribbon, Trophy, Flag, Voucher">Sertifikat, Plakat, Pin, Banner, Ribbon, Trophy, Flag, Voucher</option>
														<option value="Best Employee Award">Best Employee Award</option>
														<option value="Happy Icon">Happy Icon</option>
														<option value="Recognition Letter">Recognition Letter</option>
														<option value="Thank You Note in Post It">Thank You Note in Post It</option>
														<option value="Appreciation Card for good performance">Appreciation Card for good performance</option>
														<option value="Appreciation for employee “Personal Days” (birthdays, pension, anniversaries, etc.)">Appreciation for employee “Personal Days” (birthdays, pension, anniversaries, etc.)</option>
														<option value="Recognition Speeches">Recognition Speeches</option>
														<option value="Recognition Words (Bravo, Wow, Thank You)">Recognition Words (Bravo, Wow, Thank You)</option>
														<option value="Others (...)">Others (...)</option>
													</select>
												</div>
												<div class="col-md-1 col-sm-1 col-xs-12">
													<input class="btn" type="file" name="file2" />
												</div>
											</div>
											<div class="form-group" id="ifyes1" style="display: none;">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Others</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="other1" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Metode Enforcement Negatif <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<select class="form-control" name="negatif" required="required" onchange="yesnocheck2(this);">
														<option value="" disabled selected>Choose your option</option>
														<option value="Sad Icon">Sad Icon</option>
														<option value="Black Flag">Black Flag</option>
														<option value="Pegawai Telatan of the month">Pegawai Telatan of the month</option>
														<option value="Punishment Card">Punishment Card</option>
														<option value="Punishment Letter">Punishment Letter</option>
														<option value="Punishment Speeches">Punishment Speeches</option>
														<option value="Coaching">Coaching</option>
														<option value="Others (...)">Others (...)</option>
													</select>
												</div>
												<div class="col-md-1 col-sm-1 col-xs-12">
													<input class="btn" type="file" name="file3" />
												</div>
											</div>
											<div class="form-group" id="ifyes2" style="display: none;">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Others</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="other2" class="form-control">
												</div>
											</div>

											<div class="ln_solid"></div>
											<h4>Change Agent Team</h4>
											<div class="form-group">
													<div class="ln_solid"></div>
													<div class="row">
														<div class="col-sm-10 col-md-10 col-xs-12">
															<label>Posisi</label>
															<input readonly type="text" class="form-control" name="posisi_ketua" required="required" value="Ketua">
														</div>
													</div>
													<div class="row">
														<div class="col-sm-5 col-md-5 col-xs-12">
															<label>Nama</label>
															<input id="nama_ketua" type="text" class="validate form-control" name="nama_ketua" required="required">
														</div>
														<div class="col-sm-5 col-md-5 col-xs-12">
															<label>Email</label>
															<input id="email_ketua" type="email" class="validate form-control" name="email_ketua" required="required" placeholder="Contoh : abc@gmail.com">
														</div>
														</div>
											</div>
											<div class="form-group">
													<div class="ln_solid"></div>
													<div class="row">
														<div class="col-sm-10 col-md-10 col-xs-12">
															<label>Posisi</label>
															<input readonly type="text" class="form-control" name="posisi_sekre" required="required" value="Sekretaris & Bendahara">
														</div>
													</div>
													<div class="row">
														<div class="col-sm-5 col-md-5 col-xs-12">
															<label>Nama</label>
															<input id="nama_sekre" type="text" class="validate form-control" name="nama_sekre" required="required">
														</div>
														<div class="col-sm-5 col-md-5 col-xs-12">
															<label>Email</label>
															<input id="email_sekre" type="email" class="validate form-control" name="email_sekre" required="required" placeholder="Contoh : abc@gmail.com">
														</div>
														</div>
											</div>
											<div class="form-group">
												<div class="row clone_team">
													<div class="ln_solid"></div>
													<div class="row">
														<div class="col-sm-10 col-md-10 col-xs-12">
															<label>Posisi</label>
															<select class="form-control" name="posisi_[]">
																<option value="" disabled selected>Choose your option</option>
																<option value="Dokumentasi & Publikasi">Dokumentasi & Publikasi</option>
																<option value="Corporate Program">Corporate Program</option>
																<option value="PIC Rating">PIC Rating</option>
																<option value="PIC I-Dare">PIC I-Dare</option>
																<option value="Program Pendukung">Program Pendukung</option>
																<option value="PIC Sharing Session">PIC Sharing Session</option>
																<option value="PIC One Team One Spirit One Goal Program">PIC One Team One Spirit One Goal Program</option>
																<option value="PIC Standar Layanan">PIC Standar Layanan</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-5 col-md-5 col-xs-12">
															<label>Nama</label>
															<input id="nama" type="text" class="validate form-control" name="nama_[]">
														</div>
														<div class="col-sm-5 col-md-5 col-xs-12">
															<label>Email</label>
															<input id="email" type="email" class="validate form-control" name="email_[]" placeholder="Contoh : abc@gmail.com">
														</div>
														</div>
													</div>
													<a href="#" class="copy" rel=".clone_team">
													<button id="buttonadd" type="button" class="right btn waves-effect waves-light" onclick="displayadd();">Tambah item baru</button></a>
												
											</div>
											<div class="row">
												<div class="ln_solid"></div>
											</div>
											<div class="row">
												
												</div>
												<div class="row">
													<label>Attachment</label>
													<input class="btn btn-primary" type="file" name="file" required />
												</div>
											</div>

											<div class="ln_solid"></div>
											<div class="form-group">
											<div class="x_content bs-example" data-example-id="glyphicons-accessibility">
					                        	<div class="alert alert-danger" role="alert">
					                        		<input type="checkbox" required>
					                          		Saya mengisi form ini dengan tepat dan benar sesuai dengan program dari <?php echo $row2->username; ?>
					                        	</div>
					                      	</div>
												<div class="col-md-6 col-sm-6 col-xs-12" align="right">
													<button type="submit" value="Submit" class="btn btn-success">Submit</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						Corporate Culture Information System - GA
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="../../vendors/jquery/dist/jquery.min.js"></script>
		<!-- relCopy(clone) -->
		<script type="text/javascript" src="../js/relCopy.js"></script>
		<script type="text/javascript">
			$(function(){
				var removeLink = ' <br><a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><button class="btn btn-xs btn-danger">remove</button></a>';

				$('a.add').relCopy({ limit: 5, append: removeLink}); 
				$('a.copy').relCopy({ limit: 8, append: removeLink}); 
			});

			$('#form').parsley();
		</script>
		<!-- Bootstrap -->
		<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="../../vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="../../vendors/nprogress/nprogress.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- iCheck -->
		<script src="../../vendors/iCheck/icheck.min.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="../js/moment/moment.min.js"></script>
		<script src="../js/datepicker/daterangepicker.js"></script>
		<!-- bootstrap-wysiwyg -->
		<script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
		<script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
		<script src="../../vendors/google-code-prettify/src/prettify.js"></script>
		<!-- jQuery Tags Input -->
		<script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
		<!-- Switchery -->
		<script src="../../vendors/switchery/dist/switchery.min.js"></script>
		<!-- Select2 -->
		<script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
		<!-- Parsley -->
		<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
		<!-- Autosize -->
		<script src="../../vendors/autosize/dist/autosize.min.js"></script>
		<!-- jQuery autocomplete -->
		<script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
		<!-- starrr -->
		<script src="../../vendors/starrr/dist/starrr.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="../../build/js/custom.min.js"></script>

		<!-- bootstrap-daterangepicker -->
		<!-- <script>
			$(document).ready(function() {
				$('#start_date').daterangepicker({
					singleDatePicker: true,
					calender_style: "picker_4"
				}, function(start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
			});
			$(document).ready(function() {
				$('#end_date').daterangepicker({
					singleDatePicker: true,
					calender_style: "picker_4"
				}, function(start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
			});
		</script> -->
		<!-- /bootstrap-daterangepicker -->

		<!-- bootstrap-wysiwyg -->
		<script>
			$(document).ready(function() {
				function initToolbarBootstrapBindings() {
					var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
					'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
					'Times New Roman', 'Verdana'
					],
					fontTarget = $('[title=Font]').siblings('.dropdown-menu');
					$.each(fonts, function(idx, fontName) {
						fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
					});
					$('a[title]').tooltip({
						container: 'body'
					});
					$('.dropdown-menu input').click(function() {
						return false;
					})
					.change(function() {
						$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
					})
					.keydown('esc', function() {
						this.value = '';
						$(this).change();
					});

					$('[data-role=magic-overlay]').each(function() {
						var overlay = $(this),
						target = $(overlay.data('target'));
						overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
					});

					if ("onwebkitspeechchange" in document.createElement("input")) {
						var editorOffset = $('#editor').offset();

						$('.voiceBtn').css('position', 'absolute').offset({
							top: editorOffset.top,
							left: editorOffset.left + $('#editor').innerWidth() - 35
						});
					} else {
						$('.voiceBtn').hide();
					}
				}

				function showErrorAlert(reason, detail) {
					var msg = '';
					if (reason === 'unsupported-file-type') {
						msg = "Unsupported format " + detail;
					} else {
						console.log("error uploading file", reason, detail);
					}
					$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
						'<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
				}

				initToolbarBootstrapBindings();

				$('#editor').wysiwyg({
					fileUploadError: showErrorAlert
				});

				window.prettyPrint;
				prettyPrint();
			});
		</script>
		<!-- /bootstrap-wysiwyg -->

		<!-- Select2 -->
		<script>
			$(document).ready(function() {
				$(".select2_single").select2({
					placeholder: "Select a state",
					allowClear: true
				});
				$(".select2_group").select2({});
				$(".select2_multiple").select2({
					maximumSelectionLength: 4,
					placeholder: "With Max Selection limit 4",
					allowClear: true
				});
			});
		</script>
		<!-- /Select2 -->

		<!-- jQuery Tags Input -->
		<script>
			function onAddTag(tag) {
				alert("Added a tag: " + tag);
			}

			function onRemoveTag(tag) {
				alert("Removed a tag: " + tag);
			}

			function onChangeTag(input, tag) {
				alert("Changed a tag: " + tag);
			}

			$(document).ready(function() {
				$('#tags_1').tagsInput({
					width: 'auto'
				});
			});
		</script>
		<!-- /jQuery Tags Input -->

		<!-- Parsley -->
		<script>
			$(document).ready(function() {
				$.listen('parsley:field:validate', function() {
					validateFront();
				});
				$('#demo-form .btn').on('click', function() {
					$('#demo-form').parsley().validate();
					validateFront();
				});
				var validateFront = function() {
					if (true === $('#demo-form').parsley().isValid()) {
						$('.bs-callout-info').removeClass('hidden');
						$('.bs-callout-warning').addClass('hidden');
					} else {
						$('.bs-callout-info').addClass('hidden');
						$('.bs-callout-warning').removeClass('hidden');
					}
				};
			});

			$(document).ready(function() {
				$.listen('parsley:field:validate', function() {
					validateFront();
				});
				$('#demo-form2 .btn').on('click', function() {
					$('#demo-form2').parsley().validate();
					validateFront();
				});
				var validateFront = function() {
					if (true === $('#demo-form2').parsley().isValid()) {
						$('.bs-callout-info').removeClass('hidden');
						$('.bs-callout-warning').addClass('hidden');
					} else {
						$('.bs-callout-info').addClass('hidden');
						$('.bs-callout-warning').removeClass('hidden');
					}
				};
			});
			try {
				hljs.initHighlightingOnLoad();
			} catch (err) {}
		</script>
		<!-- /Parsley -->

		<!-- Autosize -->
		<script>
			$(document).ready(function() {
				autosize($('.resizable_textarea'));
			});
		</script>
		<!-- /Autosize -->

		<!-- jQuery autocomplete -->
		<script>
			$(document).ready(function() {
				var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

				var countriesArray = $.map(countries, function(value, key) {
					return {
						value: value,
						data: key
					};
				});

				// initialize autocomplete with custom appendTo
				$('#autocomplete-custom-append').autocomplete({
					lookup: countriesArray
				});
			});
		</script>
		<!-- /jQuery autocomplete -->

		<!-- Starrr -->
		<script>
			$(document).ready(function() {
				$(".stars").starrr();

				$('.stars-existing').starrr({
					rating: 4
				});

				$('.stars').on('starrr:change', function (e, value) {
					$('.stars-count').html(value);
				});

				$('.stars-existing').on('starrr:change', function (e, value) {
					$('.stars-count-existing').html(value);
				});
			});
		</script>
		<!-- /Starrr -->
		<!-- date picker -->
		<script type="text/javascript">
			$(function() {
			    $('input[name="start_date"]').daterangepicker({
			        locale: {
						format: 'YYYY-MM-DD'
					},
			        singleDatePicker: true,
			        showDropdowns: true,
			    });
			});

			$(function() {
			    $('input[name="end_date"]').daterangepicker({
			        locale: {
						format: 'YYYY-MM-DD'
					},
			        singleDatePicker: true,
			        showDropdowns: true,
			    });
			});
		</script>
		<!-- date picker -->
	</body>
	</html>
