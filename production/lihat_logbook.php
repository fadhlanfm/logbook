<!-- QUERIES -->
<?php
session_start();
include_once('../connect_db.php');
$id = $_GET['id'];
$query = "SELECT * FROM logbook WHERE id = '$id'";
  //execute the query
$result = $db->query( $query );
if (!$result)
{
  die("could not query the database: <br />".$db->error);
}
$row = $result->fetch_object();

$coba = $_SESSION['id'];
$query2 = "SELECT * FROM user WHERE username = '$coba'";
    //execute the query
$result2 = $db->query( $query2 );
if (!$result2)
{
  die("could not query the database: <br />".$db->error);
}
$row2 = $result2->fetch_object();
?>

<?php
if(isset($_SESSION['role']) && $_SESSION['role'] == -1)
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
  header ('Location: ../../page_4033.php');
  exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="../../assets/gi.ico" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Detail Program</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" onload="setInterval('displayServerTime()', 1000);">


  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><span>Garuda Indonesia</span></a>
          </div>

          <div class="clearfix"></div>

          <?php include ('sidebar.php'); ?>

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav hidden-print">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo''.$row2->username.''; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
              <li role="presentation">
                <a href="javascript:window.print()">
                  <i class="fa fa-print"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="x_panel">
          <div class="x_title">
            <h2>Detail Program </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a><button class="btn btn-primary btn-xs" id="clickme">Lihat Evaluasi</button></a>
              </li>
              <li><a><button onclick="goBack()" class="btn btn-primary btn-xs">Kembali</button></a>
              </li>

            </ul>
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <tr>
                <th colspan="2" class="center"><h4>Deskripsi Program</h4></th>
              </tr>
              <tr>
                <th>Kode Unik Log Book</th>
                <td><?php echo''.$row->id.'';?></td>
              </tr>
              <tr>
                <th>Kode Unit</th>
                <td><?php echo''.$row->kode_unit.'';?></td>
              </tr>
              <tr>
                <th>Nama Program</th>
                <td><?php echo''.$row->nama_program.'';?></td>
              </tr>
              <tr>
                <th>Deskripsi Program</th>
                <td><?php echo''.$row->deskripsi_program.'';?></td>
              </tr>
              <tr>
                <th>Start</th>
                <td><?php echo''.$row->start.'';?></td>
              </tr>   
              <tr>
                <th>End</th>
                <td><?php echo''.$row->end.'';?></td>
              </tr>
            </table>

            <br>

            <?php 
            if($row->target_flyhi1!==''){
              $jml_flyhi=2;
            }elseif($row->target_flyhi2!==''){
              $jml_flyhi=3;
            }elseif($row->target_flyhi3!==''){
              $jml_flyhi=4;
            }elseif($row->target_flyhi4!==''){
              $jml_flyhi=5;
            }else{
              $jml_flyhi=0;
            }
            ?>

            <table class="table table-striped table-bordered">
              <tr>
                <th colspan="2" class="center"><h4>Tujuan & Target Program</h4></th>
              </tr>
              <tr>
                <td rowspan="6">Merubah Perilaku</td>
              </tr>
              <?php if($row->tujuan_merubah_perilaku=='F (Efficient & Effective)'){ ?>
                <tr>
                  <td><strong><span class="fa fa-check-circle"></span>&ensp;F (Efficient & Effective)</strong><?php if($row->target_flyhi1!==''){
                    echo '<br>Target: &ensp;1. '.$row->target_flyhi1.' '.$row->satuan_flyhi1;
                  }if($row->target_flyhi2!==''){
                    echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. '.$row->target_flyhi2.' '.$row->satuan_flyhi2;
                  }if($row->target_flyhi3!==''){
                    echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3. '.$row->target_flyhi3.' '.$row->satuan_flyhi3;
                  }if($row->target_flyhi4!==''){
                    echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4. '.$row->target_flyhi4.' '.$row->satuan_flyhi4;
                  }
                  ?></td></tr>
                  <tr>
                    <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;L (Loyalty)</td>
                  </tr>
                  <tr> 
                    <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;Y (Customer Centricity)</td>
                  </tr>
                  <tr>
                    <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;H (Honesty & Openness)</td>
                  </tr>
                  <tr>
                    <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;I (Integrity)</td>
                  </tr>
                  <?php }elseif($row->tujuan_merubah_perilaku=='L (Loyalty)'){ ?>
                    <tr>
                      <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;F (Efficient & Effective)</td>
                    </tr>
                    <tr>
                      <td><strong><span class="fa fa-check-circle"></span>&ensp;L (Loyalty)</strong><?php if($row->target_flyhi1!==''){
                        echo '<br>Target: &ensp;1. '.$row->target_flyhi1.' '.$row->satuan_flyhi1;
                      }if($row->target_flyhi2!==''){
                        echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. '.$row->target_flyhi2.' '.$row->satuan_flyhi2;
                      }if($row->target_flyhi3!==''){
                        echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3. '.$row->target_flyhi3.' '.$row->satuan_flyhi3;
                      }if($row->target_flyhi4!==''){
                        echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4. '.$row->target_flyhi4.' '.$row->satuan_flyhi4;
                      }
                      ?></td>
                    </tr>
                    <tr> 
                      <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;Y (Customer Centricity)</td>
                    </tr>
                    <tr>
                      <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;H (Honesty & Openness)</td>
                    </tr>
                    <tr>
                      <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;I (Integrity)</td>
                    </tr>
                    <?php }elseif($row->tujuan_merubah_perilaku=='Y (Customer Centricity)'){ ?>
                      <tr>
                        <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;F (Efficient & Effective)</td>
                      </tr>
                      <tr>
                        <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;L (Loyalty)</td>
                      </tr>
                      <tr> 
                        <td><strong><span class="fa fa-check-circle"></span>&ensp;Y (Customer Centricity)</strong><?php if($row->target_flyhi1!==''){
                          echo '<br>Target: &ensp;1. '.$row->target_flyhi1.' '.$row->satuan_flyhi1;
                        }if($row->target_flyhi2!==''){
                          echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. '.$row->target_flyhi2.' '.$row->satuan_flyhi2;
                        }if($row->target_flyhi3!==''){
                          echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3. '.$row->target_flyhi3.' '.$row->satuan_flyhi3;
                        }if($row->target_flyhi4!==''){
                          echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4. '.$row->target_flyhi4.' '.$row->satuan_flyhi4;
                        }
                        ?></td>
                      </tr>
                      <tr>
                        <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;H (Honesty & Openness)</td>
                      </tr>
                      <tr>
                        <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;I (Integrity)</td>
                      </tr>
                      <?php }elseif($row->tujuan_merubah_perilaku=='H (Honesty & Openness)'){ ?>
                        <tr>
                          <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;F (Efficient & Effective)</td>
                        </tr>
                        <tr>
                          <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;L (Loyalty)</td>
                        </tr>
                        <tr> 
                          <td  style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;Y (Customer Centricity)</td>
                        </tr>
                        <tr>
                          <td><strong><span class="fa fa-check-circle"></span>&ensp;H (Honesty & Openness)</strong><?php if($row->target_flyhi1!==''){
                            echo '<br>Target: &ensp;1. '.$row->target_flyhi1.' '.$row->satuan_flyhi1    ;
                          }if($row->target_flyhi2!==''){
                            echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. '.$row->target_flyhi2.' '.$row->satuan_flyhi2;
                          }if($row->target_flyhi3!==''){
                            echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3. '.$row->target_flyhi3.' '.$row->satuan_flyhi3;
                          }if($row->target_flyhi4!==''){
                            echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4. '.$row->target_flyhi4.' '.$row->satuan_flyhi4;
                          }
                          ?></td>
                        </tr>
                        <tr>
                          <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;I (Integrity)</td>
                        </tr>
                        <?php }else{?>
                          <tr>
                            <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;F (Efficient & Effective)</td>
                          </tr>
                          <tr>
                            <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;L (Loyalty)</td>
                          </tr>
                          <tr> 
                            <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;Y (Customer Centricity)</td>
                          </tr>
                          <tr>
                            <td style="color:#DCDCDC"><span class="fa fa-circle-o"></span>&ensp;H (Honesty & Openness)</td>
                          </tr>
                          <tr>
                           <td><strong><span class="fa fa-check-circle"></span>&ensp;I (Integrity)</strong>
                            <?php if($row->target_flyhi1!==''){
                              echo '<br>Target: &ensp;1. '.$row->target_flyhi1.' '.$row->satuan_flyhi1;
                            }if($row->target_flyhi2!==''){
                              echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. '.$row->target_flyhi2.' '.$row->satuan_flyhi2;
                            }if($row->target_flyhi3!==''){
                              echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3. '.$row->target_flyhi3.' '.$row->satuan_flyhi3;
                            }if($row->target_flyhi4!==''){
                              echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4. '.$row->target_flyhi4.' '.$row->satuan_flyhi4;
                            }
                            ?>
                          </td>
                        </tr>
                        <?php } ?>
                        <?php 
                        if($row->aktifitas0!==''){
                          $jml_aktifitas=2;
                        }
                        if($row->aktifitas1!==''){
                          $jml_aktifitas=3;
                        }
                        if($row->aktifitas2!==''){
                          $jml_aktifitas=4;
                        }
                        if($row->aktifitas3!==''){
                          $jml_aktifitas=5;
                        }
                        if($row->aktifitas4!==''){
                          $jml_aktifitas=6;
                        }
                        ?>
                        <tr>
                          <th rowspan="<?php echo $jml_aktifitas; ?>">Nilai Tambah Bagi Perusahaan</th>
                          <?php 
                          if ($row->aktifitas0!=='') {
                            echo '<tr><td>1.&ensp;'.$row->aktifitas0.' | '.$row->target0.' '.$row->satuan0.'</td></tr>';
                          }
                          if($row->aktifitas1!=='') {
                            echo '<tr><td>2.&ensp;'.$row->aktifitas1.' | '.$row->target1.' '.$row->satuan1.'</td></tr>';
                          }
                          if($row->aktifitas2!=='') {
                            echo '<tr><td>3.&ensp;'.$row->aktifitas2.' | '.$row->target2.' '.$row->satuan2.'</td></tr>';
                          }
                          if($row->aktifitas3!=='') {
                            echo '<tr><td>4.&ensp;'.$row->aktifitas3.' | '.$row->target3.' '.$row->satuan3.'</td></tr>';
                          }
                          if($row->aktifitas4!=='') {
                            echo '<tr><td>5.&ensp;'.$row->aktifitas4.' | '.$row->target4.' '.$row->satuan4.'</td></tr>';
                          }
                          ?>
                        </tr>   
                        <tr>
                          <th rowspan="5">Pendorong Tercapainya Kinerja Terbaik</th>
                          <?php if ($row->tujuan_capai_kinerja_0==1) { ?>
                            <tr><td><strong><span class="fa fa-check-square-o"></span>&ensp;Financial</strong><?php 
                              if ($row->target_financial1!=='') {
                                echo '<br>Target: 1.&ensp;'.$row->target_financial1.' '.$row->satuan_financial1;
                              }
                              if ($row->target_financial2!=='') {
                                echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2.&ensp;'.$row->target_financial2.' '.$row->satuan_financial2;
                              }
                              if ($row->target_financial3!=='') {
                                echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3.&ensp;'.$row->target_financial3.' '.$row->satuan_financial3;
                              }
                              if ($row->target_financial4!=='') {
                                echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4.&ensp;'.$row->target_financial4.' '.$row->satuan_financial4;
                              }
                              ?></td></tr>
                              
                              <?php }else{ ?>
                                <tr><td style="color:#DCDCDC"><span class="fa fa-square-o"></span>&ensp;Financial</td></tr>
                                <?php } ?>
                                <?php if ($row->tujuan_capai_kinerja_1==1) { ?>
                                  <tr><td><strong><span class="fa fa-check-square-o"></span>&ensp;Customer</strong><?php 
                                    if ($row->target_customer1!=='') {
                                      echo '<br>Target: 1.&ensp;'.$row->target_customer1.' '.$row->satuan_customer1;
                                    }
                                    if ($row->target_customer2!=='') {
                                      echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2.&ensp;'.$row->target_customer2.' '.$row->satuan_customer2;
                                    }
                                    if ($row->target_customer3!=='') {
                                      echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3.&ensp;'.$row->target_customer3.' '.$row->satuan_customer3;
                                    }
                                    if ($row->target_customer4!=='') {
                                      echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4.&ensp;'.$row->target_customer4.' '.$row->satuan_customer4;
                                    }                ?></td></tr>
                                    <?php }else{ ?>
                                      <tr><td style="color:#DCDCDC"><span class="fa fa-square-o"></span>&ensp;Customer</td></tr>
                                      <?php } ?>
                                      <?php if ($row->tujuan_capai_kinerja_2==1) { ?>
                                        <tr><td><strong><span class="fa fa-check-square-o"></span>&ensp;Internal Business Process</strong><?php 
                                          if ($row->target_ibp1!=='') {
                                            echo '<br>Target: 1.&ensp;'.$row->target_ibp1.' '.$row->satuan_ibp1;
                                          }
                                          if ($row->target_ibp2!=='') {
                                            echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2.&ensp;'.$row->target_ibp2.' '.$row->satuan_ibp2;
                                          }
                                          if ($row->target_ibp3!=='') {
                                            echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3.&ensp;'.$row->target_ibp3.' '.$row->satuan_ibp3;
                                          }
                                          if ($row->target_ibp4!=='') {
                                            echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4.&ensp;'.$row->target_ibp4.' '.$row->satuan_ibp4;
                                          }
                                          ?></td></tr>
                                          <?php }else{ ?>
                                            <tr><td style="color:#DCDCDC"><span class="fa fa-square-o"></span>&ensp;Internal Business Process</td></tr>
                                            <?php } ?>
                                            <?php if ($row->tujuan_capai_kinerja_3==1) { ?>
                                              <tr><td><strong><span class="fa fa-check-square-o"></span>&ensp;Learning & Growth</strong><?php 
                                                if ($row->target_lg1!=='') {
                                                  echo '<br>Target: 1.&ensp;'.$row->target_lg1.' '.$row->satuan_lg1;
                                                }
                                                if ($row->target_lg2!=='') {
                                                  echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2.&ensp;'.$row->target_lg2.' '.$row->satuan_lg2;
                                                }
                                                if ($row->target_lg3!=='') {
                                                  echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3.&ensp;'.$row->target_lg3.' '.$row->satuan_lg3;
                                                }
                                                if ($row->target_lg4!=='') {
                                                  echo '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;4.&ensp;'.$row->target_lg4.' '.$row->satuan_lg4;
                                                }
                                                ?></td></tr>
                                                <?php }else{ ?>
                                                  <tr><td style="color:#DCDCDC"><span class="fa fa-square-o"></span>&ensp;Learning & Growth</td></tr>
                                                  <?php } ?>
                                                </tr>
                                              </table>

                                              <br>

                                              <table class="table table-striped table-bordered">
                                                <tr>
                                                  <th colspan="3" class="center"><h4>Metode Monitoring & Reinforcement</h4></th>
                                                </tr>
                                                <tr>
                                                  <th>Metode Monitoring</th>
                                                  <td><?php echo''.$row->metode_monitoring.'';?></td>
                                                  <?php
                                                  if ($row->type_monitoring!=='' && $row->size_monitoring>=0) {
                                                    echo '<td><a href="uploads/'.$row->file_monitoring.'" download><i class="fa fa-cloud-download"></i> '.$row->file_monitoring.'</a></td>';
                                                  }else{
                                                    echo '<td>-</td>';
                                                  }
                                                  ?>
                                                </tr>
                                                <tr>
                                                  <th>Metode Enforcement Positif</th>
                                                  <td><?php echo''.$row->metode_enforcement_positif.'';?></td>
                                                  <?php
                                                  if ($row->type_positif!=='' && $row->size_positif>=0) {
                                                    echo '<td><a href="uploads/'.$row->file_positif.'" download><i class="fa fa-cloud-download"></i> '.$row->file_positif.'</a></td>';
                                                  }else{
                                                    echo '<td>-</td>';
                                                  }
                                                  ?>
                                                </tr>
                                                <tr>
                                                  <th>Metode Enforcement Negatif</th>
                                                  <td><?php echo''.$row->metode_enforcement_negatif.'';?></td>
                                                  <?php
                                                  if ($row->type_negatif!=='' && $row->size_negatif>=0) {
                                                    echo '<td><a href="uploads/'.$row->file_negatif.'" download><i class="fa fa-cloud-download"></i> '.$row->file_negatif.'</a></td>';
                                                  }else{
                                                    echo '<td>-</td>';
                                                  }
                                                  ?>
                                                </tr>
                                              </table>

                                              <br>

                                              <table class="table table-striped table-bordered">
                                                <tr>
                                                  <th colspan="2" class="center"><h4>Change Agent Team</h4></th>
                                                </tr>
                                                <tr>
                                                  <th rowspan="2">Ketua</th>
                                                  <td><?php echo''.$row->nama_ketua.'';?></td>
                                                  <tr>
                                                    <td><?php echo''.$row->email_ketua.'';?></td>
                                                  </tr>
                                                </tr>
                                                <tr>
                                                  <th rowspan="2">Sekretaris & Bendahara</th>
                                                  <td><?php echo''.$row->nama_sekre_bendahara.'';?></td>
                                                  <tr>
                                                    <td><?php echo''.$row->email_sekre_bendahara.'';?></td>
                                                  </tr>
                                                </tr>
                                                <?php if($row->nama_0!=='' || $row->posisi_0!==''){ ?>
                                                  <tr>
                                                    <th rowspan="2"><?php echo''.$row->posisi_0.'';?></th>
                                                    <td><?php echo''.$row->nama_0.'';?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo''.$row->email_0.'';?></td>
                                                  </tr>
                                                  <?php } 
                                                  if($row->nama_1!==''){ ?>
                                                    <tr>
                                                      <th rowspan="2"><?php echo''.$row->posisi_1.'';?></th>
                                                      <td><?php echo''.$row->nama_1.'';?></td>
                                                      <tr>
                                                        <td><?php echo''.$row->email_1.'';?></td>
                                                      </tr>
                                                    </tr>
                                                    <?php } 
                                                    if($row->nama_2!==''){ ?>
                                                      <tr>
                                                        <th rowspan="2"><?php echo''.$row->posisi_2.'';?></th>
                                                        <td><?php echo''.$row->nama_2.'';?></td>
                                                        <tr>
                                                          <td><?php echo''.$row->email_2.'';?></td>
                                                        </tr>
                                                      </tr>
                                                      <?php } 
                                                      if($row->nama_3!==''){ ?>
                                                        <tr>
                                                          <th rowspan="2"><?php echo''.$row->posisi_3.'';?></th>
                                                          <td><?php echo''.$row->nama_3.'';?></td>
                                                          <tr>
                                                            <td><?php echo''.$row->email_3.'';?></td>
                                                          </tr>
                                                        </tr>
                                                        <?php } 
                                                        if($row->nama_4!==''){ ?>
                                                          <tr>
                                                            <th rowspan="2"><?php echo''.$row->posisi_4.'';?></th>
                                                            <td><?php echo''.$row->nama_4.'';?></td>
                                                            <tr>
                                                              <td><?php echo''.$row->email_4.'';?></td>
                                                            </tr>
                                                          </tr>
                                                          <?php } 
                                                          if($row->nama_5!==''){ ?>
                                                            <tr>
                                                              <th rowspan="2"><?php echo''.$row->posisi_5.'';?></th>
                                                              <td><?php echo''.$row->nama_5.'';?></td>
                                                              <tr>
                                                                <td><?php echo''.$row->email_5.'';?></td>
                                                              </tr>
                                                            </tr>
                                                            <?php } 
                                                            if($row->nama_6!==''){ ?>
                                                              <tr>
                                                                <th rowspan="2"><?php echo''.$row->posisi_6.'';?></th>
                                                                <td><?php echo''.$row->nama_6.'';?></td>
                                                                <tr>
                                                                  <td><?php echo''.$row->email_6.'';?></td>
                                                                </tr>
                                                              </tr>
                                                              <?php } 
                                                              if($row->nama_5!==''){ ?>
                                                                <tr>
                                                                  <th rowspan="2"><?php echo''.$row->posisi_7.'';?></th>
                                                                  <td><?php echo''.$row->nama_7.'';?></td>
                                                                  <tr>
                                                                    <td><?php echo''.$row->email_7.'';?></td>
                                                                  </tr>
                                                                </tr>
                                                                <?php } ?>
                                                              </table>

                                                              <br>
                                                              <form action="post_komentar_logbook.php" method="POST">
                                                                <input <input type="text" name="id" readonly value="<?php if (isset($row->id)) {echo $row->id;} else {echo '';}?>">
                                                                <label for="deskripsi">Evaluasi Program</label>
                                                                <div class="input-field col s12">
                                                                  <textarea id="deskripsi" class="form-control" placeholder="<?php if ($row->komentar!=='') {echo $row->komentar;} else {echo '';}?>" name="komentar" ></textarea>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12 "><br>
                                                                 <button type="submit" value="Submit" class="btn btn-success">Submit</button>
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
                                                    Corporate Culture Information Systems - GA
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
                                            <!-- Chart.js -->
                                            <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
                                            <!-- gauge.js -->
                                            <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
                                            <!-- bootstrap-progressbar -->
                                            <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                                            <!-- iCheck -->
                                            <script src="../vendors/iCheck/icheck.min.js"></script>
                                            <!-- Skycons -->
                                            <script src="../vendors/skycons/skycons.js"></script>
                                            <!-- Flot -->
                                            <script src="../vendors/Flot/jquery.flot.js"></script>
                                            <script src="../vendors/Flot/jquery.flot.pie.js"></script>
                                            <script src="../vendors/Flot/jquery.flot.time.js"></script>
                                            <script src="../vendors/Flot/jquery.flot.stack.js"></script>
                                            <script src="../vendors/Flot/jquery.flot.resize.js"></script>
                                            <!-- Flot plugins -->
                                            <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
                                            <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
                                            <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
                                            <!-- DateJS -->
                                            <script src="../vendors/DateJS/build/date.js"></script>
                                            <!-- JQVMap -->
                                            <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
                                            <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
                                            <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                                            <!-- bootstrap-daterangepicker -->
                                            <script src="../js/moment/moment.min.js"></script>
                                            <script src="../js/datepicker/daterangepicker.js"></script>

                                            <!-- Custom Theme Scripts -->
                                            <script src="../build/js/custom.min.js"></script>

                                            <!-- /JQVMap -->

                                            <!-- Skycons -->
                                            <script>
                                              function goBack() {
                                                window.history.back();
                                              }

                                              $(document).ready(function() {
                                                var icons = new Skycons({
                                                  "color": "#73879C"
                                                }),
                                                list = [
                                                "clear-day", "clear-night", "partly-cloudy-day",
                                                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                                "fog"
                                                ],
                                                i;

                                                for (i = list.length; i--;)
                                                  icons.set(list[i], list[i]);

                                                icons.play();
                                              });
                                            </script>
                                            <!-- /Skycons -->

                                            <!-- Doughnut Chart -->
                                            <script>

                                              $(document).ready(function (){
                                                $("#clickme").click(function (){
                                                  $('html, body').animate({
                                                    scrollTop: $("#deskripsi").offset().top
                                                  }, 500);
                                                });
                                              });

                                              $(document).ready(function(){
                                                var options = {
                                                  legend: false,
                                                  responsive: false
                                                };

                                                new Chart(document.getElementById("canvas1"), {
                                                  type: 'doughnut',
                                                  tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                                  data: {
                                                    labels: [
                                                    "Economy Class",
                                                    "Business Class",
                                                    "First Class"
                                                    ],
                                                    datasets: [{
                                                      data: [3412, 768, 475],
                                                      backgroundColor: [
                                                      "#9B59B6",
                                                      "#26B99A",
                                                      "#3498DB"
                                                      ],
                                                      hoverBackgroundColor: [
                                                      "#B370CF",
                                                      "#36CAAB",
                                                      "#49A9EA"
                                                      ]
                                                    }]
                                                  },
                                                  options: options
                                                });
                                              });
                                            </script>
                                            <!-- /Doughnut Chart -->

                                            <!-- bootstrap-daterangepicker -->
                                            <script>
                                              $(document).ready(function() {

                                                var cb = function(start, end, label) {
                                                  console.log(start.toISOString(), end.toISOString(), label);
                                                  $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                                };

                                                var optionSet1 = {
                                                  startDate: moment().subtract(29, 'days'),
                                                  endDate: moment(),
                                                  minDate: '01/01/2012',
                                                  maxDate: '12/31/2015',
                                                  dateLimit: {
                                                    days: 60
                                                  },
                                                  showDropdowns: true,
                                                  showWeekNumbers: true,
                                                  timePicker: false,
                                                  timePickerIncrement: 1,
                                                  timePicker12Hour: true,
                                                  ranges: {
                                                    'Today': [moment(), moment()],
                                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                                  },
                                                  opens: 'left',
                                                  buttonClasses: ['btn btn-default'],
                                                  applyClass: 'btn-small btn-primary',
                                                  cancelClass: 'btn-small',
                                                  format: 'MM/DD/YYYY',
                                                  separator: ' to ',
                                                  locale: {
                                                    applyLabel: 'Submit',
                                                    cancelLabel: 'Clear',
                                                    fromLabel: 'From',
                                                    toLabel: 'To',
                                                    customRangeLabel: 'Custom',
                                                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                                    firstDay: 1
                                                  }
                                                };
                                                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                                                $('#reportrange').daterangepicker(optionSet1, cb);
                                                $('#reportrange').on('show.daterangepicker', function() {
                                                  console.log("show event fired");
                                                });
                                                $('#reportrange').on('hide.daterangepicker', function() {
                                                  console.log("hide event fired");
                                                });
                                                $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                                                  console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                                                });
                                                $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                                                  console.log("cancel event fired");
                                                });
                                                $('#options1').click(function() {
                                                  $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                                                });
                                                $('#options2').click(function() {
                                                  $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                                                });
                                                $('#destroy').click(function() {
                                                  $('#reportrange').data('daterangepicker').remove();
                                                });
                                              });
                                            </script>
                                            <!-- /bootstrap-daterangepicker -->

                                            <!-- gauge.js -->
                                            <script>
                                              var opts = {
                                                lines: 12,
                                                angle: 0,
                                                lineWidth: 0.4,
                                                pointer: {
                                                  length: 0.75,
                                                  strokeWidth: 0.042,
                                                  color: '#1D212A'
                                                },
                                                limitMax: 'false',
                                                colorStart: '#1ABC9C',
                                                colorStop: '#1ABC9C',
                                                strokeColor: '#F0F3F3',
                                                generateGradient: true
                                              };
                                              var target = document.getElementById('foo'),
                                              gauge = new Gauge(target).setOptions(opts);

                                              gauge.maxValue = 6000;
                                              gauge.animationSpeed = 32;
                                              gauge.set(3200);
                                              gauge.setTextField(document.getElementById("gauge-text"));
                                            </script>
                                            <!-- /gauge.js -->

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
