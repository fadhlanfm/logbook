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


  $query3 = "SELECT * FROM aktivitas_employee a JOIN subaktivitas b WHERE a.id_subaktivitas=b.id_subaktivitas and a.id_user='$idid' and b.default2=1";
        //execute the query
  $result3 = $db->query( $query3 );
  
  // echo $row->username;
  if (!$result)
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
  
  $qdeg3 = "SELECT count(*) lol3
          from aktivitas_employee
          where id_tujuan = '$idid'
          and degree = 3";
  $qudeg3 = $db->query($qdeg3);
  $hasil3 = $qudeg3->fetch_object();

  $qdeg4 = "SELECT count(*) lol4
          from aktivitas_employee
          where id_tujuan = '$idid'
          and degree = 4";
  $qudeg4 = $db->query($qdeg4);
  $hasil4 = $qudeg3->fetch_object();

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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile">
                  <div class="x_title">
                    <h2><b>Leaderboard</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- rank table -->
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            Nomor
                          </th>
                          <th>
                            Pegawai
                          </th>
                          <th>
                            Total Poin
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query6 = "SELECT id_tujuan, nama, sum(ac) ad
                        from (
                        SELECT id_tujuan, sum(poin*freq)*pres/100 ac
                        FROM aktivitas_employee a
                        JOIN subaktivitas b
                        ON a.id_subaktivitas = b.id_subaktivitas
                        JOIN pres_deg c
                        ON a.degree = c.deg
                        GROUP BY id_tujuan, degree) d
                        JOIN employee e
                        ON d.id_tujuan = e.iduser
                        GROUP BY id_tujuan";
              //execute the query
                        $result6 = $db->query( $query6 );

              // echo $row->username;
                        if (!$result6)
                        {
                          die("could not query the database: <br />".$db->error);
                        }
                        $i = 1;
                        while ($row6 = $result6->fetch_object()) {
                          ?>
                          <tr>
                            <td>
                              <?php echo $i; $i++; ?>
                            </td>
                            <td>
                              <?php echo $row6->nama; ?>
                            </td>
                            <td>
                            <?php echo number_format($row6->ad, 0, '.', ' '); ?>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
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
<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

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
