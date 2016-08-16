<?php
    session_start();
    $nama_sub=$_POST['nama_sub'];
    $id_akt=$_POST['id_akt'];
    $poin=$_POST['poin'];
    $freq=$_POST['freq'];
    include('connect_db.php');
    $query = "INSERT INTO subaktivitas(nama_subaktivitas, id_aktivitas, poin, max_freq) VALUES ('$nama_sub', ".$id_akt.", ".$poin.", ".$freq.")";
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
