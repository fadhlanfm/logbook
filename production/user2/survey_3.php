<?php
include_once('../Connection/conn.php');

session_start();
// if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
// {

// } else if ($_SESSION['role'] == -1) {
//   echo 'You are not logged in as User <br>';
//   echo'<a href="../acc_logout.php">LOGOUT</a><br>';
//   echo'<a href="../index.php">BACK</a>';
//   exit;
// }
// else
// {
//   echo 'You are not logged In <br>';
//   echo'<a href="../../index.php">LOGIN</a>';
//   exit;

// }
$namesurvey=$_GET['title'];
$coba = $_SESSION['id'];
$query2 =mysql_query( "SELECT * FROM user WHERE username = '$coba'");
$row2 = mysql_fetch_array($query2);
$sql = mysql_query("SELECT * FROM Survey_list WHERE survey_name='$namesurvey';");
$row = mysql_fetch_array($sql);

$group=mysql_query("SELECT * From survey_group WHERE survey_name='$namesurvey' and status='Default' ");





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

  <!-- bootstrap-wysiwyg -->
  <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" onload="func1()">
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
                  </form>

                </div>
              </div>
            </div>
          </div>

          <?php 
          $grow = mysql_fetch_array($group);

          $grupn= "$grow[group_name]" ;
          $grupd= "$grow[group_desc]";
          ?>
          <form id="demo-form2" data-parsley-validate method="post" action="survey_submit.php" class="form-horizontal form-label-left">
            <input type="text" name="surveyname" value="<?php echo $namesurvey ?>" style="display:none">
            <input type="text" name="unit" value="<?php echo "$row2[username]"; ?>" style="display:none">
            <textarea id="desc" name="grup" style="display:none"><?php echo $grupn; ?></textarea>
            <!-- panel -->
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="x_content">
                      <h2><?php echo $grupn; ?> </h2>
                      <?php 
                      $det = "$grow[group_desc]"; 
                      ?>
                      <p >
                        <?php echo str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $det); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- panel -->


            <!-- panel forced choice-->
            <?php
            $xx=1;
            $forced=mysql_query("SELECT * FROM `q_type` WHERE `question_type`='Forced Choice' and group_name='$grupn' GROUP BY `type_1`");
            $checkn=mysql_num_rows($forced);  
            if ($checkn>0){ ?>
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width:5%; vertical-align:middle; text-align:center">No</th>
                            <th style="width:50%">Pertanyaan</th>
                            <th style="width: 30% ;vertical-align:middle; text-align:center" colspan="6">Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $p=1;
                          $pp=1;
                          $hey=1;
                          while ($choice = mysql_fetch_array($forced)) {
                            $ids=$p++;
                            $hay=$hey++;
                            $idk=$pp++; 
                            $questi= "$choice[question_detail]" ;
                            $question_typei="$choice[question_type]";
                            $forced_content=mysql_query("SELECT * FROM `q_type` WHERE `question_type`='Forced Choice' and group_name='$grupn' and `type_1`='$ids'");

                            ?>

                            <tr>

                              <th scope="row" style="width:5%; vertical-align:middle; text-align:center"><?php echo $ids; ?></th>


                              <td style="vertical-align:middle">
                                <?php
                                $alpha='A' ;
                                while ($choicex = mysql_fetch_array($forced_content)) {

                                  echo "[";
                                  echo $alpha++;
                                  echo "]";
                                  echo " ";
                                  echo $choicex['question_detail'];
                                  echo "</br>";
                                  echo "</br>";
                                  ?>

                                  <input type="text" name="questioni<?php echo $hay; ?>[]" style="display:none" value="<?php echo $choicex['question_detail']; ?>">
                                  <input type="text" name="tipei<?php echo $hay; ?>[]" style="display:none" value="<?php echo $question_typei; ?>">
                                  <?php

                                }
                                ?>
                              </td>

                              <td style="vertical-align:middle; text-align:center"><a>0</a><br/><br/><input type="radio" class="flat" name="forced<?php echo $idk; ?>" value=0><br/><br/><a>5</a></td>
                              <td style="vertical-align:middle; text-align:center"><a>1</a><br/><br/><input type="radio" class="flat" name="forced<?php echo $idk; ?>" value=1><br/><br/><a>4</a></td>
                              <td style="vertical-align:middle; text-align:center"><a>2</a><br/><br/><input type="radio" class="flat" name="forced<?php echo $idk; ?>" value=2><br/><br/><a>3</a></td>
                              <td style="vertical-align:middle; text-align:center"><a>3</a><br/><br/><input type="radio" class="flat" name="forced<?php echo $idk; ?>" value=3><br/><br/><a>2</a></td>
                              <td style="vertical-align:middle; text-align:center"><a>4</a><br/><br/><input type="radio" class="flat" name="forced<?php echo $idk; ?>" value=4><br/><br/><a>1</a></td>
                              <td style="vertical-align:middle; text-align:center"><a>5</a><br/><br/><input type="radio" class="flat" name="forced<?php echo $idk; ?>" value=5><br/><br/><a>0</a></td>

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
              <?php
            }
            ?> 
            <!-- panel forced choice -->


            <!-- panel likert scale-->
            <?php
            $likert=mysql_query("SELECT * From survey_question WHERE survey_name='$namesurvey' and survey_group='$grupn' and question_type='Likert Scale' ");
            $check0=mysql_num_rows($likert);
            if ($check0>0){ ?>
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">

                      <div class="x_content"></div>


                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width:5%; vertical-align:middle; text-align:center">No</th>
                            <th style="width:50%">Pertanyaan (Likert Scale)</th>
                            <?php 

                            $likert_scale=mysql_query("SELECT MAX(type_1) as type_1 FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_type='Likert Scale';" );
                            $tipe0 = mysql_fetch_array($likert_scale);

                            $n=1;
                            while ($n <= $tipe0['type_1']) {
                              ?>
                              <th style="width:5%; vertical-align:middle; text-align:center"><?php echo $n++; ?></th>
                              <?php
                            }
                            ?>


                          </tr>
                        </thead>
                        <tbody>
                          <?php 

                          $r=1;
                          $mmm=1;
                          while ($scale = mysql_fetch_array($likert)) {
                            $quest0= "$scale[question_detail]" ;
                            $question_type0="$scale[question_type]";
                            $m=1;
                            $mm=1;

                            $mx=$mmm++;
                            ?>
                            <tr>
                              <th scope="row" style="width:5%; vertical-align:middle; text-align:center"><?php echo $r++; ?></th>
                              <td><?php echo $scale['question_detail']; ?></td>
                              <input type="text" name="question0<?php echo $mx; ?>" style="display:none" value="<?php echo $quest0; ?>">
                              <input type="text" name="tipe0<?php echo $mx; ?>" style="display:none" value="<?php echo $question_type0; ?>">
                              <?php 

                              $likert_scale2=mysql_query("SELECT MAX(type_1) as type_1 FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_type='Likert Scale';" );
                              $tipe9=mysql_fetch_array($likert_scale2);
                              while ($m <= $tipe9['type_1']) {

                                ?>
                                <td style="vertical-align:middle; text-align:center"><input type="radio" class="flat" name="likert<?php echo $mx; ?>" value="<?php echo $mm++; ?>"</td>
                                <?php
                                $m++;
                              }
                              ?>

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
              <?php
            }
            ?> 
            <!-- panel likert scale -->

            <!-- panel free text-->
            <?php
            $free=mysql_query("SELECT * From survey_question WHERE survey_name='$namesurvey' and survey_group='$grupn' and question_type='Free Text' ");
            $check2=mysql_num_rows($free);
            if ($check2>0){ ?>
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width:5%; vertical-align:middle; text-align:center">No</th>
                            <th style="">Pertanyaan (Free Text)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $abc=1;
                          while($yes = mysql_fetch_array($free)){
                            $abcd=$abc++;
                            $quest= "$yes[question_detail]" ;
                            $question_type="$yes[question_type]";
                            ?>
                            <tr>
                              <th scope="row" style="width:5%; vertical-align:middle; text-align:center"><?php echo $abcd; ?></th>
                              <td style="vertical-align:middle">
                                <label class="control-label"><?php echo $quest; ?> </label>
                                <input type="text" name="question1[]" style="display:none" value="<?php echo $quest; ?>">
                                <input type="text" name="tipe1[]" style="display:none" value="<?php echo $question_type; ?>">
                                <div class="checkbox">
                                  <textarea id="desc" name="free[]" class="resizable_textarea form-control"></textarea>
                                </div>
                              </td>
                            </tr>
                            <?php
                          } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>


              </div>
              <?php
            }
            ?> 
            <!-- panel free text -->

            <!-- panel single choice -->
            <?php
            $single=mysql_query("SELECT * From survey_question WHERE survey_name='$namesurvey' and survey_group='$grupn' and question_type='Single Choice' ");
            $check3=mysql_num_rows($single);
            if ($check3>0){
              ?>
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width:5%; vertical-align:middle; text-align:center">No</th>
                            <th style="width:50%">Pertanyaan (Single Choice)</th>
                            <th style="width: 45% ;vertical-align:middle; text-align:center" >Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $oo=1;
                          while($yes = mysql_fetch_array($single)){
                            $ooo=$oo++;
                            $quest2= "$yes[question_detail]" ;
                            $question_type2="$yes[question_type]";
                            ?>
                            <tr>
                              <th scope="row" style="width:5%; vertical-align:middle; text-align:center"><?php echo $ooo;?> 
                              </th>
                              <td style="vertical-align:middle">
                                <?php echo $quest2;?>
                                <input type="text" name="question2<?php echo $ooo;?>" style="display:none" value="<?php echo $quest2; ?>" >
                                <input type="text" name="tipe2<?php echo $ooo; ?>" style="display:none" value="<?php echo $question_type2; ?>">
                              </td>
                              <td style="vertical-align:middle;">
                                <?php
                                $qtipe=mysql_query("SELECT * FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_detail='$quest2';" );
                                if ($check3>0){
                                  while($tipe = mysql_fetch_array($qtipe)){
                                    ?>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" name="iCheck<?php echo $ooo; ?>" value="<?php echo $tipe['type_1']; ?>"><?php echo " ";echo  $tipe['type_1']; ?>
                                      </label>
                                    </div>
                                    <?php 
                                  }
                                } 
                                ?>
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
              <?php
            }
            ?> 
            <!-- panel single choice -->

            <!-- panel multiple choice -->
            <?php
            $multi=mysql_query("SELECT * From survey_question WHERE survey_name='$namesurvey' and survey_group='$grupn' and question_type='Multiple Choice' ");
            $check4=mysql_num_rows($multi);
            if ($check4>0){
              ?>
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width:5%; vertical-align:middle; text-align:center">No</th>
                            <th style="width:50%">Pertanyaan (Multiple Choice)</th>
                            <th style="width: 45% ;vertical-align:middle; text-align:center" >Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $mul=1;
                          $mol=1;
                          $mal=1;
                          $xx=1;
                          while($yes2 = mysql_fetch_array($multi)){
                            $quest3= "$yes2[question_detail]" ;
                            $question_type3="$yes2[question_type]";
                            $mols=$mol++;
                            $muls=$mul++;
                            $mals=$mal++;
                            $xxx=$xx++;
                            ?>
                            <tr>
                              <th scope="row" style="width:5%; vertical-align:middle; text-align:center"><?php echo $xxx;?> 
                              </th>
                              <td style="vertical-align:middle">
                                <?php echo $quest3; ?>
                              </td>
                              <td style="vertical-align:middle;">
                                <?php
                                $qtipe2=mysql_query("SELECT * FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_detail='$quest3';" );
                                if ($check4>0){
                                  $checks4=mysql_num_rows($qtipe2);


                                  while($tipe3 = mysql_fetch_array($qtipe2)){
                                    ?>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" name="multi-choice<?php echo $muls; ?>[]" class="flat" value="<?php echo $tipe3['type_1']; ?>"> <?php echo $tipe3['type_1']; ?> 
                                          <input type="text" name="question3<?php echo $mols; ?>" style="display:none" value="<?php echo $quest3; ?>">
                                          <input type="text" name="tipe3<?php echo $mals; ?>" style="display:none" value="<?php echo $question_type3; ?>">
                                        </label>
                                      </div>
                                    </div>
                                    <?php 
                                  }
                                } 
                                ?>
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
              <?php
            }

            ?>
            <!-- panel multiple choice-->

            <!-- panel ranking -->
            <?php
            $rank=mysql_query("SELECT * From survey_question WHERE survey_name='$namesurvey' and survey_group='$grupn' and question_type='Ranking' ");

            $check5=mysql_num_rows($rank);
            if ($check5>0){ ?>
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width:5%; vertical-align:middle; text-align:center">No</th>
                            <th style="width:50%">Pertanyaan (Ranking)</th>
                            <th style="width: 45% ;vertical-align:middle; text-align:center" >Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $rr=1;
                          while($yes3 = mysql_fetch_array($rank)){
                            $quest4= "$yes3[question_detail]" ;
                            $question_type4="$yes3[question_type]";
                            $rrr=$rr++;
                            ?>
                            <tr>
                              <th scope="row" style="width:5%; vertical-align:middle; text-align:center"><?php echo $ooo;?> 
                              </th>
                              <td style="vertical-align:middle">
                                <?php echo $quest4; ?>
                              </td>
                              <td style="vertical-align:middle;">
                                <?php
                              $qtipe2=mysql_query("SELECT * FROM q_type WHERE survey_name='$namesurvey' and group_name='$grupn' and question_detail='$quest4';" );
                              $check4=mysql_num_rows($qtipe2);
                              if ($check4>0){
                                while($tipe3 = mysql_fetch_array($qtipe2)){
                                  ?>
                                  <div class="col-md-12 col-sm-12 col-xs-12"  style="vertical-align:middle">


                                    <input type="text" name="question4<?php echo $rrr; ?>" style="display:none" value="<?php echo $quest4; ?>">
                                    <input type="text" name="tipe4<?php echo $rrr; ?>" style="display:none" value="<?php echo $question_type4; ?>">
                                    <div class="col-md-3 col-sm-3 col-xs-3" style="width:19%">
                                      <select name="rank<?php echo $rrr; ?>[]" class="form-control" id="pilihan"  placeholder="yes">
                                        <option id="opsi1" style="display: block" value="0"></option>
                                        <?php 
                                        $x=1;
                                        $y=1;
                                        while($x<=$check4){
                                          ?>
                                          <option id="opsi1" style="display: block" value="<?php echo $y++; ?>" ><?php echo $x++; ?></option>
                                          <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <a class="col-md-9 col-sm-9 col-xs-9"><?php echo $tipe3['type_1']; ?></a>
                                    <div class="x_content"></div>
                                  </div>

                                  <?php 
                                }
                              } 
                              ?>
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
              <?php
            }

            ?>
            <!-- panel ranking-->

            <!-- panel -->
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="x_content"></div>
                    <div class="x_content"></div>

                    <div class="form-group">
                      <div class="">
                        <button type="submit" name="submit" class="btn btn-primary" value="batal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- panel -->


          </form>


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
  <!-- Autosize -->
  <script src="../../vendors/autosize/dist/autosize.min.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="../../vendors/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="../../vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
  <!-- Parsley -->
  <script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../../build/js/custom.min.js"></script>
  <script type="text/javascript">
    <script type="text/javascript">
      function func1()
      {            
        document.getElementById("para").innerHTML=document.getElementById("textfield").value;
        document.getElementById("para").innerHTML=document.getElementById("textfield").value.replace(/\r\n|\r|\n/g,"<br />");
      }
    </script>
    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->
  </body>
  </html>

