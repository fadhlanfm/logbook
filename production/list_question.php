<?php
session_start();
include_once('Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");


if (isset($_SESSION["surveyname"]) && $_SESSION["surveyname"]!=null && $_SESSION["groupname"]!=null){
  $survey = $_SESSION["surveyname"]; 
  $grup = $_SESSION["groupname"]; 
} else {
  $survey=$_POST['survey'];
  $grup=$_POST['grup'];
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

$query=mysql_query("SELECT * FROM survey_question WHERE survey_name='$survey' and survey_group='$grup' and status IN('Active','default')");
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

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $survey ?> <small> Grup : <?php echo $grup ?></small></h2>
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
                 $a=1;
                 $cek1=mysql_num_rows($query);
                 if ($cek1>0){ ?>
                  <form method="post" name="myForm" action="list_question_setdefault.php" id="devel-generate-content-form" accept-charset="UTF-8" >
                    <div class="table-responsive">
                      <table  class="table table-hover">
                        <thead>
                          <tr class="headings">
                            <th style="vertical-align: middle; width: 5%; text-align: center;">
                              #
                            </th>
                            <th class="column-title" style="vertical-align: middle; width: 5%; text-align: center;">No </th>
                            <th class="column-title" style="vertical-align: middle; width: 50%; ">Soal Survey </th>
                            <th class="column-title" style="vertical-align: middle; width: 10%; "> </th>
                            <th class="column-title" style="vertical-align: middle; width: 10%; text-align: center;">Tipe Soal	</th>
                            <th class="column-title no-link last" style="vertical-align: middle; width: 20%; text-align: center;"><span class="nobr">Kelola</span>
                            </th>
                            <th class="bulk-actions" colspan="7" >
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php while($row = mysql_fetch_array($query)){
                           ?>
                           <tr class="even pointer">
                             <td class="a-center form-item form-type-checkbox form-item-node-types-forum" style="vertical-align: middle; width: 5%; text-align: center"><input type="checkbox" id="edit-node-types-forum" class="form-checkbox " name="node_types[]" value="<?php echo"$row[id_question]"; ?>"></td>
                             <td class=" " style="vertical-align: middle; width: 5%; text-align: center;"><?php echo $a++; ?></td>
                             <td class=" " style="vertical-align: middle; width: 50%;"><?php echo "$row[question_detail] "; ?></td>
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
                            <td class=" " style="vertical-align: middle; width: 10%; text-align: center;"><?php echo "$row[question_type]"; ?></td>
                            <td class=" last" style="vertical-align: middle; width: 20%; text-align: center;">
                              <a href="edit_question.php?id=<?php echo"$row[id_question]"; ?>"><button type="button" class="btn btn-primary btn-xs" style="width: 30% ; font-size: 100%" >Edit</button></a>
                              <a href="delete_question_.php?id=<?php echo"$row[id_question]"; ?>"><button type="button" class="btn btn-danger btn-xs" style="width: 30% ; font-size: 100%" >Hapus</button></a>
                            </td>
                          </tr>
                          <?php 
                        } ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="form-item form-type-textfield form-item-count-checked-checkboxes" style="vertical-align:middle">
                    <input type="text" name="survey-" class="form-control" style="display:none" value="<?php echo $survey ?>">

                    <input type="text" name="grup-" class="form-control" style="display:none" value="<?php echo $grup ?>">
                    <div class="popup" onclick="return validateForm()">

                      <input type="submit" name="submit" class="btn btn-link " style="vertical-align:middle; border: 1px solid white" value="Jadikan Default"/>
                      <span class="popuptext" id="myPopup">Silahan Pilih minimal 1</span>
                    </div>
                    <input type="submit" name="submit" class="btn btn-link " style="vertical-align:middle; border: 1px solid white" value="Reset"/>
                    <input readonly type="text" id="edit-count-checked-checkboxes" name="count-checked-checkboxes" value="0" size="60" maxlength="50" class="form-text required " style="width:30px; vertical-align:middle; text-align:center; border: 1px solid white"/>   soal dipilih
                  </div>
                </form>
                <?php

              }else { ?>
                <p align="center">Survey belum memiliki soal</p>
                <?php }?>

                <form  method="post" action="add_question2.php"  >
                 <input type="text" name="survey" class="form-control" style="display:none" value="<?php echo $survey ?>">
                 <input type="text" name="grup" class="form-control" style="display:none" value="<?php echo $grup ?>">
                 <div class="clearfix"></div>
                 <div class="form-group" >

                   <button class="btn btn-success" type="submit" style="width:20%; text-align:center" >Tambah Soal</button>

                 </div>

               </form>
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

<!-- PNotify -->
<script src="../vendors/pnotify/dist/pnotify.js"></script>
<script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>



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
</body>
</html>