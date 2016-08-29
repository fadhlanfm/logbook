<?php
    include '../../connect_db.php';
    $id = (isset($_POST['id']) ? $_POST['id'] : '');
    $hasil0 = (isset($_POST['hasil0']) ? $_POST['hasil0'] : '');
    $hasil1 = (isset($_POST['hasil1']) ? $_POST['hasil1'] : '');
    $hasil2 = (isset($_POST['hasil2']) ? $_POST['hasil2'] : '');
    $hasil3 = (isset($_POST['hasil3']) ? $_POST['hasil3'] : '');
    $hasil4 = (isset($_POST['hasil4']) ? $_POST['hasil4'] : '');

    $hasil_flyhi0 = (isset($_POST['hasil_flyhi0']) ? $_POST['hasil_flyhi0'] : '');
    $hasil_flyhi1 = (isset($_POST['hasil_flyhi1']) ? $_POST['hasil_flyhi1'] : '');
    $hasil_flyhi2 = (isset($_POST['hasil_flyhi2']) ? $_POST['hasil_flyhi2'] : '');
    $hasil_flyhi3 = (isset($_POST['hasil_flyhi3']) ? $_POST['hasil_flyhi3'] : '');
    $hasil_flyhi4 = (isset($_POST['hasil_flyhi4']) ? $_POST['hasil_flyhi4'] : '');

    $hasil_financial0 = (isset($_POST['hasil_financial0']) ? $_POST['hasil_financial0'] : '');
    $hasil_financial1 = (isset($_POST['hasil_financial1']) ? $_POST['hasil_financial1'] : '');
    $hasil_financial2 = (isset($_POST['hasil_financial2']) ? $_POST['hasil_financial2'] : '');
    $hasil_financial3 = (isset($_POST['hasil_financial3']) ? $_POST['hasil_financial3'] : '');
    $hasil_financial4 = (isset($_POST['hasil_financial4']) ? $_POST['hasil_financial4'] : '');

    $hasil_customer0 = (isset($_POST['hasil_customer0']) ? $_POST['hasil_customer0'] : '');
    $hasil_customer1 = (isset($_POST['hasil_customer1']) ? $_POST['hasil_customer1'] : '');
    $hasil_customer2 = (isset($_POST['hasil_customer2']) ? $_POST['hasil_customer2'] : '');
    $hasil_customer3 = (isset($_POST['hasil_customer3']) ? $_POST['hasil_customer3'] : '');
    $hasil_customer4 = (isset($_POST['hasil_customer4']) ? $_POST['hasil_customer4'] : '');

    $hasil_ibp0 = (isset($_POST['hasil_ibp0']) ? $_POST['hasil_ibp0'] : '');
    $hasil_ibp1 = (isset($_POST['hasil_ibp1']) ? $_POST['hasil_ibp1'] : '');
    $hasil_ibp2 = (isset($_POST['hasil_ibp2']) ? $_POST['hasil_ibp2'] : '');
    $hasil_ibp3 = (isset($_POST['hasil_ibp3']) ? $_POST['hasil_ibp3'] : '');
    $hasil_ibp4 = (isset($_POST['hasil_ibp4']) ? $_POST['hasil_ibp4'] : '');

    $hasil_lg0 = (isset($_POST['hasil_lg0']) ? $_POST['hasil_lg0'] : '');
    $hasil_lg1 = (isset($_POST['hasil_lg1']) ? $_POST['hasil_lg1'] : '');
    $hasil_lg2 = (isset($_POST['hasil_lg2']) ? $_POST['hasil_lg2'] : '');
    $hasil_lg3 = (isset($_POST['hasil_lg3']) ? $_POST['hasil_lg3'] : '');
    $hasil_lg4 = (isset($_POST['hasil_lg4']) ? $_POST['hasil_lg4'] : '');

    $query = "UPDATE logbook SET 
        hasil0='$hasil0',
        hasil1='$hasil1',
        hasil2='$hasil2',
        hasil3='$hasil3',
        hasil4='$hasil4',
        hasil_flyhi0='$hasil_flyhi0',
        hasil_flyhi1='$hasil_flyhi1',
        hasil_flyhi2='$hasil_flyhi2',
        hasil_flyhi3='$hasil_flyhi3',
        hasil_flyhi4='$hasil_flyhi4',
        hasil_financial0='$hasil_financial0',
        hasil_financial1='$hasil_financial1',
        hasil_financial2='$hasil_financial2',
        hasil_financial3='$hasil_financial3',
        hasil_financial4='$hasil_financial4',
        hasil_customer0='$hasil_customer0',
        hasil_customer1='$hasil_customer1',
        hasil_customer2='$hasil_customer2',
        hasil_customer3='$hasil_customer3',
        hasil_customer4='$hasil_customer4',
        hasil_ibp0='$hasil_ibp0',
        hasil_ibp1='$hasil_ibp1',
        hasil_ibp2='$hasil_ibp2',
        hasil_ibp3='$hasil_ibp3',
        hasil_ibp4='$hasil_ibp4',
        hasil_lg0='$hasil_lg0',
        hasil_lg1='$hasil_lg1',
        hasil_lg2='$hasil_lg2',
        hasil_lg3='$hasil_lg3',
        hasil_lg4='$hasil_lg4',
        status_res=1
         WHERE id=$id";
        $result = $db->query($query);
        if(!$result)
        {
            die("Could not query the database: <br />". $db->error);
        } else
        {
            $message = "Hasil program berhasil tersubmit";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'programs.php';
            </script>";
        }   

?>
