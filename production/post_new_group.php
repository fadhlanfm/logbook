<?php
    include('../connect_db.php');
    $nama_aktivitas = (isset($_POST['nama_aktivitas']) ? $_POST['nama_aktivitas'] : '$nama_aktivitas');
    $desk_akt = (isset($_POST['desk_akt']) ? $_POST['desk_akt'] : '$desk_akt');

        $query = "INSERT INTO aktivitas(nama_aktivitas, desk_akt) values ('$nama_aktivitas', '$desk_akt')";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
            exit;
        } else
        {
            header('Location: grup_aktivitas.php');
            exit;
        }   

    $db->close();
?>
