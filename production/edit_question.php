<?php
session_start();

include_once('Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");

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
$id=$_GET['id'];  
$sql = mysql_query("SELECT * FROM survey_question WHERE id_question='$id';");
$row = mysql_fetch_array($sql);
$nama= $row['survey_name'];
$grup= $row['survey_group'];
$detail= $row['question_detail'];
$sqls = mysql_query("SELECT * FROM q_type WHERE survey_name='$nama' and group_name='$grup' and question_detail='$detail';" );
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
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Soal <!-- <small>different form elements</small> --></h2>
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
                  <br />
                  <form id="demo-form2" data-parsley-validate method="post" action="edit_question_.php" class="form-horizontal form-label-left" >

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Survey <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12"  readonly="readonly" value="<?php echo $row['survey_name'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Grup <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="grup" name="grup" class="form-control col-md-7 col-xs-12"  readonly="readonly" value="<?php echo $row['survey_group'] ?>">
                      </div>
                    </div>


                    <!-- <div class="clone"> -->
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Soal <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="desc" name="hobby" class="resizable_textarea form-control input" value=""><?php echo $row['question_detail'] ?></textarea>
                      </div>
                    </div>
                    <?php
                    if ($row['question_type']=="Single Choice") { ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Soal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="hobby2" class="form-control input" id="pilihan" onchange="return picture();">
                            <option id="" value="">Pilih Survey...</option>
                            <option id="single" value="1" selected>Single Choice</option>
                            <option id="multi" value="2" >Multiple Choice</option>
                            <option id="rank" value="3">Ranking</option>
                            <option id="free" value="4">Free Text</option>
                            <option id="free" value="5">Likert Scale</option>
                            <option id="free" value="6">Forced Choice</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"  id="pilihan2" style="">
                          <?php
                          
                          $b=1;
                          $cek2=mysql_num_rows($sqls);
                          if ($cek2>0){ 
                            ?>
                            <label class="control-label">Pilihan Jawaban</label>
                            <div></br></div>
                            <?php  while($rows = mysql_fetch_array($sqls)){
                              ?>
                              <div class="clone">

                                <input type="text" id="desc" name="tipe[]"class=" form-control input  col-md-4 " placeholder="Jawaban" value="<?php echo "$rows[type_1]";?>">
                                <a class="remove right " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove()}); return false">remove</a>
                              </div> 
                              <?php  }
                              ?>  
                              <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a class="add" rel=".clone">Add More</a></button>
                              <?php 
                            }else { ?>
                              <p align="center" id="nodata">Silahkan pilih survey untuk melanjutkan</p>
                              <?php 
                            } ?>


                          </div>

                        </div>
                        <?php
                      }
                      ?>

                      <?php
                      if ($row['question_type']=="Multiple Choice") { ?>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Soal</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="hobby2" class="form-control input" id="pilihan" onchange="return picture();">
                              <option id="" value="">Pilih Survey...</option>
                              <option id="single" value="1" >Single Choice</option>
                              <option id="multi" value="2" selected>Multiple Choice</option>
                              <option id="rank" value="3">Ranking</option>
                              <option id="free" value="4">Free Text</option>
                              <option id="free" value="5">Likert Scale</option>
                              <option id="free" value="6">Forced Choice</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12"  id="pilihan2" style="">
                            <?php

                            $b=1;
                            $cek2=mysql_num_rows($sqls);
                            if ($cek2>0){ 
                              ?>
                              <label class="control-label">Pilihan Jawaban</label>
                              <div></br></div>
                              <?php  while($rows = mysql_fetch_array($sqls)){
                                ?>
                                <div class="clone">

                                  <input type="text" id="desc" name="tipe[]"class=" form-control input  col-md-4 " placeholder="Jawaban" value="<?php echo "$rows[type_1]";?>">
                                  <a class="remove right " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove()}); return false">remove</a>
                                </div> 
                                <?php  }
                                ?>  
                                <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a class="add" rel=".clone">Add More</a></button>
                                <?php 
                              }else { ?>
                                <p align="center" id="nodata">Silahkan pilih survey untuk melanjutkan</p>
                                <?php 
                              } ?>

                            </div>

                          </div>
                          <?php
                        }
                        ?>

                        <?php
                        if ($row['question_type']=="Ranking") { ?>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Soal</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="hobby2" class="form-control input" id="pilihan" onchange="return picture();">
                                <option id="" value="">Pilih Survey...</option>
                                <option id="single" value="1" >Single Choice</option>
                                <option id="multi" value="2" >Multiple Choice</option>
                                <option id="rank" value="3" selected>Ranking</option>
                                <option id="free" value="4">Free Text</option>
                                <option id="free" value="5">Likert Scale</option>
                                <option id="free" value="6">Forced Choice</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"  id="pilihan2" style="">
                              <?php

                              $b=1;
                              $cek2=mysql_num_rows($sqls);
                              if ($cek2>0){ 
                                ?>
                                <label class="control-label">Ranking</label>
                                <div></br></div>
                                <?php  while($rows = mysql_fetch_array($sqls)){
                                  ?>
                                  <div class="clone">

                                    <input type="text" id="desc" name="tipe[]"class=" form-control input  col-md-4 " placeholder="Jawaban" value="<?php echo "$rows[type_1]";?>">
                                    <a class="remove right " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove()}); return false">remove</a>
                                  </div> 
                                  <?php  }
                                  ?>  
                                  <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a class="add" rel=".clone">Add More</a></button>
                                  <?php 
                                }else { ?>
                                  <p align="center" id="nodata">Silahkan pilih survey untuk melanjutkan</p>
                                  <?php 
                                } ?>

                              </div>

                            </div>
                            <?php
                          }
                          ?>

                          <?php
                          if ($row['question_type']=="Free Text") { ?>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Soal</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="hobby2" class="form-control input" id="pilihan" onchange="return picture();">
                                  <option id="" value="">Pilih Survey...</option>
                                  <option id="single" value="1" >Single Choice</option>
                                  <option id="multi" value="2" >Multiple Choice</option>
                                  <option id="rank" value="3">Ranking</option>
                                  <option id="free" value="4" selected>Free Text</option>
                                  <option id="free" value="5">Likert Scale</option>
                                  <option id="free" value="6">Forced Choice</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12"  id="pilihan2" style="">


                              </div>

                            </div>
                            <?php
                          }
                          ?>

                          <?php
                          if ($row['question_type']=="Likert Scale") { ?>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Soal</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="hobby2" class="form-control input" id="pilihan" onchange="return picture();">
                                  <option id="" value="">Pilih Survey...</option>
                                  <option id="single" value="1" >Single Choice</option>
                                  <option id="multi" value="2" >Multiple Choice</option>
                                  <option id="rank" value="3">Ranking</option>
                                  <option id="free" value="4" >Free Text</option>
                                  <option id="free" value="5" selected>Likert Scale</option>
                                  <option id="free" value="6">Forced Choice</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12"  id="pilihan2" style="">
                                <?php

                                $b=1;
                                $cek2=mysql_num_rows($sqls);
                                if ($cek2>0){ 
                                  $rows = mysql_fetch_array($sqls);
                                  ?>
                                  <a class="control-label">Besar Skala</a>
                                  <div></br></div>
                                  <input type="text" id="desc" name="tipe" class=" form-control input" style="width:10%" placeholder="" value="<?php echo "$rows[type_1]";?>">
                                  <?php 
                                } ?>

                              </div>

                            </div>
                            <?php
                          }
                          ?>
                          <?php
                          if ($row['question_type']=="Forced Choice") { ?>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe Soal</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="hobby2" class="form-control input" id="pilihan" onchange="return picture();">
                                  <option id="" value="">Pilih Survey...</option>
                                  <option id="single" value="1" >Single Choice</option>
                                  <option id="multi" value="2" >Multiple Choice</option>
                                  <option id="rank" value="3">Ranking</option>
                                  <option id="free" value="4" >Free Text</option>
                                  <option id="free" value="5" >Likert Scale</option>
                                  <option id="free" value="6" selected>Forced Choice</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12"  id="pilihan2" style="">
                                <?php

                                $b=1;
                                $cek2=mysql_num_rows($sqls);
                                if ($cek2>0){ 
                                  $rows = mysql_fetch_array($sqls);
                                  ?>
                                  <a class="control-label">Soal Nomor</a>
                                  <div></br></div>
                                  <input type="text"  name="tipe" class=" form-control input" style="width:10%" placeholder="" value="<?php echo "$rows[type_1]";?>">
                                  <?php 
                                } ?>

                              </div>

                            </div>
                            <?php
                          }
                          ?>
                          <div class="form-group">
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <label>
                                <input type="checkbox" name="hobby3"  value="Default" class="">Jadikan pertanyaan default

                              </label>
                            </div>
                          </div>
                          <!-- </div> -->
                          <textarea name="descr" id="descr" style="display:none;"><?php echo"$id";?></textarea>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button name="submit" class="btn btn-primary" value="batal">Batal</button>
                              <button name="submit" type="submit" class="btn btn-success" value="simpan" action>Simpan</button>
                              <!-- <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a  class="add" rel=".clone">Add More</a></button> -->
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
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="js/moment/moment.min.js"></script>
        <script src="js/datepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="../vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="../vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="../vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="../vendors/starrr/dist/starrr.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

        <!-- cancel button -->

    <!-- <script type="text/javascript">
    document.getElementById("batal").onclick = function () {
        location.href = "list_survey.php";
    };
  </script> -->




  

  <!-- Select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /Select2 -->

  <!-- jQuery Tags Input -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(document).ready(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /jQuery Tags Input -->

  <!-- Parsley -->
  <script>
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /Parsley -->

  <!-- Autosize -->
  <script>
    $(document).ready(function() {
      autosize($('.resizable_textarea'));
    });
  </script>
  <!-- /Autosize -->

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript" src="reCopy.js"></script>
  <script type="text/javascript">
    $(function(){

      $('a.add').relCopy();  
    });
  </script>

  
  <!-- getGroup -->
  <script>
    function MakeRequest(id){
      $.ajax({
        type: "GET",
        url: "check_type_.php",
        data: {'id':id},
        success: function(data){
          $("#pilihan2").html(data);
        }

      })
      document.getElementById('grup').style.display = "none"; 
      document.getElementById('pilihan2').style.display = "block";     
    }
  </script>
  <!-- getGroup -->
  <script>
    function picture() {
      var pilihan = document.getElementById('pilihan').value;
      if (pilihan == '1') {
        document.getElementById('pilihan2').innerHTML = 
        document.getElementById('pilihan2').innerHTML = 
        '<label class="control-label">Pilihan Jawaban</label><div></br></div><div class="clone"><input type="text" id="desc" name="tipe[]"class=" form-control input  col-md-4 " placeholder="Jawaban"><a class="remove right " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove()}); return false">remove</a></div> <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a class="awd" rel=".clone">Add More</a></button> ';
        $(function(){
          $('a.awd').relCopy();  
        });
        
      }
      if(pilihan == '2') {
        document.getElementById('pilihan2').innerHTML = 
        '<label class="control-label">Pilihan Jawaban</label><div></br></div><div class="clone"><input type="text" id="desc" name="tipe[]"class=" form-control input  col-md-4 " placeholder="Jawaban"><a class="remove right " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove()}); return false">remove</a></div> <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a class="add" rel=".clone">Add More</a></button> ';
        $(function(){
          $('a.add').relCopy();  
        });
      }
      if(pilihan == '3') {
       document.getElementById('pilihan2').innerHTML = 
       '<label class="control-label">Ranking</label><div></br></div><div class="clone"><input type="text" id="desc" name="tipe[]"class=" form-control input  col-md-4 " placeholder="Jawaban"><a class="remove right " href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove()}); return false">remove</a></div> <button id="buttonadd" type="button" class="right btn waves-effect waves-light " ><a class="asd" rel=".clone">Add More</a></button> ';
       $(function(){
        $('a.asd').relCopy();  
      });
     }
     if(pilihan == '4') {
      document.getElementById('pilihan2').innerHTML = '<a>freetext</a>';

    }
    if(pilihan == '5') {
      document.getElementById('pilihan2').innerHTML = '<a class="control-label">Besar Skala</a><div></br></div><input type="text" id="desc" name="tipe" class=" form-control input" style="width:10%" placeholder=""> ';

    }
    if(pilihan == '6') {
       document.getElementById('pilihan2').innerHTML = '<a class="control-label">Soal Nomor</a><div></br></div><input type="text" id="desc" name="tipe" class=" form-control input" style="width:10%" placeholder=""> ';

    }
    if (pilihan >= 1) {
      document.getElementById('pilihan2').style.display = 'block';
    } else {
      document.getElementById('pilihan2').style.display = 'none';
    }


  }
</script>

</body>
</html>
