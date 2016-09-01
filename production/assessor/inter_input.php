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
            <h2>INTERVIEW FORM <small></small></h2>
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
          include('inter_input_form.php');
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
<!-- Autosize -->
<script src="../../vendors/autosize/dist/autosize.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

<!-- Autosize -->
<script>
  $(document).ready(function() {
    autosize($('.resizable_textarea'));
  });
</script>
<!-- /Autosize -->

<script>
  var HO = [
  <?php 
  $qu1 = "SELECT * FROM unit LEFT JOIN inter ON unit.kode = inter.unit WHERE kode_ca = 1";
  $ru1 = $db->query($qu1);
  while ($rou1 = $ru1->fetch_object()) {
    $lul = "";
    $no = $rou1->kode;
    if ($rou1->asesor != null && $rou1->asesor == $coba) {
      $lul = " - [done]";
    }
    $no .= $lul;
    echo '{display: "'.$no.'", value: "'.$rou1->kode.'" },';
  }
  ?>
  {display: "", value: "" }];

  var BO = [
  <?php 
  $qu2 = "SELECT * FROM unit LEFT JOIN inter ON unit.kode = inter.unit WHERE kode_ca != 1";
  $ru2 = $db->query($qu2);
  while ($rou2 = $ru2->fetch_object()) {
    $lul = "";
    $no = $rou2->kode;
    if ($rou2->asesor != null && $rou2->asesor == $coba) {
      $lul = " - [done]";
    }
    $no .= $lul;
    echo '{display: "'.$no.'", value: "'.$rou2->kode.'" },';
  }
  ?>
  {display: "", value: "" }];

  $("#office").change(function() {
   var parent = $(this).val();
   switch(parent){
    case 'HO':
    list(HO);
    break;
    case 'BO':
    list(BO);
    break;              
    default: //default child option is blank
    $("#unit").html('');  
    break;
  }
});
  function list(array_list)
  {
    $("#unit").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options
      $("#unit").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
  }
</script>

</body>
</html>
