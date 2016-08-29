<?php
session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == -1)
{ 

} else if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
  header ('Location: ../../page_403.php');
  exit;
} else if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
  header ('Location: ../../page_403.php');
  exit;
}
else
{
  header ('Location: ../../page_4033.php');
  exit;

}
?>
<?php
  include('../connect_db.php');
  $queryy = "SELECT kode_unit FROM logbook WHERE end >= curdate() GROUP BY kode_unit "; //yg udah submit dan belom kelar
  $queryy1 = "SELECT kode FROM unit GROUP BY kode";
  $queryy2 = "SELECT kode FROM branch GROUP BY kode";
  $queryy3 = "SELECT id FROM logbook WHERE start <= curdate() and end >= curdate()";

  $queryy4 = "SELECT id FROM logbook WHERE kode_dir='JKTDZ' AND end < curdate()";
  $queryy5 = "SELECT id FROM logbook WHERE kode_dir='JKTDI' AND end < curdate()";
  $queryy6 = "SELECT id FROM logbook WHERE kode_dir='JKTDF' AND end < curdate()";
  $queryy7 = "SELECT id FROM logbook WHERE kode_dir='JKTDO' AND end < curdate()";
  $queryy8 = "SELECT id FROM logbook WHERE kode_dir='JKTDE' AND end < curdate()";
  $queryy9 = "SELECT id FROM logbook WHERE kode_dir='JKTDC' AND end < curdate()";
  $queryy10 = "SELECT id FROM logbook WHERE kode_dir='JKTDN' AND end < curdate()";
  $queryy11 = "SELECT id FROM logbook WHERE kode_dir='JKTDG' AND end < curdate()";


  $resultt = $db->query($queryy);
  $resultt1 = $db->query($queryy1);
  $resultt2 = $db->query($queryy2);
  $resultt3 = $db->query($queryy3);
  $resultt4 = $db->query($queryy4);
  $resultt5 = $db->query($queryy5);
  $resultt6 = $db->query($queryy6);
  $resultt7 = $db->query($queryy7);
  $resultt8 = $db->query($queryy8);
  $resultt9 = $db->query($queryy9);
  $resultt10 = $db->query($queryy10);
  $resultt11 = $db->query($queryy11);


  $tersubmit=mysqli_num_rows($resultt);
  $totalunit=mysqli_num_rows($resultt1);
  $totalbranch=mysqli_num_rows($resultt2);
  $running=mysqli_num_rows($resultt3);

  $total_JKTDZ=mysqli_num_rows($resultt4);
  $total_JKTDI=mysqli_num_rows($resultt5);
  $total_JKTDF=mysqli_num_rows($resultt6);
  $total_JKTDO=mysqli_num_rows($resultt7);
  $total_JKTDE=mysqli_num_rows($resultt8);
  $total_JKTDC=mysqli_num_rows($resultt9);
  $total_JKTDN=mysqli_num_rows($resultt10);
  $total_JKTDG=mysqli_num_rows($resultt11);


  $total=$totalunit+$totalbranch-8;
  $value=$tersubmit/$total;
  if($tersubmit!=0){
    $value1=$running/$tersubmit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="../assets/gi.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>simulasi</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" onload="setInterval('displayServerTime()', 1000);">

  <!-- QUERIES -->
  <?php
  $coba = $_SESSION['id'];
  include_once('Connection/dbconn.php');
  $query2 = "SELECT * FROM user WHERE username = '$coba'";
    //execute the query
  $result2 = $db->query( $query2 );
  if (!$result2)
  {
    die("could not query the database: <br />".$db->error);
  }
  $row2 = $result2->fetch_object();
  ?>
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><span>Garuda Indonesia</span></a>
          </div>
          <h5 style="text-indent:12px;color:white;">Admin Page</h5>
          <div class="clearfix"></div>

          

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Overall</a></li>
                    <li><a href="ucharts_JKTDZ.php">JKTDZ - President & CEO</a></li>
                    <li><a href="ucharts_JKTDI.php">JKTDI - Human Capital & Corporate Affairs</a></li>
                    <li><a href="ucharts_JKTDF.php">JKTDF - Finance & Risk Management</a></li>
                    <li><a href="ucharts_JKTDG.php">JKTDG - Cargo</a></li>
                    <li><a href="ucharts_JKTDO.php">JKTDO - Operations </a></li>
                    <li><a href="ucharts_JKTDE.php">JKTDE - Maintenance & Information Technology</a></li>
                    <li><a href="ucharts_JKTDC.php">JKTDC - Services</a></li>
                    <li><a href="ucharts_JKTDN.php">JKTDN - Commercial</a>
                        <li><a>JKTDN - Commercial (Branch Offices)<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="bcharts_MESAM.php">MESAM - Sumatera Region</a>
                            </li>
                            <li><a href="bcharts_JKTAM.php">JKTAM - Jakarta Raya Region</a>
                            </li><li><a href="bcharts_SUBAM.php">SUBAM - Jawa, Bali, Nusa Tenggara Region</a>
                            </li><li><a href="bcharts_UPGAM.php">UPGAM - Kalimantan, Sulawesi, Papua Region</a>
                            </li><li><a href="bcharts_SINAM.php">SINAM - Asia Region</a>
                            </li><li><a href="bcharts_TYOAM.php">TYOAM - Japan & Korea Region</a>
                            </li><li><a href="bcharts_SHAAM.php">SHAAM - China Region</a>
                            </li><li><a href="bcharts_SYDAM.php">SYDAM - South West Pacific Region</a>
                            </li>
                          </ul>
                        </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Logbook <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="show_form.php">Daftar Logbook</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-tasks"></i> Program <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form_running.php">Program sedang berjalan</a></li>
                    <li><a href="form_unstarted.php">Program akan dilaksanakan</a></li>
                    <li><a href="form_ended.php">Program telah terlaksana</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Aktivitas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="aktivitas.php">Daftar Aktivitas</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i> Manajemen User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="kelola_akun/user_management.php">Daftar User</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

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
                  <img src="images/img.jpg" alt=""><?php echo''.$row2->username.''; ?>
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
                  <li><a href="acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
            </div>



            <!-- CHART unit submit-->
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Discipline Report (JKTDC)</h2>
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
                    <div id="submitted" style="height:370px;"></div>
                  </div>
                  <div class="tile-stats">
                  <div class="count"><?php echo ''.$tersubmit.'/'.$total.' Unit di JKTDC';?></div>
                </div>
                </div>
              </div>
            <!-- CHART unit submit-->

            <!-- CHART unit sedang berjalan -->
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Execution Report (JKTDC)</h2>
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
                    <div id="running" style="height:370px;"></div>
                  </div>
                  <div class="tile-stats">
                  <div class="count"><?php echo ''.$running.'/'.$tersubmit.' Unit di JKTDC';?></div>
                  
                </div>
                </div>
              </div>
              </div>
            <!-- CHART unit sedang berjalan-->

            <?php
include('../connect_db.php');
  

  $queryx = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDZ' GROUP BY kode_unit";
  $resultx = $db->query($queryx);
  $exec_JKTDZ=mysqli_num_rows($resultx);
  $queryx1 = "SELECT * FROM unit WHERE kode_dir='JKTDZ'";
  $resultx1 = $db->query($queryx1);
  $unit_JKTDZ=mysqli_num_rows($resultx1);
  $queryx2 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDI' GROUP BY kode_unit";
  $resultx2 = $db->query($queryx2);
  $exec_JKTDI=mysqli_num_rows($resultx2);
  $queryx3 = "SELECT * FROM unit WHERE kode_dir='JKTDI'";
  $resultx3 = $db->query($queryx3);
  $unit_JKTDI=mysqli_num_rows($resultx3);
  $queryx4 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDF' GROUP BY kode_unit";
  $resultx4 = $db->query($queryx4);
  $exec_JKTDF=mysqli_num_rows($resultx4);
  $queryx5 = "SELECT * FROM unit WHERE kode_dir='JKTDF'";
  $resultx5 = $db->query($queryx5);
  $unit_JKTDF=mysqli_num_rows($resultx5);
  $queryx6 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDO' GROUP BY kode_unit";
  $resultx6 = $db->query($queryx6);
  $exec_JKTDO=mysqli_num_rows($resultx6);
  $queryx7 = "SELECT * FROM unit WHERE kode_dir='JKTDO'";
  $resultx7 = $db->query($queryx7);
  $unit_JKTDO=mysqli_num_rows($resultx7);
  $queryx8 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDE' GROUP BY kode_unit";
  $resultx8 = $db->query($queryx8);
  $exec_JKTDE=mysqli_num_rows($resultx8);
  $queryx9 = "SELECT * FROM unit WHERE kode_dir='JKTDE'";
  $resultx9 = $db->query($queryx9);
  $unit_JKTDE=mysqli_num_rows($resultx9);
  $queryx10 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDC' GROUP BY kode_unit";
  $resultx10 = $db->query($queryx10);
  $exec_JKTDC=mysqli_num_rows($resultx10);
  $queryx11 = "SELECT * FROM unit WHERE kode_dir='JKTDC'";
  $resultx11 = $db->query($queryx11);
  $unit_JKTDC=mysqli_num_rows($resultx11);
  $queryx12 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDN' GROUP BY kode_unit";
  $resultx12 = $db->query($queryx12);
  $exec_JKTDN=mysqli_num_rows($resultx12);
  $queryx13 = "SELECT * FROM unit WHERE kode_dir='JKTDN'";
  $resultx13 = $db->query($queryx13);
  $unit_JKTDN=mysqli_num_rows($resultx13);
  $queryx14 = "SELECT * FROM logbook WHERE start <= curdate() AND end >= curdate() AND kode_dir='JKTDG' GROUP BY kode_unit";
  $resultx14 = $db->query($queryx14);
  $exec_JKTDG=mysqli_num_rows($resultx14);
  $queryx15 = "SELECT * FROM unit WHERE kode_dir='JKTDG'";
  $resultx15 = $db->query($queryx15);
  $unit_JKTDG=mysqli_num_rows($resultx15);
  ?>

            <!-- CHART per direktorat -->
            <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-14">
          <div class="x_panel">
            <div class="x_title">
              <h2>Execution Report per Directorate</h2>
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
            
            <div class="row tile_count">
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDZ.php"> JKTDZ - President & CEO</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDZ/$unit_JKTDZ*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDI.php"> JKTDI - Human Capital & Corporate Affairs</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDI/$unit_JKTDI*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDF.php"> JKTDF - Finance & Risk Management</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDF/$unit_JKTDF*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDO.php"> JKTDO - Operations</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDO/$unit_JKTDO*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="row tile_count">
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDE.php"> JKTDE - Engineering & Information Technology</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDE/$unit_JKTDE*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDC.php"> JKTDC - Services</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDC/$unit_JKTDC*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDN.php"> JKTDN - Commercial</a></span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDN/$unit_JKTDN*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-check-square-o"></i><a href="ucharts_JKTDG.php"> JKTDG - Cargo</span>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="<?php echo $exec_JKTDG/$unit_JKTDG*100; ?>">
                    <span class="percent"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            <!-- CHART per direktorat -->

            <!-- CHART unit sudah menyelesaikan -->
            <div class="row">
              <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Per Unit</h2>
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

                    <div id="mainb" style="height:350px;"></div>

                  </div>
                </div>
              </div>
              </div>
            <!-- CHART unit sudah menyelesaikan -->
            


            </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
                                                              <footer>
                                                                <div class="pull-right">
                                                                  Corporate Culture Information Systems - GA
                                                                </div>
                                                                <div class="clearfix"></div>
                                                              </footer>
                                                              <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
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

      var echartGauge = echarts.init(document.getElementById('submitted'), theme);

      echartGauge.setOption({
        tooltip: {
          formatter: "{a} <br/>{b} : {c}%"
        },
        toolbox: {
          show: true,
          feature: {
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        series: [{
          name: 'Unit submit',
          type: 'gauge',
          center: ['50%', '50%'],
          startAngle: 180,
          endAngle: 0,
          min: 0,
          max: 100,
          precision: 0,
          splitNumber: 10,
          axisLine: {
            show: true,
            lineStyle: {
              color: [
                [0.49, '#ff4500'],
                [0.74, '#ffcc00'],
                [1, 'lightgreen']
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
          axisLabel: {
            show: true,
            formatter: function(v) {
              switch (v + '') {
                case '30':
                  return 'c';
                case '60':
                  return 'b';
                case '90':
                  return 'a';
                default:
                  return '';
              }
            },
            textStyle: {
              color: '#333'
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
            offsetCenter: ['-65%', -10],
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
            offsetCenter: ['-60%', 10],
            formatter: '{value}%',
            textStyle: {
              color: 'auto',
              fontSize: 30
            }
          },
          data: [{
            value: <?php echo round($value*100,2);?>,
            name: 'Submitted'
          }]
        }]
      });

      var echartGauge = echarts.init(document.getElementById('running'), theme);

      echartGauge.setOption({
        tooltip: {
          formatter: "{a} <br/>{b} : {c}%"
        },
        toolbox: {
          show: true,
          feature: {
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        series: [{
          name: 'Unit progress',
          type: 'gauge',
          center: ['50%', '50%'],
          startAngle: 180,
          endAngle: 0,
          min: 0,
          max: 100,
          precision: 0,
          splitNumber: 10,
          axisLine: {
            show: true,
            lineStyle: {
              color: [
                [0.49, '#ff4500'],
                [0.74, '#ffcc00'],
                [1, 'lightgreen']
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
          axisLabel: {
            show: true,
            formatter: function(v) {
              switch (v + '') {
                case '30':
                  return 'c';
                case '60':
                  return 'b';
                case '90':
                  return 'a';
                default:
                  return '';
              }
            },
            textStyle: {
              color: '#333'
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
            offsetCenter: ['-65%', -10],
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
            offsetCenter: ['-60%', 10],
            formatter: '{value}%',
            textStyle: {
              color: 'auto',
              fontSize: 30
            }
          },
          data: [{
            value: <?php echo round($value1*100,2);?>,
            name: 'On Progress'
          }]
        }]
      });


      var echartGauge = echarts.init(document.getElementById('submitted'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'All Units Discipline Report',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 180,
        endAngle: 0,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.49, '#ff4500'],
            [0.74, '#ffcc00'],
            [1, 'lightgreen']
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
        axisLabel: {
          show: true,
          formatter: function(v) {
            switch (v + '') {
              case '30':
              return 'c';
              case '60':
              return 'b';
              case '90':
              return 'a';
              default:
              return '';
            }
          },
          textStyle: {
            color: '#333'
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
          offsetCenter: ['-65%', -10],
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
          offsetCenter: ['-60%', 10],
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo round($value*100,2);?>,
          name: ''
        }]
      }]
    });

    var echartGauge = echarts.init(document.getElementById('running'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'All Units Execution Report',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 180,
        endAngle: 0,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.49, '#ff4500'],
            [0.74, '#ffcc00'],
            [1, 'lightgreen']
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
        axisLabel: {
          show: true,
          formatter: function(v) {
            switch (v + '') {
              case '30':
              return 'c';
              case '60':
              return 'b';
              case '90':
              return 'a';
              default:
              return '';
            }
          },
          textStyle: {
            color: '#333'
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
          offsetCenter: ['-65%', -10],
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
          offsetCenter: ['-60%', 10],
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo round($value1*100,2);?>,
          name: ''
        }]
      }]
    });

      //easypiechart
      $(function() {
        $('.chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 3000,
          barColor: '#26B99A',
          trackColor: '#fff',
          scaleColor: false,
          lineWidth: 20,
          trackWidth: 16,
          lineCap: 'butt',
          onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
          }
        });
      });
    //easypiechart

    </script>

  </body>
</html>
