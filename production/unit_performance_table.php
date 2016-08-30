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
				<h3>Unit Performance Update</h3>
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
						<h2>Aktivitas Terbaru<small>Unit Performance</small></h2>
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
						<!--     background-color: #f9f9f9; -->
						<?php 
						$sql=mysqli_query($con,"SELECT * FROM unit_performance_activity ORDER BY id_activity DESC");

						$x=1;
						if ($isi=mysqli_num_rows($sql)>0){
							?>
							<table class="table table-hover" >
								<thead>
									<tr>
										<th style="width:5%; text-align:center">#</th>
										<th style="width:20%">User</th>
										<th style="width:50%; ">Aktivitas</th>
										<th style="width:20%; text-align:center">Tanggal</th>
										<th style="width:5%; text-align:center"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$ay=1;
									while ($check=mysqli_fetch_array($sql)) {
										$ay=$x++;
										if ($check['status']=='unread') {
											?>
											<tr style="background-color: #f9f9f9; ">
												<th scope="row" style="text-align:center; vertical-align:middle"><?php echo $ay ?></th>
												<td style=" vertical-align:middle"><span class="image"><img src="images/img.jpg" class="avatar" alt="Avatar" /></span><a href=""> </a><?php echo $check['username']; ?></td>
												<td style=" vertical-align:middle"><a href="unit_performance_display.php?id=<?php echo $check['id_activity'] ?>"><?php echo $check['activity_detail'] ?></a></td>
												<td style="text-align:center; vertical-align:middle"><?php echo $check['last_modified']; ?></td>
												<td style="text-align:center; vertical-align:middle"><i class="fa fa-circle"></i> </td>
											</tr>
											<?php
										} else {
											?>
											<tr style="">
												<th scope="row" style="text-align:center; vertical-align:middle"><?php echo $ay ?></th>
												<td style=" vertical-align:middle"><span class="image"><img src="images/img.jpg" class="avatar" alt="Avatar" /></span><a href=""> </a><?php echo $check['username']; ?></td>
												<td style=" vertical-align:middle"><a href="unit_performance_display.php?id=<?php echo $check['id_activity'] ?>"><?php echo $check['activity_detail'] ?></a></td>
												<td style="text-align:center; vertical-align:middle"><?php echo $check['last_modified']; ?></td>
												<td style="text-align:center; vertical-align:middle"></td>
											</tr>
											<?php
										}
									}
									?>


								</tbody>
							</table>
							<?php

							
						} else {
							echo "Tidak ada Aktivitas";
						}
						


						?>
						

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

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>
</html>
