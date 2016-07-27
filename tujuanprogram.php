<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	  <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<script src="../pickadate.js-3.5.6/lib/picker.js"></script>
	<script src="../pickadate.js-3.5.6/lib/picker.date.js"></script>
	<script src="../pickadate.js-3.5.6/lib/picker.time.js"></script>
  <script language="javascript" src="../calendar/calendar.js"></script>
	<script>
      window.liveSettings = {
        api_key: "a0b49b34b93844c38eaee15690d86413",
        picker: "bottom-right",
        detectlang: true,
        dynamic: true,
        autocollect: true
      };
    </script>
    <script src="https://cdn.transifex.com/live.js"></script>

</head>
<body>
<h1 align="center">Culture Monitoring LogBook</h1>
<hr>
<hr>
<h4 align="center">Metode Monitoring & Reinforcement</h4>
<div class="row">
    <form action="post_tujuanprogram.php" method="POST">
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
          <input class="with-gap" type="radio" id="perilaku1" name="perilaku" value="F (Efficient & Effective)">
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
         <select class="browser-default" name="aktifitas1">
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
              <input></input>
            </td>
          </tr>

          <tr>
            <td>Mendorong Tercapainya Kinerja Terbaik</td>
            <td>
            <p>
                <input name="kinerja" type="checkbox" class="filled-in" id="financial" value="Financial">
                <label for="financial">Financial</label>
            </p>
            <p>
                <input name="kinerja" type="checkbox" class="filled-in" id="customer" value="Customer">
                <label for="customer">Customer</label>
            </p>
            <p>
                <input name="kinerja" type="checkbox" class="filled-in" id="internal" checked="uncheked" value="Internal Business Process">
                <label for="internal">Internal Business Process</label>
            </p>
              <p>
                <input name="kinerja" type="checkbox" class="filled-in" id="learning" value="Learning & Growth">
                <label for="learning">Learning & Growth</label>
            </p>
          </td>
            <td></td>
          </tr>
        </tbody>
      </table>
<input type="submit" value="Submit"></input>
    </form>
</body>
</html>