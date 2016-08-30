<?php
session_start();
include_once('Connection/conn.php');
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
$name = mysqli_real_escape_string($con, $_GET['participant']);
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
        <h3>Innovation Detail</h3>
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
            <h2>Plain Page</h2>
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
            $query=mysqli_query($con,"SELECT * FROM i_data JOIN i_registration on i_data.data_participant=i_registration.reg_participant where data_participant='$name'");
            $row = mysqli_fetch_array($query);
            
            ?>
            <p><b>Nama Peserta : </b><?php echo $name; ?></p>
            <p><b>Kategori Peserta : </b><?php echo"$row[reg_pcategory]"; ?></p>
            <?php 
            if ($row['reg_pcategory']=='kelompok') {
              echo "<p><b>Anggota Kelompok :</b></p>";
              echo "<ol>";
              while ($row) {
                echo "<li>";
                echo $row['reg_name'];
                echo "</li>";
              }
              
            }
            ?>
            <p><b>Kategori Inovasi : </b><?php echo"$row[reg_icategory]"; ?></p>
            <table class="table table-striped table-bordered"style="font-size:14px">
              <tbody>
                <tr>
                  <th style="width:30%" colspan="2">
                    <h4>Detail Inovasi</h4>

                  </th>
                </tr>
                <tr>
                  <th style="width:30%">Judul Inovasi</th>
                  <td><?php echo"$row[data_title]"; ?></td>
                </tr>
                <tr>
                  <th style="width:30%">Latar Belakang</th>
                  <td><?php echo"$row[data_background]"; ?></td>
                </tr>
                <tr>
                  <th style="width:30%">Deskripsi Inovasi</th>
                  <td><?php echo"$row[data_desc]"; ?></td>
                </tr>
                <tr>
                  <th style="width:30%">Unit Terkait</th>
                  <td><?php echo"$row[data_unit]"; ?></td>
                </tr>
                <tr>
                  <th style="width:30%">Potensi</th>
                  <td><?php echo"$row[data_pot]"; echo " : "; echo "$row[data_curr]"; echo " "; echo "$row[data_value]"; ?></td>
                </tr>
                <tr>
                  <th style="width:30%">Attachment</th>
                  <td>
                  <?php 
                  $file = "$row[data_attach]"; //Let say If I put the file name Bang.png
                  echo "<a href='download.php?nama=".$file."'>".$row['data_attach']."</a> ";
                  ?>
                  </td>
                </tr>
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
