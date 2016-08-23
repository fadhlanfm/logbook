<?php
$q4 = "SELECT x.*
from (
    SELECT v.kode, v.kode_dir, v.sumcar, z.jumlah, z.sumtot, z.lul
    FROM (
        SELECT f.kode, f.kode_dir, sum(g.poin*f.freq) sumcar
        FROM (
            SELECT *
            FROM unit a
            LEFT JOIN (
                SELECT *
                FROM user b
                JOIN aktivitas_employee c ON b.iduser = c.id_user
                where role = 0
            ) d
            ON a.kode = d.unit
        ) f
        LEFT JOIN subaktivitas g ON f.id_subaktivitas = g.id_subaktivitas group by f.kode
    ) v left join (
        select *, (jumlah*sumtot) lul
        from (
            select kode, kode_dir, count(*) jumlah
            from unit a 
            LEFT join user b 
            ON a.kode = b.unit 
            where role = 0
            group by a.kode
        ) a, (
            SELECT sum(poin*max_freq) sumtot
            from subaktivitas
            where default2 = 1
            ) b
        ) z
        ON v.kode = z.kode
    ) x
    LEFT join direktorat y
    ON x.kode_dir = y.kode
    WHERE kode_dir = '$kelompok'";
$r4 = $db->query($q4);
if (!$r4) {
    die("could not query the database: <br />".$db->error);
}
while ($row4 = $r4->fetch_object()) {
    $perc = 0;
    if ($row4->lul == 0) {
        $perc = 0;
    } else {
        $perc = $row4->sumcar / $row4->lul *100;
    }
    ?>
    <div class="col-md-2 col-sm-22 col-xs-12">
      <center>
        <span class="chart" data-percent="<?php echo $perc ?>">
          <span class="percent"><?php echo $perc ?></span>
          <canvas height="110" width="110"></canvas>
        </span>
      <p><b><?php echo $row4->kode ?></b></p>
  </center>
</div>
<?php
}

?>
