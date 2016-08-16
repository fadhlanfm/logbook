<?php
session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == 0)
{ 

} else if (isset($_SESSION['role']) && $_SESSION['role'] == -1) {
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
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="../../assets/gi.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Beranda</title>

  <!-- Bootstrap -->
  <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

  <!-- Custom Theme Style -->
  <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" onload="setInterval('displayServerTime()', 1000);">

  <!-- QUERIES -->
  <?php
  include('../Connection/dbconn.php');

  $coba = $_SESSION['id'];
  $query2 = "SELECT * FROM user WHERE username = '$coba'";
        //execute the query
  $result2 = $db->query( $query2 );
  if (!$result2)
  {
    die("could not query the database: <br />".$db->error);
  }
  $row2 = $result2->fetch_object();
  $unit2 = $row2->unit;
  $idid = $row2->iduser;

  $query = "SELECT * FROM employee JOIN user WHERE employee.iduser=user.iduser and employee.iduser='$idid'";
        //execute the query
  $result = $db->query( $query );
  $row = $result->fetch_object();
  // echo $row->username;
  if (!$result)
  {
    die("could not query the database: <br />".$db->error);
  }

  $q1 = "SELECT * FROM view_rank";
        //execute the query
  $rss = $db->query( $q1 );
  // echo $row->username;
  if (!$rss)
  {
    die("could not query the database: <br />".$db->error);
  }
  $rank = 0;
  while ($rrw = $rss->fetch_object()) {
    $rank = $rank + 1;
    if ($rrw->id_user == $idid) {
      $rankstr = strval($rank);
      break;
    }
  }

  $query3 = "SELECT * FROM aktivitas_employee a JOIN subaktivitas b WHERE a.id_subaktivitas=b.id_subaktivitas and a.id_user='$idid' and b.default2=1";
        //execute the query
  $result3 = $db->query( $query3 );
  
  // echo $row->username;
  if (!$result3)
  {
    die("could not query the database: <br />".$db->error);
  }

  // mencari total poin user
  $totalpoin = 0;
  $freq;
  $poin;
  while ( $row3 = $result3->fetch_object()) {
    $freq = $row3->freq;
    $poin = $row3->poin;
    $poinakt = $freq * $poin;
    $totalpoin = $totalpoin + $poinakt;
  }

  $q = "SELECT * FROM subaktivitas WHERE default2=1";
  $rsc = $db->query($q);
  if (!$rsc)
  {
    die("could not query the database: <br />".$db->error);
  }
  $poinmax = 0;
  while ($r = $rsc->fetch_object()) {
    $poinmax = $poinmax + $r->poin * $r->max_freq;
  }
  ?>

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"> <span>Garuda Indonesia</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li><a href="rank.php">Ranking Pegawai</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Poin <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="aktivitas.php">Isi Aktivitas</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Change Agent <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ca_performance.php">CA Performance</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-cog"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="edit_username2.php">Ubah Username</a></li>
                    <li><a href="edit_password2.php">Ubah Password</a></li>
                    <li><a href="edit_foto.php">Ubah Foto</a></li>
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
                  <img src="../images/img.jpg" alt=""><?php

                  echo''.$row2->username.'';
                  ?>
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

            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- bookmark -->
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_panel tile" style="height: 260px;">
              <div class="x_title">
                <h2><b>Profil</b></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img class="img-responsive avatar-view" src="profile_pictures/<?php 
                      if ($row->size == 0) {
                        echo 'default.jpg';
                      } else {
                        echo $row->foto;
                      }
                      ?>" alt="profile_pictures/default.jpg" title="Change the avatar">
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <h3 style="font-size:150%;"><?php echo $row->nama; ?> </h3>
                  <p style="font-size:130%;"><?php echo $row->NIP ?> </p>
                  <p><?php echo $row->unit ?> </p>
                  <p style="font-size:150%;"><span class="label label-primary" style="width:100%; display: inline-block;""><?php echo $totalpoin; ?> pts</span></p>
                  <p style="font-size:150%;"><span class="label label-success" style="width:100%; display: inline-block;"><?php echo $rank; ?>
                    <?php
                    if (substr($rankstr, -1) == 1) {
                      if (substr($rankstr, -2) == 11) {
                        echo "th";
                      } else {
                        echo "st"; 
                      }
                    } else if (substr($rankstr, -1) == 2) {
                      if (substr($rankstr, -2) == 12) {
                        echo "th";
                      } else {
                        echo "nd"; 
                      }
                    } else if (substr($rankstr, -1) == 3) {
                      if (substr($rankstr, -2) == 13) {
                        echo "th";
                      } else {
                        echo "rd"; 
                      }
                    } else {
                      echo "th";
                    }
                    ?>
                  </span></p>
                  
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <?php
                  $per = $totalpoin/$poinmax *100;
                  if ($per < 51) {
                    ?>
                    <img src="../images/bronze.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                    <?php
                  } else if ($per > 50 && $per < 75) {
                    ?>
                    <img src="../images/silver.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                    <?php
                  } else {
                    ?>
                    <img src="../images/gold.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                    <?php
                  }
                  ?>
                  <center><b style="font-size:120%;"> BADGE</b> </center>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <?php
                  $qqq = "SELECT count(*) a FROM rank_history where id_user=$idid group by id_user";
                  $resq = $db->query($qqq);
                  if (!$resq)
                  {
                    die("could not query the database: <br />".$db->error);
                  }
                  $rww = $resq->fetch_object();
                  if (isset($rww->a)) {
                    if ($rww->a >= 0 && $rww->a <= 2) {
                      ?>
                      <img src="../images/low.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                      <?php
                    } else if ($rww->a >= 3 && $rww->a <= 5) {
                      ?>
                      <img src="../images/mid.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                      <?php
                    } else {
                      ?>
                      <img src="../images/high.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                      <?php
                    }
                  } else {
                   ?>
                   <img src="../images/low.png" style="width: 60%; height: auto; margin-left: auto; margin-right: auto; display: block;">
                   <?php
                 }

                 ?>
                 <center><b style="font-size:120%;"> LEVEL</b> </center>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="x_panel tile" style="height: 260px;">
            <div class="x_title">
              <h2><b>Akumulasi Poin</b></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <center>
                  <span class="chart" data-percent="<?php echo $totalpoin/$poinmax*100; ?>">
                    <span class="percent"><?php echo $totalpoin/$poinmax; ?></span>
                    <canvas height="110" width="110"></canvas>
                  </span>
                  <p><b><span class="badge bg-blue"><?php echo $totalpoin ?> </span> / <?php echo $poinmax ?></b></p>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel tile">
            <div class="x_title">
              <h2><b>Perolehan Poin</b></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-1 col-sm-1 col-xs-12">

              </div>
              <!-- easy -->
              <?php
              $query7 = "SELECT *, sum(b.max_freq*b.poin) sumtot FROM aktivitas a join subaktivitas b WHERE a.id_aktivitas = b.id_aktivitas and b.default2 = 1 group by a.id_aktivitas";
              //execute the query
              $result7 = $db->query( $query7 );

              // echo $row->username;
              if (!$result7)
              {
                die("could not query the database: <br />".$db->error);
              }
              $id_akt=0;
              $max_poin;
              $nama;
              $max_poin_kum = 0;
              while ($row7 = $result7->fetch_object()) {
                $id_akt = $row7->id_aktivitas;
                $max_poin[$id_akt] = $row7->sumtot;
                $nama[$id_akt] = $row7->nama_aktivitas;
                $max_poin_kum = $max_poin_kum + $max_poin[$id_akt];
              }

              $query6 = "SELECT *, sum(a.freq*b.poin) sumtot FROM subaktivitas b LEFT join (SELECT * FROM aktivitas_employee c where c.id_user='$idid') a ON a.id_subaktivitas = b.id_subaktivitas and b.default2 = 1 group by id_aktivitas";
              //execute the query
              $result6 = $db->query( $query6 );

              // echo $row->username;
              if (!$result6)
              {
                die("could not query the database: <br />".$db->error);
              }
              $id_tak=0;
              $poinkat;
              $poinkum = 0;
              while ($row6 = $result6->fetch_object()) {
                $id_akt = $row6->id_aktivitas;
                $poinkat[$id_akt] = 0;
                if ($row6->sumtot == null) {
                  $poinkat[$id_akt] = 0;
                } else {
                  $poinkat[$id_akt] = $row6->sumtot;
                }
                $poinkum= $poinkum + $poinkat[$id_akt];
                ?>
                <div class="col-sm-2 col-md-2 col-xs-12">
                  <center><span class="chart" data-percent="<?php echo $poinkat[$id_akt]/$max_poin[$id_akt]*100; ?>">
                    <span class="percent"><?php echo $poinkat[$id_akt]/$max_poin[$id_akt]*100; ?></span>
                    <canvas height="110" width="110"></canvas>
                  </span></center>
                  <p><center><h3 style="font-size:150%;"><?php echo $nama[$id_akt] ?></h3></center></p>
                  <p><center><b><span class="badge bg-blue"><?php echo $poinkat[$id_akt] ?></span> / <?php echo $max_poin[$id_akt] ?></b></center></p>
                </div>
                <?php
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
<footer class="hidden-print">
  <div class="pull-right">
    Corporate Culture Information Systems - GA
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
<!-- Chart.js -->
<script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../../vendors/Flot/jquery.flot.js"></script>
<script src="../../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../../vendors/Flot/jquery.flot.time.js"></script>
<script src="../../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../js/moment/moment.min.js"></script>
<script src="../js/datepicker/daterangepicker.js"></script>
<!-- echart -->
<script src="../../vendors/echarts/dist/echarts.min.js"></script>
<script src="../../vendors/echarts/map/js/world.js"></script>
<!-- easypiechart -->
<script src="../../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

<!-- easy pie chart -->

<script>
  $(document).ready(function() {
    $('.chart').easyPieChart({
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: '#5CCE8F',
      trackColor: '#DFDFDF',
      scaleColor: false,
      lineWidth: 30,
      trackWidth: 30,
      lineCap: 'butt',
      onStep: function(from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
      }
    });
    var chart = window.chart = $('.chart').data('easyPieChart');
    $('.js_update').on('click', function() {
      chart.update(Math.random() * 200 - 100);
    });

        //hover and retain popover when on popover content
        var originalLeave = $.fn.popover.Constructor.prototype.leave;
        $.fn.popover.Constructor.prototype.leave = function(obj) {
          var self = obj instanceof this.constructor ?
          obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);
          var container, timeout;

          originalLeave.call(this, obj);

          if (obj.currentTarget) {
            container = $(obj.currentTarget).siblings('.popover');
            timeout = self.timeout;
            container.one('mouseenter', function() {
              //We entered the actual popover – call off the dogs
              clearTimeout(timeout);
              //Let's monitor popover content instead
              container.one('mouseleave', function() {
                $.fn.popover.Constructor.prototype.leave.call(self, self);
              });
            });
          }
        };

        $('body').popover({
          selector: '[data-popover]',
          trigger: 'click hover',
          delay: {
            show: 50,
            hide: 400
          }
        });
      });
    </script>

    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
        [gd(2012, 1, 1), <?php echo $cek1;?>],
        [gd(2012, 2, 2), <?php echo $cek2;?>],
        [gd(2012, 3, 3), <?php echo $cek3;?>],
        [gd(2012, 4, 4), 65530],
        [gd(2012, 5, 5), 43356],
        [gd(2012, 6, 6), 54689]
        ];

        var data2 = [
        [gd(2012, 1, 1), 10000],
        [gd(2012, 2, 2), 30000],
        [gd(2012, 3, 3), 50000],
        [gd(2012, 4, 4), 35000],
        [gd(2012, 5, 5), 20000],
        [gd(2012, 6, 6), 60000]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
          ], {
            series: {
              lines: {
                show: false,
                fill: true
              },
              splines: {
                show: true,
                tension: 0.4,
                lineWidth: 1,
                fill: 0.4
              },
              points: {
                radius: 0,
                show: true
              },
              shadowSize: 2
            },
            grid: {
              verticalLines: true,
              hoverable: true,
              clickable: true,
              tickColor: "#d5d5d5",
              borderWidth: 1,
              color: '#fff'
            },
            colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
            xaxis: {
              tickColor: "rgba(51, 51, 51, 0.06)",
              mode: "time",
              tickSize: [1, "month"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <!-- JQVMap -->
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
          map: 'world_en',
          backgroundColor: null,
          color: '#ffffff',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#E6F2F0', '#149B7E'],
          normalizeFunction: 'polynomial'
        });
      });
    </script>
    <!-- /JQVMap -->

    <!-- Skycons -->
    <script>
      $(document).ready(function() {
        var icons = new Skycons({
          "color": "#73879C"
        }),
        list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
        ],
        i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->

    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
            "Economy Class",
            "Business Class",
            "First Class"
            ],
            datasets: [{
              data: [3412, 768, 475],
              backgroundColor: [
              "#9B59B6",
              "#26B99A",
              "#3498DB"
              ],
              hoverBackgroundColor: [
              "#B370CF",
              "#36CAAB",
              "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->

    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>
      var opts = {
        lines: 12,
        angle: 0,
        lineWidth: 0.4,
        pointer: {
          length: 0.75,
          strokeWidth: 0.042,
          color: '#1D212A'
        },
        limitMax: 'false',
        colorStart: '#1ABC9C',
        colorStop: '#1ABC9C',
        strokeColor: '#F0F3F3',
        generateGradient: true
      };
      var target = document.getElementById('foo'),
      gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>
    <!-- /gauge.js -->

    <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
      }
    </script>

  </body>
  </html>
