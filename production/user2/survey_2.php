<?php
include_once('../Connection/conn.php');

session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
{

} else if ($_SESSION['role'] == -1) {
  echo 'You are not logged in as User <br>';
  echo'<a href="../acc_logout.php">LOGOUT</a><br>';
  echo'<a href="../index.php">BACK</a>';
  exit;
}
else
{
  echo 'You are not logged In <br>';
  echo'<a href="../../index.php">LOGIN</a>';
  exit;

}
$namesurvey=$_GET['title'];
$coba = $_SESSION['id'];
$query2 =mysql_query( "SELECT * FROM user WHERE username = '$coba'");
$row2 = mysql_fetch_array($query2);
$sql = mysql_query("SELECT * FROM Survey_list WHERE survey_name='$namesurvey';");
$row = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Garuda Indonesia | Back End Process</title>

  <!-- Bootstrap -->
  <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0 ; text-align: center; ">
            <a href="index.html" class="site_title"> <span>Garuda Indonesia</span></a>
          </div>

          <div class="clearfix"></div>

          

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <div class="clearfix"></div>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Halaman Utama</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> CC Program <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="programs.php">Corporate Culture Program</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-cog"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="edit_username2.php">Ubah Username</a></li>
                    <li><a href="edit_password2.php">Ubah Password</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->


          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo "$row2[username]"; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="../acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Survey Form</h3>
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
                  <h2><?php echo $namesurvey ?><small></small></h2>

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

                  <form id="demo-form2" data-parsley-validate method="post" action="survey_submit.php" class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Survey 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="surveyname" id="first-name" readonly  class="form-control col-md-7 col-xs-12" value="<?php echo $namesurvey ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal Mulai 
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control xdisplay_inputx " readonly  id="single_cal2" name="start" placeholder="Tanggal" aria-describedby="inputSuccess2Status2" value="<?php echo "$row[first_date]"; ?>">
                      </div>

                      <label class="control-label col-md-2 col-sm-2 col-xs-12 " >Tanggal Berakhir
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control xdisplay_inputx " readonly id="single_cal3" name="end" placeholder="Tanggal" aria-describedby="inputSuccess2Status2" value="<?php echo "$row[last_date]"; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Unit 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="unit-name" name="unit" readonly  class="form-control col-md-7 col-xs-12" value="<?php echo "$row2[username]"; ?>">
                      </div>
                    </div>


                    <?php 
                    $group=mysql_query("SELECT * From survey_group WHERE survey_name='$namesurvey'");
                    $g=1;
                    $check=mysql_num_rows($group);
                    // var_dump($group); 
                    if ($check>0){
                      while($grow = mysql_fetch_array($group)){
                        $grupn= "$grow[group_name]" ;
                        ?>
                        <div class="ln_solid"></div>
                        <h4><?php echo $grupn; ?></h4>
                        <textarea id="desc" name="hobby[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $grupn; ?></textarea>
                        <p class="font-gray-dark">
                          Deskrisi : <?php echo"$grow[group_desc]"; ?>
                        </p>
                        
                        <?php
                        $question=mysql_query("SELECT * From survey_question WHERE survey_name='$namesurvey' and survey_group='$grupn'");
                        $check2=mysql_num_rows($question);
                        if ($check2>0){
                          while($yes = mysql_fetch_array($question)){
                            $quest= "$yes[question_detail]" ;
                            $question_type="$yes[question_type]";
                            ?>
                            <div class="form-group" style="vertical-align: middle; ">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 "><?php echo $quest; ?> </label>
                              
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $qtipe=mysql_query("SELECT * FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_detail='$quest';" );
                                $qtipe2=mysql_query("SELECT * FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_detail='$quest';" );
                                $check3=mysql_num_rows($qtipe);
                                if ($yes['question_type']=="Single Choice") {
                                  ?> 
                                  <textarea id="desc" name="quest[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $quest; ?></textarea>
                                  <textarea id="desc" name="type[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $question_type; ?></textarea>
                                  <?php
                                  if ($check3>0){
                                    while($tipe = mysql_fetch_array($qtipe)){
                                      ?>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="radio">
                                          <label>
                                            <input type="radio" class="flat" name="iCheck[]" value="<?php echo  $tipe['type_1']; ?>"> <?php echo " ";;echo  $tipe['type_1']; ?>
                                          </label>
                                        </div>
                                      </div>  
                                      <?php 
                                    }
                                  }

                                } else if ($yes['question_type']=="Multiple Choice") {
                                  ?> 
                                  <textarea id="desc" name="quest[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $quest; ?></textarea>
                                  <textarea id="desc" name="type[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $question_type; ?></textarea>
                                  <?php
                                  if ($check3>0){
                                    while($tipe = mysql_fetch_array($qtipe)){
                                      ?>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="multi-choice[]" class="flat" value="<?php echo $tipe['type_1']; ?>"> <?php echo $tipe['type_1']; ?>
                                          </label>
                                        </div>
                                      </div>
                                      <?php 
                                    }
                                  }
                                } else if ($yes['question_type']=="Ranking") {
                                  ?> 
                                  <textarea id="desc" name="quest[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $quest; ?></textarea>
                                  <textarea id="desc" name="type[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $question_type; ?></textarea>
                                  <?php
                                  $x=1;
                                  if ($check3>0){
                                    while($x <= $check3){
                                      ?>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="checkbox">
                                          <div class="col-md-1 col-sm-1 col-xs-1">
                                            <div>
                                              <a class="control-label col-md-2 col-sm-3 col-xs-12" style="vertical-align:middle"><?php echo $x++;  ?></a>
                                            </div>
                                          </div>
                                          <div class="col-md-11 col-sm-11 col-xs-11 ">
                                            <div>
                                              <select name="rank[]" class="form-control" id="pilihan"  placeholder="yes">
                                                <option id="opsi1" style="display: block" >Pilih salah satu...</option>
                                                <?php 
                                                $qtipe2=mysql_query("SELECT * FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_detail='$quest';" );
                                                $cekx=mysql_num_rows($qtipe2);
                                                if ($cekx>0){
                                                  while($tipe2 = mysql_fetch_array($qtipe2)){
                                                    ?>
                                                    <option value="<?php echo $tipe2['type_1']; ?>"><?php echo $tipe2['type_1']; ?></option>
                                                    <?php 
                                                  }}
                                                  ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <?php 
                                      }
                                    }
                                  } else if ($yes['question_type']=="Free Text") {

                                    ?> 
                                    <textarea id="desc" name="quest[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $quest; ?></textarea>
                                    <textarea id="desc" name="type[]" class="resizable_textarea form-control input" placeholder="" style="display:none"><?php echo $question_type; ?></textarea>
                                    <?php
                                    ?> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="checkbox">
                                        <textarea id="desc" name="desc[]" class="resizable_textarea form-control" placeholder=""></textarea>
                                      </div>
                                    </div>
                                    <?php
                                  }
                                  ?>
                                </div>
                              </div>
                              <?php
                            }
                          }
                          ?>

                          <?php
                        }
                      }
                      ?>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-primary" value="batal">Cancel</button>
                          <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit</button>
                        </div>
                      </div>
                    </form>

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
  </body>
  </html>