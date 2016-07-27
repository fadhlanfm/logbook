<?php
//connect database
include('/connect_db.php');
$db = new mysqli($db_host,$db_username, $db_password, $db_database);
if ($db->connect_errno)
	{
		die("Could not connect to teh database: <br />".$db->connect_error);
	}
//asign a query
$query = " SELECT * FROM logbook ";
//execute the query
$result = $db->query( $query );
if (!$result)
	{
		die("could not query the database: <br />".$db->error);
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Form</title>
    <meta charset="UTF-8">
	  <!--Import Google Icon Font-->
    <link type="text/css" rel="stylesheet" href="materialize/css/googlefont.css"  media="screen,projection"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="materialize/js/jquery-3.0.0.min.js"></script>
    
    <!-- Compiled and minified CSS -->
	  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	  <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	  <script src="/pickadate.js-3.5.6/lib/picker.js"></script>
	  <script src="/pickadate.js-3.5.6/lib/picker.date.js"></script>
	  <script src="/pickadate.js-3.5.6/lib/picker.time.js"></script>
	  <script>
      window.liveSettings = {
        api_key: "a0b49b34b93844c38eaee15690d86413",
        picker: "bottom-right",
        detectlang: true,
        dynamic: true,
        autocollect: true
      };
    </script>
    <script type="text/javascript" src="materialize/js/live.js"></script>
    <script type="text/javascript" src="/leanModal.v1.1/jquery.leanModal.min.js"></script>
  </head>
  <body>
  <h1 align="center">Culture Monitoring LogBook</h1>
  <hr>
  <hr>
  <h4 align="center">Program</h4>
  <div class="row">
    <form class="col s12" action="post_form.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s6">
          <input id="kode_unit" type="text" class="validate" name="kode_unit" required>
          <label for="kode_unit">Kode Unit</label>
        </div>
        <div class="input-field col s6">
          <input id="nama_program" type="text" class="validate" name="nama_program" required>
          <label for="nama_program">Nama Program</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="deskripsi" class="materialize-textarea" name="deskripsi" required></textarea>
          <label for="deskripsi">Deskripsi Program</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <p>Start Date</p>
          <input id="start_date" name="start_date" type="date" class="datepicker" placeholder="Tanggal" class="section scrollspy" required>
          <script type="text/javascript">$("#start_date").pickadate({formatSubmit: 'yyyy-mm-dd', hiddenName: true, selectMonths: true,selectYears: 15});</script>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <p>End Date</p>
          <input id="end_date" name="end_date" type="date" class="datepicker" placeholder="Tanggal" class="section scrollspy" required>
          <script type="text/javascript">$('#end_date').pickadate({formatSubmit: 'yyyy-mm-dd',hiddenName: true, selectMonths: true,selectYears: 15});</script>
        </div>
      </div>
      <div class="row">
        <table border="0" cellspacing="0" cellpadding="2">
        </table>
      </div>
  </div>
  <hr>
  <h4 align="center">Tujuan & Target Program</h4>
  <div class="row">
    <table class="striped">
      <thead>
        <tr>
          <th data-field="id">Aspek</th>
          <th data-field="name">Tujuan</th>
          <th data-field="price">Target</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Merubah Perilaku</td>
          <td>
            <p>
              <input class="with-gap" type="radio" id="perilaku1" name="perilaku" required value="F (Efficient & Effective)">
              <label for="perilaku1">F (Efficient & Effective)</label>
            </p>
            <p>
              <input class="with-gap" type="radio" id="perilaku2" name="perilaku" value="L (Loyalty)">
              <label for="perilaku2">L (Loyalty)</label>
            </p>
            <p>
              <input class="with-gap" type="radio" id="perilaku3" name="perilaku" value="Y (Customer Centricity)">
              <label for="perilaku3">Y (Customer Centricity)</label>
            </p>
            <p>
              <input class="with-gap" type="radio" id="perilaku4" name="perilaku" value="H (Honesty & Openness)">
              <label for="perilaku4">H (Honesty & Openness)</label>
            </p>
            <p>
              <input class="with-gap" type="radio" id="perilaku5" name="perilaku" value="I (Integrity)">
              <label for="perilaku5">I (Integrity)</label>
            </p>
          </td>
          <td></td>
        </tr>
        
        <tr>
          <td>Memberikan Nilai Tambah Bagi Perusahaan</td>
          <td>
            <label>Aktifitas</label>
            <select class="browser-default" name="aktifitas1" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Percepatan Proses</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Menjaga Reputasi/Image Perusahaan</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Penurunan Error Rate</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Peningkatan Produktivitas Pegawai</a></option>
              <option value="Terpenuhinya SLA"><a href="#modal5">Terpenuhinya SLA</a></option>
              <option value="Meminimalkan Kerugian Finansial"><a href="#modal6">Meminimalkan Kerugian Finansial</a></option>
              <option value="Meningkatkan Layanan Kualitas"><a href="#modal7">Meningkatkan Layanan Kualitas</a></option>
              <option value="Efisiensi"><a href="#modal8">Efisiensi</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
          <td>
            <div class="input-field col s6">
            <label for="target1">Target</label>
            <input type="text" id="target1" name="target1">
            </div>
          </td>
          <td>
            <label>Satuan Target</label>
            <select class="browser-default" name="satuan1" required>
            <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Uang (Rupiah)</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Waktu (Hari)</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Presentasi (%)</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Jumlah (Kali)</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Memberikan Nilai Tambah Bagi Perusahaan</td>
          <td>
            <label>Aktifitas</label>
            <select class="browser-default" name="aktifitas2" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Percepatan Proses</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Menjaga Reputasi/Image Perusahaan</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Penurunan Error Rate</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Peningkatan Produktivitas Pegawai</a></option>
              <option value="Terpenuhinya SLA"><a href="#modal5">Terpenuhinya SLA</a></option>
              <option value="Meminimalkan Kerugian Finansial"><a href="#modal6">Meminimalkan Kerugian Finansial</a></option>
              <option value="Meningkatkan Layanan Kualitas"><a href="#modal7">Meningkatkan Layanan Kualitas</a></option>
              <option value="Efisiensi"><a href="#modal8">Efisiensi</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
          <td>
            <div class="input-field col s6">
            <label for="target1">Target</label>
            <input type="text" id="target1" name="target2">
            </div>
          </td>
          <td>
            <label>Satuan Target</label>
            <select class="browser-default" name="aktifitas2" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Uang (Rupiah)</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Waktu (Hari)</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Presentasi (%)</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Jumlah (Kali)</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Memberikan Nilai Tambah Bagi Perusahaan</td>
          <td>
            <label>Aktifitas</label>
            <select class="browser-default" name="aktifitas3" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Percepatan Proses</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Menjaga Reputasi/Image Perusahaan</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Penurunan Error Rate</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Peningkatan Produktivitas Pegawai</a></option>
              <option value="Terpenuhinya SLA"><a href="#modal5">Terpenuhinya SLA</a></option>
              <option value="Meminimalkan Kerugian Finansial"><a href="#modal6">Meminimalkan Kerugian Finansial</a></option>
              <option value="Meningkatkan Layanan Kualitas"><a href="#modal7">Meningkatkan Layanan Kualitas</a></option>
              <option value="Efisiensi"><a href="#modal8">Efisiensi</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
         <td>
            <div class="input-field col s6">
            <label for="target1">Target</label>
            <input type="text" id="target1" name="target3">
            </div>
          </td>
          <td>
            <label>Satuan Target</label>
            <select class="browser-default" name="aktifitas3" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Uang (Rupiah)</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Waktu (Hari)</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Presentasi (%)</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Jumlah (Kali)</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Memberikan Nilai Tambah Bagi Perusahaan</td>
          <td>
            <label>Aktifitas</label>
            <select class="browser-default" name="aktifitas4" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Percepatan Proses</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Menjaga Reputasi/Image Perusahaan</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Penurunan Error Rate</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Peningkatan Produktivitas Pegawai</a></option>
              <option value="Terpenuhinya SLA"><a href="#modal5">Terpenuhinya SLA</a></option>
              <option value="Meminimalkan Kerugian Finansial"><a href="#modal6">Meminimalkan Kerugian Finansial</a></option>
              <option value="Meningkatkan Layanan Kualitas"><a href"#modal7">Meningkatkan Layanan Kualitas</a></option>
              <option value="Efisiensi"><a href="#modal8">Efisiensi</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
          <td>
            <div class="input-field col s6">
            <label for="target1">Target</label>
            <input type="text" id="target1" name="target4">
            </div>
          </td>
          <td>
            <label>Satuan Target</label>
            <select class="browser-default" name="satuan4" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Uang (Rupiah)</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Waktu (Hari)</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Presentasi (%)</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Jumlah (Kali)</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Memberikan Nilai Tambah Bagi Perusahaan</td>
          <td>
            <label>Aktifitas</label>
            <select class="browser-default" name="aktifitas5" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Percepatan Proses</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Menjaga Reputasi/Image Perusahaan</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Penurunan Error Rate</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Peningkatan Produktivitas Pegawai</a></option>
              <option value="Terpenuhinya SLA"><a href="#modal5">Terpenuhinya SLA</a></option>
              <option value="Meminimalkan Kerugian Finansial"><a href="#modal6">Meminimalkan Kerugian Finansial</a></option>
              <option value="Meningkatkan Layanan Kualitas"><a href"#modal7">Meningkatkan Layanan Kualitas</a></option>
              <option value="Efisiensi"><a href="#modal8">Efisiensi</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
          <td>
            <div class="input-field col s6">
            <label for="target1">Target</label>
            <input type="text" id="target1" name="target5">
            </div>
          </td>
          <td>
            <label>Satuan Target</label>
            <select class="browser-default" name="satuan5" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses"><a href="#modal1">Uang (Rupiah)</a></option>
              <option value="Menjaga Reputasi/Image Perusahaan"><a href="#modal2">Waktu (Hari)</a></option>
              <option value="Penurunan Error Rate"><a href="#modal3">Presentasi (%)</a></option>
              <option value="Peningkatan Produktivitas Pegawai"><a href="#modal4">Jumlah (Kali)</a></option>
              <option value="Others (...)"><a href="#modal9">Others (...)</a></option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Mendorong Tercapainya Kinerja Terbaik</td>
          <td>
            <p>
              <input name="kinerja[]" type="checkbox" class="filled-in" id="financial" value="Financial" required>
              <label for="financial">Financial</label>
            </p>
            <p>
              <input name="kinerja[]" type="checkbox" class="filled-in" id="customer" value="Customer">
              <label for="customer">Customer</label>
            </p>
            <p>
              <input name="kinerja[]" type="checkbox" class="filled-in" id="internal" value="Internal Business Process">
              <label for="internal">Internal Business Process</label>
            </p>
            <p>
              <input name="kinerja[]" type="checkbox" class="filled-in" id="learning" value="Learning & Growth">
              <label for="learning">Learning & Growth</label>
            </p>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>

  <h4 align="center">Metode Monitoring & Reinforcement</h4>
    <div class="row">
      <div class="input-field col s12">
        <p>Metode Monitoring</p>
        <select class="browser-default" name="monitoring" required>
          <option value="" disabled selected>Choose your option</option>
          <option value="Monitoring pencapaian atau realisasi KPI">Monitoring pencapaian atau realisasi KPI</option>
          <option value="Monitoring schedule pelaksanaan program dibandingkan target dan realisasi">Monitoring schedule pelaksanaan program dibandingkan target dan realisasi</option>
          <option value="Laporan Pelaksanan Kegiatan">Laporan Pelaksanan Kegiatan</option>
          <option value="Minutes of Meeting">Minutes of Meeting</option>
          <option value="Program Documentation">Program Documentation</option>
          <option value="Monitoring Pengendalian Biaya">Monitoring Pengendalian Biaya</option>
          <option value="Monitoring Laporan Pemenuhan SLA">Monitoring Laporan Pemenuhan SLA</option>
          <option value="Monitoring Penurunan Error Rate">Monitoring Penurunan Error Rate</option>
          <option value="Simple Behavior Survey">Simple Behavior Survey</option>
          <option value="Simple Customer Survey (Internal/External)">Simple Customer Survey (Internal/External)</option>
          <option value="Others (...)">Others (...)</option>
      </select>
      </div>  
    </div>
    <div class="row">
      <div class="input-field col s6">
        <p>Metode Enforcement Positif</p>
        <select class="browser-default" name="positif" required>
          <option value="" disabled selected>Choose your option</option>
          <option value="Sertifikat, Plakat, Pin, Banner, Ribbon, Trophy, Flag, Voucher">Sertifikat, Plakat, Pin, Banner, Ribbon, Trophy, Flag, Voucher</option>
          <option value="Best Employee Award">Best Employee Award</option>
          <option value="Happy Icon">Happy Icon</option>
          <option value="Recognition Letter">Recognition Letter</option>
          <option value="Thank You Note in Post It">Thank You Note in Post It</option>
          <option value="Appreciation Card for good performance">Appreciation Card for good performance</option>
          <option value="Appreciation for employee “Personal Days” (birthdays, pension, anniversaries, etc.)">Appreciation for employee “Personal Days” (birthdays, pension, anniversaries, etc.)</option>
          <option value="Recognition Speeches">Recognition Speeches</option>
          <option value="Recognition Words (Bravo, Wow, Thank You)">Recognition Words (Bravo, Wow, Thank You)</option>
          <option value="Others (...)">Others (...)</option>
        </select>
      </div>
      <div class="input-field col s6">
        <p>Metode Enforcement Negatif</p>
        <select class="browser-default" name="negatif" required>
          <option value="" disabled selected>Choose your option</option>
          <option value="Sad Icon">Sad Icon</option>
          <option value="Black Flag">Black Flag</option>
          <option value="Pegawai Telatan of the month">Pegawai Telatan of the month</option>
          <option value="Punishment Card">Punishment Card</option>
          <option value="Punishment Letter">Punishment Letter</option>
          <option value="Punishment Speeches">Punishment Speeches</option>
          <option value="Coaching">Coaching</option>
          <option value="Others (...)">Others (...)</option>
        </select>
      </div>  
    </div>
  <h4 align="center">Change Agent Team</h4>
    <table  class="striped">
      <thead>
        <tr>
          <th data-field="id">Posisi</th>
          <th data-field="name">Nama</th>
          <th data-field="price">Email</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Ketua</td>
          <td><input id="nama_ketua" type="text" class="validate" name="nama_ketua" required></td>
          <td><input id="email_ketua" type="text" class="validate" name="email_ketua" required></td>
        </tr>
          
        <tr>
          <td>Sekretaris & Bendahara</td>
          <td><input id="nama_sekre" type="text" class="validate" name="nama_sekre" required></td>
          <td><input id="email_sekre" type="text" class="validate" name="email_sekre" required></td>
        </tr>

        <tr>
          <td>Dokumentasi & Publikasi</td>
          <td><input id="nama_pdd" type="text" class="validate" name="nama_pdd" required></td>
          <td><input id="email_pdd" type="text" class="validate" name="email_pdd" required></td>
        </tr>

        <tr>
          <td>Corporate Program</td>
          <td><input id="nama_corp" type="text" class="validate" name="nama_corp" required></td>
          <td><input id="email_corp" type="text" class="validate" name="email_corp" required></td>
        </tr>

        <tr>
          <td>Pic Rating</td>
          <td><input id="nama_rating" type="text" class="validate" name="nama_rating" required></td>
          <td><input id="email_rating" type="text" class="validate" name="email_rating" required></td>
        </tr>

        <tr>
          <td>Pic I-Dare</td>
          <td><input id="nama_dare" type="text" class="validate" name="nama_dare" required></td>
          <td><input id="email_dare" type="text" class="validate" name="email_dare" required></td>
        </tr>

        <tr>
          <td>Program Pendukung</td>
          <td><input id="nama_pendukung" type="text" class="validate" name="nama_pendukung" required></td>
          <td><input id="email_pendukung" type="text" class="validate" name="email_pendukung" required></td>
        </tr>

        <tr>
          <td>Pic Sharing Session</td>
          <td><input id="nama_share" type="text" class="validate" name="nama_share" required></td>
          <td><input id="email_share" type="text" class="validate" name="email_share" required></td>
        </tr>

        <tr>
          <td>Pic One Team One Spirit One Goal Program</td>
          <td><input id="nama_spirit" type="text" class="validate" name="nama_spirit" required></td>
          <td><input id="email_spirit" type="text" class="validate" name="email_spirit" required></td>
        </tr>

        <tr>
          <td>Pic Standar Layanan</td>
          <td><input id="nama_standar" type="text" class="validate" name="nama_standar" required></td>
          <td><input id="email_standar" type="text" class="validate" name="email_standar" required></td>
        </tr>

      </tbody>
    </table>
    <input type="file" name="file" />
    
    <button type="submit" value="Submit" class="btn waves-effect waves-light">Submit</button>
  </form>
  </body>
</html>