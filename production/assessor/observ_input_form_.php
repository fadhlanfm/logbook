<?php
    session_start();
    $unit=$_POST['unit'];
    $asesor=$_POST['asesor'];
    $value11=$_POST['v11'];
    $value12=$_POST['v12'];
    $value13=$_POST['v13'];
    $value14=$_POST['v14'];
    $value15=$_POST['v15'];
    $value16=$_POST['v16'];
    $value17=$_POST['v17'];
    $value18=$_POST['v18'];
    $value19=$_POST['v19'];
    $value110=$_POST['v110'];
    $value111=$_POST['v111'];
    $catat1=$_POST['c1'];
    $value21=$_POST['v21'];
    $value22=$_POST['v22'];
    $value23=$_POST['v23'];
    $value24=$_POST['v24'];
    $value25=$_POST['v25'];
    $value26=$_POST['v26'];
    $value27=$_POST['v27'];
    $value28=$_POST['v28'];
    $value29=$_POST['v29'];
    $value210=$_POST['v210'];
    $catat2=$_POST['c2'];
    include('../../connect_db.php');
    $query = "INSERT INTO observ ( unit, asesor, v11, v12, v13, v14, v15, v16, v17, v18, v19, v110, v111, c1, v21, v22, v23, v24, v25, v26, v27, v28, v29, v210, c2) VALUES ('$unit', '$asesor', '$value11', '$value12', '$value13', '$value14', '$value15', '$value16', '$value17', '$value18', '$value19', '$value110', '$value111', '$catat1', '$value21', '$value22', '$value23', '$value24', '$value25', '$value26', '$value27', '$value28', '$value29', '$value210', '$catat2')";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        }else
        {

            header('Location: observ.php');

            $db->close();
            exit;
        }   
?>
