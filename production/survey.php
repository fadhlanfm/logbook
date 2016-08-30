<?php
session_start();
include('conn.php');
if(isset($_SESSION['id'])!=null && !empty($_SESSION['id']))
{ 
  if (isset($_SESSION['unit'])!=null && !empty($_SESSION['unit'])) {
    $username=$_SESSION['id'];
    $unit=$_SESSION['unit'];
  }
  else {
    echo "user tidak memiliki unit!!!!";
  }
} else {
  header ('Location: login.php');
  exit;
}
$q = mysqli_query($con,"SELECT * FROM user WHERE nopeg = '$username' ");
$check=mysqli_fetch_array($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentellela Alela! | </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Ion.RangeSlider -->
  <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
  <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
  <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" style="position: relative; margin: 0;  min-height: 100%;">
  <div class="container body">
    <div class="">


      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo $check['nama']; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">

                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" style="margin-left:0;">
        <div class="">
          <div class="page-title">
            <div class="title_left">

            </div>

            <div class="title_right">
              <div class=" form-group pull-right top_search">
                <div class="input-group">

                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <h3 style="text-align:center">Employee Survey</h3>
          <h2 style="text-align:center">Form Registration</h2>
          <br/>
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">

                <div class="x_title" style="text-align:center; ">

                  <h2 style="width:100%">Data Responden</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <form id="demo-form2" data-parsley-validate method="post" action="survey_submit.php" class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Survey 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="surveyname" id="first-name" readonly  class="form-control col-md-7 col-xs-12" value="Employee Survey">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Mulai 
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control xdisplay_inputx " readonly  id="single_cal2" name="start" placeholder="Tanggal" aria-describedby="inputSuccess2Status2" value="08/19/2016">
                      </div>

                      <label class="control-label col-md-2 col-sm-2 col-xs-12 " >Berakhir
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control xdisplay_inputx " readonly id="single_cal3" name="end" placeholder="Tanggal" aria-describedby="inputSuccess2Status2" value="08/25/2016">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Unit 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="unit-name" name="unit" readonly  class="form-control col-md-7 col-xs-12" value="<?php echo "$unit"; ?>">
                      </div>
                    </div>
                  </form>


                </div>
              </div>

              


              <!-- form grid slider -->
              <div class="x_panel" style="">
                <div class="x_title" style="text-align:center; ">

                  <h2 style="width:100%">Form Survey</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 <blockquote>
                  <p><i><b>Instruksi</b></i></p>
                  <h2 >
                    Jawablah dengan cara menggeser bar mendekati pilihan yang menurut anda paling sesuai dengan kondisi perusahaan saat ini
                  </h2>
                </blockquote>
                <form id="demo-form2" data-parsley-validate method="post" action="survey_.php" class="form-horizontal form-label-left" >
                <input type="text" id="unit-name" name="id" readonly  class="form-control col-md-7 col-xs-12" value="<?php echo "$username"; ?>" style="display:none">

                  <br>
                  <div class="row grid_slider">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h2>1. Menurut Bapak/Ibu bagaimana kondisi perusahaan saat ini?</h2><br>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Krisis</h4>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" id="range_31" value="" name="range1" />
                        <br>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Sangat Bagus</h4>
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid"></div>

                  <div class="row grid_slider">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h2>2. Bagaimana penilaian Bapak/Ibu mengenai pengelolaan perusahaan saat ini?</h2>
                      <br>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Biasa Saja</h4>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" id="range_32" value="" name="range2" />
                        <br>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Sangat Baik</h4>
                      </div>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="row grid_slider">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h2>3. Bagaimana tingkat keyakinan Bapak/Ibu terhadap perubahan yang dilakukan oleh perusahaan?</h2>
                      <br>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Sangat Tidak Yakin</h4>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" id="range_33" value="" name="range3" />
                        <br>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Sangat Yakin</h4>
                      </div>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="row grid_slider">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h2>4. Apa komitmen Bapak/Ibu terhadap perubahan yang akan dilakukan perusahaan?</h2>
                      <br>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Bekerja Biasa Saja</h4>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" id="range_34" value="" name="range4" />
                        <br>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <h4 style="text-align:center; vertical-align:middle">Bekerja Lebih Cepat & Tuntas</h4>
                      </div>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group" style="text-align:left">
                    <div class="" >
                      <button type="submit" class="btn btn-primary btn-lg" style="">KIRIM</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <br />
            <br />
            <!-- /form grid slider -->

          </div>
          <div class="col-md-3 col-sm-3 col-xs-12"></div>

        </div>
        <p style="text-align:center"><a href="http://www.garuda-indonesia.com">Garuda Indonesia</a> @ 2016</p>
        <br>
      </div>
    </div>
    <!-- /page content -->

    
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
<!-- Ion.RangeSlider -->
<script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<!-- Ion.RangeSlider -->
<script>
  $(document).ready(function() {

    $("#range_31").ionRangeSlider({
      type: "single",
      min: 1,
      max: 10,
      from: 1 ,
      to: 70,


    });
    $("#range_32").ionRangeSlider({
      type: "single",
      min: 1,
      max: 10,
      from: 1 ,
      to: 70,


    });
    $("#range_33").ionRangeSlider({
      type: "single",
      min: 1,
      max: 10,
      from: 1 ,
      to: 70,


    });
    $("#range_34").ionRangeSlider({
      type: "single",
      min: 1,
      max: 10,
      from: 1 ,
      to: 70,


    });

  });
</script>
<!-- /Ion.RangeSlider -->


</body>
</html>
