<?php
include_once('Connection/conn.php');
session_start();

$query=mysqli_query($con,"SELECT * FROM survey_group WHERE status IN('Active','Default') and survey_name='".$_POST["survey_name"]."'");
$nama_survey=$_POST["survey_name"];

?>
                          <option id="opsi1" style="display: block">Pilih grup...</option>
                          <?php

                          $a=1;
                          $cek1=mysqli_num_rows($query);
                          if ($cek1>0){ 
                            while($row = mysqli_fetch_array($query)){
                          ?>
                            <option value="<?php echo $row['group_name'] ?>"><?php echo $row['group_name'] ?></option>
                          <?php 
                          } }else { ?>
                          <h4 align="center">Tidak ada Operasi yang belum dilakukan!</h4>
                          <?php } 
                          ?>
