<?php
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$kelompok= $_SESSION['kelompok'];
$query = "SELECT b.id_aktivitas, b.nama_aktivitas, b.desk_akt, a.id_subaktivitas, a.nama_subaktivitas, a.poin, a.max_freq, a.default2 FROM subaktivitas a JOIN aktivitas b ON b.id_aktivitas=a.id_aktivitas  WHERE a.id_aktivitas = $kelompok order by id_subaktivitas LIMIT $start_from, $num_rec_per_page";
  //execute the query
$result = $db->query( $query );
if (!$result)
{
  die("could not query the database: <br />".$db->error);
}
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>
        ID
      </th>
      <th>
        Aktivitas
      </th>
      <th>
        Kelompok
      </th>
      <th>
        Poin
      </th>
      <th>
        Frekuensi Maks
      </th>
      <th>
        Ubah
      </th>
      <th>
        Default
      </th>
    </tr>

    <?php
    $i=1;
    $defa=0;
    while ($row = $result->fetch_object())
    {
      if ($row->default2 == 1) {
        $defa=1;
      }
      ?>
      <tr>
        <td>
          <?php echo $row->id_subaktivitas ?>
        </td>
        <td>
          <?php echo $row->nama_subaktivitas ?>
        </td>
        <td>
          <?php echo $row->nama_aktivitas ?>
        </td>
        <td>
          <?php echo $row->poin ?>
        </td>
        <td>
          <?php echo $row->max_freq ?>
        </td>
        <td>
          <a href="ubah_subaktivitas.php?id=<?php echo $row->id_subaktivitas ?>"><button class="btn btn-primary btn-xs">
            Ubah
          </button></a>
        </td>
        <td style="width: 8%;">
          <div class="btn-group">
            <?php
            if ($defa == 1) {
              ?>
              <button class="btn btn-default btn-xs active" type="button"><i class="fa fa-check"></i> </button>
              <button class="btn btn-default btn-xs" type="button"><a href="acc_undefault.php?id=<?php echo $row->id_subaktivitas ?>"><i class="fa fa-times"></i></a></button>
              <?php
            } else if ($defa == 0) {
              ?>
              <button class="btn btn-default btn-xs" type="button"><a href="acc_default.php?id=<?php echo $row->id_subaktivitas ?>"><i class="fa fa-check"></i></a></button>
              <button class="btn btn-default btn-xs active" type="button"><i class="fa fa-times"></i></button>
              <?php
            }
            ?>
          </div>
        </td>

      </tr>
      <?php
      $i++;
      $defa='';
    }

    ?>
  </thead>
</table>
<?php 
$sql = "SELECT * FROM subaktivitas WHERE id_aktivitas=$kelompok"; 
      $rs_result = $db->query($sql); //run the query
      $total_records = $rs_result->num_rows;  //count number of records
      $total_pages = ceil($total_records / $num_rec_per_page); 

      echo "<a href='aktivitas.php?page=1'>".'|<'."</a> "; // Goto 1st page  

      for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='aktivitas.php?page=".$i."'>".$i."</a> "; 
      }; 
      echo "<a href='aktivitas.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
      ?>
