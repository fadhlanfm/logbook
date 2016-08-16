<?php
session_start();
include_once('Connection/conn.php');

$query = mysql_query("SELECT * FROM Survey_list WHERE status='active'" );

if (isset($_SESSION["surveyname"]) && $_SESSION["surveyname"]!=null){
  $name = $_SESSION["surveyname"]; 
} else {
  $_SESSION['surveyname'] = '';
  $name = $_SESSION["surveyname"]; 
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
                  <h2>Pilih Survey <!-- <small>different form elements</small> --></h2>
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

                  <form id="demo-form2" data-parsley-validate method="post" action="check_survey_.php" class="form-horizontal form-label-left" >


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Survey</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="survey" class="form-control" id="pilihan" onchange="getGroup(this.value);" placeholder="yes" >
                          <option id="opsi1" style="display: block"><?php echo $name ?></option>
                          <option id="opsi2" style="display: none"></option>
                          <?php

                          $a=1;
                          $cek1=mysql_num_rows($query);
                          if ($cek1>0){ 
                            while($row = mysql_fetch_array($query)){
                              ?>
                              <option><?php echo $row['survey_name'] ?></option>
                              <?php 
                            } 
                          }else { 
                            ?>
                            <h4 align="center">Tidak ada Operasi yang belum dilakukan!</h4>
                            <?php 
                          } 
                          ?>
                        </select>
                      </div>
                    </div>


                  </form>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <!-- Select Survey -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>List Group <small></small></h2>
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

                <div class="x_content" id="pilihan2">

                  <?php
                  $sql = mysql_query("SELECT * FROM Survey_group WHERE survey_name='$name' and status IN('Active','Default')" );
                  $b=1;
                  $cek2=mysql_num_rows($sql);
                  if ($cek2>0){ 
                    ?>
                    <form method="post" name="myForm" action="list_group_setdefault.php" id="devel-generate-content-form" accept-charset="UTF-8" >
                      <div class="table-responsive">
                        <table  class="table table-hover">
                          <thead>
                            <tr class="headings">
                              <th style="vertical-align: middle; width: 5%; text-align: center;">
                                              #
                              </th>
                              <th class="column-title" style="vertical-align: middle; width: 5%; text-align: center;">No </th>
                              <th class="column-title" style="vertical-align: middle; width: 60%; ">Nama Grup </th>
                              <th class="column-title" style="vertical-align: middle; width: 10%; ">Nama Grup </th>
                              <th class="column-title no-link last" style="vertical-align: middle; width: 20%; text-align: center;"><span class="nobr">Kelola</span>
                              </th>
                              <th class="bulk-actions" colspan="7" >
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>


                          <tbody>
                            <?php while($rowx = mysql_fetch_array($sql)){
                              ?>
                              <tr class="even pointer">
                                <td class="a-center form-item form-type-checkbox form-item-node-types-forum" style="vertical-align: middle; width: 5%; text-align: center"><input type="checkbox" id="edit-node-types-forum" class="form-checkbox " name="node_types[]" value="<?php echo"$rowx[id_group]"; ?>"></td>
                                <td class=" " style="vertical-align: middle; width: 5%; text-align: center;"><?php echo $b++; ?></td>
                                <td class=" " style="vertical-align: middle; width: 60%;"><?php echo "$rowx[group_name] ";?></td>
                                <td class=" " style="vertical-align: middle; width: 10%;">
                                  <?php if("$row[status]"=="Default") {
                                    ?><input readonly type="text" value="Default" style="font-size: 90%; text-align:center; border: 1px solid #169F85;border-radius: 10px; height:80%; width: 75%;background-color: #26B99A; color:white; margin-left: 10px;">
                                    <?php 
                                  } 
                                  if("$row[status]"=="Active") {
                                    ?><input readonly type="text" value="Active" style="font-size: 90%; text-align:center; border: 1px solid lightgrey;border-radius: 10px; width:75%; height:80%; margin-left: 10px;"; >
                                    <?php 
                                  } ?>
                                </td>
                                <td class=" last" style="vertical-align: middle; width: 20%; text-align: center;">
                                  <a href="edit_group.php?id=<?php echo"$rowx[id_group]"; ?>"><button type="button" class="btn btn-primary" style="width: 40% ; font-size: 100%" >Edit</button></a>
                                  <a href="delete_group_.php?id=<?php echo"$rowx[id_group]"; ?>"><button type="button" class="btn btn-danger" style="width: 40% ; font-size: 100%" >Hapus</button></a>
                                </td>
                              </tr>
                              <?php 
                            } ?>
                          </tbody>
                        </table>
                      </div>

                      <div class="form-item form-type-textfield form-item-count-checked-checkboxes" style="vertical-align:middle">
                        <input type="text" name="survey-" class="form-control" style="display:none" value="<?php echo $name ?>">

                        <input type="text" name="grup-" class="form-control" style="display:none" value="<?php echo $grup ?>">
                        <div class="popup" onclick="return validateForm()">

                          <input type="submit" name="submit" class="btn btn-link " style="vertical-align:middle; border: 1px solid white" value="Jadikan Default"/>
                          <span class="popuptext" id="myPopup">Silahan Pilih minimal 1</span>
                        </div>
                        <input type="submit" name="submit" class="btn btn-link " style="vertical-align:middle; border: 1px solid white" value="Reset"/>
                        <input readonly type="text" id="edit-count-checked-checkboxes" name="count-checked-checkboxes" value="0" size="60" maxlength="50" class="form-text required " style="width:30px; vertical-align:middle; text-align:center; border: 1px solid white"/>   soal dipilih
                      </div>
                    </form>
                    <form  method="post" action="add_group.php?id=<?php echo "$nama_survey" ?>"  >
                      <input type="text" name="survey" class="form-control" style="display:none" value="<?php echo $survey ?>">
                      <input type="text" name="grup" class="form-control" style="display:none" value="<?php echo $grup ?>">
                      <div class="clearfix"></div>
                      <div class="form-group" >

                        <button class="btn btn-success" type="submit" style="width:20%; text-align:center" >Tambah Grup</button>
                      </div>
                    </form>
                    <?php

                  } 
                  else {
                    if ($name==''){ ?>
                      <p align="center" id="nodata">Silahkan memilih survey untuk melanjutkan</p>
                      <?php 
                    } else { ?>
                      <p align="center" id="nodata">Survey belum memiliki grup</p>
                      <form  method="post" action="add_group.php?id=<?php echo "$nama_survey" ?>"  >
                        <input type="text" name="survey" class="form-control" style="display:none" value="<?php echo $survey ?>">
                        <input type="text" name="grup" class="form-control" style="display:none" value="<?php echo $grup ?>">
                        <div class="clearfix"></div>
                        <div class="form-group" >

                          <button class="btn btn-success" type="submit" style="width:20%; text-align:center" >Tambah Grup</button>
                        </div>
                      </form>

                      <?php 
                    }
                  }?> 
                  
                  
                </div>
              </div>
            </div>
            <!-- Select Survey -->
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

  <!-- getGroup -->
  <script>
    function getGroup(val){
      $.ajax({
        type: "POST",
        url: "check_group_.php",
        data: 'survey_name='+val,
        success: function(data){
          $("#pilihan2").html(data);
        }
      })

      document.getElementById("opsi1").style.display = "none";
      document.getElementById("opsi2").style.display = "block"; 
      <?php unset($_SESSION["surveyname"]);  ?>       
    }
  </script>
  <!-- getGroup -->

  <!-- autosum -->
  <script type="text/javascript">
   $(document).ready(function(){

    var $checkboxes = $('#devel-generate-content-form td input[type="checkbox"]');

    $checkboxes.change(function(){
      var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
          // $('#count-checked-checkboxes').text(countCheckedCheckboxes);

          $('#edit-count-checked-checkboxes').val(countCheckedCheckboxes);
        });

  });
</script>
<script>
  function validateForm() {
    var x = document.forms["myForm"]["edit-count-checked-checkboxes"].value;
    if (x == 0) { 
     var popup = document.getElementById('myPopup');
     popup.classList.toggle('show');
     return false;
   }
   setTimeout(function(){ PNotify.close() }, 3000);
 }
</script>
<style>
  /* Popup container - can be anything you want */
  .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* The actual popup */
  .popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
  }

  /* Popup arrow */
  .popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }

  /* Toggle this class - hide and show the popup */
  .show {
    visibility: visible !important;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
  }

  /* Add animation (fade in the popup) */
  @-webkit-keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }

  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
  }
</style>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>