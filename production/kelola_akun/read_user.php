<?php
	//connect database
	include('../connect_db.php');
	$db = new mysqli($db_host,$db_username, $db_password, $db_database);
	if ($db->connect_errno)
		{
			die("Could not connect to the database: <br />".$db->connect_error);
		}
	//asign a query
	$query = " SELECT * FROM user WHERE role=1";
	//execute the query
	$result = $db->query( $query );
	if (!$result)
		{
			die("could not query the database: <br />".$db->error);
		}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../tablefilter/dist/tablefilter/tablefilter.js"></script>
	<script type="text/javascript" src="../materialize/js/jquery-3.0.0.min.js"></script>
	<title>Kelola Akun</title>
</head>
<body>
	<table border="1" id="table1">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Username</th>
				<th>Password</th>
				<th>Direktorat</th>
				<th>Unit</th>
				<th>Branch</th>
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			while($row = $result->fetch_object())
			{	
				$query1 = " SELECT * FROM direktorat WHERE kode='$row->dir'";
				$query2 = " SELECT * FROM unit WHERE kode='$row->unit'";
				$query3 = " SELECT * FROM branch WHERE kode='$row->branch'";
				//execute the query
				$result1 = $db->query( $query1 );
				$result2 = $db->query( $query2 );
				$result3 = $db->query( $query3 );
				if (!$result1)
					{
						die("could not query the database: <br />".$db->error);
					}
				$row1 = $result1->fetch_object();
				$row2 = $result2->fetch_object();
				$row3 = $result3->fetch_object();
				if(!$row3){
					echo'<tr>';
					echo'<td>'.$i.'</td>';
					echo'<td>'.$row->username.'</td>';
					echo'<td>'.$row->password.'</td>';
					echo'<td>'.$row->dir.' - '.$row1->nama.'</td>';
					echo'<td>'.$row->unit.' - '.$row2->nama.'</td>';
					echo'<td>-</td>';
					echo'<td><a href="edit_username.php?iduser='.$row->iduser.'">Edit Username</a></td>';
					echo'<td><a href="edit_password.php?iduser='.$row->iduser.'">Edit Password</a></td>';
					echo'<td><a href="delete_account.php?iduser='.$row->iduser.'">Delete User</a></td>';
					$i++;
					}else{
					echo'<tr>';
					echo'<td>'.$i.'</td>';
					echo'<td>'.$row->username.'</td>';
					echo'<td>'.$row->password.'</td>';
					echo'<td>'.$row->dir.' - '.$row1->nama.'</td>';
					echo'<td>'.$row->unit.' - '.$row2->nama.'</td>';
					echo'<td>'.$row->branch.' - '.$row3->nama.'</td>';
					echo'<td><a href="edit_username.php?iduser='.$row->iduser.'">Edit Username</a></td>';
					echo'<td><a href="edit_password.php?iduser='.$row->iduser.'">Edit Password</a></td>';
					echo'<td><a href="delete_account.php?iduser='.$row->iduser.'">Delete User</a></td>';
					$i++;
					}
				
			}
			$result->free();
			$db->close();
		?>
		</tbody>
	</table>
</body>
</html>
<script>
function myFunction() {
    window.print();
}
</script>
	<script data-config>
    var filtersConfig = {
        base_path: 'tablefilter/',
        rows_counter: true,
        btn_reset: true,
        col_1: 'select',
    };

    var tf = new TableFilter('table1', filtersConfig);
    tf.init();

</script>