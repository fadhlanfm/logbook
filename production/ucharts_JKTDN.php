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
  $query = "SELECT kode_unit FROM logbook WHERE end >= curdate() AND kode_dir='JKTDN' GROUP BY kode_unit"; //yg udah submit dan belom kelar
  $query1 = "SELECT kode FROM unit WHERE kode_dir='JKTDN' GROUP BY kode";
  $query3 = "SELECT id FROM logbook WHERE start <= curdate() and end >= curdate() and kode_dir='JKTDN'";

  $query4 = "SELECT id FROM logbook WHERE kode_dir='JKTDN' AND end < curdate()";

  
  $query5 = "SELECT id FROM logbook WHERE kode_branch='JKTAM' AND end < curdate()";
  $query6 = "SELECT id FROM logbook WHERE kode_branch='SUBAM' AND end < curdate()";
  $query7 = "SELECT id FROM logbook WHERE kode_branch='UPGAM' AND end < curdate()";
  $query8 = "SELECT id FROM logbook WHERE kode_branch='SINAM' AND end < curdate()";
  $query9 = "SELECT id FROM logbook WHERE kode_branch='TYOAM' AND end < curdate()";
  $query10 = "SELECT id FROM logbook WHERE kode_branch='SHAAM' AND end < curdate()";
  $query11 = "SELECT id FROM logbook WHERE kode_branch='SYDAM' AND end < curdate()";
  $query12 = "SELECT id FROM logbook WHERE kode_branch='MESAM' AND end < curdate()";

  $result = $db->query($query);
  $result1 = $db->query($query1);
  $result3 = $db->query($query3);
  $result4 = $db->query($query4);
  
  
  $result5 = $db->query($query5);
  $result6 = $db->query($query6);
  $result7 = $db->query($query7);
  $result8 = $db->query($query8);
  $result9 = $db->query($query9);
  $result10 = $db->query($query10);
  $result11 = $db->query($query11);
  $result12 = $db->query($query12);

  $tersubmit=mysqli_num_rows($result);
  $totalunit=mysqli_num_rows($result1);
  $running=mysqli_num_rows($result3);

  $total_JKTDN=mysqli_num_rows($result4);

  
  $total_JKTAM=mysqli_num_rows($result5);
  $total_SUBAM=mysqli_num_rows($result6);
  $total_UPGAM=mysqli_num_rows($result7);
  $total_SINAM=mysqli_num_rows($result8);
  $total_TYOAM=mysqli_num_rows($result9);
  $total_SHAAM=mysqli_num_rows($result10);
  $total_SYDAM=mysqli_num_rows($result11);
  $total_MESAM=mysqli_num_rows($result12);


  $total=$totalunit;
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

  <title>Dashboard JKTDN</title>

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
                    <h2>Program Terlaksana - JKTDN</h2>
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
                      <span class="count_top"><i class="fa fa-check-square-o"></i> JKTDN - Commercial</span>
                      <div class="count"><?php echo $total_JKTDN; ?></div>
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
                    <h2>Discipline Report (JKTDN)</h2>
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
                  <div class="count"><?php echo ''.$tersubmit.'/'.$total.' Unit di JKTDN';?></div>
                </div>
                </div>
              </div>
            <!-- CHART unit submit-->

            <!-- CHART unit sedang berjalan -->
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Execution Report (JKTDN)</h2>
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
                  <div class="count"><?php echo ''.$running.'/'.$tersubmit.' Unit di JKTDN';?></div>
                  
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
          <div class="col-md-12 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Program Terlaksana (Branch Perspective)</h2>
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
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_MESAM.php"> MESAM - Sumatera Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_MESAM.php">'.$total_MESAM.'</a>'; ?></div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_JKTAM.php"> JKTAM - Jakarta Raya Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_JKTAM.php">'.$total_JKTAM.'</a>'; ?></div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_SUBAM.php"> SUBAM - Jawa, Bali, Nusa Tenggara Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_SUBAM.php">'.$total_SUBAM.'</a>'; ?></div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_UPGAM.php"> UPGAM - Kalimanta, Sulawesi, & Papua Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_UPGAM.php">'.$total_UPGAM.'</a>'; ?></div>
                    </div>
                    </div>
                    <div class="row tile_count">
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_SINAM.php"> SINAM - Asia Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_SINAM.php">'.$total_SINAM.'</a>'; ?></div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_TYOAM.php"> TYOAM - Japan & Korea Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_TYOAM.php">'.$total_TYOAM.'</a>'; ?></div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_SHAAM.php"> SHAAM - China Region</a></span>
                      <div class="count"><?php echo '<a href="bcharts_SHAAM.php">'.$total_SHAAM.'</a>'; ?></div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top"><i class="fa fa-check-square-o"></i><a href="bcharts_SYDAM.php"> SYDAM - South West Pacific Region</span>
                      <div class="count"><?php echo '<a href="bcharts_SYDAM.php">'.$total_SYDAM.'</a>'; ?></div>
                    </div>
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

        $submitted_JKTCM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCM' AND start > curdate()";
        $running_JKTCM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCM' AND start <= curdate() and end >= curdate()";
        $ended_JKTCM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCM' AND end < curdate()";
        $submitted_JKTRZ_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTRZ' AND start > curdate()";
        $running_JKTRZ_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTRZ' AND start <= curdate() and end >= curdate()";
        $ended_JKTRZ_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTRZ' AND end < curdate()";
        $submitted_JKTCR_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCR' AND start > curdate()";
        $running_JKTCR_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCR' AND start <= curdate() and end >= curdate()";
        $ended_JKTCR_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCR' AND end < curdate()";
        $submitted_JKTCP_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCP' AND start > curdate()";
        $running_JKTCP_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCP' AND start <= curdate() and end >= curdate()";
        $ended_JKTCP_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCP' AND end < curdate()";        
        $submitted_JKTCD_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCD' AND start > curdate()";
        $running_JKTCD_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCD' AND start <= curdate() and end >= curdate()";
        $ended_JKTCD_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTCD' AND end < curdate()";        
        $submitted_JKTEC_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTEC' AND start > curdate()";
        $running_JKTEC_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTEC' AND start <= curdate() and end >= curdate()";
        $ended_JKTEC_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTEC' AND end < curdate()";
        $submitted_MESAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='MESAM' AND start > curdate()";
        $running_MESAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='MESAM' AND start <= curdate() and end >= curdate()";
        $ended_MESAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='MESAM' AND end < curdate()";
        $submitted_SUBAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SUBAM' AND start > curdate()";
        $running_SUBAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SUBAM' AND start <= curdate() and end >= curdate()";
        $ended_SUBAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SUBAM' AND end < curdate()";
        $submitted_UPGAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='UPGAM' AND start > curdate()";
        $running_UPGAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='UPGAM' AND start <= curdate() and end >= curdate()";
        $ended_UPGAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='UPGAM' AND end < curdate()";
        $submitted_JKTAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTAM' AND start > curdate()";
        $running_JKTAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTAM' AND start <= curdate() and end >= curdate()";
        $ended_JKTAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTAM' AND end < curdate()";
        $submitted_SINAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SINAM' AND start > curdate()";
        $running_SINAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SINAM' AND start <= curdate() and end >= curdate()";
        $ended_SINAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SINAM' AND end < curdate()";
        $submitted_TYOAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='TYOAM' AND start > curdate()";
        $running_TYOAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='TYOAM' AND start <= curdate() and end >= curdate()";
        $ended_TYOAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='TYOAM' AND end < curdate()";
        $submitted_SHAAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SHAAM' AND start > curdate()";
        $running_SHAAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SHAAM' AND start <= curdate() and end >= curdate()";
        $ended_SHAAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SHAAM' AND end < curdate()";
        $submitted_SYDAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SYDAM' AND start > curdate()";
        $running_SYDAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SYDAM' AND start <= curdate() and end >= curdate()";
        $ended_SYDAM_query= "SELECT kode_unit FROM logbook WHERE kode_unit='SYDAM' AND end < curdate()";

        $submitted_JKTCM_result=$db->query($submitted_JKTCM_query);
        $running_JKTCM_result=$db->query($running_JKTCM_query);
        $ended_JKTCM_result=$db->query($ended_JKTCM_query);
        $submitted_JKTRZ_result=$db->query($submitted_JKTRZ_query);
        $running_JKTRZ_result=$db->query($running_JKTRZ_query);
        $ended_JKTRZ_result=$db->query($ended_JKTRZ_query);        
        $submitted_JKTCR_result=$db->query($submitted_JKTCR_query);
        $running_JKTCR_result=$db->query($running_JKTCR_query);
        $ended_JKTCR_result=$db->query($ended_JKTCR_query);
        $submitted_JKTCP_result=$db->query($submitted_JKTCP_query);
        $running_JKTCP_result=$db->query($running_JKTCP_query);
        $ended_JKTCP_result=$db->query($ended_JKTCP_query);        
        $submitted_JKTCD_result=$db->query($submitted_JKTCD_query);
        $running_JKTCD_result=$db->query($running_JKTCD_query);
        $ended_JKTCD_result=$db->query($ended_JKTCD_query);        
        $submitted_JKTEC_result=$db->query($submitted_JKTEC_query);
        $running_JKTEC_result=$db->query($running_JKTEC_query);
        $ended_JKTEC_result=$db->query($ended_JKTEC_query);
        $submitted_MESAM_result=$db->query($submitted_MESAM_query);
        $running_MESAM_result=$db->query($running_MESAM_query);
        $ended_MESAM_result=$db->query($ended_MESAM_query);
        $submitted_SUBAM_result=$db->query($submitted_SUBAM_query);
        $running_SUBAM_result=$db->query($running_SUBAM_query);
        $ended_SUBAM_result=$db->query($ended_SUBAM_query);
        $submitted_UPGAM_result=$db->query($submitted_UPGAM_query);
        $running_UPGAM_result=$db->query($running_UPGAM_query);
        $ended_UPGAM_result=$db->query($ended_UPGAM_query);
        $submitted_JKTAM_result=$db->query($submitted_JKTAM_query);
        $running_JKTAM_result=$db->query($running_JKTAM_query);
        $ended_JKTAM_result=$db->query($ended_JKTAM_query);
        $submitted_SINAM_result=$db->query($submitted_SINAM_query);
        $running_SINAM_result=$db->query($running_SINAM_query);
        $ended_SINAM_result=$db->query($ended_SINAM_query);
        $submitted_TYOAM_result=$db->query($submitted_TYOAM_query);
        $running_TYOAM_result=$db->query($running_TYOAM_query);
        $ended_TYOAM_result=$db->query($ended_TYOAM_query);
        $submitted_SHAAM_result=$db->query($submitted_SHAAM_query);
        $running_SHAAM_result=$db->query($running_SHAAM_query);
        $ended_SHAAM_result=$db->query($ended_SHAAM_query);
        $submitted_SYDAM_result=$db->query($submitted_SYDAM_query);
        $running_SYDAM_result=$db->query($running_SYDAM_query);
        $ended_SYDAM_result=$db->query($ended_SYDAM_query);

        $submitted_JKTCM=mysqli_num_rows($submitted_JKTCM_result);
        $running_JKTCM=mysqli_num_rows($running_JKTCM_result);
        $ended_JKTCM=mysqli_num_rows($ended_JKTCM_result);
        $submitted_JKTRZ=mysqli_num_rows($submitted_JKTRZ_result);
        $running_JKTRZ=mysqli_num_rows($running_JKTRZ_result);
        $ended_JKTRZ=mysqli_num_rows($ended_JKTRZ_result);       
        $submitted_JKTCR=mysqli_num_rows($submitted_JKTCR_result);
        $running_JKTCR=mysqli_num_rows($running_JKTCR_result);
        $ended_JKTCR=mysqli_num_rows($ended_JKTCR_result);
        $submitted_JKTCP=mysqli_num_rows($submitted_JKTCP_result);
        $running_JKTCP=mysqli_num_rows($running_JKTCP_result);
        $ended_JKTCP=mysqli_num_rows($ended_JKTCP_result);
        $submitted_JKTCD=mysqli_num_rows($submitted_JKTCD_result);
        $running_JKTCD=mysqli_num_rows($running_JKTCD_result);
        $ended_JKTCD=mysqli_num_rows($ended_JKTCD_result);        
        $submitted_JKTEC=mysqli_num_rows($submitted_JKTEC_result);
        $running_JKTEC=mysqli_num_rows($running_JKTEC_result);
        $ended_JKTEC=mysqli_num_rows($ended_JKTEC_result);
        $submitted_MESAM=mysqli_num_rows($submitted_MESAM_result);
        $running_MESAM=mysqli_num_rows($running_MESAM_result);
        $ended_MESAM=mysqli_num_rows($ended_MESAM_result);
        $submitted_SUBAM=mysqli_num_rows($submitted_SUBAM_result);
        $running_SUBAM=mysqli_num_rows($running_SUBAM_result);
        $ended_SUBAM=mysqli_num_rows($ended_SUBAM_result);
        $submitted_UPGAM=mysqli_num_rows($submitted_UPGAM_result);
        $running_UPGAM=mysqli_num_rows($running_UPGAM_result);
        $ended_UPGAM=mysqli_num_rows($ended_UPGAM_result);
        $submitted_JKTAM=mysqli_num_rows($submitted_JKTAM_result);
        $running_JKTAM=mysqli_num_rows($running_JKTAM_result);
        $ended_JKTAM=mysqli_num_rows($ended_JKTAM_result);
        $submitted_SINAM=mysqli_num_rows($submitted_SINAM_result);
        $running_SINAM=mysqli_num_rows($running_SINAM_result);
        $ended_SINAM=mysqli_num_rows($ended_SINAM_result);
        $submitted_TYOAM=mysqli_num_rows($submitted_TYOAM_result);
        $running_TYOAM=mysqli_num_rows($running_TYOAM_result);
        $ended_TYOAM=mysqli_num_rows($ended_TYOAM_result);
        $submitted_SHAAM=mysqli_num_rows($submitted_SHAAM_result);
        $running_SHAAM=mysqli_num_rows($running_SHAAM_result);
        $ended_SHAAM=mysqli_num_rows($ended_SHAAM_result);
        $submitted_SYDAM=mysqli_num_rows($submitted_SYDAM_result);
        $running_SYDAM=mysqli_num_rows($running_SYDAM_result);
        $ended_SYDAM=mysqli_num_rows($ended_SYDAM_result);
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
          data: ['JKTCM','JKTRZ','JKTCR','JKTCP','JKTCD','JKTEC','MESAM','SUBAM','UPGAM','JKTAM','SINAM','TYOAM','SHAAM','SYDAM']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_JKTCM.','.$submitted_JKTRZ.','.$submitted_JKTCR.','.$submitted_JKTCP.','.$submitted_JKTCD.','.$submitted_JKTEC.','.$submitted_MESAM.','.$submitted_SUBAM.','.$submitted_UPGAM.','.$submitted_JKTAM.','.$submitted_SINAM.','.$submitted_TYOAM.','.$submitted_SHAAM.','.$submitted_SYDAM; ?>],
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
          data: [<?php echo $running_JKTCM.','.$running_JKTRZ.','.$running_JKTCR.','.$running_JKTCP.','.$running_JKTCD.','.$running_JKTEC.','.$running_MESAM.','.$running_SUBAM.','.$running_UPGAM.','.$running_JKTAM.','.$running_SINAM.','.$running_TYOAM.','.$running_SHAAM.','.$running_SYDAM; ?>],
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
          data: [<?php echo $ended_JKTCM.','.$ended_JKTRZ.','.$ended_JKTCR.','.$ended_JKTCP.','.$ended_JKTCD.','.$ended_JKTEC.','.$ended_MESAM.','.$ended_SUBAM.','.$ended_UPGAM.','.$ended_JKTAM.','.$ended_SINAM.','.$ended_TYOAM.','.$ended_SHAAM.','.$ended_SYDAM; ?>],
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
