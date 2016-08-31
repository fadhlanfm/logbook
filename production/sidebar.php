<?php
if ($_SESSION['role'] == 2) {
  ?>

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i>Beranda<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.php">Dashboard</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i>Onfield Tracking<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="kuesioner.php">Kuesioner</a></li>
            <li><a href="fgd.php">FGD</a></li>
            <li><a href="pres.php">Presentasi</a></li>
            <li><a href="interview.php">Interview</a></li>
            <li><a href="self.php">Self Assessment</a></li>
            <li><a href="observ.php">Observasi</a></li>
          </ul>
        </li>
      </ul>
    </div>

  </div>
  <!-- /sidebar menu -->

  <?php
} else {

  ?>
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">

      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
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
                  </li><li><a href="bcharts_SUBAM.php">SUBAM - Jawa, Bali, Nusa Tenggara Region</a>
                </li><li><a href="bcharts_UPGAM.php">UPGAM - Kalimantan, Sulawesi, Papua Region</a>
              </li><li><a href="bcharts_SINAM.php">SINAM - Asia Region</a>
            </li><li><a href="bcharts_TYOAM.php">TYOAM - Japan & Korea Region</a>
          </li><li><a href="bcharts_SHAAM.php">SHAAM - China Region</a>
        </li><li><a href="bcharts_SYDAM.php">SYDAM - South West Pacific Region</a>
      </li>
    </ul>
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
<li><a><i class="fa fa-edit"></i> Unit Performance <span class="fa fa-chevron-down"></span></a>
  <ul class="nav child_menu">
    <li><a href="unit_performance.php">Unit Performance Index</a></li>
    <li><a href="ca_performance.php">CA Performance Index</a></li>
    <li><a href="unit_performance_table.php">Unit Performance Update</a></li>
    <li><a href="ca_performance_table.php">CA Performance Update</a></li>
  </ul>
</li>
<li><a><i class="fa fa-lightbulb-o"></i> Innovation Index <span class="fa fa-chevron-down"></span></a>
 <ul class="nav child_menu">
  <li><a href="innovation_index.php">Innovation Index</a></li>
  <li><a href="innovation_score.php">Penilaian</a></li>
  <li><a href="innovation_library.php">Library</a></li>
</ul>
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

<?php
}
?>
