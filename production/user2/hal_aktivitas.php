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
  //echo $row->NIP;
  if (!$result)
  {
    die("could not query the database: <br />".$db->error);
  }
  $rot = $row->rot;
  $dir = $row->dir;
  $unit = $row->unit;
  $sitacode = $row->sitacode;
  
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


          <?php  
          include('header.php');
          ?>

          <!-- page content -->
          <div class="right_col" role="main">
            <!-- bookmark -->
            <div class="row">
              <!-- Penilaian diri -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile">
                  <div class="x_title">

                    <div class="col-md-11 col-sm-11 col-xs-11">
                      <h2><b>Penilaian 360</b></h2>
                    </div>
                    <ul class="nav navbar-right panel_toolbox pull-right">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >


                    <!-- Penilaian Diri -->
                    <?php
                    if ($rot != 5) {
                      ?>

                      <div class="row">
                        <h2>Penilaian diri</h2>
                        <div class="col-md-8 col-xs-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th colspan="3">
                                  Nama
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td width="20%">
                                  <?php echo $row->NIP ?>
                                </td>
                                <td width="60%">
                                  <?php echo $row->nama ?>
                                </td>
                                <td width="20%">
                                  <a href="aktivitas.php?id=<?php echo $row->iduser; ?>&idc=<?php echo $row->iduser; ?>&deg=1"><button class="btn btn-primary btn-xs"> Isi Aktivitas</button></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="ln_solid"></div>


                      <?php
                    }
                    ?>


                    <!-- Penilaian Atasan -->

                    <?php
                    if ($rot == 0 || $rot == 1 || $rot == 9) {
                      # code...
                    } else {
                      $atas='';
                      $rotatas = $rot;
                      while (isset($atas)) {
                        $rotatas = $rotatas-1;
                        $q1 = "SELECT * FROM employee where rot='$rotatas' AND dir='$dir' AND unit='$unit'";
                        $r1 = $db->query($q1);
                        $row1 = $r1->fetch_object();
                        if (isset($row1->nama)) {
                          $atas = $row1->nama;
                          $NIPatas = $row1->NIP;
                          break;
                        }
                      }
                      ?>
                      <div class="row">
                        <h2>Penilaian Atasan</h2>
                        <div class="col-md-8 col-xs-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th colspan="3">
                                  Nama
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td width="20%">
                                  <?php echo $NIPatas ?>
                                </td>
                                <td width="60%">
                                  <?php echo $atas; ?>
                                </td>
                                <td width="20%">
                                  <a href="aktivitas.php?id=<?php echo $row->iduser; ?>&idc=<?php echo $row1->iduser; ?>&deg=2"><button class="btn btn-primary btn-xs"> Isi Aktivitas</button></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <?php    
                    }

                    ?>
                    
                    <!-- Penilaian Peers -->
                    
                    <?php
                    if ($rot==5 || $rot==0 || $rot==9) {
                    } else {
                      ?>
                      <div class="row">
                        <h2>Penilaian Peers</h2>
                        <div class="col-md-8 col-xs-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th colspan="3">
                                  Nama
                                </th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                              $q2 = "SELECT * FROM employee where rot='$rot' AND dir='$dir' AND iduser != '$idid'";
                              $r2 = $db->query($q2);
                              while ($row2 = $r2->fetch_object()) {
                                ?>
                                <tr>
                                  <td width="20%">
                                    <?php echo $row2->NIP ?>
                                  </td>
                                  <td width="60%">
                                    <?php echo $row2->nama ?>
                                  </td>
                                  <td width="20%">
                                    <a href="aktivitas.php?id=<?php echo $row->iduser; ?>&idc=<?php echo $row2->iduser; ?>&deg=3"><button class="btn btn-primary btn-xs"> Isi Aktivitas</button></a>
                                  </td>
                                </tr>
                                <?php
                              }
                              ?>
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <?php
                    }
                    ?>

                    <!-- Penilaian Bawahan -->

                    <?php
                    if ($rot == 5 || $rot == 9) {
                      # code...
                    } else if ($rot == 0) {
                      $bawah='';
                      $rotbawah = $rot;
                      while (isset($bawah)) {
                        $rotbawah = $rotbawah+1;
                        $q3 = "SELECT * FROM employee where rot='$rotbawah' AND dir='$dir'";
                        $r3 = $db->query($q3);
                        $row3 = $r3->fetch_object();
                        if (isset($row3->nama)) {
                          $bawah = $row3->nama;
                          break;
                        }
                      }
                      ?>
                      <div class="row">
                        <h2>Penilaian Bawahan</h2>
                        <div class="col-md-8 col-xs-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th colspan="3">
                                  Nama
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $q3 = "SELECT * FROM employee where rot='$rotbawah' AND dir='$dir'";
                              $r3 = $db->query($q3);
                              while ($row3 = $r3->fetch_object()) {
                                ?>  
                                <tr>
                                  <td width="20%">
                                  <?php echo $row3->NIP ?>
                                  </td>
                                  <td width="60%">
                                    <?php echo $row3->nama; ?>
                                  </td>
                                  <td width="20%">
                                  <a href="aktivitas.php?id=<?php echo $row->iduser; ?>&idc=<?php echo $row3->iduser; ?>&deg=4"><button class="btn btn-primary btn-xs"> Isi Aktivitas</button></a>
                                  </td>
                                </tr>
                                <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <?php    
                    } else {
                      $bawah='';
                      $rotbawah = $rot;
                      while (isset($bawah)) {
                        $rotbawah = $rotbawah+1;
                        $q3 = "SELECT * FROM employee where rot='$rotbawah' AND dir='$dir' AND unit='$unit'";
                        $r3 = $db->query($q3);
                        $row3 = $r3->fetch_object();
                        if (isset($row3->nama)) {
                          $bawah = $row3->nama;
                          break;
                        }
                      }
                      ?>
                      <div class="row">
                        <h2>Penilaian Bawahan</h2>
                        <div class="col-md-8 col-xs-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th colspan="3">
                                  Nama
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $q3 = "SELECT * FROM employee where rot='$rotbawah' AND dir='$dir'";
                              $r3 = $db->query($q3);
                              $row3 = $r3->fetch_object();
                              while ($row3 = $r3->fetch_object()) {
                                ?>  


                                <tr>
                                  <td width="20%">
                                    <?php echo $row3->NIP ?>
                                  </td>
                                  <td width="60%">
                                    <?php echo $row3->nama; ?>
                                  </td>
                                  <td width="20%">
                                  <a href="aktivitas.php?id=<?php echo $row->iduser; ?>&idc=<?php echo $row3->iduser; ?>&deg=4"><button class="btn btn-primary btn-xs"> Isi Aktivitas</button></a>
                                  </td>
                                </tr>
                                <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
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

<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

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
