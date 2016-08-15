<?php
    session_start();
    $id_sub=$_POST['id_sub'];
    $nama_sub=$_POST['nama_sub'];
    $id_akt=$_POST['id_akt'];
    $poin=$_POST['poin'];
    $freq=$_POST['freq'];
    include('connect_db.php');
    $query = "UPDATE subaktivitas SET nama_subaktivitas='$nama_sub', id_aktivitas='$id_akt', id_aktivitas='$id_akt', poin='$poin', max_freq='$freq' WHERE id_subaktivitas=$id_sub";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        } else
        {
            header('Location: aktivitas.php');
            exit;
        }   
?>
