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
                      <h2><b>Profil 360</b></h2>
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
                    if ($rot != 5 && $rot != 0 && $rot != 9) {
                      ?>

                      <div class="row">
                        <h2>Penilaian diri</h2>
                        <div class="col-md-8 col-xs-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                               <th>
                                10%
                              </th>
                              <th>
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
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <?php
                  } else {

                  }
                  ?>

                  <!-- Penilaian Atasan -->
                  <?php
                  if ($rot == 9 || $rot == 5 || $rot == 0) {
                      # code...
                  } else if ($rot != 1) {
                    $atas='';
                    $NIPatas='';
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
                              <th>
                                40%
                              </th>
                              <th>
                                Nama
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td width="20%">
                                <?php echo $NIPatas; ?>
                              </td>
                              <td width="60%">
                                <?php echo $atas; ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <?php    
                  } else {
                    $atas='';
                    $rotatas = $rot;
                    $NIPatas='';
                    while (isset($atas)) {
                      $rotatas = $rotatas-1;
                      $q1 = "SELECT * FROM employee where rot='$rotatas' AND dir='$dir'";
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
                              <th>
                                40%
                              </th>
                              <th>
                                Nama
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td width="20%">
                                <?php echo $NIPatas; ?>
                              </td>
                              <td width="60%">
                                <?php echo $atas; ?>
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
                              <th>
                                20%
                              </th>
                              <th>
                                Nama
                              </th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $q99 = "SELECT * FROM employee where rot='$rot' AND dir='$dir'  AND iduser != '$idid'";
                            $r99 = $db->query($q99);
                            while ($row99 = mysqli_fetch_array($r99)) {
                              ?>
                              <tr>
                                <td width="20%">
                                  <?php echo $row99['NIP'] ?>
                                </td>
                                <td width="60%">
                                  <?php echo $row99['nama'] ?>
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
                  if ($rot == 9 || $rot == 5 || $rot == 0) {
                      # code...
                  } else if ($rot == 1) {
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
                              <th>
                                30%
                              </th>
                              <th>
                                Nama
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $q33 = "SELECT * FROM employee where rot='$rotbawah' AND dir='$dir' AND unit='$unit'";
                            $r33 = $db->query($q33);
                            while ($row33 = mysqli_fetch_array($r33)) {
                              ?>  
                              <tr>
                                <td width="20%">
                                  <?php echo $row33['NIP'] ?>
                                </td>
                                <td width="60%">
                                  <?php echo $row33['nama']; ?>
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
                              <th>
                                30%
                              </th>
                              <th>
                                Nama
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $q33 = "SELECT * FROM employee where rot='$rotbawah' AND dir='$dir' AND unit='$unit'";
                            $r33 = $db->query($q33);
                            while ($row33 = mysqli_fetch_array($r33)) {
                              ?>  
                              <tr>
                                <td width="20%">
                                  <?php echo $row33['NIP'] ?>
                                </td>
                                <td width="60%">
                                  <?php echo $row33['nama']; ?>
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
