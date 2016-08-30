	<?php
	session_start();
	include_once('Connection/conn.php');

	if(isset($_SESSION['role']) && $_SESSION['role'] == -1)
	{

	} else if ($_SESSION['role'] == 1) {
		echo 'You are not logged in as Administrator <br>';
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
	$coba = $_SESSION['id'];


	$query2 =mysqli_query($con, "SELECT * FROM user WHERE username = '$coba'");
	$row2 = mysqli_fetch_array($query2);
	include('header.php');
	?>

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Unit Performance</h3>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Head Office<small>Unit Performance</small></h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="#">Settings 1</a>
													</li>
													<li><a href="#">Settings 2</a>
													</li>
												</ul>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<canvas id="canvasRadar"></canvas>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Sumatera Region <small>Unit Performance</small></h2>
										
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<canvas id="canvasRadar2"></canvas>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Jawa, Bali, Nusa Tenggara Region <small>Unit Performance</small></h2>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<canvas id="canvasRadar3"></canvas>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Kalimantan, Sulawesi, & Papua Region<small>Unit Performance</small></h2>

										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<canvas id="canvasRadar4"></canvas>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Jakarta Raya and International Region <small>Unit Performance</small></h2>

										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<canvas id="canvasRadar5"></canvas>
									</div>
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


		<!-- jQuery -->
		<script src="../vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="../vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="../vendors/nprogress/nprogress.js"></script>
		<!-- Chart.js -->
		<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="../build/js/custom.min.js"></script>
		<script type="text/javascript">
		 	// Radar chart
		 	Chart.defaults.global.legend = {
		 		enabled: false
		 	};
		 	var ctx = document.getElementById("canvasRadar");
		 	var data = {
		 		labels: [
		 		<?php 
		 		$n=1;
		 		$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='1'");
		 		while ($row=mysqli_fetch_array($queries)) {
		 			?>
		 			"<?php echo $row['unit_name'];?>",
		 			<?php
		 		}
		 		?>
		 		],
		 		datasets: [{
		 			label: "Unit Performance",
		 			backgroundColor: "rgba(3, 88, 106, 0.2)",
		 			borderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBorderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBackgroundColor: "rgba(3, 88, 106, 0.80)",
		 			pointHoverBackgroundColor: "#fff",
		 			pointHoverBorderColor: "rgba(220,220,220,1)",
		 			data: [
		 			<?php 
		 			$n=1;
		 			$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='1'");
		 			while ($row=mysqli_fetch_array($queries)) {
		 				?>
		 				"<?php echo $row['total'];?>",
		 				<?php
		 			}
		 			?>
		 			]
		 		}]
		 	};

		 	var canvasRadar = new Chart(ctx, {
		 		type: 'radar',
		 		data: data,
		 	});

		 	var ctx2 = document.getElementById("canvasRadar2");
		 	var data2 = {
		 		labels: [
		 		<?php 
		 		$n=1;
		 		$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='2'");
		 		while ($row=mysqli_fetch_array($queries)) {
		 			?>
		 			"<?php echo $row['unit_name'];?>",
		 			<?php
		 		}
		 		?>
		 		],
		 		datasets: [{
		 			label: "Unit Performance",
		 			backgroundColor: "rgba(3, 88, 106, 0.2)",
		 			borderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBorderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBackgroundColor: "rgba(3, 88, 106, 0.80)",
		 			pointHoverBackgroundColor: "#fff",
		 			pointHoverBorderColor: "rgba(220,220,220,1)",
		 			data: [
		 			<?php 
		 			$n=1;
		 			$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='2'");
		 			while ($row=mysqli_fetch_array($queries)) {
		 				?>
		 				"<?php echo $row['total'];?>",
		 				<?php
		 			}
		 			?>
		 			]
		 		}]
		 	};

		 	var canvasRadar2 = new Chart(ctx2, {
		 		type: 'radar',
		 		data: data2,
		 	});

		 	var ctx3 = document.getElementById("canvasRadar3");
		 	var data3 = {
		 		labels: [
		 		<?php 
		 		$n=1;
		 		$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='3'");
		 		while ($row=mysqli_fetch_array($queries)) {
		 			?>
		 			"<?php echo $row['unit_name'];?>",
		 			<?php
		 		}
		 		?>
		 		],
		 		datasets: [{
		 			label: "Unit Performance",
		 			backgroundColor: "rgba(3, 88, 106, 0.2)",
		 			borderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBorderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBackgroundColor: "rgba(3, 88, 106, 0.80)",
		 			pointHoverBackgroundColor: "#fff",
		 			pointHoverBorderColor: "rgba(220,220,220,1)",
		 			data: [
		 			<?php 
		 			$n=1;
		 			$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='3'");
		 			while ($row=mysqli_fetch_array($queries)) {
		 				?>
		 				"<?php echo $row['total'];?>",
		 				<?php
		 			}
		 			?>
		 			]
		 		}]
		 	};

		 	var canvasRadar3 = new Chart(ctx3, {
		 		type: 'radar',
		 		data: data3,
		 	});

		 	var ctx4 = document.getElementById("canvasRadar4");
		 	var data4 = {
		 		labels: [
		 		<?php 
		 		$n=1;
		 		$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='4'");
		 		while ($row=mysqli_fetch_array($queries)) {
		 			?>
		 			"<?php echo $row['unit_name'];?>",
		 			<?php
		 		}
		 		?>
		 		],
		 		datasets: [{
		 			label: "Unit Performance",
		 			backgroundColor: "rgba(3, 88, 106, 0.2)",
		 			borderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBorderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBackgroundColor: "rgba(3, 88, 106, 0.80)",
		 			pointHoverBackgroundColor: "#fff",
		 			pointHoverBorderColor: "rgba(220,220,220,1)",
		 			data: [
		 			<?php 
		 			$n=1;
		 			$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='4'");
		 			while ($row=mysqli_fetch_array($queries)) {
		 				?>
		 				"<?php echo $row['total'];?>",
		 				<?php
		 			}
		 			?>
		 			]
		 		}]
		 	};

		 	var canvasRadar4 = new Chart(ctx4, {
		 		type: 'radar',
		 		data: data4,
		 	});

		 	var ctx5 = document.getElementById("canvasRadar5");
		 	var data5 = {
		 		labels: [
		 		<?php 
		 		$n=1;
		 		$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='5'");
		 		while ($row=mysqli_fetch_array($queries)) {
		 			?>
		 			"<?php echo $row['unit_name'];?>",
		 			<?php
		 		}
		 		?>
		 		],
		 		datasets: [{
		 			label: "Unit Performance",
		 			backgroundColor: "rgba(3, 88, 106, 0.2)",
		 			borderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBorderColor: "rgba(3, 88, 106, 0.80)",
		 			pointBackgroundColor: "rgba(3, 88, 106, 0.80)",
		 			pointHoverBackgroundColor: "#fff",
		 			pointHoverBorderColor: "rgba(220,220,220,1)",
		 			data: [
		 			<?php 
		 			$n=1;
		 			$queries=mysqli_query($con,"SELECT * FROM unit_performance_upload where kode='5'");
		 			while ($row=mysqli_fetch_array($queries)) {
		 				?>
		 				"<?php echo $row['total'];?>",
		 				<?php
		 			}
		 			?>
		 			]
		 		}]
		 	};

		 	var canvasRadar5 = new Chart(ctx5, {
		 		type: 'radar',
		 		data: data5,
		 	});
		 </script>

		</body>
		</html>
