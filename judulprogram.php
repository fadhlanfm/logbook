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
<h4 align="center">Program</h4>
<div class="row">
    <form class="col s12" action="post_judulprogram.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input id="kode_unit" type="text" class="validate" name="kode_unit">
          <label for="kode_unit">Kode Unit</label>
        </div>
        <div class="input-field col s6">
        	<input id="nama_program" type="text" class="validate" name="nama_program">
        	<label for="nama_program">Nama Program</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <textarea id="deskripsi" class="materialize-textarea" name="deskripsi"></textarea>
          <label for="deskripsi">Deskripsi Program</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
        <p>Start Date</p>
        	<input id="start_date" name="start_date" type="date" class="datepicker" placeholder="Tanggal" class="section scrollspy">
        	<script type="text/javascript">$("#start_date").pickadate({dateFormat: "yyyy-mm-dd"});</script>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
        <p>End Date</p>
        	<input id="end_date" name="end_date" type="date" class="datepicker" placeholder="Tanggal" class="section scrollspy">
        	<script type="text/javascript">$('#end_date').pickadate({dateFormat: "yyyy-mm-dd"});</script>
        </div>
      </div>
      <div class="row">
        <table border="0" cellspacing="0" cellpadding="2">
</table>
      </div>
</div>
<input type="submit" value="Submit"></input>
    </form>
</body>
</html>