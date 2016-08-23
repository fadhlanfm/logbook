
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../assets/gi.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Garuda Indonesia</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
 <!-- iCheck -->
 <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
 <!-- bootstrap-wysiwyg -->
 <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
 <!-- Select2 -->
 <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
 <!-- Switchery -->
 <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
 <!-- starrr -->
 <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
 <!-- PNotify -->
 <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
 <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
 <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
 <!-- Custom Theme Style -->
 <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
     <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
       <div class="navbar nav_title" style="border: 0;">
        <a href="index.php" class="site_title"><span>Garuda Indonesia</span></a>
      </div>
      <h5 style="text-indent:12px;color:white;">Admin Page</h5>
      <div class="clearfix"></div>

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
         <div class="clearfix"></div>
         <ul class="nav side-menu">
          <li><a href="index.php"><i class="fa fa-home"></i> Beranda </a>
           <ul class="nav child_menu">
             <li><a href="index.php">Overall</a></li>
             <li><a href="ucharts_JKTDZ.php">JKTDZ - President & CEO</a></li>
             <li><a href="ucharts_JKTDI.php">JKTDI - Human Capital & Corporate Affairs</a></li>
             <li><a href="ucharts_JKTDF.php">JKTDF - Finance & Risk Management</a></li>
             <li><a href="ucharts_JKTDG.php">JKTDG - Cargo</a></li>
             <li><a href="ucharts_JKTDO.php">JKTDO - Operations </a></li>
             <li><a href="ucharts_JKTDE.php">JKTDE - Maintenance & Information Technology</a></li>
             <li><a href="ucharts_JKTDC.php">JKTDC - Services</a></li>
             <li><a href="ucharts_JKTDN.php">JKTDN - Commercial</a>
               <li><a>JKTDN - Commercial (Branch Offices)<span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                  <li class="sub_menu"><a href="bcharts_MESAM.php">MESAM - Sumatera Region</a>
                  </li>
                  <li><a href="bcharts_JKTAM.php">JKTAM - Jakarta Raya Region</a>
                  </li>
                  <li><a href="bcharts_SUBAM.php">SUBAM - Jawa, Bali, Nusa Tenggara Region</a>
                  </li>
                  <li><a href="bcharts_UPGAM.php">UPGAM - Kalimantan, Sulawesi, Papua Region</a>
                  </li>
                  <li><a href="bcharts_SINAM.php">SINAM - Asia Region</a>
                  </li>
                  <li><a href="bcharts_TYOAM.php">TYOAM - Japan & Korea Region</a>
                  </li>
                  <li><a href="bcharts_SHAAM.php">SHAAM - China Region</a>
                  </li>
                  <li><a href="bcharts_SYDAM.php">SYDAM - South West Pacific Region</a>
                  </li>
                </ul>
              </li>
            </li>
          </ul>
        </li>

        <li><a><i class="fa fa-edit"></i> Logbook <span class="fa fa-chevron-down"></span></a>
         <ul class="nav child_menu">
          <li><a href="show_form.php">Daftar Logbook</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-edit"></i> Survey <span class="fa fa-chevron-down"></span></a>
       <ul class="nav child_menu">
        <li><a href="list_survey.php">List Survey</a></li>
        <li><a href="list_group.php">Grup Survey</a></li>
        <li><a href="question.php">Kuisioner Survey</a></li>
      </ul>
    </li>
    <li><a><i class="fa fa-edit"></i> Change Agent <span class="fa fa-chevron-down"></span></a>
     <ul class="nav child_menu">
      <li><a href="ca_performance.php">CA Performance</a></li>
      <li><a href="ca_performance_table.php">CA Update</a></li>
    </ul>
  </li>
  <li><a><i class="fa fa-lightbulb-o"></i> Innovation Index <span class="fa fa-chevron-down"></span></a>
   <ul class="nav child_menu">
    <li><a href="innovation_index.php">Innovation Index</a></li>
    <li><a href="innovation_score.php">Penilaian</a></li>
    <li><a href="innovation_library.php">Library</a></li>
  </ul>
</li>
<li><a><i class="fa fa-tasks"></i> Program <span class="fa fa-chevron-down"></span></a>
 <ul class="nav child_menu">
  <li><a href="form_running.php">Program sedang berjalan</a></li>
  <li><a href="form_unstarted.php">Program akan dilaksanakan</a></li>
  <li><a href="form_ended.php">Program telah terlaksana</a></li>
</ul>
</li>
<li><a><i class="fa fa-edit"></i> Poin <span class="fa fa-chevron-down"></span></a>
  <ul class="nav child_menu">
    <li><a href="aktivitas.php">Daftar Aktivitas</a></li>
    <li><a href="grup_aktivitas.php">Daftar Kelompok Aktivitas</a></li>
    <li><a href="rank.php">Ranking Pegawai</a></li>
  </ul>
</li>
<li><a><i class="fa fa-user"></i> Manajemen User <span class="fa fa-chevron-down"></span></a>
 <ul class="nav child_menu">
  <li><a href="kelola_akun/user_management.php">Daftar User</a></li>
</ul>
</li>
</ul>
</div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
   <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
 </a>
 <a data-toggle="tooltip" data-placement="top" title="FullScreen">
   <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
 </a>
 <a data-toggle="tooltip" data-placement="top" title="Lock">
   <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
 </a>
 <a data-toggle="tooltip" data-placement="top" title="Logout">
   <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
 </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/img.jpg" alt=""><?php echo "$row2[username]"; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Profile</a></li>
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
            </li>
            <li><a href="javascript:;">Help</a></li>
            <li><a href="acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <div class="text-center">
                <a>
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
