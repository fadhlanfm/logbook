<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="index.php">Halaman Utama</a></li>
          <li><a href="rank.php">Ranking Pegawai</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Poin <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="aktivitas.php">Isi Aktivitas</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Survey <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="survey.php">List Survey</a></li>
        </ul>
      </li>
      <?php 
      $hahah =mysqli_query($con, "SELECT * FROM ca_user WHERE ca_nopeg = '$coba'");
      $hahah_ = mysqli_fetch_array($hahah);
      if (mysqli_num_rows($hahah)>0) {


        ?>
        <li><a><i class="fa fa-dashboard"></i> Change Agent <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="ca_performance.php">CA Performance</a></li>
          </ul>
        </li>
        <?php 
      }
      ?>
      <li><a><i class="fa fa-cog"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="edit_username2.php">Ubah Username</a></li>
          <li><a href="edit_password2.php">Ubah Password</a></li>
          <li><a href="edit_foto.php">Ubah Foto</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->
  