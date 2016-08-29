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
                    <li><a href="profil_360.php">Profil 360</a></li>
                    <li><a href="hal_aktivitas.php">Isi Aktivitas</a></li>
                    <li><a href="hasil_poin.php">Hasil Poin</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Change Agent <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ca_performance.php">CA Performance</a></li>
                  </ul>
                </li>
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

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav hidden-print">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../images/img.jpg" alt=""><?php

                  echo''.$row->nama.'';
                  ?>
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
                  <li><a href="../acc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
