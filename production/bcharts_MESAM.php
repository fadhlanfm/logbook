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
  $query = "SELECT kode_unit FROM logbook WHERE end >= curdate() AND kode_unit='MESAM'"; //yg udah submit dan belom kelar
  $query1 = "SELECT kode FROM branch WHERE kode_unit='MESAM' GROUP BY kode";
  $query3 = "SELECT id FROM logbook WHERE start <= curdate() and end >= curdate() and kode_unit='MESAM'";

  $query4 = "SELECT id FROM logbook WHERE kode_unit='MESAM' AND end < curdate()";

  $result = $db->query($query);
  $result1 = $db->query($query1);
  $result3 = $db->query($query3);
  $result4 = $db->query($query4);
  


  $tersubmit=mysqli_num_rows($result);
  $totalbranch=mysqli_num_rows($result1);
  $running=mysqli_num_rows($result3);

  $total_MESAM=mysqli_num_rows($result4);


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

  <title>Dashboard Branch Perspective: MESAM</title>

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
                    <h2>Program Terlaksana - MESAM</h2>
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
                      <span class="count_top"><i class="fa fa-check-square-o"></i> MESAM - Sumatera Region</span>
                      <div class="count"><?php echo $total_MESAM; ?></div>
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
                    <h2>Discipline Report (MESAM)</h2>
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
                  <div class="count"><?php echo ''.$tersubmit.'/'.$total.' Unit di MESAM';?></div>
                </div>
                </div>
              </div>
            <!-- CHART unit submit-->

            <!-- CHART unit sedang berjalan -->
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Execution Report (MESAM)</h2>
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
                  <div class="count"><?php echo ''.$running.'/'.$tersubmit.' Unit di MESAM';?></div>
                  
                </div>
                </div>
              </div>
            <!-- CHART unit sedang berjalan-->

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
                        $quero = "SELECT * FROM unit WHERE kode='MESAM'";
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
                        $queri = "SELECT * FROM unit WHERE kode='MESAM'";
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

        $submitted_MESDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MESDM' AND start > curdate()";
        $running_MESDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MESDM' AND start <= curdate() and end >= curdate()";
        $ended_MESDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='MESDM' AND end < curdate()";
        $submitted_PLMDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PLMDM' AND start > curdate()";
        $running_PLMDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PLMDM' AND start <= curdate() and end >= curdate()";
        $ended_PLMDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PLMDM' AND end < curdate()";
        $submitted_BTJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BTJDM' AND start > curdate()";
        $running_BTJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BTJDM' AND start <= curdate() and end >= curdate()";
        $ended_BTJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BTJDM' AND end < curdate()";
        $submitted_BTHDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BTHDM' AND start > curdate()";
        $running_BTHDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BTHDM' AND start <= curdate() and end >= curdate()";
        $ended_BTHDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BTHDM' AND end < curdate()";
        $submitted_DJBDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DJBDM' AND start > curdate()";
        $running_DJBDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DJBDM' AND start <= curdate() and end >= curdate()";
        $ended_DJBDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DJBDM' AND end < curdate()";
        $submitted_PDGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PDGDM' AND start > curdate()";
        $running_PDGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PDGDM' AND start <= curdate() and end >= curdate()";
        $ended_PDGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PDGDM' AND end < curdate()";        
        $submitted_PKUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKUDM' AND start > curdate()";
        $running_PKUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKUDM' AND start <= curdate() and end >= curdate()";
        $ended_PKUDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PKUDM' AND end < curdate()";        
        $submitted_TKGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TKGDM' AND start > curdate()";
        $running_TKGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TKGDM' AND start <= curdate() and end >= curdate()";
        $ended_TKGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TKGDM' AND end < curdate()";        
        $submitted_BKSDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BKSDM' AND start > curdate()";
        $running_BKSDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BKSDM' AND start <= curdate() and end >= curdate()";
        $ended_BKSDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='BKSDM' AND end < curdate()";        
        $submitted_GNSDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='GNSDM' AND start > curdate()";
        $running_GNSDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='GNSDM' AND start <= curdate() and end >= curdate()";
        $ended_GNSDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='GNSDM' AND end < curdate()";
        $submitted_LSWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LSWDM' AND start > curdate()";
        $running_LSWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LSWDM' AND start <= curdate() and end >= curdate()";
        $ended_LSWDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='LSWDM' AND end < curdate()";
        $submitted_PGKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PGKDM' AND start > curdate()";
        $running_PGKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PGKDM' AND start <= curdate() and end >= curdate()";
        $ended_PGKDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='PGKDM' AND end < curdate()";
        $submitted_FLZDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='FLZDM' AND start > curdate()";
        $running_FLZDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='FLZDM' AND start <= curdate() and end >= curdate()";
        $ended_FLZDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='FLZDM' AND end < curdate()";
        $submitted_SBGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SBGDM' AND start > curdate()";
        $running_SBGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SBGDM' AND start <= curdate() and end >= curdate()";
        $ended_SBGDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='SBGDM' AND end < curdate()";
        $submitted_DTBDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DTBDM' AND start > curdate()";
        $running_DTBDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DTBDM' AND start <= curdate() and end >= curdate()";
        $ended_DTBDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='DTBDM' AND end < curdate()";
        $submitted_TJQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TJQDM' AND start > curdate()";
        $running_TJQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TJQDM' AND start <= curdate() and end >= curdate()";
        $ended_TJQDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TJQDM' AND end < curdate()";
        $submitted_TNJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TNJDM' AND start > curdate()";
        $running_TNJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TNJDM' AND start <= curdate() and end >= curdate()";
        $ended_TNJDM_query= "SELECT kode_branch FROM logbook WHERE kode_branch='TNJDM' AND end < curdate()";

        $submitted_MESDM_result=$db->query($submitted_MESDM_query);
        $running_MESDM_result=$db->query($running_MESDM_query);
        $ended_MESDM_result=$db->query($ended_MESDM_query);
        $submitted_PLMDM_result=$db->query($submitted_PLMDM_query);
        $running_PLMDM_result=$db->query($running_PLMDM_query);
        $ended_PLMDM_result=$db->query($ended_PLMDM_query);        
        $submitted_BTJDM_result=$db->query($submitted_BTJDM_query);
        $running_BTJDM_result=$db->query($running_BTJDM_query);
        $ended_BTJDM_result=$db->query($ended_BTJDM_query);
        $submitted_BTHDM_result=$db->query($submitted_BTHDM_query);
        $running_BTHDM_result=$db->query($running_BTHDM_query);
        $ended_BTHDM_result=$db->query($ended_BTHDM_query);
        $submitted_DJBDM_result=$db->query($submitted_DJBDM_query);
        $running_DJBDM_result=$db->query($running_DJBDM_query);
        $ended_DJBDM_result=$db->query($ended_DJBDM_query);        
        $submitted_PDGDM_result=$db->query($submitted_PDGDM_query);
        $running_PDGDM_result=$db->query($running_PDGDM_query);
        $ended_PDGDM_result=$db->query($ended_PDGDM_query);        
        $submitted_PKUDM_result=$db->query($submitted_PKUDM_query);
        $running_PKUDM_result=$db->query($running_PKUDM_query);
        $ended_PKUDM_result=$db->query($ended_PKUDM_query);        
        $submitted_TKGDM_result=$db->query($submitted_TKGDM_query);
        $running_TKGDM_result=$db->query($running_TKGDM_query);
        $ended_TKGDM_result=$db->query($ended_TKGDM_query);        
        $submitted_BKSDM_result=$db->query($submitted_BKSDM_query);
        $running_BKSDM_result=$db->query($running_BKSDM_query);
        $ended_BKSDM_result=$db->query($ended_BKSDM_query);        
        $submitted_GNSDM_result=$db->query($submitted_GNSDM_query);
        $running_GNSDM_result=$db->query($running_GNSDM_query);
        $ended_GNSDM_result=$db->query($ended_GNSDM_query);        
        $submitted_LSWDM_result=$db->query($submitted_LSWDM_query);
        $running_LSWDM_result=$db->query($running_LSWDM_query);
        $ended_LSWDM_result=$db->query($ended_LSWDM_query);        
        $submitted_PGKDM_result=$db->query($submitted_PGKDM_query);
        $running_PGKDM_result=$db->query($running_PGKDM_query);
        $ended_PGKDM_result=$db->query($ended_PGKDM_query);        
        $submitted_FLZDM_result=$db->query($submitted_FLZDM_query);
        $running_FLZDM_result=$db->query($running_FLZDM_query);
        $ended_FLZDM_result=$db->query($ended_FLZDM_query);        
        $submitted_SBGDM_result=$db->query($submitted_SBGDM_query);
        $running_SBGDM_result=$db->query($running_SBGDM_query);
        $ended_SBGDM_result=$db->query($ended_SBGDM_query);        
        $submitted_DTBDM_result=$db->query($submitted_DTBDM_query);
        $running_DTBDM_result=$db->query($running_DTBDM_query);
        $ended_DTBDM_result=$db->query($ended_DTBDM_query);        
        $submitted_TJQDM_result=$db->query($submitted_TJQDM_query);
        $running_TJQDM_result=$db->query($running_TJQDM_query);
        $ended_TJQDM_result=$db->query($ended_TJQDM_query);        
        $submitted_TNJDM_result=$db->query($submitted_TNJDM_query);
        $running_TNJDM_result=$db->query($running_TNJDM_query);
        $ended_TNJDM_result=$db->query($ended_TNJDM_query);

        $submitted_MESDM=mysqli_num_rows($submitted_MESDM_result);
        $running_MESDM=mysqli_num_rows($running_MESDM_result);
        $ended_MESDM=mysqli_num_rows($ended_MESDM_result);
        $submitted_PLMDM=mysqli_num_rows($submitted_PLMDM_result);
        $running_PLMDM=mysqli_num_rows($running_PLMDM_result);
        $ended_PLMDM=mysqli_num_rows($ended_PLMDM_result);       
        $submitted_BTJDM=mysqli_num_rows($submitted_BTJDM_result);
        $running_BTJDM=mysqli_num_rows($running_BTJDM_result);
        $ended_BTJDM=mysqli_num_rows($ended_BTJDM_result);
        $submitted_BTHDM=mysqli_num_rows($submitted_BTHDM_result);
        $running_BTHDM=mysqli_num_rows($running_BTHDM_result);
        $ended_BTHDM=mysqli_num_rows($ended_BTHDM_result);
        $submitted_DJBDM=mysqli_num_rows($submitted_DJBDM_result);
        $running_DJBDM=mysqli_num_rows($running_DJBDM_result);
        $ended_DJBDM=mysqli_num_rows($ended_DJBDM_result);        
        $submitted_PDGDM=mysqli_num_rows($submitted_PDGDM_result);
        $running_PDGDM=mysqli_num_rows($running_PDGDM_result);
        $ended_PDGDM=mysqli_num_rows($ended_PDGDM_result);        
        $submitted_PKUDM=mysqli_num_rows($submitted_PKUDM_result);
        $running_PKUDM=mysqli_num_rows($running_PKUDM_result);
        $ended_PKUDM=mysqli_num_rows($ended_PKUDM_result);        
        $submitted_TKGDM=mysqli_num_rows($submitted_TKGDM_result);
        $running_TKGDM=mysqli_num_rows($running_TKGDM_result);
        $ended_TKGDM=mysqli_num_rows($ended_TKGDM_result);        
        $submitted_BKSDM=mysqli_num_rows($submitted_BKSDM_result);
        $running_BKSDM=mysqli_num_rows($running_BKSDM_result);
        $ended_BKSDM=mysqli_num_rows($ended_BKSDM_result);        
        $submitted_GNSDM=mysqli_num_rows($submitted_GNSDM_result);
        $running_GNSDM=mysqli_num_rows($running_GNSDM_result);
        $ended_GNSDM=mysqli_num_rows($ended_GNSDM_result);        
        $submitted_LSWDM=mysqli_num_rows($submitted_LSWDM_result);
        $running_LSWDM=mysqli_num_rows($running_LSWDM_result);
        $ended_LSWDM=mysqli_num_rows($ended_LSWDM_result);        
        $submitted_PGKDM=mysqli_num_rows($submitted_PGKDM_result);
        $running_PGKDM=mysqli_num_rows($running_PGKDM_result);
        $ended_PGKDM=mysqli_num_rows($ended_PGKDM_result);        
        $submitted_FLZDM=mysqli_num_rows($submitted_FLZDM_result);
        $running_FLZDM=mysqli_num_rows($running_FLZDM_result);
        $ended_FLZDM=mysqli_num_rows($ended_FLZDM_result);        
        $submitted_SBGDM=mysqli_num_rows($submitted_SBGDM_result);
        $running_SBGDM=mysqli_num_rows($running_SBGDM_result);
        $ended_SBGDM=mysqli_num_rows($ended_SBGDM_result);        
        $submitted_DTBDM=mysqli_num_rows($submitted_DTBDM_result);
        $running_DTBDM=mysqli_num_rows($running_DTBDM_result);
        $ended_DTBDM=mysqli_num_rows($ended_DTBDM_result);        
        $submitted_TJQDM=mysqli_num_rows($submitted_TJQDM_result);
        $running_TJQDM=mysqli_num_rows($running_TJQDM_result);
        $ended_TJQDM=mysqli_num_rows($ended_TJQDM_result);        
        $submitted_TNJDM=mysqli_num_rows($submitted_TNJDM_result);
        $running_TNJDM=mysqli_num_rows($running_TNJDM_result);
        $ended_TNJDM=mysqli_num_rows($ended_TNJDM_result);
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
          data: ['MESDM','PLMDM','BTJDM','BTHDM','DJBDM','PDGDM','PKUDM','TKGDM','BKSDM']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_MESDM.','.$submitted_PLMDM.','.$submitted_BTJDM.','.$submitted_BTHDM.','.$submitted_DJBDM.','.$submitted_PDGDM.','.$submitted_PKUDM.','.$submitted_TKGDM.','.$submitted_BKSDM; ?>],
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
          data: [<?php echo $running_MESDM.','.$running_PLMDM.','.$running_BTJDM.','.$running_BTHDM.','.$running_DJBDM.','.$running_PDGDM.','.$running_PKUDM.','.$running_TKGDM.','.$running_BKSDM; ?>],
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
          data: [<?php echo $ended_MESDM.','.$ended_PLMDM.','.$ended_BTJDM.','.$ended_BTHDM.','.$ended_DJBDM.','.$ended_PDGDM.','.$ended_PKUDM.','.$ended_TKGDM.','.$ended_BKSDM; ?>],
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
          data: ['GNSDM','LSWDM','PGKDM','FLZDM','SBGDM','DTBDM','TJQDM','TNJDM']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_GNSDM.','.$submitted_LSWDM.','.$submitted_PGKDM.','.$submitted_FLZDM.','.$submitted_SBGDM.','.$submitted_DTBDM.','.$submitted_TJQDM.','.$submitted_TNJDM; ?>],
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
          data: [<?php echo $running_GNSDM.','.$running_LSWDM.','.$running_PGKDM.','.$running_FLZDM.','.$running_SBGDM.','.$running_DTBDM.','.$running_TJQDM.','.$running_TNJDM; ?>],
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
          data: [<?php echo $ended_GNSDM.','.$ended_LSWDM.','.$ended_PGKDM.','.$ended_FLZDM.','.$ended_SBGDM.','.$ended_DTBDM.','.$ended_TJQDM.','.$ended_TNJDM; ?>],
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
