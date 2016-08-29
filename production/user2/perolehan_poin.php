<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel tile">
            <div class="x_title">
              <h2><b>Perolehan Poin</b></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-1 col-sm-1 col-xs-12">

              </div>
              <?php
              // mengambil maks poin per grup //
              $query7 = "SELECT *, sum(b.max_freq*b.poin) sumtot FROM aktivitas a join subaktivitas b WHERE a.id_aktivitas = b.id_aktivitas and b.default2 = 1 group by a.id_aktivitas";
              //execute the query
              $result7 = $db->query( $query7 );

              // echo $row->username;
              if (!$result7)
              {
                die("could not query the database: <br />".$db->error);
              }
              $id_akt=0;
              $max_poin;
              $nama;
              $max_poin_kum = 0;
              while ($row7 = $result7->fetch_object()) {
                $id_akt = $row7->id_aktivitas;
                $max_poin[$id_akt] = $row7->sumtot;
                $nama[$id_akt] = $row7->nama_aktivitas;
                $max_poin_kum = $max_poin_kum + $max_poin[$id_akt];
              }
              // mengambil maks poin per grup //

              // mengambil perolehan poin per grup //
              $query6 = "select *, sum(cb) cd from ( SELECT *, (ca*pres/100) cb from ( SELECT id_user, id_tujuan, freq, a.id_subaktivitas, id_aktivitas, poin, max_freq, default2, deg, pres, SUM(freq*poin) ca FROM aktivitas_employee a JOIN subaktivitas b ON a.id_subaktivitas = b.id_subaktivitas JOIN pres_deg c ON a.degree = c.deg WHERE a.id_subaktivitas=b.id_subaktivitas and a.id_tujuan='$idid' and b.default2=1 group by degree, id_aktivitas ) x ) y group by id_aktivitas";
              //execute the query
              $result6 = $db->query( $query6 );

              // echo $row->username;
              if (!$result6)
              {
                die("could not query the database: <br />".$db->error);
              }
              $id_tak=0;
              $poinkat;
              $poinkum = 0;
              while ($row6 = $result6->fetch_object()) {
                $id_akt = $row6->id_aktivitas;
                $poinkat[$id_akt] = 0;
                if ($row6->cd == null) {
                  $poinkat[$id_akt] = 0;
                } else {
                  $poinkat[$id_akt] = $row6->cd;
                }
                ?>
                <div class="col-sm-2 col-md-2 col-xs-12">
                  <center><span class="chart" data-percent="<?php echo $poinkat[$id_akt]/$max_poin[$id_akt]*100; ?>">
                    <span class="percent"><?php echo $poinkat[$id_akt]/$max_poin[$id_akt]*100; ?></span>
                    <canvas height="110" width="110"></canvas>
                  </span></center>
                  <p><center><h3 style="font-size:150%;"><?php echo $nama[$id_akt] ?></h3></center></p>
                  <p><center><b><span class="badge bg-blue"><?php echo number_format($poinkat[$id_akt], 0, '.', ' ') ?></span> / <?php echo $max_poin[$id_akt] ?></b></center></p>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
