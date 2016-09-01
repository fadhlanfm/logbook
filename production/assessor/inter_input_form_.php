<?php
    session_start();
    $unit=$_POST['unit'];
    $asesor=$_POST['asesor'];
    $value11=$_POST['value11'];
    $value12=$_POST['value12'];
    $value13=$_POST['value13'];
    $value14=$_POST['value14'];
    $value15=$_POST['value15'];
    $value16=$_POST['value16'];
    $catat1=$_POST['catat1'];
    $value21=$_POST['value21'];
    $value22=$_POST['value22'];
    $value23=$_POST['value23'];
    $value24=$_POST['value24'];
    $value25=$_POST['value25'];
    $value26=$_POST['value26'];
    $catat2=$_POST['catat2'];
    $value31=$_POST['value31'];
    $value32=$_POST['value32'];
    $value33=$_POST['value33'];
    $value34=$_POST['value34'];
    $value35=$_POST['value35'];
    $value36=$_POST['value36'];
    $catat3=$_POST['catat3'];
    $value41=$_POST['value41'];
    $value42=$_POST['value42'];
    $value43=$_POST['value43'];
    $value44=$_POST['value44'];
    $value45=$_POST['value45'];
    $value46=$_POST['value46'];
    $catat4=$_POST['catat4'];
    $value51=$_POST['value51'];
    $value52=$_POST['value52'];
    $value53=$_POST['value53'];
    $value54=$_POST['value54'];
    $value55=$_POST['value55'];
    $value56=$_POST['value56'];
    $catat5=$_POST['catat5'];
    include('../../connect_db.php');
    $query = "INSERT INTO inter ( unit, asesor, v11, v12, v13, v14, v15, v16, c1, v21, v22, v23, v24, v25, v26, c2, v31, v32, v33, v34, v35, v36, c3, v41, v42, v43, v44, v45, v46, c4, v51, v52, v53, v54, v55, v56, c5) VALUES ('$unit', '$asesor', '$value11', '$value12', '$value13', '$value14', '$value15', '$value16', '$catat1', '$value21', '$value22', '$value23', '$value24', '$value25', '$value26', '$catat2', '$value31', '$value32', '$value33', '$value34', '$value35', '$value36', '$catat3', '$value41', '$value42', '$value43', '$value44', '$value45', '$value46', '$catat4', '$value51', '$value52', '$value53', '$value54', '$value55', '$value56', '$catat5' )";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        }else
        {

            header('Location: interview.php');

            $db->close();
            exit;
        }   
?>
