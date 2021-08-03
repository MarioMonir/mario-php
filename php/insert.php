<!--//insert form implementation -->
<?php 

  if (isset($_POST['insert'])) {
  	   $c1 = $_POST['c1'];
  	   $c2 = $_POST['c2'];
  	   $c3 = $_POST['c3'];

  	   if (!is_numeric($c2)) {
  	   	die("Invalid Insert for c2 ");
  	   }

  	   include 'connect.php';
  	   $con = dbconnect();

  	   $sql = " INSERT INTO ".TABLE_NAME." VALUES ('$c1','$c2','$c3')";
 
  	   // put the query $sql as a sqL command to be executed in the database connected $con
  	   if ($con->query($sql)==TRUE) {
  	   	  echo "Record inesrted";
  	   }
  	   else
  	   {
  	   	echo "Record is not inserted";
  	   }

  	   //close connection
  	   $con->close();
  }

 ?>