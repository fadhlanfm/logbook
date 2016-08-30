<?php
session_start();
include_once('Connection/conn.php');

$query = mysqli_query($con,"SELECT * FROM Survey_list WHERE status='active'" );

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
$coba ='admin';
$query2 =mysqli_query($con, "SELECT * FROM user WHERE username = '$coba'");
$row2 = mysqli_fetch_array($query2);
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			
			<div class="title_right">
				
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<!-- innovation chart -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Innovation Performance</h2>
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
					<!-- CHART unit submit-->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="x_content">
							<div id="echart_guage" style="height:370px;"></div>
							<div style="text-align:center">
								<h3 class="name_title">50 pegawai</h3>
								<p>dari total 100 pegawai</p>

								<div class="divider"></div>

								<p>Jumlah employee yang berpartisipasi / jumlah all employee</p>
							</div>
						</div>
					</div>
					<!-- CHART unit submit-->

					<!-- CHART unit submit-->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="x_content">
							<div id="echart_guage2" style="height:370px;"></div>
							<div style="text-align:center">
								<h3 class="name_title">50 ide </h3>
								<p>dari total 100 ide</p>

								<div class="divider"></div>

								<p>jumlah ide yang terimplementasi dibandingkan jumlah seluruh ide</p>
							</div>
						</div>

					</div>
					<!-- CHART unit submit-->

					<!-- CHART unit submit-->
					<div class="col-md-4 col-sm-4 col-xs-12">

						<div class="x_content">
							<div id="echart_guage3" style="height:370px;"></div>
							<div style="text-align:center">
								<h3 class="name_title">50 unit</h3>
								<p>dari total 100 unit</p>

								<div class="divider"></div>

								<p>Jumlah unit yang berpartisipasi / jumlah all unit</p>
							</div>
						</div>
					</div>
					<!-- CHART unit submit-->
				</div>
			</div>
			<!-- innovation chart -->
		</div>
		<div class="row">
			<!-- progress bar -->
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Progress Direktorat <small>Sessions</small></h2>
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
						<canvas id="mybarChart"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Progress Implementasi <small>Sessions</small></h2>
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
						<canvas id="mybarChart2"></canvas>
					</div>
				</div>
			</div>
			<!-- progress bar -->
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
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- ECharts -->
<script src="../vendors/echarts/dist/echarts.min.js"></script>
<script src="../vendors/echarts/map/js/world.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<script type="text/javascript">
	var theme = {
		color: [
		'#26B99A', '#34495E', '#BDC3C7', '#3498DB',
		'#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
		],

		gauge: {
			startAngle: 225,
			endAngle: -45,
			axisLine: {
				show: true,
				lineStyle: {
					color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
					width: 8
				}
			},
			axisTick: {
				splitNumber: 10,
				length: 12,
				lineStyle: {
					color: 'auto'
				}
			},
			axisLabel: {
				textStyle: {
					color: 'auto'
				}
			},
			splitLine: {
				length: 18,
				lineStyle: {
					color: 'auto'
				}
			},
			pointer: {
				length: '90%',
				color: 'auto'
			},
			title: {
				textStyle: {
					color: '#333'
				}
			},
			detail: {
				textStyle: {
					color: 'auto'
				}
			}
		},
		textStyle: {
			fontFamily: 'Arial, Verdana, sans-serif'
		}
	};

	var echartGauge = echarts.init(document.getElementById('echart_guage'), theme);

	echartGauge.setOption({
		tooltip: {
			formatter: "{a} <br/>{b} : {c}%"
		},
		toolbox: {
			show: true,
			feature: {
				restore: {
					show: true,
					title: "Restore"
				},
				saveAsImage: {
					show: true,
					title: "Save Image"
				}
			}
		},
		series: [{
			name: 'Employee Innovation Index',
			type: 'gauge',
			center: ['50%', '50%'],
			startAngle: 220,
			endAngle: -40,
			min: 0,
			max: 100,
			precision: 0,
			splitNumber: 10,
			axisLine: {
				show: true,
				lineStyle: {
					color: [
					[0.49, '#F44336'],
					[0.74, '#FFEB3B '],
					[1, '#00e676']
					],
					width: 30
				}
			},
			axisTick: {
				show: true,
				splitNumber: 5,
				length: 8,
				lineStyle: {
					color: '#eee',
					width: 1,
					type: 'solid'
				}
			},
			
			splitLine: {
				show: true,
				length: 30,
				lineStyle: {
					color: '#eee',
					width: 2,
					type: 'solid'
				}
			},
			pointer: {
				length: '80%',
				width: 8,
				color: 'auto'
			},
			title: {
				show: true,
				offsetCenter: ['0%', 100],
				textStyle: {
					color: '#333',
					fontSize: 15
				}
			},
			detail: {
				show: true,
				backgroundColor: 'rgba(0,0,0,0)',
				borderWidth: 0,
				borderColor: '#ccc',
				width: 100,
				height: 40,
				formatter: '{value}%',
				textStyle: {
					color: 'auto',
					fontSize: 30
				}
			},
			data: [{
				value: 50,
				name: 'Employee\n Innovation Index'
			}]
		}]
	});

	var echartGauge2 = echarts.init(document.getElementById('echart_guage2'), theme);

	echartGauge2.setOption({
		tooltip: {
			formatter: "{a} <br/>{b} : {c}%"
		},
		toolbox: {
			show: true,
			feature: {
				restore: {
					show: true,
					title: "Restore"
				},
				saveAsImage: {
					show: true,
					title: "Save Image"
				}
			}
		},
		series: [{
			name: 'Employee Innovation Index',
			type: 'gauge',
			center: ['50%', '50%'],
			startAngle: 220,
			endAngle: -40,
			min: 0,
			max: 100,
			precision: 0,
			splitNumber: 10,
			axisLine: {
				show: true,
				lineStyle: {
					color: [
					[0.49, '#F44336'],
					[0.74, '#FFEB3B '],
					[1, '#00e676']
					],
					width: 30
				}
			},
			axisTick: {
				show: true,
				splitNumber: 5,
				length: 8,
				lineStyle: {
					color: '#eee',
					width: 1,
					type: 'solid'
				}
			},
			
			splitLine: {
				show: true,
				length: 30,
				lineStyle: {
					color: '#eee',
					width: 2,
					type: 'solid'
				}
			},
			pointer: {
				length: '80%',
				width: 8,
				color: 'auto'
			},
			title: {
				show: true,
				offsetCenter: ['0%', 100],
				textStyle: {
					color: '#333',
					fontSize: 15
				}
			},
			detail: {
				show: true,
				backgroundColor: 'rgba(0,0,0,0)',
				borderWidth: 0,
				borderColor: '#ccc',
				width: 100,
				height: 40,
				formatter: '{value}%',
				textStyle: {
					color: 'auto',
					fontSize: 30
				}
			},
			data: [{
				value: 50,
				name: 'Inovation\n Implementation Index'
			}]
		}]
	});


	var echartGauge3 = echarts.init(document.getElementById('echart_guage3'), theme);

	echartGauge3.setOption({
		tooltip: {
			formatter: "{a} <br/>{b} : {c}%"
		},
		toolbox: {
			show: true,
			feature: {
				restore: {
					show: true,
					title: "Restore"
				},
				saveAsImage: {
					show: true,
					title: "Save Image"
				}
			}
		},
		series: [{
			name: 'Employee Innovation Index',
			type: 'gauge',
			center: ['50%', '50%'],
			startAngle: 220,
			endAngle: -40,
			min: 0,
			max: 100,
			precision: 0,
			splitNumber: 10,
			axisLine: {
				show: true,
				lineStyle: {
					color: [
					[0.49, '#F44336'],
					[0.74, '#FFEB3B '],
					[1, '#00e676']
					],
					width: 30
				}
			},
			axisTick: {
				show: true,
				splitNumber: 5,
				length: 8,
				lineStyle: {
					color: '#eee',
					width: 1,
					type: 'solid'
				}
			},
			
			splitLine: {
				show: true,
				length: 30,
				lineStyle: {
					color: '#eee',
					width: 2,
					type: 'solid'
				}
			},
			pointer: {
				length: '80%',
				width: 8,
				color: 'auto'
			},
			title: {
				show: true,
				offsetCenter: ['0%', 100],
				textStyle: {
					color: '#333',
					fontSize: 15
				}
			},
			detail: {
				show: true,
				backgroundColor: 'rgba(0,0,0,0)',
				borderWidth: 0,
				borderColor: '#ccc',
				width: 100,
				height: 40,
				formatter: '{value}%',
				textStyle: {
					color: 'auto',
					fontSize: 30
				}
			},
			data: [{
				value: 50,
				name: 'Unit\nInnovationIndex'
			}]
		}]
	});


	// Bar chart
	Chart.defaults.global.legend = {
		enabled: true
	};
	var ctx = document.getElementById("mybarChart");
	var mybarChart = new Chart(ctx, {
		type: 'bar',
		
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				name: 'x',
				label: 'Total',
				backgroundColor: "#1e88e5",
				data: [92, 86, 65, 76, 164, 84, 57]
			}, {
				name: 'y',
				label: 'Sudah',
				backgroundColor: "#00e676",
				data: [51, 30, 40, 28, 92, 50, 45]
			}, {
				name: 'z',
				label: 'Belum',
				backgroundColor: "#F44336",
				data: [41, 56, 25, 48, 72, 34, 12]
			}]
		},

		options: {
			
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

	// Bar chart

	var ctx2 = document.getElementById("mybarChart2");
	var mybarChart2 = new Chart(ctx2, {
		type: 'bar',
		
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				name: 'x',
				label: 'Total',
				backgroundColor: "#1e88e5",
				data: [92, 86, 65, 76, 164, 84, 57]
			}, {
				name: 'y',
				label: 'Sudah',
				backgroundColor: "#00e676",
				data: [51, 30, 40, 28, 92, 50, 45]
			}, {
				name: 'z',
				label: 'Belum',
				backgroundColor: "#F44336",
				data: [41, 56, 25, 48, 72, 34, 12]
			}]
		},

		options: {
		
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>

</body>
</html>
