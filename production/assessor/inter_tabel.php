
<div class="x_content">
  <form method="POST" class="form-horizontal form-label-left" action="inter_input_form_.php">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Unit <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" value="<?php echo $row3->unit;?>" readonly name="unit" id="unit" class="form-control col-md-7 col-xs-12">
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Asesor <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="asesor" id="asesor" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo''.$row2->username.''; ?>" readonly>
    </div>
  </div>
  <br/>
  <div class="form-group">
    <div class="col-md-7 col-sm-7 col-xs-12">
      <b>score 1= sangat efektif 3=tidak efektif, 4=kuat, 6=sangat efektif</b>
    </div>
  </div>
  <div class="form-group">
   <table class="table table-bordered">
     <tr>
       <th width="30%">#</th>
       <th>Tahu</th>
       <th>Memotivasi</th>
       <th>Menjadi Teladan</th>
       <th>Mengajarkan</th>
       <th>Mendukung Program</th>
       <th>Mendukung Fasilitas</th>
       <th>Catatan</th>
     </tr>
     <tr>
       <td>
         Mungkin bisa diceritakan Visi dan Misi atau Harapan Bapak/ Ibu terhadap unit kerja Anda terkait Budaya ? Apa saja yang sudah Bapak/ Ibu lakukan untuk mewujudkan visi/ misi tersebut? Bagaimana hasilnya?
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value11" class="form-control" value="<?php echo $row3->v11;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value12" class="form-control" value="<?php echo $row3->v12;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value13" class="form-control" value="<?php echo $row3->v13;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value14" class="form-control" value="<?php echo $row3->v14;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value15" class="form-control" value="<?php echo $row3->v15;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value16" class="form-control" value="<?php echo $row3->v16;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <textarea class="resizable_textarea form-control" name="catat1" readonly><?php echo $row3->c1;?></textarea>
       </td>
     </tr>
     <tr>
       <td>
         Apa yang Bapak/ Ibu ketahui tentang Tim Budaya? Apa yang Bapak/ Ibu ketahui tentang program kerja mereka? Bagaimana Anda memonitor hasil kerja mereka? Bagaimana Anda memotivasi tim  Budaya dalam pekerjaan? Adakah program pengembangan yang Anda lakukan terhadap anggota Budaya untuk dapat lebih efektif dalam pekerjaan mereka? Bagaimana hasil kerja Budaya di bawah kepemimpinan Anda?
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value21" class="form-control" value="<?php echo $row3->v21;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value22" class="form-control" value="<?php echo $row3->v22;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value23" class="form-control" value="<?php echo $row3->v23;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value24" class="form-control" value="<?php echo $row3->v24;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value25" class="form-control" value="<?php echo $row3->v25;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value26" class="form-control" value="<?php echo $row3->v26;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <textarea class="resizable_textarea form-control" name="catat2" readonly><?php echo $row3->c2;?></textarea>
       </td>
     </tr>
     <tr>
       <td>
         Mungkin bisa diceritakan upaya yang Bapak/ Ibu lakukan untuk mendukung implementasi program internalisasi Budaya dalam unit kerja. Sumber daya apa yang Bapak/ Ibu sediakan untuk tim Budaya? Bagaimana dampaknya terhadap efektivitas program tersebut?
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value31" class="form-control" value="<?php echo $row3->v31;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value32" class="form-control" value="<?php echo $row3->v32;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value33" class="form-control" value="<?php echo $row3->v33;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value34" class="form-control" value="<?php echo $row3->v34;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value35" class="form-control" value="<?php echo $row3->v35;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value36" class="form-control" value="<?php echo $row3->v36;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <textarea class="resizable_textarea form-control" name="catat3" readonly><?php echo $row3->c3;?></textarea>
       </td>
     </tr>
     <tr>
       <td>
         Bagaimana Bapak/ Ibu memberikan reinforcement (reward atau punishment) untuk mendukung internalisasi program Budayatersebut? Bagaimana dampaknya terhadap efektivitas program tersebut?
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value41" class="form-control" value="<?php echo $row3->v41;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value42" class="form-control" value="<?php echo $row3->v42;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value43" class="form-control" value="<?php echo $row3->v43;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value44" class="form-control" value="<?php echo $row3->v44;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value45" class="form-control" value="<?php echo $row3->v45;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value46" class="form-control" value="<?php echo $row3->v46;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <textarea class="resizable_textarea form-control" name="catat4" readonly><?php echo $row3->c4;?></textarea>
       </td>
     </tr>
     <tr>
       <td>
         5. Mungkin bisa diceritakan bagaimana Bapak/ Ibu menempatkan diri sebagai teladan dalam implementasi program Budaya terhadap unit kerja. Mungkin ada contoh-contohnya? Bagaimana dampaknya terhadap personel dalam unit kerja Bapak/ Ibu? Pernahkah Bapak/ Ibu secara tidak sengaja "melanggar" atau tidak melakukan beberapa perilaku dalam Budaya tersebut di depan orang lain? Apa yang kemudian Bapak lakukan?
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value51" class="form-control" value="<?php echo $row3->v51;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value52" class="form-control" value="<?php echo $row3->v52;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value53" class="form-control" value="<?php echo $row3->v53;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value54" class="form-control" value="<?php echo $row3->v54;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value55" class="form-control" value="<?php echo $row3->v55;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <input type="text" name="value56" class="form-control" value="<?php echo $row3->v56;?>" readonly>
       </td>
       <td style="vertical-align:middle">
         <textarea class="resizable_textarea form-control" name="catat5" readonly><?php echo $row3->c5;?></textarea>
       </td>
     </tr>
     
   </table>
 </div>
</form>
</div>
<!-- End SmartWizard Content -->

</div>
