<?php
    session_start();
    $unit=$_POST['unit'];
    $asesor=$_POST['asesor'];
    $value1=$_POST['value1'];
    $catat1=$_POST['catat1'];
    $value2=$_POST['value1'];
    $catat2=$_POST['catat1'];
    $value3=$_POST['value1'];
    $catat3=$_POST['catat1'];
    $value4=$_POST['value1'];
    $catat4=$_POST['catat1'];
    $value5=$_POST['value1'];
    $catat5=$_POST['catat1'];
    $value6=$_POST['value1'];
    $catat6=$_POST['catat1'];
    $value7=$_POST['value1'];
    $catat7=$_POST['catat1'];
    $value8=$_POST['value1'];
    $catat8=$_POST['catat1'];
    $value9=$_POST['value1'];
    $catat9=$_POST['catat1'];
    $value10=$_POST['value1'];
    $catat10=$_POST['catat1'];
    include('../../connect_db.php');
    $query = "INSERT INTO fgd ( unit, asesor, v1, c1, v2, c2, v3, c3, v4, c4, v5, c5, v6, c6, v7, c7, v8, c8, v9, c9, v10, c10) VALUES ('$unit', '$asesor', '$value1', '$catat1', '$value2', '$catat2', '$value3', '$catat3', '$value4', '$catat4', '$value5', '$catat5', '$value6', '$catat6', '$value7', '$catat7', '$value8', '$catat8', '$value9', '$catat9', '$value10', '$catat10' )";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        }else
        {

            header('Location: fgd.php');

            $db->close();
            exit;
        }   
?>
