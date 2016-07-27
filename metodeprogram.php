<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<!--Import Google Icon Font-->

    <?php
    require_once('/calendar/classes/tc_calendar.php');
    ?>

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
<h4 align="center">Metode Monitoring & Reinforcement</h4>
<form action="post_metodeprogram.php" method="POST">
  <div class="row">
    <div class="input-field col s12">
    <p>Metode Monitoring</p>
      <select class="browser-default" name="monitoring">
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
      <select class="browser-default" name="positif">
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
      <select class="browser-default" name="negatif">
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
<input type="submit" value="Submit"></input>
    </form>
</body>
</html>