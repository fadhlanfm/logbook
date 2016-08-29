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
  $query = "SELECT kode_unit FROM logbook WHERE end >= curdate() AND kode_unit='UPGAM'"; //yg udah submit dan belom kelar
  $query1 = "SELECT kode FROM branch WHERE kode_unit='UPGAM' GROUP BY kode";
  $query3 = "SELECT id FROM logbook WHERE start <= curdate() and end >= curdate() and kode_unit='UPGAM'";

  $query4 = "SELECT id FROM logbook WHERE kode_unit='UPGAM' AND end < curdate()";

  $result = $db->query($query);
  $result1 = $db->query($query1);
  $result3 = $db->query($query3);
  $result4 = $db->query($query4);
  


  $tersubmit=mysqli_num_rows($result);
  $totalbranch=mysqli_num_rows($result1);
  $running=mysqli_num_rows($result3);

  $total_UPGAM=mysqli_num_rows($result4);


  $total=$totalbranch;
  $value=$tersubmit/$total;
  if($tersubmit==0){
    $value1=0;
  }else
  {
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

  <title>Dashboard Branch Perspective: UPGAM</title>

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
      <li><a><i class="fa fa-tasks"></i> Lihat Program <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="show_form.php">Semua Program</a></li>
          <li><a href="form_unstarted.php">Program akan dilaksanakan</a></li>
          <li><a href="form_running.php">Program sedang berjalan</a></li>
          <li><a href="form_ended.php">Program telah terlaksana</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-user"></i> Manajemen User <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="user_management.php">Daftar User</a></li>
          <li><a href="admin_management.php">Daftar Admin</a></li>
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
            <img src="images/img.jpg" alt=""><?php echo''.$row2->username.''; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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

          <!-- top tiles -->
          <div class="row">
          <div class="col-md-12 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Program Terlaksana - UPGAM</h2>
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
                      <span class="count_top"><i class="fa fa-check-square-o"></i> UPGAM - Sumatera Region</span>
                      <div class="count"><?php echo $total_UPGAM; ?></div>
                    </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
          <!-- /top tiles -->

            <!-- CHART unit submit-->
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Discipline Report (UPGAM)</h2>
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
                  <div class="count"><?php echo ''.$tersubmit.'/'.$total.' Unit di UPGAM';?></div>
                </div>
                </div>
              </div>
            <!-- CHART unit submit-->

            <!-- CHART unit sedang berjalan -->
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Execution Report (UPGAM)</h2>
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
                  <div class="count"><?php echo ''.$running.'/'.$tersubmit.' Unit di UPGAM';?></div>
                  
                </div>
                </div>
              </div>
            <!-- CHART unit sedang berjalan-->

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

                    <div id="mainb1" style="height:350px;"></div>

                  </div>
                </div>
              </div>
              </div>            

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

                    <div id="mainb2" style="height:350px;"></div>

                  </div>
                </div>
              </div>
              </div>            

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

                    <div id="mainb3" style="height:350px;"></div>

                  </div>
                </div>
              </div>
              </div>
            
            </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- TABEL -->
    <div class="row">
    <!-- Discipline Report -->
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Discipline Report</h2>
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

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Unit</th>
                          <th width="3%">Belum</th>
                          <th width="3%">Sudah</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $quero = "SELECT * FROM unit WHERE kode='UPGAM'";
                        $resulto = $db->query( $quero );
                        while ($rowo = $resulto->fetch_object()) {
                          echo '<tr>';
                          echo '<th scope="row" colspan="3" bgcolor="black">'.$rowo->kode.' - '.$rowo->nama.'</th>';
                          $cek_kodeunit=$rowo->kode;
                          $quero1 = "SELECT * FROM branch WHERE kode_unit='$cek_kodeunit'";
                          $resulto1 = $db->query( $quero1 );
                          while ($rowo1 = $resulto1->fetch_object()) {
                            echo '<tr>';
                            echo '<td>'.$rowo1->kode.' - '.$rowo1->nama.'</td>';
                            $cek_kodeunit=$rowo1->kode;
                            $quero2 = "SELECT id FROM logbook WHERE kode_unit='$cek_kodeunit'";
                            $resulto2 = $db->query( $quero2 );
                            $rowo2 = $resulto2->fetch_object();
                            if($rowo2=='' || empty($rowo2) || !isset($rowo2) || is_null($rowo2)){
                              echo '<td bgcolor="red"></td>';
                              echo '<td></td>';
                              echo '</tr>';
                            }else{
                              echo '<td></td>';
                              echo '<td bgcolor="green"></td>';
                              echo '</tr>';
                            }
                          }
                        }
                      ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
    <!-- Discipline Report -->
    <!-- execution report -->
      <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Execution Report</h2>
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

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Unit</th>
                          <th width="3%">Belum</th>
                          <th width="3%">Berjalan</th>
                          <th width="3%">Sudah</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $today=date("Y-m-d");
                        $queri = "SELECT * FROM unit WHERE kode='UPGAM'";
                        $resulti = $db->query( $queri );
                        while ($rowi = $resulti->fetch_object()) {  
                          echo '<tr>';
                          echo '<th scope="row" colspan="4" bgcolor="black">'.$rowi->kode.' - '.$rowi->nama.'</th>';
                          echo '</tr>';
                          $cek1_kodeunit=$rowi->kode;
                          $queri1 = "SELECT * FROM logbook WHERE kode_unit='$cek1_kodeunit' GROUP BY kode_branch";
                          $resulti1 = $db->query( $queri1 );
                          $rowcount = mysqli_num_rows($resulti1);
                          if ($rowcount>0) {
                            while ($rowi1 = $resulti1->fetch_object()) {
                              $queri2 = "SELECT nama FROM branch WHERE kode='$rowi1->kode_branch'";
                              $resulti2 = $db->query( $queri2 );
                              $rowi2 = $resulti2->fetch_object();
                              echo '<tr>';
                              echo '<td>'.$rowi1->kode_branch.' - '.$rowi2->nama.'</td>';
                              $queri3 = "SELECT start, end FROM logbook WHERE kode_branch='$rowi1->kode_branch'";
                              $resulti3 = $db->query( $queri3 );
                              $rowi3 = $resulti3->fetch_object();
                              $start= $rowi3->start;
                              $end= $rowi3->end;
                              if ($start > $today) {
                                echo '<td bgcolor="red"></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                              }elseif($start <= $today && $end >= $today){
                                echo '<td></td>';
                                echo '<td bgcolor="yellow"></td>';
                                echo '<td></td>';
                              }else{
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td bgcolor="green"></td>';
                              }
                              echo '</tr>';
                            }
                          }else{
                            echo '<tr>';
                            echo '<td colspan="4"> - </td>';
                            echo '</tr>';
                          }
                        }
                      ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
    <!-- execution report -->
    </div>
    <!-- TABEL -->

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

      <?php

        $submitted_UPGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='UPGDM' AND start > curdate()";
        $running_UPGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='UPGDM' AND start <= curdate() and end >= curdate()";
        $ended_UPGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='UPGDM' AND end < curdate()";
        $submitted_BPNDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BPNDM' AND start > curdate()";
        $running_BPNDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BPNDM' AND start <= curdate() and end >= curdate()";
        $ended_BPNDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BPNDM' AND end < curdate()";
        $submitted_BDJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BDJDM' AND start > curdate()";
        $running_BDJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BDJDM' AND start <= curdate() and end >= curdate()";
        $ended_BDJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BDJDM' AND end < curdate()";
        $submitted_DJJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DJJDM' AND start > curdate()";
        $running_DJJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DJJDM' AND start <= curdate() and end >= curdate()";
        $ended_DJJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DJJDM' AND end < curdate()";
        $submitted_PNKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PNKDM' AND start > curdate()";
        $running_PNKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PNKDM' AND start <= curdate() and end >= curdate()";
        $ended_PNKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PNKDM' AND end < curdate()";
        $submitted_MDCDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MDCDM' AND start > curdate()";
        $running_MDCDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MDCDM' AND start <= curdate() and end >= curdate()";
        $ended_MDCDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MDCDM' AND end < curdate()";        
        $submitted_TTEDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TTEDM' AND start > curdate()";
        $running_TTEDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TTEDM' AND start <= curdate() and end >= curdate()";
        $ended_TTEDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TTEDM' AND end < curdate()";        
        $submitted_SOQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SOQDM' AND start > curdate()";
        $running_SOQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SOQDM' AND start <= curdate() and end >= curdate()";
        $ended_SOQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SOQDM' AND end < curdate()";        
        $submitted_TIMDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TIMDM' AND start > curdate()";
        $running_TIMDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TIMDM' AND start <= curdate() and end >= curdate()";
        $ended_TIMDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TIMDM' AND end < curdate()";        
        $submitted_MJUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MJUDM' AND start > curdate()";
        $running_MJUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MJUDM' AND start <= curdate() and end >= curdate()";
        $ended_MJUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MJUDM' AND end < curdate()";
        $submitted_LUWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LUWDM' AND start > curdate()";
        $running_LUWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LUWDM' AND start <= curdate() and end >= curdate()";
        $ended_LUWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LUWDM' AND end < curdate()";
        $submitted_BUWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BUWDM' AND start > curdate()";
        $running_BUWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BUWDM' AND start <= curdate() and end >= curdate()";
        $ended_BUWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BUWDM' AND end < curdate()";
        $submitted_KDIDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='KDIDM' AND start > curdate()";
        $running_KDIDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='KDIDM' AND start <= curdate() and end >= curdate()";
        $ended_KDIDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='KDIDM' AND end < curdate()";
        $submitted_PLWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PLWDM' AND start > curdate()";
        $running_PLWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PLWDM' AND start <= curdate() and end >= curdate()";
        $ended_PLWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PLWDM' AND end < curdate()";
        $submitted_AMQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='AMQDM' AND start > curdate()";
        $running_AMQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='AMQDM' AND start <= curdate() and end >= curdate()";
        $ended_AMQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='AMQDM' AND end < curdate()";
        $submitted_LUVDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LUVDM' AND start > curdate()";
        $running_LUVDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LUVDM' AND start <= curdate() and end >= curdate()";
        $ended_LUVDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LUVDM' AND end < curdate()";
        $submitted_SXKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SXKDM' AND start > curdate()";
        $running_SXKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SXKDM' AND start <= curdate() and end >= curdate()";
        $ended_SXKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SXKDM' AND end < curdate()";
        $submitted_TRKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TRKDM' AND start > curdate()";
        $running_TRKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TRKDM' AND start <= curdate() and end >= curdate()";
        $ended_TRKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TRKDM' AND end < curdate()";
        $submitted_BEJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BEJDM' AND start > curdate()";
        $running_BEJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BEJDM' AND start <= curdate() and end >= curdate()";
        $ended_BEJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BEJDM' AND end < curdate()";
        $submitted_SQGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SQGDM' AND start > curdate()";
        $running_SQGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SQGDM' AND start <= curdate() and end >= curdate()";
        $ended_SQGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SQGDM' AND end < curdate()";
        $submitted_KTGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='KTGDM' AND start > curdate()";
        $running_KTGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='KTGDM' AND start <= curdate() and end >= curdate()";
        $ended_KTGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='KTGDM' AND end < curdate()";
        $submitted_PKNDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKNDM' AND start > curdate()";
        $running_PKNDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKNDM' AND start <= curdate() and end >= curdate()";
        $ended_PKNDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKNDM' AND end < curdate()";
        $submitted_PSUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PSUDM' AND start > curdate()";
        $running_PSUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PSUDM' AND start <= curdate() and end >= curdate()";
        $ended_PSUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PSUDM' AND end < curdate()";
        $submitted_PKYDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKYDM' AND start > curdate()";
        $running_PKYDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKYDM' AND start <= curdate() and end >= curdate()";
        $ended_PKYDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKYDM' AND end < curdate()";
        $submitted_GTODM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='GTODM' AND start > curdate()";
        $running_GTODM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='GTODM' AND start <= curdate() and end >= curdate()";
        $ended_GTODM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='GTODM' AND end < curdate()";
        $submitted_MKWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MKWDM' AND start > curdate()";
        $running_MKWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MKWDM' AND start <= curdate() and end >= curdate()";
        $ended_MKWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MKWDM' AND end < curdate()";
        $submitted_MKQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MKQDM' AND start > curdate()";
        $running_MKQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MKQDM' AND start <= curdate() and end >= curdate()";
        $ended_MKQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MKQDM' AND end < curdate()";
        $submitted_BIKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BIKDM' AND start > curdate()";
        $running_BIKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BIKDM' AND start <= curdate() and end >= curdate()";
        $ended_BIKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BIKDM' AND end < curdate()";

        $submitted_UPGDM_result=$db->query($submitted_UPGDM_query);
        $running_UPGDM_result=$db->query($running_UPGDM_query);
        $ended_UPGDM_result=$db->query($ended_UPGDM_query);
        $submitted_BPNDM_result=$db->query($submitted_BPNDM_query);
        $running_BPNDM_result=$db->query($running_BPNDM_query);
        $ended_BPNDM_result=$db->query($ended_BPNDM_query);        
        $submitted_BDJDM_result=$db->query($submitted_BDJDM_query);
        $running_BDJDM_result=$db->query($running_BDJDM_query);
        $ended_BDJDM_result=$db->query($ended_BDJDM_query);
        $submitted_DJJDM_result=$db->query($submitted_DJJDM_query);
        $running_DJJDM_result=$db->query($running_DJJDM_query);
        $ended_DJJDM_result=$db->query($ended_DJJDM_query);
        $submitted_PNKDM_result=$db->query($submitted_PNKDM_query);
        $running_PNKDM_result=$db->query($running_PNKDM_query);
        $ended_PNKDM_result=$db->query($ended_PNKDM_query);        
        $submitted_MDCDM_result=$db->query($submitted_MDCDM_query);
        $running_MDCDM_result=$db->query($running_MDCDM_query);
        $ended_MDCDM_result=$db->query($ended_MDCDM_query);        
        $submitted_TTEDM_result=$db->query($submitted_TTEDM_query);
        $running_TTEDM_result=$db->query($running_TTEDM_query);
        $ended_TTEDM_result=$db->query($ended_TTEDM_query);        
        $submitted_SOQDM_result=$db->query($submitted_SOQDM_query);
        $running_SOQDM_result=$db->query($running_SOQDM_query);
        $ended_SOQDM_result=$db->query($ended_SOQDM_query);        
        $submitted_TIMDM_result=$db->query($submitted_TIMDM_query);
        $running_TIMDM_result=$db->query($running_TIMDM_query);
        $ended_TIMDM_result=$db->query($ended_TIMDM_query);        
        $submitted_MJUDM_result=$db->query($submitted_MJUDM_query);
        $running_MJUDM_result=$db->query($running_MJUDM_query);
        $ended_MJUDM_result=$db->query($ended_MJUDM_query);        
        $submitted_LUWDM_result=$db->query($submitted_LUWDM_query);
        $running_LUWDM_result=$db->query($running_LUWDM_query);
        $ended_LUWDM_result=$db->query($ended_LUWDM_query);        
        $submitted_BUWDM_result=$db->query($submitted_BUWDM_query);
        $running_BUWDM_result=$db->query($running_BUWDM_query);
        $ended_BUWDM_result=$db->query($ended_BUWDM_query);        
        $submitted_KDIDM_result=$db->query($submitted_KDIDM_query);
        $running_KDIDM_result=$db->query($running_KDIDM_query);
        $ended_KDIDM_result=$db->query($ended_KDIDM_query);        
        $submitted_PLWDM_result=$db->query($submitted_PLWDM_query);
        $running_PLWDM_result=$db->query($running_PLWDM_query);
        $ended_PLWDM_result=$db->query($ended_PLWDM_query);        
        $submitted_AMQDM_result=$db->query($submitted_AMQDM_query);
        $running_AMQDM_result=$db->query($running_AMQDM_query);
        $ended_AMQDM_result=$db->query($ended_AMQDM_query);        
        $submitted_LUVDM_result=$db->query($submitted_LUVDM_query);
        $running_LUVDM_result=$db->query($running_LUVDM_query);
        $ended_LUVDM_result=$db->query($ended_LUVDM_query);        
        $submitted_SXKDM_result=$db->query($submitted_SXKDM_query);
        $running_SXKDM_result=$db->query($running_SXKDM_query);
        $ended_SXKDM_result=$db->query($ended_SXKDM_query);
        $submitted_TRKDM_result=$db->query($submitted_TRKDM_query);
        $running_TRKDM_result=$db->query($running_TRKDM_query);
        $ended_TRKDM_result=$db->query($ended_TRKDM_query);
        $submitted_BEJDM_result=$db->query($submitted_BEJDM_query);
        $running_BEJDM_result=$db->query($running_BEJDM_query);
        $ended_BEJDM_result=$db->query($ended_BEJDM_query);
        $submitted_SQGDM_result=$db->query($submitted_SQGDM_query);
        $running_SQGDM_result=$db->query($running_SQGDM_query);
        $ended_SQGDM_result=$db->query($ended_SQGDM_query);
        $submitted_KTGDM_result=$db->query($submitted_KTGDM_query);
        $running_KTGDM_result=$db->query($running_KTGDM_query);
        $ended_KTGDM_result=$db->query($ended_KTGDM_query);
        $submitted_PKNDM_result=$db->query($submitted_PKNDM_query);
        $running_PKNDM_result=$db->query($running_PKNDM_query);
        $ended_PKNDM_result=$db->query($ended_PKNDM_query);
        $submitted_PSUDM_result=$db->query($submitted_PSUDM_query);
        $running_PSUDM_result=$db->query($running_PSUDM_query);
        $ended_PSUDM_result=$db->query($ended_PSUDM_query);        
        $submitted_PKYDM_result=$db->query($submitted_PKYDM_query);
        $running_PKYDM_result=$db->query($running_PKYDM_query);
        $ended_PKYDM_result=$db->query($ended_PKYDM_query);        
        $submitted_GTODM_result=$db->query($submitted_GTODM_query);
        $running_GTODM_result=$db->query($running_GTODM_query);
        $ended_GTODM_result=$db->query($ended_GTODM_query);        
        $submitted_MKWDM_result=$db->query($submitted_MKWDM_query);
        $running_MKWDM_result=$db->query($running_MKWDM_query);
        $ended_MKWDM_result=$db->query($ended_MKWDM_query);        
        $submitted_MKQDM_result=$db->query($submitted_MKQDM_query);
        $running_MKQDM_result=$db->query($running_MKQDM_query);
        $ended_MKQDM_result=$db->query($ended_MKQDM_query);        
        $submitted_BIKDM_result=$db->query($submitted_BIKDM_query);
        $running_BIKDM_result=$db->query($running_BIKDM_query);
        $ended_BIKDM_result=$db->query($ended_BIKDM_query);

        $submitted_UPGDM=mysqli_num_rows($submitted_UPGDM_result);
        $running_UPGDM=mysqli_num_rows($running_UPGDM_result);
        $ended_UPGDM=mysqli_num_rows($ended_UPGDM_result);
        $submitted_BPNDM=mysqli_num_rows($submitted_BPNDM_result);
        $running_BPNDM=mysqli_num_rows($running_BPNDM_result);
        $ended_BPNDM=mysqli_num_rows($ended_BPNDM_result);       
        $submitted_BDJDM=mysqli_num_rows($submitted_BDJDM_result);
        $running_BDJDM=mysqli_num_rows($running_BDJDM_result);
        $ended_BDJDM=mysqli_num_rows($ended_BDJDM_result);
        $submitted_DJJDM=mysqli_num_rows($submitted_DJJDM_result);
        $running_DJJDM=mysqli_num_rows($running_DJJDM_result);
        $ended_DJJDM=mysqli_num_rows($ended_DJJDM_result);
        $submitted_PNKDM=mysqli_num_rows($submitted_PNKDM_result);
        $running_PNKDM=mysqli_num_rows($running_PNKDM_result);
        $ended_PNKDM=mysqli_num_rows($ended_PNKDM_result);        
        $submitted_MDCDM=mysqli_num_rows($submitted_MDCDM_result);
        $running_MDCDM=mysqli_num_rows($running_MDCDM_result);
        $ended_MDCDM=mysqli_num_rows($ended_MDCDM_result);        
        $submitted_TTEDM=mysqli_num_rows($submitted_TTEDM_result);
        $running_TTEDM=mysqli_num_rows($running_TTEDM_result);
        $ended_TTEDM=mysqli_num_rows($ended_TTEDM_result);        
        $submitted_SOQDM=mysqli_num_rows($submitted_SOQDM_result);
        $running_SOQDM=mysqli_num_rows($running_SOQDM_result);
        $ended_SOQDM=mysqli_num_rows($ended_SOQDM_result);        
        $submitted_TIMDM=mysqli_num_rows($submitted_TIMDM_result);
        $running_TIMDM=mysqli_num_rows($running_TIMDM_result);
        $ended_TIMDM=mysqli_num_rows($ended_TIMDM_result);        
        $submitted_MJUDM=mysqli_num_rows($submitted_MJUDM_result);
        $running_MJUDM=mysqli_num_rows($running_MJUDM_result);
        $ended_MJUDM=mysqli_num_rows($ended_MJUDM_result);        
        $submitted_LUWDM=mysqli_num_rows($submitted_LUWDM_result);
        $running_LUWDM=mysqli_num_rows($running_LUWDM_result);
        $ended_LUWDM=mysqli_num_rows($ended_LUWDM_result);        
        $submitted_BUWDM=mysqli_num_rows($submitted_BUWDM_result);
        $running_BUWDM=mysqli_num_rows($running_BUWDM_result);
        $ended_BUWDM=mysqli_num_rows($ended_BUWDM_result);        
        $submitted_KDIDM=mysqli_num_rows($submitted_KDIDM_result);
        $running_KDIDM=mysqli_num_rows($running_KDIDM_result);
        $ended_KDIDM=mysqli_num_rows($ended_KDIDM_result);        
        $submitted_PLWDM=mysqli_num_rows($submitted_PLWDM_result);
        $running_PLWDM=mysqli_num_rows($running_PLWDM_result);
        $ended_PLWDM=mysqli_num_rows($ended_PLWDM_result);        
        $submitted_AMQDM=mysqli_num_rows($submitted_AMQDM_result);
        $running_AMQDM=mysqli_num_rows($running_AMQDM_result);
        $ended_AMQDM=mysqli_num_rows($ended_AMQDM_result);        
        $submitted_LUVDM=mysqli_num_rows($submitted_LUVDM_result);
        $running_LUVDM=mysqli_num_rows($running_LUVDM_result);
        $ended_LUVDM=mysqli_num_rows($ended_LUVDM_result);        
        $submitted_SXKDM=mysqli_num_rows($submitted_SXKDM_result);
        $running_SXKDM=mysqli_num_rows($running_SXKDM_result);
        $ended_SXKDM=mysqli_num_rows($ended_SXKDM_result);        
        $submitted_TRKDM=mysqli_num_rows($submitted_TRKDM_result);
        $running_TRKDM=mysqli_num_rows($running_TRKDM_result);
        $ended_TRKDM=mysqli_num_rows($ended_TRKDM_result);        
        $submitted_BEJDM=mysqli_num_rows($submitted_BEJDM_result);
        $running_BEJDM=mysqli_num_rows($running_BEJDM_result);
        $ended_BEJDM=mysqli_num_rows($ended_BEJDM_result);        
        $submitted_SQGDM=mysqli_num_rows($submitted_SQGDM_result);
        $running_SQGDM=mysqli_num_rows($running_SQGDM_result);
        $ended_SQGDM=mysqli_num_rows($ended_SQGDM_result);        
        $submitted_KTGDM=mysqli_num_rows($submitted_KTGDM_result);
        $running_KTGDM=mysqli_num_rows($running_KTGDM_result);
        $ended_KTGDM=mysqli_num_rows($ended_KTGDM_result);        
        $submitted_PKNDM=mysqli_num_rows($submitted_PKNDM_result);
        $running_PKNDM=mysqli_num_rows($running_PKNDM_result);
        $ended_PKNDM=mysqli_num_rows($ended_PKNDM_result);        
        $submitted_PSUDM=mysqli_num_rows($submitted_PSUDM_result);
        $running_PSUDM=mysqli_num_rows($running_PSUDM_result);
        $ended_PSUDM=mysqli_num_rows($ended_PSUDM_result);        
        $submitted_PKYDM=mysqli_num_rows($submitted_PKYDM_result);
        $running_PKYDM=mysqli_num_rows($running_PKYDM_result);
        $ended_PKYDM=mysqli_num_rows($ended_PKYDM_result);        
        $submitted_GTODM=mysqli_num_rows($submitted_GTODM_result);
        $running_GTODM=mysqli_num_rows($running_GTODM_result);
        $ended_GTODM=mysqli_num_rows($ended_GTODM_result);        
        $submitted_MKWDM=mysqli_num_rows($submitted_MKWDM_result);
        $running_MKWDM=mysqli_num_rows($running_MKWDM_result);
        $ended_MKWDM=mysqli_num_rows($ended_MKWDM_result);        
        $submitted_MKQDM=mysqli_num_rows($submitted_MKQDM_result);
        $running_MKQDM=mysqli_num_rows($running_MKQDM_result);
        $ended_MKQDM=mysqli_num_rows($ended_MKQDM_result);        
        $submitted_BIKDM=mysqli_num_rows($submitted_BIKDM_result);
        $running_BIKDM=mysqli_num_rows($running_BIKDM_result);
        $ended_BIKDM=mysqli_num_rows($ended_BIKDM_result);
      ?>

      var echartBar = echarts.init(document.getElementById('mainb'), theme);

      echartBar.setOption({
        title: {
          text: '',
          subtext: '',
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['Submitted', 'Running', 'Ended']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['UPGDM','BPNDM','BDJDM','DJJDM','PNKDM','MDCDM','TTEDM',]
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_UPGDM.','.$submitted_BPNDM.','.$submitted_BDJDM.','.$submitted_DJJDM.','.$submitted_PNKDM.','.$submitted_MDCDM.','.$submitted_TTEDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Running',
          type: 'bar',
          data: [<?php echo $running_UPGDM.','.$running_BPNDM.','.$running_BDJDM.','.$running_DJJDM.','.$running_PNKDM.','.$running_MDCDM.','.$running_TTEDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Ended',
          type: 'bar',
          data: [<?php echo $ended_UPGDM.','.$ended_BPNDM.','.$ended_BDJDM.','.$ended_DJJDM.','.$ended_PNKDM.','.$ended_MDCDM.','.$ended_TTEDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }]
      });      

      var echartBar = echarts.init(document.getElementById('mainb1'), theme);

      echartBar.setOption({
        title: {
          text: '',
          subtext: '',
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['Submitted', 'Running', 'Ended']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['SOQDM','TIMDM','MJUDM','LUWDM','BUWDM','KDIDM','PLWDM']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_SOQDM.','.$submitted_TIMDM.','.$submitted_MJUDM.','.$submitted_LUWDM.','.$submitted_BUWDM.','.$submitted_KDIDM.','.$submitted_PLWDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Running',
          type: 'bar',
          data: [<?php echo $running_SOQDM.','.$running_TIMDM.','.$running_MJUDM.','.$running_LUWDM.','.$running_BUWDM.','.$running_KDIDM.','.$running_PLWDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Ended',
          type: 'bar',
          data: [<?php echo $ended_SOQDM.','.$ended_TIMDM.','.$ended_MJUDM.','.$ended_LUWDM.','.$ended_BUWDM.','.$ended_KDIDM.','.$ended_PLWDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }]
      });      


      var echartBar = echarts.init(document.getElementById('mainb2'), theme);

      echartBar.setOption({
        title: {
          text: '',
          subtext: '',
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['Submitted', 'Running', 'Ended']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['AMQDM','LUVDM','SXKDM','TRKDM','BEJDM','SQGDM','KTGDM']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_AMQDM.','.$submitted_LUVDM.','.$submitted_SXKDM.','.$submitted_TRKDM.','.$submitted_BEJDM.','.$submitted_SQGDM.','.$submitted_KTGDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Running',
          type: 'bar',
          data: [<?php echo $running_AMQDM.','.$running_LUVDM.','.$running_SXKDM.','.$running_TRKDM.','.$running_BEJDM.','.$running_SQGDM.','.$running_KTGDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Ended',
          type: 'bar',
          data: [<?php echo $ended_AMQDM.','.$ended_LUVDM.','.$ended_SXKDM.','.$ended_TRKDM.','.$ended_BEJDM.','.$ended_SQGDM.','.$ended_KTGDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }]
      });      


      var echartBar = echarts.init(document.getElementById('mainb3'), theme);

      echartBar.setOption({
        title: {
          text: '',
          subtext: '',
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['Submitted', 'Running', 'Ended']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['PKNDM','PSUDM','PKYDM','GTODM','MKWDM','MKQDM','BIKDM']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_PKNDM.','.$submitted_PSUDM.','.$submitted_PKYDM.','.$submitted_GTODM.','.$submitted_MKWDM.','.$submitted_MKQDM.','.$submitted_BIKDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Running',
          type: 'bar',
          data: [<?php echo $running_PKNDM.','.$running_PSUDM.','.$running_PKYDM.','.$running_GTODM.','.$running_MKWDM.','.$running_MKQDM.','.$running_BIKDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Ended',
          type: 'bar',
          data: [<?php echo $ended_PKNDM.','.$ended_PSUDM.','.$ended_PKYDM.','.$ended_GTODM.','.$ended_MKWDM.','.$ended_MKQDM.','.$ended_BIKDM; ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }]
      });

    </script>

  </body>
</html> 
