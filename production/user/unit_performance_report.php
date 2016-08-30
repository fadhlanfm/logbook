<?php
include_once('../Connection/conn.php');

session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
{

} else if ($_SESSION['role'] != 1) {
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
$coba = $_SESSION['id'];


$query2 =mysqli_query($con, "SELECT * FROM user WHERE username = '$coba'");
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

	<title>CA Performance</title>

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
									<img src="../images/img.jpg" alt=""><?php echo $row2['username']; ?>
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

						<div class="title_right">
							<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="clearfix"></div>	
					<div class="row">
						

						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="x_panel ui-ribbon-container ">
								<div >
									
								</div>
								<div class="x_content">
									<h2>Barriers Report</h2>
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="unit_performance_report_.php" method="POST"  enctype="multipart/form-data">
										<input type="text" id="name" name="name" style="display:none" value="<?php echo "$row2[username]" ?>">
										<input type="text" id="unit" name="unit" style="display:none" value="<?php echo "$row2[unit]" ?>">
										
										<div class="clone">
											<div class="ln_solid"></div>
											<div class="form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Hambatan 
												</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" name="hambatan[]" id="hambatan" required class="form-control col-md-7 col-xs-12" value="">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Solusi
												</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<textarea id="solusi" name="solusi[]" class="resizable_textarea form-control" required placeholder=""></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal Mulai 
												</label>
												<div class="col-md-3 col-sm-3 col-xs-12">
													<input type="text" class="form-control has-feedback-left xdisplay_inputx" required id="single_cal2" name="start[]" placeholder="Tanggal" aria-describedby="inputSuccess2Status2" value="">
													<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
												</div>

												<label class="control-label col-md-2 col-sm-2 col-xs-12 " >Tanggal Berakhir
												</label>
												<div class="col-md-3 col-sm-3 col-xs-12">
													<input type="text" class="form-control has-feedback-left xdisplay_inputx" required id="single_cal3" name="end[]" placeholder="Tanggal" aria-describedby="inputSuccess2Status2" value="">
													<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Tindak Lanjut 
												</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<textarea id="desc" name="followup[]" class="resizable_textarea form-control" required required placeholder=""></textarea>
												</div>
											</div>

										</div>
										<div class="ln_solid"></div>
										<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
											<button name="submit" class="btn btn-primary" value="batal">Batal</button>
											<button name="submit" type="submit" class="btn btn-success" value="simpan" action>Simpan</button>
											<button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a  class="add" rel=".clone">Add More</a></button>
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
<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="../../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../js/moment/moment.min.js"></script>
<script src="../js/datepicker/daterangepicker.js"></script>
<!-- Autosize -->
<script>
$(document).ready(function() {
	autosize($('.resizable_textarea'));
});
</script>
<!-- /Autosize -->
<!-- bootstrap-daterangepicker -->
<script>
$(document).ready(function() {
	$('#single_cal1').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_1"
	}, function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#single_cal2').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_2"
	}, function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#single_cal3').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_2"
	}, function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#single_cal4').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_4"
	}, function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	});
});
</script>
<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

<!-- /bootstrap-daterangepicker -->

<script type="text/javascript" src="reCopy.js"></script>
<script type="text/javascript">
$(function(){
	var removeLink = '<a class="remove " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><button id="buttonadd" type="button" class="right btn waves-effect waves-light " >remove</button></a>';
	$('a.add').relCopy({ append: removeLink});  
});
</script>
</body>
</html>
