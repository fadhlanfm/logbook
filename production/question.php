<?php
session_start();
include_once('Connection/conn.php');
$query = mysql_query("SELECT * FROM Survey_list WHERE status='active'" );


if (isset($_SESSION["surveyname"]) && $_SESSION["surveyname"]!=null && $_SESSION["groupname"]!=null){
  unset($_SESSION["surveyname"]);
} else {

}
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
            <!-- Select survey-->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <h2>List Pertanyaan<!-- <small>different form elements</small> --></h2>
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

                  <form id="demo-form2" data-parsley-validate method="post" action="list_question.php" class="form-horizontal form-label-left" >


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Survey</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="survey" class="form-control" id="pilihan" onchange="getGroup(this.value);" placeholder="yes">
                          <option id="opsi1" style="display: block" >Pilih Survey...</option>
                          <?php

                          $a=1;
                          $cek1=mysql_num_rows($query);
                          if ($cek1>0){ 
                            while($row = mysql_fetch_array($query)){
                              ?>
                              <option <?php echo $row['survey_name'] ?>><?php echo $row['survey_name'] ?></option>
                              <?php 
                            } }else { ?>
                              <h4 align="center">Tidak ada Operasi yang belum dilakukan!</h4>
                              <?php } 
                              ?>
                            </select>
                          </div>
                        </div>  
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Grup</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="grup" class="form-control" id="pilihan2"  placeholder="yes" style="display: none" onchange="getButton(this.value);">
                              <option id="opsi1" ></option>
                            </select>

                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="grup" name="grup" disabled="disabled" class="form-control col-md-7 col-xs-12" placeholder="  Pilih grup..." >
                          </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button name="submit" id="disable" type="submit" class="btn btn-default" value="simpan" disabled>Lanjut</button>
                            <button name="submit" id="open" style="display:none" type="submit" class="btn btn-success" value="simpan" >Lanjut</button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>

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

      <!-- getGroup -->
      <script>
        function getGroup(val){
          $.ajax({
            type: "POST",
            url: "check_question_.php",
            data: 'survey_name='+val,
            success: function(data){
              $("#pilihan2").html(data);
            }

          })
          document.getElementById('grup').style.display = "none"; 
          document.getElementById('pilihan2').style.display = "block";     
        }
      </script>
      <!-- getGroup -->

      <!-- getButton -->
      <script>
        function getButton(val){

          document.getElementById('disable').style.display = "none"; 
          document.getElementById('open').style.display = "block";     
        }
      </script>
      <!-- getButton -->

      <!-- Custom Theme Scripts -->
      <script src="../build/js/custom.js"></script>
    </body>
    </html>
