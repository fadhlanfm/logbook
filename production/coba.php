<?php 
$num_rec_per_page=10;
include_once('../connect_db.php');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM subaktivitas LIMIT $start_from, $num_rec_per_page"; 
$rs_result = $db->query($sql); //run the query
?> 
<table>
<tr><td>id</td><td>name</td></tr>
<?php 
while ($row = $rs_result->fetch_object()) { 
?> 
            <tr>
            <td><?php echo $row->id_subaktivitas; ?></td>
            <td><?php echo $row->nama_subaktivitas; ?></td>            
            </tr>
<?php 
}; 
?> 
</table>
<?php 
$sql = "SELECT * FROM subaktivitas"; 
$rs_result = $db->query($sql); //run the query
$total_records = $rs_result->num_rows;  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='coba.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='coba.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='coba.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
    
