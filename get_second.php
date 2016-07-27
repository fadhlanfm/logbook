<!DOCTYPE html>

<html>
<?php
include "connect_db.php";
$query="SELECT * FROM unit WHERE kode_dir='".$_POST["kode"]."'";

$result=$db->query($query);
?>

<option>Pilih Unit</option>
<?php

    while($rs=$result->fetch_assoc())
    { ?>
        <option value="<?php echo $rs["kode"]; ?>"> <?php echo $rs["kode"]; ?> </option>
    <?php
    }

?>

</html>
