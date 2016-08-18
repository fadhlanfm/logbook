<!-- start of ended program achievement -->
          <div class="row">
          <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="x_panel tile">
              <div class="x_title">
                <h2>Finished Programs</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <h4>Accumulated Percentage</h4>

                <?php

                $query6 = "SELECT * FROM logbook JOIN unit WHERE end < curdate() and unit.kode=logbook.kode_unit and logbook.kode_unit='$unit2'";
                //execute the query
                $result6 = $db->query( $query6 );

                if (!$result6)
                {
                  die("could not query the database: <br />".$db->error);
                }

                
                $colour='';
                while ($row6 = $result6->fetch_object()) 
                {
                  
                  if (is_null($row6->aktifitas0) || $row6->aktifitas0 == '') {
                  } else {
                    $target0 = $row6->target0;
                    $hasil0 = $row6->hasil0;

                    if ($row6->satuan0 == 'Waktu (Hari)') {
                      $perc0 = $target0/$hasil0*100;
                    } else {
                      $perc0 = $hasil0/$target0*100;
                    }
                    
                    $percacc = $perc0;
                  }
                  
                  if (is_null($row6->aktifitas1) || $row6->aktifitas1 == '') {
                  } else {
                    $target1 = $row6->target1;
                    $hasil1 = $row6->hasil1;
                    
                    if ($row6->satuan1 == 'Waktu (Hari)') {
                      $perc1 = $target1/$hasil1*100;
                    } else {
                      $perc1 = $hasil1/$target1*100;
                    }

                    $percacc = ($perc0 + $perc1)/2;
                  }

                  if (is_null($row6->aktifitas2) || $row6->aktifitas2 == '') {
                  } else {
                    $target2 = $row6->target2;
                    $hasil2 = $row6->hasil2;
                    
                    if ($row6->satuan2 == 'Waktu (Hari)') {
                      $perc2 = $target2/$hasil2*100;
                    } else {
                      $perc2 = $hasil2/$target2*100;
                    }

                    $percacc = ($perc0 + $perc1 + $perc2)/3;
                  }

                  if (is_null($row6->aktifitas3) || $row6->aktifitas3 == '') {
                  } else {
                    $target3 = $row6->target3;
                    $hasil3 = $row6->hasil3;
                    
                    if ($row6->satuan3 == 'Waktu (Hari)') {
                      $perc3 = $target3/$hasil3*100;
                    } else {
                      $perc3 = $hasil3/$target3*100;
                    }

                    $percacc = ($perc0 + $perc1 + $perc2 + $perc3)/4;
                  }

                  if (is_null($row6->aktifitas4) || $row6->aktifitas4 == '') {
                  } else {
                    $target4 = $row6->target4;
                    $hasil4 = $row6->hasil4;

                    if ($row6->satuan4 == 'Waktu (Hari)') {
                      $perc4 = $target4/$hasil4*100;
                    } else {
                      $perc4 = $hasil4/$target4*100;
                    }

                    $percacc = ($perc0 + $perc1 + $perc2 + $perc3 + $perc5)/5;
                  }
                  if ($percacc > 75) {
                    $colour = 'green';
                  } else if ($percacc > 50 && $percacc < 76) {
                    $colour = 'orange';
                  } else{
                    $colour = 'red';
                  }
                  ?>
                  <!-- widget start here -->
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span><a href="lihat_logbook.php%20?id=<?php echo $row6->id ?>"><?php echo $row6->nama_program; ?></a></span>
                      
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-<?php echo $colour?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($percacc); ?>%;">
                          <span class="sr-only"><?php echo round($percacc); ?>% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo round($percacc); ?> %</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <!-- end of widget -->
                  <?php
                }

                ?>

              </div>
            </div>
          </div>
          </div>
          <!-- end of ended program achievement -->