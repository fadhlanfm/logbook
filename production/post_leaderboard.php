<?php
// get max id_history
include('../connect_db.php');
$query="SELECT MAX(id_history) max from rank_history";
$rs = $db->query($query);
$row = $rs->fetch_object();
$id_history = 0;
if (!isset($row->max)) {
    $id_history = 0;
} else {
    $id_history = $row->max;
}
$id_history = $id_history+1;

// get maxpoint can be earned
$q = "SELECT * FROM subaktivitas WHERE default2=1";
$rsc = $db->query($q);
if (!$rsc)
{
    die("could not query the database: <br />".$db->error);
}
$poinmax = 0;
while ($r = $rsc->fetch_object()) {
    $poinmax = $poinmax + $r->poin * $r->max_freq;
}

// get leaderboard data
$qq = "SELECT * FROM view_rank";
$rsd = $db->query($qq);
if (!$rsc)
{
    die("could not query the database: <br />".$db->error);
}

$badge;
while ($ra = $rsd->fetch_object()) {
    $badge = 0;
    if ($ra->sumtot / $poinmax >0.75 ) {
        $badge = 1;
    } else {
        $badge = 0;
    }
    $id_user = $ra->id_user;
    $que="INSERT INTO rank_history(id_history, id_user, badge)
    values(".$id_history.", ".$id_user.", ".$badge.")";
    $result = $db->query($que);
}

// truncate tabel aktivitas_employee
$ququ = "TRUNCATE TABLE aktivitas_employee";
$resss = $db->query($ququ);
if(!$resss)
{
    die("Could not query the database: <br />". $db->error);
    exit;
} else
{
    header('Location: rank.php');
    exit;
}   
$db->close();

?>
