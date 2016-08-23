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
$coba = $_SESSION['id'];
$id=$_GET['id'];
$user=mysql_query("SELECT * FROM ca_performance_activity where id_activity='$id'");
$username=mysql_fetch_array($user);
$xx=$username['username'];

$query2 =mysql_query( "SELECT * FROM user WHERE username = '$coba'");
$sqla=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
$isi=mysql_fetch_array($sqla);
$row2 = mysql_fetch_array($query2);
include('header.php');
$sql=mysql_query("UPDATE ca_performance_activity set status='read' where id_activity='$id'");
$_SESSION['userca']=$xx;
$_SESSION['notif']=$id;
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>CA Performance</h3>
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
            <h2>User Report <small>Activity report</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img col-md-3 col-xs-12 widget" style="text-align:center">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                </div>
              </div>
              <div class="col-md-3 col-xs-12 widget">
                <h3><?php echo $isi['username']; ?></h3>

                <ul class="list-unstyled user_data">
                  <p><?php echo $isi['username']; ?></p>
                </ul>
              </div>
              
              <div class="col-md-3 col-xs-12 widget widget_tally_box ui-ribbon-container fixed_height_390">


                <div class="x_content">

                  <?php 
                  $cekchart=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                  $rowc=mysql_fetch_array($cekchart);
                  $total=$rowc['total'];
                  
                  $persen=$total*10;
                  if ($persen<40) {
                    $status='Bad';
                  }
                  ?>
                  <div style="text-align: center; margin-bottom: 17px">
                    <span class="chart" data-percent="<?php echo $persen; ?>">
                      <span class="percent"></span>
                    </span>
                  </div>
                  <h3 class="name_title"><?php echo $status; ?></h3>
                  <p>Short Description</p>

                  <div class="divider"></div>

                  <p>If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.</p>

                </div>
              </div>
              <div>
                <a href="ca_performance_table.php"><button type="button" name="submit" class="btn btn-primary btn-xs" style="width: 80% ; font-size: 100%" value="batal">Kembali</button></a>
              </div>

              

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">


              <div class="profile_title">
                <div class="col-md-6">
                  <h2>User CA Performance Event</h2>
                </div>

              </div>

              <!-- tabel -->
              <form method="post" name="myForm" id="devel-generate-content-form" accept-charset="UTF-8" >
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th style="width:5%">#</th>
                      <th style="width:45%; ">Condition</th>
                      <th style="width:20%; text-align:center">Evidence</th>
                      <th style="width:15%; text-align:center">Status</th>
                      <th style="width:15%; text-align:center">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $sql2=mysql_query("SELECT * FROM ca_performance_event where id_ca='1'");
                      $row2=mysql_fetch_array($sql2);
                      ?>
                      <th>1</th>
                      <td><?php echo "$row2[ca_detail]"; ?></td>
                      <td style="vertical-align:middle;text-align:center">-</td>
                      <td style="vertical-align:middle;text-align:center">-</td>
                      <td style="vertical-align:middle;text-align:center">-</td>
                    </tr>
                    <tr>

                      <?php
                      $sql2=mysql_query("SELECT * FROM ca_performance_event where id_ca='2'");
                      $row2=mysql_fetch_array($sql2);
                      ?>
                      <th>2</th>
                      <td><?php echo "$row2[ca_detail]"; ?></td>

                      <?php 
                      $cekisi2=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi2=mysql_fetch_array($cekisi2);
                      if($rowisi2['file2']==null || empty($rowisi2['file2'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          $file = "$rowisi2[file2]"; //Let say If I put the file name Bang.png
                          echo "<a href='download.php?nama=".$file."'>".$rowisi2['file2']."</a> ";
                          ?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi2['status_f2'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi2['status_f2']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f2"><button type="button" name="submit" type="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f2"><button type="button" name="submit" type="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>


                    </tr>
                    <tr>
                      <?php
                      $sql3=mysql_query("SELECT * FROM ca_performance_event where id_ca='3'");
                      $row3=mysql_fetch_array($sql3);
                      ?>
                      <th>3</th>
                      <td><?php echo "$row3[ca_detail]"; ?></td>
                      <?php 
                      $cekisi3=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi3=mysql_fetch_array($cekisi3);
                      if($rowisi3['file3']==null || empty($rowisi3['file3'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi3[file3]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi3['status_f3'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi3['status_f3']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f3"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f3"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql4=mysql_query("SELECT * FROM ca_performance_event where id_ca='4'");
                      $row4=mysql_fetch_array($sql4);
                      ?>
                      <th>4</th>
                      <td><?php echo "$row4[ca_detail]"; ?></td>
                      <?php 
                      $cekisi4=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi4=mysql_fetch_array($cekisi4);
                      if($rowisi4['file4']==null || empty($rowisi4['file4'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi4[file4]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi4['status_f4'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi4['status_f4']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f4"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f4"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql5=mysql_query("SELECT * FROM ca_performance_event where id_ca='5'");
                      $row5=mysql_fetch_array($sql5);
                      ?>
                      <th>5</th>
                      <td><?php echo "$row5[ca_detail]"; ?></td>
                      <?php 
                      $cekisi5=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi5=mysql_fetch_array($cekisi5);
                      if($rowisi5['file5']==null || empty($rowisi5['file5'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi5[file5]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi5['status_f5'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi5['status_f5']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f5"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f5"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql6=mysql_query("SELECT * FROM ca_performance_event where id_ca='6'");
                      $row6=mysql_fetch_array($sql6);
                      ?>
                      <th>6</th>
                      <td><?php echo "$row6[ca_detail]"; ?></td>
                      <?php 
                      $cekisi6=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi6=mysql_fetch_array($cekisi6);
                      if($rowisi6['file6']==null || empty($rowisi6['file6'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi6[file6]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi6['status_f6'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi6['status_f6']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f6"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f6"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql7=mysql_query("SELECT * FROM ca_performance_event where id_ca='7'");
                      $row7=mysql_fetch_array($sql7);
                      ?>
                      <th>7</th>
                      <td><?php echo "$row7[ca_detail]"; ?></td>
                      <?php 
                      $cekisi7=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi7=mysql_fetch_array($cekisi7);
                      if($rowisi7['file7']==null || empty($rowisi7['file7'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi7[file7]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi7['status_f7'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi7['status_f7']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f7"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f7"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql8=mysql_query("SELECT * FROM ca_performance_event where id_ca='8'");
                      $row8=mysql_fetch_array($sql8);
                      ?>
                      <th>8</th>
                      <td><?php echo "$row8[ca_detail]"; ?></td>
                      <?php 
                      $cekisi8=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi8=mysql_fetch_array($cekisi8);
                      if($rowisi8['file8']==null || empty($rowisi8['file8'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi8[file8]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi8['status_f8'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi8['status_f8']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f8"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f8"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql9=mysql_query("SELECT * FROM ca_performance_event where id_ca='9'");
                      $row9=mysql_fetch_array($sql9);
                      ?>
                      <th>9</th>
                      <td><?php echo "$row9[ca_detail]"; ?></td>
                      <?php 
                      $cekisi9=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi9=mysql_fetch_array($cekisi9);
                      if($rowisi9['file9']==null || empty($rowisi9['file9'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi9[file9]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi9['status_f9'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi9['status_f9']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f9"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f9"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <tr>
                      <?php
                      $sql10=mysql_query("SELECT * FROM ca_performance_event where id_ca='10'");
                      $row10=mysql_fetch_array($sql10);
                      ?>
                      <th>10</th>
                      <td><?php echo "$row10[ca_detail]"; ?></td>
                      <?php 
                      $cekisi10=mysql_query("SELECT * FROM ca_performance_upload where username='$xx'");
                      $rowisi10=mysql_fetch_array($cekisi10);
                      if($rowisi10['file10']==null || empty($rowisi10['file10'])){
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <a style="text-align:center">Belum Mengisi</a>
                        </td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <td style="vertical-align:middle;text-align:center">-</td>
                        <?php
                      } else {
                        ?>
                        <td style="vertical-align:middle;text-align:center">
                          <?php echo "$rowisi2[file2]";?>
                        </td>
                        <td style="vertical-align:middle;text-align:center"><?php echo $rowisi11['status_f11'] ?></td>
                        <td style="vertical-align:middle;text-align:center">
                          <?php 
                          if ($rowisi11['status_f11']=='uploaded') {
                            ?>
                            <a href="ca_verify_.php?id=status_f11"><button type="button" name="submit" class="btn btn-success btn-xs" style="width: 80% ; font-size: 100%" value="verify">Verify</button></a>
                            <?php
                          } else {
                            ?>
                            <a href="ca_cancel_.php?id=status_f11"><button type="button" name="submit" class="btn btn-danger btn-xs" style="width: 80% ; font-size: 100%" value="batal">Cancel</button></a>
                            <?php
                          }
                          ?>
                        </td>
                        <?php
                      }

                      ?>
                    </tr>
                    <?php


                    ?>

                  </tbody>
                </table>
              </form>
              <!-- tabel -->


            </div>

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

<!-- easy-pie-chart -->
<script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script>
  $(function() {
    $('.chart').easyPieChart({
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: '#26B99A',
      trackColor: '#F5F7FA',
      scaleColor: false,
      lineWidth: 20,
      trackWidth: 16,
      lineCap: 'butt',
      onStep: function(from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
      }
    });
  });
</script>
</body>
</html>