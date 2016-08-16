<?php
session_start();
include_once('Connection/conn.php');

$query = mysql_query("SELECT * FROM Survey_list WHERE status='active'" );

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
$query2 =mysql_query( "SELECT * FROM user WHERE username = '$coba'");
$row2 = mysql_fetch_array($query2);
include('header.php');
?>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Kelola Survey</h3>
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

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>List Survey <small>Custom design</small></h2>
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

                  <div class="table-responsive">
                    <?php
                    $a=1;
                    $cek1=mysql_num_rows($query);
                    if ($cek1>0){ ?>
                      <table  class="table table-hover">
                        <thead>
                          <tr class="headings">
                            <th>
                              #
                            </th>
                            <th class="column-title">No </th>
                            <th class="column-title">Nama Survey </th>
                            <th class="column-title">Tanggal Mulai </th>
                            <th class="column-title">Tanggal Berakhir </th>
                            <th class="column-title">Url </th>
                            <th class="column-title no-link last" style="text-align: center;"><span class="nobr">Kelola</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <?php
                        while($row = mysql_fetch_array($query)){
                         ?>
                         <tbody>
                          <tr class="even pointer">
                            <td class="a-center " style="vertical-align: middle;">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" " style="vertical-align: middle;" ><?php echo $a++; ?></td>
                            <td class=" " style="vertical-align: middle;"><?php echo "$row[survey_name]"; ?></td>
                            <td class=" " style="vertical-align: middle;"><?php echo "$row[first_date]"; ?></td>
                            <td class=" " style="vertical-align: middle;"><?php echo "$row[last_date]"; ?></td>
                            <td class=" " style="vertical-align: middle;"><?php echo "$row[url]"; ?></td>
                            
                            <td class=" last" style="vertical-align: middle; text-align: center; align: center; ">
                              <a href="edit_survey.php?id=<?php echo"$row[id_survey]"; ?>"><button type="submit" class="btn btn-primary" style="width: 40% ; font-size: 100%" >Edit</button></a>
                              <a href="delete_survey_.php?id=<?php echo"$row[id_survey]"; ?>"><button type="submit" class="btn btn-danger" style="width: 40% ; font-size: 100%" >Hapus</button></a>
                            </td>

                          </tr>
                          <?php 
                        } ?>   
                      </tbody>
                    </table>
                    <?php }else { ?>
                      <p align="center">Tidak ada data Survey</p>
                      <?php }?>
                      <div class="form-group">
                        <a href="add_survey.php"><button class="btn btn-success  ">Tambah Survey</button></a>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
  </html>