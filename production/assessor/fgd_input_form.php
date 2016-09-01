
<div class="x_content">
  <form method="POST" class="form-horizontal form-label-left" action="fgd_input_form_.php">
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
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">
        </label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <b>Keterangan</b><span class="required"> <b>*</b></span>
          <table>
           <tr>
             <td width="15%" valign="top"><b>40-60</b></td><td> Apabila unit kerja memenuhi sebagian dari indikator</td>
           </tr>
           <tr>
             <td width="15%" valign="top"><b>61-80</b></td><td> Apabila unit kerja memenuhi seluruh indikator belum sistemik masih sporadis</td>
           </tr>
           <tr>
             <td width="15%" valign="top"><b>81-100</b></td><td> Apabila unit kerja memenuhi seluruh indikator secara sistemik dan atau telah memiliki inovasi</td>
           </tr>
         </table>
       </div>
     </div>
   </div>
   <div class="form-group">
     <table class="table table-bordered">
       <tr>
         <th>#</th>
         <th>Item</th>
         <th>Indikator</th>
         <th>Nilai</th>
         <th width="20%">Catatan</th>
       </tr>
       <tr>
         <th colspan="5" style="text-align:center">Program Fly Hi di Unit Kerja</th>
       </tr>
       <tr>
         <td colspan="1" rowspan="4">
           1
         </td>
         <td rowspan="4">
           Konsistensi Pelaksanaan Program
         </td>
         <td>
           Program dilaksanakan dengan teratur dan memiliki jadwal yang jelas
         </td>
         <td rowspan="4">
           <input type="text" name="value1" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="4">
           <textarea class="resizable_textarea form-control" name="catat1" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Program merupakan kelanjutan dari program terdahulu/merupakan perbaikan berkesinambungan dari program Fly Hi terdahulu
         </td>
       </tr>
       <tr>
         <td>
           Program dapat berjalan secara mandiri dengan intervensi yang minimal dari tim Fly Hi
         </td>
       </tr>
       <tr>
         <td>
           Program di monitor dan evaluasi secara berkala
         </td>
       </tr>
       <tr>
         <td colspan="1" rowspan="4">
           2
         </td>
         <td rowspan="4">
           Keterlibatan Karyawan dalam Pelaksanaan Program
         </td>
         <td>
           Lebih dari 90 persen karyawan terlibat dalam pelaksanaan proram
         </td>
         <td rowspan="4">
           <input type="text" name="value2" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="4">
           <textarea class="resizable_textarea form-control" name="catat2" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Melibatkan karyawan  non-TIF dalam penusunan ide / pelaksanaan kegiatan tersebut
         </td>
       </tr>
       <tr>
         <td>
           Karyawan antusias untuk menjalankan program tersebut/program merupakan sesuatu yang dinantikan oleh karyawan
         </td>
       </tr>
       <tr>
         <td>
           Pimpinan tertinggi di unit kerja memberikan dukungan dan terlibat aktif secara fisik pada kegiatan tersebut
           (contoh: apakah ada endorsement secara tertulis oleh pimpinan/beliau menjadikannya hal yang penting)
         </td>
       </tr>
       <tr>
         <td colspan="1" rowspan="4">
           3
         </td>
         <td rowspan="4">
           Manfaat Program
         </td>
         <td>
           Program memberikan dampak positif terhadap suasana kerja yang ada
         </td>
         <td rowspan="4">
           <input type="text" name="value3" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="4">
           <textarea class="resizable_textarea form-control" name="catat3" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Program meningkatkan pengetahuan dan atau keterampilan karyawan
         </td>
       </tr>
       <tr>
         <td>
           Program memberikan nilai tambah pada proses bisnis yang ada
         </td>
       </tr>
       <tr>
         <td>
           Program memberikan dampak langsung terhadap kinerja karyawan /atau unit kerja dan mendapatkan acknoledgement dari unit kerja/pihak lain
         </td>
       </tr>
       <tr>
         <td colspan="1" rowspan="3">
           4
         </td>
         <td rowspan="3">
           Keterlibatan Unit Kerja/Pihak Lain di Luar Unit Kerja
         </td>
         <td>
           Program dilaksanakan secara internal saja/belum melibatkan unit kerja lain/pihak lain
         </td>
         <td rowspan="3">
           <input type="text" name="value4" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="3">
           <textarea class="resizable_textarea form-control" name="catat4" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Ada kalanya program melibatkan/mengundang unit kerja/pihak lain 
         </td>
       </tr>
       <tr>
         <td>
           Program dilakukan dengan melibatkan unit kerja/pihak lain secara teratur dan sistematis (contoh: sebulan sekali dengan mengundang unit kerja lain untuk mengukur manfaatnya)
         </td>
       </tr>
       <tr>
         <th colspan="5"  style="text-align:center">TIF</th>
       </tr>
       <tr>
         <td colspan="1" rowspan="4">
           1
         </td>
         <td rowspan="4">
           Kekompakan TIF
         </td>
         <td>
           TIF memiliki struktur dan pembagian tugas yang jelas
         </td>
         <td rowspan="4">
           <input type="text" name="value5" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="4">
           <textarea class="resizable_textarea form-control" name="catat5" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Anggota TIF terlibat aktif dan mengetahui apa yang terjadi dengan aktivitas  anggota TIF yang lain terkait pelaksanaan program di unit kerjanya .
         </td>
       </tr>
       <tr>
         <td>
           TIF memiliki  dokumentasi dan evaluasi  kegiatan yang jelas
         </td>
       </tr>
       <tr>
         <td>
           TIF Secara berkala melaporkan kemajuan program terhadap pimpinan dan karyawan
         </td>
       </tr>
       <tr>
         <td rowspan="3">
           2
         </td>
         <td rowspan="3">
           Upaya TIF Meningkatkan Komitmen Karyawan terhadap Pelaksanaan Fly Hi
         </td>
         <td>
           TIF secara aktif dan terbuka melibatkan karyawan pada penyusunan program di unit kerja
         </td>
         <td rowspan="3">
           <input type="text" name="value6" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="3">
           <textarea class="resizable_textarea form-control" name="catat6" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           TIF melibatkan karyawan sebagai mitra pelaksana/penanggung jawab program
         </td>
       </tr>
       <tr>
         <td>
           TIF mengembangkan metode yang sistematis untuk membuat karyawan berkomitmen terhadap pelaksanaan Fly Hi di unit kerja (misal : membuat ganjaran terhadap karyawan yang telah melakukannya dengan baik)
         </td>
       </tr>
       <tr>
         <td colspan="1" rowspan="4">
           3
         </td>
         <td rowspan="4">
           Kreativitas dan Inovasi TIF untuk Menciptakan Program yang Memiliki Nilai Tambah 
         </td>
         <td>
           TIF menggunakan cara-cara yang menyenangkan dan tidak biasa dalam menggulirkan program
         </td>
         <td rowspan="4">
           <input type="text" name="value7" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="4">
           <textarea class="resizable_textarea form-control" name="catat7" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           TIF secara kreatif menciptakan mekanisme monitoring dan evaluasi untuk pelaksanaan program
         </td>
       </tr>
       <tr>
         <td>
           TIF secara kreatif menciptakan program yang memberikan nilai tambah pada proses bisnis
         </td>
       </tr>
       <tr>
         <td>
           TIF secara kreatif menciptakan program yang memberikan nilai tambah pada pekerjaan dan proses berikutnya di departemen/unit kerja lain
         </td>
       </tr>
       <tr>
         <th colspan="5"  style="text-align:center">Leadership Actions</th>
       </tr>
       <tr>
         <td colspan="1" rowspan="3">
           1
         </td>
         <td rowspan="3">
           Pemimpin Sebagai Role model
         </td>
         <td>
           Pemimpin belum secara konsisten melaksanakan Fly Hi
         </td>
         <td rowspan="3">
           <input type="text" name="value8" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="3">
           <textarea class="resizable_textarea form-control" name="catat8" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Sebagaian besar tata nilai Fly Hi sudah dijalankan 
         </td>
       </tr>
       <tr>
         <td>
           Pemimpin dapat dijadikan panutan dalam pelaksanaan  Fly Hi
         </td>
       </tr>
       <tr>
         <td rowspan="4">
           2
         </td>
         <td rowspan="4">
           Pemimpin Sebagai Endorser Fly Hi
         </td>
         <td>
           Pemimpin memberikan TIF dukungan penuh
         </td>
         <td rowspan="4">
           <input type="text" name="value9" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="4">
           <textarea class="resizable_textarea form-control" name="catat9" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Pemimpin memberikan ide-ide dan masukan untuk TIF dan pelaksanaan Fly Hi
         </td>
       </tr>
       <tr>
         <td>
           Pemimpin secara berkala meminta update atau membuat pertemuan
         </td>
       </tr>
       <tr>
         <td>
           Pemimpin secara aktif bertindak sebagai endorser bagi pelaksanaan Fly Hi dan kerja TIF (misal pemimpin membahas secara rutin ttg. Program Fly Hi, membuat kick off, dll)
         </td>
       </tr>
       <tr>
         <td colspan="1" rowspan="3">
           3
         </td>
         <td rowspan="3">
           Pemimpin Sebagai Motivator Fly Hi 
         </td>
         <td>
           Pemimpin meluangkan waktu khusus secara formal maupun informal untuk memotivasi TIF
         </td>
         <td rowspan="3">
           <input type="text" name="value10" class="form-control" placeholder="Nilai" required="required">
         </td>
         <td rowspan="3">
           <textarea class="resizable_textarea form-control" name="catat10" placeholder="Catatan"></textarea>
         </td>
       </tr>
       <tr>
         <td>
           Pemimpin memotivasi karyawan untuk  berperilaku sesuai Fly Hi
         </td>
       </tr>
       <tr>
         <td>
           Pemimpin terlibat aktif dalam berbagai  kegiatan Fly Hi  sebagai upaya untuk   memotivasi seluruh karyawan agar terlibat aktif
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
