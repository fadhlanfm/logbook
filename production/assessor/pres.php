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
            <h2>List Penilaian Presentasi</h2>  
            <ul class="nav navbar-right panel_toolbox">
              <a href="pres_input.php"><button class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Input penilaian presentasi baru</button></a>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <table class="table table-hover table-bordered table table-striped table-bordered dt-responsive nowrap" style="font-size:14px" id="datatable-responsive"  cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="text-align:center; width:3%">#</th>
                  <th style="width:40%">Unit</th>
                  <th style="text-align:center; width:20%">Asesor</th>
                  <th style="text-align:center; width:15%">Nilai total</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $n=1;
                $queries=mysqli_query($db,"SELECT *, (v1+v2+v3+v4+v5+v6+v7+v8+v9+v10)/10 x FROM pres");
                while ($row=mysqli_fetch_array($queries)) {
                  ?>
                  <tr>
                    <td style="text-align:center; vertical-align:middle"><?php echo $n++; ?></td>
                    <td style="vertical-align:middle"><a href="detail_pres.php?id=<?php echo $row['unit'];?>&as=<?php echo $row['asesor'];?>"><b><?php echo $row['unit'];?></b></a> </td>
                    <td style="text-align:center; vertical-align:middle"><?php echo $row['asesor']; ?></td>
                    <td style="text-align:center; vertical-align:middle" >
                      <?php echo number_format($row['x'], 0, '.', ' ');?>
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

<!-- Datatables -->
<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="../../vendors/jszip/dist/jszip.min.js"></script>
<script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Datatables -->
<script>
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [
          {
            extend: "copy",
            className: "btn-sm"
          },
          {
            extend: "csv",
            className: "btn-sm"
          },
          {
            extend: "excel",
            className: "btn-sm"
          },
          {
            extend: "pdfHtml5",
            className: "btn-sm"
          },
          {
            extend: "print",
            className: "btn-sm"
          },
          ],
          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();

    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable();

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    var $datatable = $('#datatable-checkbox');

    $datatable.dataTable({
      'order': [[ 1, 'asc' ]],
      'columnDefs': [
      { orderable: false, targets: [0] }
      ]
    });
    $datatable.on('draw.dt', function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    });

    TableManageButtons.init();
  });
</script>
<!-- /Datatables -->
</body>
</html>
