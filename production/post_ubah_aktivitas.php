<?php
    session_start();
    $id_aktivitas=$_POST['id_akt'];
    $nama_aktivitas=$_POST['nama_aktivitas'];
    $desk_akt=$_POST['desk_akt'];
    include('connect_db.php');
    $query = "UPDATE aktivitas SET nama_aktivitas='$nama_aktivitas', desk_akt='$desk_akt' WHERE id_aktivitas=$id_aktivitas";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        } else
        {
            header('Location: grup_aktivitas.php');
            exit;
        }   
?>
