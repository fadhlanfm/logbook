
<div class="x_content">
  <form method="POST" class="form-horizontal form-label-left" action="observ_input_form_.php">
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
            <?php
            $q="select * from unit";
            $r=$db->query($q);
            while ($row=$r->fetch_object()) {
              echo "<option>".$row->kode."</option>";
            }
            ?>
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
    <div class="profile_title">
      <div class="col-md-6">
        <h2><b>Perilaku Karyawan</b></h2>
      </div>
    </div>
    <br>
    <div class="form-group">
     <table class="table table-bordered">
       <tr>
         <th>Perilaku</th>
         <th>Poin</th>
       </tr>
       <tr>
         <th colspan="2">Perilaku negatif</th>
       </tr>
       <tr>
         <td>
           Terlambat masuk kerja (pagi)
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v11" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v11" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Terlambat masuk kerja (siang/ sesudah makan siang)
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v12" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v12" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Memakai sendal
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v13" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v13" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
         Tidak memakai baju rapih
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v14" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v14" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Ribut/ berbicara pada saat jam kerja
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v15" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v15" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Bermain Sosmed / games saat jam kerja
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v16" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v16" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Tidak ramah menyapa Asesor
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v17" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v17" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Tidak hapal mengenai Budaya contoh perilakunya
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v18" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v18" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Tidak hapal Salam 
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v19" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v19" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Tidak hapal Yel-Yel
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v110" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v110" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th colspan="2">Perilaku Positif</th>
      </tr>
      <tr>
         <td>
           Menggunakan kertas print out bolak balik
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v111" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v111" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2"><textarea class="resizable_textarea form-control" name="c1" placeholder="Kesan Aksesor terhadap Perilaku Karyawan"></textarea></td>
      </tr>
    </table>
    <div class="profile_title">
      <div class="col-md-6">
        <h2><b>Artefak<b></h2>
      </div>
    </div>
    <br>
    <div class="form-group">
     <table class="table table-bordered">
       <tr>
         <th>Perilaku</th>
         <th>Poin</th>
       </tr>
       <tr>
         <td>
           Ruang atasan mencerminkan keterbukaan
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v21" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v21" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Apakah ruangan kantor rapi
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v22" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v22" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Apakah banyak sampah berisikan salah print
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v23" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v23" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
         Apakah ada peringatan untuk memadamkan listrik saat tidak diperlukan
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v24" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v24" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Apakah ada peringatan untuk mematikan air saat tidak diperlukan
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v25" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v25" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Apakah filing rapi
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v26" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v26" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Penggunaan alat  yang bersifat menghemat
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v27" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v27" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Penggunaan alat kerja yang mempercepat proses
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v28" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v28" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Ada tempat untuk karyawan dapat saling sharing
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v29" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v29" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
         <td>
           Ruang kantor memberikan kesan positif bagi Asesor
         </td>
         <td>
           <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
            <input type="radio" name="v210" value="0">  Tidak 
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="v210" value="100"> &nbsp; Ya &nbsp;
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2"><textarea class="resizable_textarea form-control" name="c2" placeholder="Kesan Aksesor terhadap Artefak"></textarea></td>
      </tr>
    </table>
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="btn btn-success pull-right" style="width:250px">
  </div>
</form>
</div>
<!-- End SmartWizard Content -->

</div>
