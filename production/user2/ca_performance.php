<?php
include_once('../Connection/conn.php');

session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == 0)
{

} else if ($_SESSION['role'] != 0) {
	echo 'You are not logged in as User <br>';
	echo'<a href="../process/acc_logout.php">LOGOUT</a><br>';
	echo'<a href="../pages/survey.php">BACK</a>';
	exit;
}
else
{
	echo 'You are not logged In <br>';
	echo'<a href="../index.php">LOGIN</a>';
	exit;

}

if (isset($_SESSION['error'])&&!empty($_SESSION['error'])) {
	echo '<script language="javascript">';
	echo 'alert("Sorry, only rar or zip files are allowed. your file is '.$_SESSION['tipe'].' extension ")';
	echo '</script>';
	unset($_SESSION['error']);
	header("Refresh:0");
}
if (isset($_SESSION['error3'])&&!empty($_SESSION['error3'])) {
	echo '<script language="javascript">';
	echo 'alert("Tidak ada File yang diunggah. Pilih File anda terlebih dahulu.")';
	echo '</script>';
	unset($_SESSION['error3']);
	header("Refresh:0");
}
if (isset($_SESSION['size'])&&!empty($_SESSION['size'])) {
	echo '<script language="javascript">';
	echo 'alert("'.$_SESSION['size'].'")';
	echo '</script>';
	unset($_SESSION['size']);
	header("Refresh:0");
}
$coba = $_SESSION['id'];


$query2 =mysqli_query($con, "SELECT * FROM ca_user JOIN employee on ca_user.ca_nopeg=employee.NIP WHERE ca_nopeg = '$coba'");
$row2 = mysqli_fetch_array($query2);
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

	<title>Unit Performance</title>

	<!-- Bootstrap -->
	<link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
	
	<!-- Custom Theme Style -->
	<link href="../../build/css/custom.min.css" rel="stylesheet">
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

					<?php
					include('sidebar.php');
					?>

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="../images/img.jpg" alt=""><?php echo $row2['nama']; ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="javascript:;"> Profile</a></li>
									<li>
										<a href="javascript:;">
											<span class="badge bg-red pull-right">50%</span>
											<span>Settings</span>
										</a>
									</li>
									<li><a href="javascript:;">Help</a></li>
									<li><a href="../acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>

							<li role="presentation" class="dropdown">
								<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">6</span>
								</a>
								<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
									<li>
										<a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
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
						<div class="title_left">
							<h3>CA Performance</h3>
						</div>

						
					</div>

					<div class="clearfix"></div>
					<br>	
					<div class="row">
						<div class="col-md-4 col-xs-12  widget_tally_box">
							<div class="x_panel ui-ribbon-container ">
								<div class="x_title" style="text-align:center">
									<h2 >Index Performa Anda</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<?php 
									$nama=$row2['ca_nopeg'];
									$cekchart=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$nama'");
									$rowc=mysqli_fetch_array($cekchart);
									$total=$rowc['total'];
									
									$persen=$total*10;
									if ($persen<50) {
										$status='Bad';
										$des="If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.";
									} else if ($persen>=50 && $persen<75) {
										$status='Good';
										$des="Good Communication makes a great teamwork! Keep Spirit and do your best.";
									} else if ($persen>=75) {
										$status='Excelent';
										$des="You have a great work. Congratulations!!!";
									}
									?>
									<div style="text-align: center; margin-bottom: 17px" >
										<span class="chart" data-percent="<?php echo $persen; ?>">
											<span class="percent"></span>
										</span>
									</div>

									<h3 class="name_title"><?php echo $status; ?></h3>
									

									<div class="divider"></div>

									<p><?php echo $des; ?></p>

								</div>
							</div>
						</div>

						<div class="col-md-8 col-sm-8 col-xs-12 ">
							<div class="x_panel ui-ribbon-container ">
								<div class="ui-ribbon-wrapper">

								</div>
								<div class="x_title">
									<h2>Submission</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">

									<p>Upload attachment format only <u>.zip</u> or <u>.rar</u>. Maximum File Size is 4Mb</p>

									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="ca_performance_.php" method="POST"  enctype="multipart/form-data">
										<input type="text" id="name" name="name" style="display:none" value="<?php echo "$row2[username]" ?>">
										<input type="text" id="unit" name="unit" style="display:none" value="<?php echo "$row2[unit]" ?>">
										<table class="table table-hover">
											<thead>
												<tr>
													<th style="width:5%">#</th>
													<th style="width:75%; ">Condition</th>
													<th style="width:20%; text-align:center">Evidence</th>

												</tr>
											</thead>
											<tbody>
												<tr>
													<?php
													$sql2=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='1'");
													$row2=mysqli_fetch_array($sql2);
													?>
													<th>1</th>
													<td><?php	echo "$row2[ca_detail]"; ?></td>
													<td style="vertical-align:middle">


													</td>
												</tr>
												<tr>
													<?php
													$sql2=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='2'");
													$row2=mysqli_fetch_array($sql2);
													?>
													<th>2</th>
													<td><?php	echo "$row2[ca_detail]"; ?></td>
													<td style="vertical-align:middle">
														<?php 
														$cekisi2=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
														$rowisi2=mysqli_fetch_array($cekisi2);
														if($rowisi2['file2']==null || empty($rowisi2['file2'])){
															?>
															<!-- <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> -->
															<input class="btn btn-default " type="file" name="file2" />
															<?php
														} else {
															echo "$rowisi2[file2]";
															if ($rowisi2['status_f2']=='verified') {
																?>
																<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																<?php	
															}

														}

														?>

													</td>
												</tr>
												<tr>
													<?php
													$sql3=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='3'");
													$row3=mysqli_fetch_array($sql3);
													?>
													<th>3</th>
													<td><?php	echo "$row3[ca_detail]"; ?></td>
													<td style="vertical-align:middle">
														<?php 
														$cekisi3=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
														$rowisi3=mysqli_fetch_array($cekisi3);
														if($rowisi3['file3']==null || empty($rowisi3['file3'])){
															?>
															<input class="btn btn-default " type="file" name="file3" />
															<?php
														} else {
															echo "$rowisi3[file3]";
															if ($rowisi2['status_f3']=='verified') {
																?>
																<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																<?php	
															}
														}

														?>
													</td>
												</tr>
												<tr>
													<?php
													$sql4=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='4'");
													$row4=mysqli_fetch_array($sql4);
													?>
													<th>4</th>
													<td><?php	echo "$row4[ca_detail]"; ?></td>
													<td style="vertical-align:middle">
														<?php 
														$cekisi4=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
														$rowisi4=mysqli_fetch_array($cekisi4);
														if($rowisi4['file4']==null || empty($rowisi4['file4'])){
															?>
															<input class="btn btn-default " type="file" name="file4" />
															<?php
														} else {
															echo "$rowisi4[file4]";
															if ($rowisi2['status_f4']=='verified') {
																?>
																<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																<?php	
															}
														}

														?>
													</td>
												</tr>
												<tr>
													<?php
													$sql5=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='5'");
													$row5=mysqli_fetch_array($sql5);
													?>
													<th>5</th>
													<td><?php	echo "$row5[ca_detail]"; ?></td>
													<td style="vertical-align:middle">
														<?php 
														$cekisi5=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
														$rowisi5=mysqli_fetch_array($cekisi5);
														if($rowisi5['file5']==null || empty($rowisi5['file5'])){
															?>
															<input class="btn btn-default " type="file" name="file5" />
															<?php
														} else {
															echo "$rowisi5[file5]";
															if ($rowisi2['status_f5']=='verified') {
																?>
																<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																<?php	
															}
														}

														?></td>
													</tr>
													<tr>
														<?php
														$sql6=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='6'");
														$row6=mysqli_fetch_array($sql6);
														?>
														<th>6</th>
														<td><?php	echo "$row6[ca_detail]"; ?></td>
														<td style="vertical-align:middle">
															<?php 
															$cekisi6=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
															$rowisi6=mysqli_fetch_array($cekisi6);
															if($rowisi6['file6']==null || empty($rowisi6['file6'])){
																?>
																<input class="btn btn-default " type="file" name="file6" />
																<?php
															} else {
																echo "$rowisi6[file6]";
																if ($rowisi2['status_f6']=='verified') {
																	?>
																	<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																	<?php	
																}
															}

															?>
														</td>
													</tr>
													<tr>
														<?php
														$sql7=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='7'");
														$row7=mysqli_fetch_array($sql7);
														?>
														<th>7</th>
														<td><?php	echo "$row7[ca_detail]"; ?></td>
														<td style="vertical-align:middle">
															<?php 
															$cekisi7=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
															$rowisi7=mysqli_fetch_array($cekisi7);
															if($rowisi7['file7']==null || empty($rowisi7['file7'])){
																?>
																<input class="btn btn-default " type="file" name="file7" />
																<?php
															} else {
																echo "$rowisi7[file7]";
																if ($rowisi2['status_f7']=='verified') {
																	?>
																	<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																	<?php	
																}
															}

															?>
														</td>
													</tr>
													<tr>
														<?php
														$sql8=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='8'");
														$row8=mysqli_fetch_array($sql8);
														?>
														<th>8</th>
														<td><?php	echo "$row8[ca_detail]"; ?></td>
														<td style="vertical-align:middle">
															<?php 
															$cekisi8=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
															$rowisi8=mysqli_fetch_array($cekisi8);
															if($rowisi8['file8']==null || empty($rowisi8['file8'])){
																?>
																<input class="btn btn-default " type="file" name="file8" />
																<?php
															} else {
																echo "$rowisi8[file8]";
																if ($rowisi2['status_f8']=='verified') {
																	?>
																	<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																	<?php	
																}
															}

															?>
														</td>
													</tr>
													<tr>
														<?php
														$sql9=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='9'");
														$row9=mysqli_fetch_array($sql9);
														?>
														<th>9</th>
														<td><?php	echo "$row9[ca_detail]"; ?></td>
														<td style="vertical-align:middle">
															<?php 
															$cekisi9=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
															$rowisi9=mysqli_fetch_array($cekisi9);
															if($rowisi9['file9']==null || empty($rowisi9['file9'])){
																?>
																<input class="btn btn-default " type="file" name="file9" />
																<?php
															} else {
																echo "$rowisi9[file9]";
																if ($rowisi2['status_f9']=='verified') {
																	?>
																	<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																	<?php	
																}
															}

															?>
														</td>
													</tr>
													<tr>
														<?php
														$sql10=mysqli_query($con,"SELECT * FROM ca_performance_event where id_ca='10'");
														$row10=mysqli_fetch_array($sql10);
														?>
														<th>10</th>
														<td><?php	echo "$row10[ca_detail]"; ?></td>
														<td style="vertical-align:middle">
															<?php 
															$cekisi10=mysqli_query($con,"SELECT * FROM ca_performance_upload where username='$coba'");
															$rowisi10=mysqli_fetch_array($cekisi10);
															if($rowisi10['file10']==null || empty($rowisi10['file10'])){
																?>
																<input class="btn btn-default " type="file" name="file10" />
																<?php
															} else {
																echo "$rowisi10[file10]";
																if ($rowisi2['status_f10']=='verified') {
																	?>
																	<span><i class="fa fa-check-circle" style="color:#26B99A"></i></span>
																	<?php	
																}
															}

															?>
														</td>
													</tr>
													<?php


													?>

												</tbody>
											</table>


											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-12 col-sm-12 col-xs-12 ">
													<button type="submit" class="btn btn-success" name="submit" value="simpan">Submit</button>
												</div>
											</div>
										</form>
									</div>
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
					Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="../../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../../vendors/nprogress/nprogress.js"></script>
	<!-- Autosize -->
	<script src="../../vendors/autosize/dist/autosize.min.js"></script>
	<!-- Autosize -->
	<script>
	$(document).ready(function() {
		autosize($('.resizable_textarea'));
	});

	</script>
	<!-- /Autosize -->
	<!-- easy-pie-chart -->
	<script src="../../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	<script>
	$(function() {
		$('.chart').easyPieChart({
			easing: 'easeOutElastic',
			delay: 3000,
			barColor: '#26B99A',
			trackColor: '#F5F7FA',
			scaleColor: false,
			lineWidth: 20,
			trackWidth: 16,
			lineCap: 'butt',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
	});
	</script>
	<!-- Custom Theme Scripts -->
	<script src="../../build/js/custom.min.js"></script>




</body>
</html>
