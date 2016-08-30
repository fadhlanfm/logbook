<?php
include_once('Connection/conn.php');
session_start();

$query=mysqli_query($con,"SELECT * FROM survey_group WHERE status IN('Active','Default') and survey_name='".$_POST["survey_name"]."'");
$nama_survey=$_POST["survey_name"];



$b=1;
$cek2=mysqli_num_rows($query);
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
            <th class="column-title" style="vertical-align: middle; width: 10%; "> </th>
            <th class="column-title no-link last" style="vertical-align: middle; width: 20%; text-align: center;"><span class="nobr">Kelola</span>
            </th>
            <th class="bulk-actions" colspan="7" >
              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
          </tr>
        </thead>


        <tbody>
          <?php while($row = mysqli_fetch_array($query)){
            ?>
            <tr class="even pointer">
              <td class="a-center form-item form-type-checkbox form-item-node-types-forum" style="vertical-align: middle; width: 5%; text-align: center"><input type="checkbox" id="edit-node-types-forum" class="form-checkbox " name="node_types[]" value="<?php echo"$row[id_group]"; ?>"></td>
              <td class=" " style="vertical-align: middle; width: 5%; text-align: center;"><?php echo $b++; ?></td>
              <td class=" " style="vertical-align: middle; width: 60%;"><?php echo "$row[group_name]  ";?></td>
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
                <a href="edit_group.php?id=<?php echo"$row[id_group]"; ?>"><button type="button" class="btn btn-primary btn-xs" style="width: 30% ; font-size: 100%" >Edit</button></a>
                <a href="delete_group_.php?id=<?php echo"$row[id_group]"; ?>"><button type="button" class="btn btn-danger btn-xs" style="width: 30% ; font-size: 100%" >Hapus</button></a>
              </td>
            </tr>
            <?php 
          } ?>
        </tbody>
      </table>
    </div>

    <div class="form-item form-type-textfield form-item-count-checked-checkboxes" style="vertical-align:middle">
      <input type="text" name="survey-" class="form-control" style="display:none" value="<?php echo $nama_survey ?>">

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
} else {
  if ($nama_survey==''){ ?>
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

