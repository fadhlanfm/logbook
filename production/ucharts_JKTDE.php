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
  $query = "SELECT kode_unit FROM logbook WHERE end >= curdate() AND kode_dir='JKTDE' GROUP BY kode_unit"; //yg udah submit dan belom kelar
  $query1 = "SELECT kode FROM unit WHERE kode_dir='JKTDE' GROUP BY kode";
  $query3 = "SELECT id FROM logbook WHERE start <= curdate() and end >= curdate() and kode_dir='JKTDE'";

  $query4 = "SELECT id FROM logbook WHERE kode_dir='JKTDE' AND end < curdate()";

  $result = $db->query($query);
  $result1 = $db->query($query1);
  $result3 = $db->query($query3);
  $result4 = $db->query($query4);
  


  $tersubmit=mysqli_num_rows($result);
  $totalunit=mysqli_num_rows($result1);
  $running=mysqli_num_rows($result3);

  $total_JKTDE=mysqli_num_rows($result4);


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

  <title>Dashboard JKTDE</title>

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
                    <h2>Program Terlaksana - JKTDE</h2>
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
                      <span class="count_top"><i class="fa fa-check-square-o"></i> JKTDE - Maintenance & Information Technology</span>
                      <div class="count"><?php echo $total_JKTDE; ?></div>
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
                    <h2>Discipline Report (JKTDE)</h2>
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
                  <div class="count"><?php echo ''.$tersubmit.'/'.$total.' Unit di JKTDE';?></div>
                </div>
                </div>
              </div>
            <!-- CHART unit submit-->

            <!-- CHART unit sedang berjalan -->
              <div class="col-md-6 col-sm-6 col-xs-14">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Execution Report (JKTDE)</h2>
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
                  <div class="count"><?php echo ''.$running.'/'.$tersubmit.' Unit di JKTDE';?></div>
                  
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
                        $quero = "SELECT * FROM direktorat WHERE kode='JKTDE'";
                        $resulto = $db->query( $quero );
                        while ($rowo = $resulto->fetch_object()) {
                          echo '<tr>';
                          echo '<th scope="row" colspan="3" bgcolor="black">'.$rowo->kode.' - '.$rowo->nama.'</th>';
                          $cek_kodedir=$rowo->kode;
                          $quero1 = "SELECT * FROM unit WHERE kode_dir='$cek_kodedir'";
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
                        $queri = "SELECT * FROM direktorat WHERE kode='JKTDE'";
                        $resulti = $db->query( $queri );
                        while ($rowi = $resulti->fetch_object()) {  
                          echo '<tr>';
                          echo '<th scope="row" colspan="4" bgcolor="black">'.$rowi->kode.' - '.$rowi->nama.'</th>';
                          echo '</tr>';
                          $cek1_kodedir=$rowi->kode;
                          $queri1 = "SELECT * FROM logbook WHERE kode_dir='$cek1_kodedir' GROUP BY kode_unit";
                          $resulti1 = $db->query( $queri1 );
                          $rowcount = mysqli_num_rows($resulti1);
                          if ($rowcount>0) {
                            while ($rowi1 = $resulti1->fetch_object()) {
                              $queri2 = "SELECT nama FROM unit WHERE kode='$rowi1->kode_unit'";
                              $resulti2 = $db->query( $queri2 );
                              $rowi2 = $resulti2->fetch_object();
                              echo '<tr>';
                              echo '<td>'.$rowi1->kode_unit.' - '.$rowi2->nama.'</td>';
                              $queri3 = "SELECT start, end FROM logbook WHERE kode_unit='$rowi1->kode_unit'";
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

        $submitted_JKTMQ_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTMQ' AND start > curdate()";
        $running_JKTMQ_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTMQ' AND start <= curdate() and end >= curdate()";
        $ended_JKTMQ_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTMQ' AND end < curdate()";
        $submitted_JKTMX_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTMX' AND start > curdate()";
        $running_JKTMX_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTMX' AND start <= curdate() and end >= curdate()";
        $ended_JKTMX_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTMX' AND end < curdate()";
        $submitted_JKTML_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTML' AND start > curdate()";
        $running_JKTML_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTML' AND start <= curdate() and end >= curdate()";
        $ended_JKTML_query= "SELECT kode_unit FROM logbook WHERE kode_unit='JKTML' AND end < curdate()";

        $submitted_JKTMQ_result=$db->query($submitted_JKTMQ_query);
        $running_JKTMQ_result=$db->query($running_JKTMQ_query);
        $ended_JKTMQ_result=$db->query($ended_JKTMQ_query);
        $submitted_JKTMX_result=$db->query($submitted_JKTMX_query);
        $running_JKTMX_result=$db->query($running_JKTMX_query);
        $ended_JKTMX_result=$db->query($ended_JKTMX_query);        
        $submitted_JKTML_result=$db->query($submitted_JKTML_query);
        $running_JKTML_result=$db->query($running_JKTML_query);
        $ended_JKTML_result=$db->query($ended_JKTML_query);

        $submitted_JKTMQ=mysqli_num_rows($submitted_JKTMQ_result);
        $running_JKTMQ=mysqli_num_rows($running_JKTMQ_result);
        $ended_JKTMQ=mysqli_num_rows($ended_JKTMQ_result);
        $submitted_JKTMX=mysqli_num_rows($submitted_JKTMX_result);
        $running_JKTMX=mysqli_num_rows($running_JKTMX_result);
        $ended_JKTMX=mysqli_num_rows($ended_JKTMX_result);       
        $submitted_JKTML=mysqli_num_rows($submitted_JKTML_result);
        $running_JKTML=mysqli_num_rows($running_JKTML_result);
        $ended_JKTML=mysqli_num_rows($ended_JKTML_result);
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
          data: ['JKTMQ','JKTMX','JKTML']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Submitted',
          type: 'bar',
          data: [<?php echo $submitted_JKTMQ.','.$submitted_JKTMX.','.$submitted_JKTML; ?>],
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
          data: [<?php echo $running_JKTMQ.','.$running_JKTMX.','.$running_JKTML; ?>],
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
          data: [<?php echo $ended_JKTMQ.','.$ended_JKTMX.','.$ended_JKTML; ?>],
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
