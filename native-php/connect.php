<!-- // Database Connection -->
<?php 
function dbconnect()
{
	$con = new mysqli("localhost","root","","database_name");
	if ($con->connect_error) {
		 die("connection to Database Failed");
	}
	return $con;
}
	const TABLE_NAME = "table_name";

 function table_diplay($res)
 {
 		if ($res -> num_rows > 0) {
 			 echo "<table>";
 			 echo "<th>coulmn1</th>";
 			 echo "<th>coulmn2</th>";
 			 echo "<th>coulmn3</th>";

 			 while ($row=$res->fetch_assoc()) {
 			 	$c1 = $row['coulmn1'];
 			 	$c2 = $row['coulmn2'];
 			 	$c3 = $row['coulmn3'];

 			 	echo "<tr>";
 			 	echo "<td>$c1</td>";
 			 	echo "<td>$c2</td>";
 			 	echo "<td>$c3</td>";
 			 	echo "</tr>";
 			  } // end while

 			echo "</table>"; 
 		} // end if
 		
 		else{ //$res->num_rows = 0
 				echo "NO DATA";
 		}
 }

 ?>