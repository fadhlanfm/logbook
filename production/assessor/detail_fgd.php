<?php
session_start();
include_once('../Connection/dbconn.php');

if(isset($_SESSION['role']) && $_SESSION['role'] == 2)
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
  header ('Location: ../page_4033.php');
  exit;

}

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

$unit = $_GET['id'];
$asesor = $_GET['as'];

$q3 = "SELECT * FROM fgd WHERE unit = '$unit' AND asesor = '$asesor' ";
$r3 = $db->query($q3);
$row3 = $r3->fetch_object();

?>

<?php
include ('header.php');
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">      
    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>FGD FORM <small></small></h2>
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


          <?php
          include('fgd_tabel.php');
          ?>
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
</div>

<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../../vendors/iCheck/icheck.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>


</body>
</html>
