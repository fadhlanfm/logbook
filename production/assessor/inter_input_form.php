
<div class="x_content">
  <form method="POST" class="form-horizontal form-label-left" action="inter_input_form_.php">
    <div class="x_panel ui-ribbon-container">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Office <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="office" id="office" required="required" class="form-control col-md-7 col-xs-12">
            <option value="">--pilih salah satu--</option>
            <option>HO</option>
            <option>BO</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Unit <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="unit" id="unit" required="required" class="form-control col-md-7 col-xs-12">
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
    </div>
    <div class="x_panel ui-ribbon-container">
      <div class="form-group">
        <div class="col-md-7 col-sm-7 col-xs-12">
          <b>score 1= sangat efektif 3=tidak efektif, 4=kuat, 6=sangat efektif</b>
        </div>
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
           <input type="text" name="value11" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value12" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value13" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value14" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value15" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value16" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <textarea class="resizable_textarea form-control" name="catat1" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Apa yang Bapak/ Ibu ketahui tentang Tim Budaya? Apa yang Bapak/ Ibu ketahui tentang program kerja mereka? Bagaimana Anda memonitor hasil kerja mereka? Bagaimana Anda memotivasi tim  Budaya dalam pekerjaan? Adakah program pengembangan yang Anda lakukan terhadap anggota Budaya untuk dapat lebih efektif dalam pekerjaan mereka? Bagaimana hasil kerja Budaya di bawah kepemimpinan Anda?
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value21" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value22" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value23" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value24" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value25" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value26" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <textarea class="resizable_textarea form-control" name="catat2" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Mungkin bisa diceritakan upaya yang Bapak/ Ibu lakukan untuk mendukung implementasi program internalisasi Budaya dalam unit kerja. Sumber daya apa yang Bapak/ Ibu sediakan untuk tim Budaya? Bagaimana dampaknya terhadap efektivitas program tersebut?
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value31" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value32" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value33" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value34" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value35" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value36" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <textarea class="resizable_textarea form-control" name="catat3" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Bagaimana Bapak/ Ibu memberikan reinforcement (reward atau punishment) untuk mendukung internalisasi program Budayatersebut? Bagaimana dampaknya terhadap efektivitas program tersebut?
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value41" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value42" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value43" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value44" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value45" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value46" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <textarea class="resizable_textarea form-control" name="catat4" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           5. Mungkin bisa diceritakan bagaimana Bapak/ Ibu menempatkan diri sebagai teladan dalam implementasi program Budaya terhadap unit kerja. Mungkin ada contoh-contohnya? Bagaimana dampaknya terhadap personel dalam unit kerja Bapak/ Ibu? Pernahkah Bapak/ Ibu secara tidak sengaja "melanggar" atau tidak melakukan beberapa perilaku dalam Budaya tersebut di depan orang lain? Apa yang kemudian Bapak lakukan?
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value51" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value52" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value53" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value54" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value55" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <input type="text" name="value56" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td style="vertical-align:middle">
           <textarea class="resizable_textarea form-control" name="catat5" placeholder="Catatan"></textarea>
         </td>
       </tr>
       
     </table>
   </div>
   <div class="form-group">
    <input type="submit" name="resizable_textarea submit" class="btn btn-success pull-right" style="width:250px">
  </div>
</form>
</div>
<!-- End SmartWizard Content -->

</div>
