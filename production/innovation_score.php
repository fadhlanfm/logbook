<?php
session_start();
include_once('Connection/conn.php');

$query = mysqli_query($con,"SELECT * FROM Survey_list WHERE status='active'" );

if(isset($_SESSION['role']) && $_SESSION['role'] == -1)
{

} else if ($_SESSION['role'] == 1) {
  echo 'You are not logged in as Administrator <br>';
  echo'<a href="../process/acc_logout.php">LOGOUT</a><br>';
  echo'<a href="../pages/survey.php">BACK</a>';
  exit;
}
else
{
  echo 'You are not logged In <br>';
  echo'<a href="../index.php">LOGIN</a>';
  exit;

}
$coba ='admin';
$query2 =mysqli_query($con, "SELECT * FROM user WHERE username = '$coba'");
$row2 = mysqli_fetch_array($query2);
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Innovation</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Ide Innovasi</h2>
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
            <?php
            $query=mysqli_query($con,"SELECT * FROM i_data JOIN i_registration on i_data.data_participant=i_registration.reg_participant");
            $a=1;
            $cek1=mysqli_num_rows($query);
            if ($cek1>0){ ?>
            <table class="table table-hover table-bordered">
              <thead >
                <tr >
                  <th style="text-align:center; width:5%">#</th>
                  <th style="text-align:center; width:25%">Nama Peserta</th>
                  <th style="text-align:center; width:15%">Kategori Inovasi</th>
                  <th style="text-align:center; width:15%">Judul</th>
                  <th style="text-align:center; width:10%">Detail</th>
                  <th style="text-align:center; width:20%">Opsi</th>
                  <th style="text-align:center; width:10%">Remarks</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                while($row = mysqli_fetch_array($query)){
                 ?>
                 <tr>

                  <th style="text-align:center" scope="row">1</th>
                  <td ><?php echo"$row[data_participant]"; ?></td>
                  <td><?php echo"$row[reg_icategory]"; ?></td>
                  <td><?php echo"$row[data_title]"; ?></td>
                  <td><a href="innovation_detail.php?participant=<?php echo "$row[data_participant]"; ?>">Detail</a></td>
                  <td class=" last" style="vertical-align: middle; width: 20%; text-align: center;">
                    <a href="edit_question.php?id=<?php echo"$row[id_question]"; ?>"><button type="button" class="btn btn-primary btn-xs" style="width: 40% ; font-size: 100%" >Go</button></a>
                    <a href="delete_question_.php?id=<?php echo"$row[id_question]"; ?>"><button type="button" class="btn btn-danger btn-xs" style="width: 40% ; font-size: 100%" >No Go</button></a>
                  </td>
                  <td></td>
                </tr>
                <?php 
              } 
              ?>
            </tbody>
          </table>
          <?php
        }?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Lolos Tahap 1</h2>
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
        <?php
        $query=mysqli_query($con,"SELECT * FROM i_data JOIN i_registration on i_data.data_participant=i_registration.reg_participant where status='go'");
        $a=1;
        $cek1=mysqli_num_rows($query);
        if ($cek1>0){ ?>
        <table class="table table-hover table-bordered">
          <thead >
            <tr >
              <th style="text-align:center; width:5%">#</th>
              <th style="text-align:center; width:25%">Nama Peserta</th>
              <th style="text-align:center; width:15%">Kategori Inovasi</th>
              <th style="text-align:center; width:15%">Judul</th>
              <th style="text-align:center; width:10%">Detail</th>
              <th style="text-align:center; width:20%">Opsi</th>
              <th style="text-align:center; width:10%">Remarks</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($row = mysqli_fetch_array($query)){
             ?>
             <tr>

              <th style="text-align:center" scope="row">1</th>
              <td ><?php echo"$row[data_participant]"; ?></td>
              <td><?php echo"$row[reg_icategory]"; ?></td>
              <td><?php echo"$row[data_title]"; ?></td>
              <td>detail</td>
              <td class=" last" style="vertical-align: middle; width: 20%; text-align: center;">
                <a href="delete_question_.php?id=<?php echo"$row[id_question]"; ?>"><button type="button" class="btn btn-danger btn-xs" style="width: 40% ; font-size: 100%" >No Go</button></a>
              </td>
              <td></td>
            </tr>
            <?php 
          } 
          ?>
        </tbody>
      </table>
      <?php
    } else {
      echo "Belum ada Ide yang lolos";
    }

    ?>
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
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>
