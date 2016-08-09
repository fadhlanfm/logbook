<?php
    include '../../connect_db.php';
    $id = (isset($_POST['id']) ? $_POST['id'] : '');
    $hasil0 = (isset($_POST['hasil1']) ? $_POST['hasil1'] : '');
    $hasil1 = (isset($_POST['hasil2']) ? $_POST['hasil2'] : '');
    $hasil2 = (isset($_POST['hasil3']) ? $_POST['hasil3'] : '');
    $hasil3 = (isset($_POST['hasil4']) ? $_POST['hasil4'] : '');
    $hasil4 = (isset($_POST['hasil5']) ? $_POST['hasil5'] : '');
    $query = "UPDATE logbook SET hasil0='$hasil0',
        hasil1='$hasil1',
        hasil2='$hasil2',
        hasil3='$hasil3',
        hasil4='$hasil4'
         WHERE id=$id";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        } else
        {
            header('Location: programs.php');
        }   

?>
