<!DOCTYPE html>
<html>
<head>
	<title>Search 2</title>
</head>
<body>
   <form method="post">

   	<?php
   		include 'connect.php';
   		$con = dbconnect();
   		$sql = "SELECT DISTINCT coulmn1 FROM ".TABLE_NAME;
   		$res = $con->query($sql);
   		while ($row = $res->fetch_assoc()) {
   			    $x = $rpw['coulmn1'];
   		        echo "<input type='checkbox' name='c[]' value='$x'>$x <br> ";
   		}
   	?>
   	   <input type="submit" name="search" value="search">
   </form>
     
     <?php
     	if (isset($_POST['search'])) {

     		if(!isset($_POST['c'])){
                  die("please select one coulmn1")
     		}
     		else
     		{
     			$sql = "SELECT * FROM ".TABLE_NAME." WHERE coulmn1 in ('";
     			$s = $_POST['c']; //array of checked values
     			$n = count($s);   //number of checked values (size of array)

     			for ($i=0; $i < $n ; $i++) { 
     			   
     			   //if the value is not the last one
     			   // we need to put ',' for the next one
     				if ($i<($n-1)) {
     					$sql .= "$s[$i]','";
     				}
     				// so it is the last value (NO ',')
     				else{
     					$sql .= "$s[$i]";
     				} 
     			} // end for

     			$sql .= "')"; // close sql command bracket	
     		}

     			$res = $con->query($sql);
     			tableDiplay($res);
     			$con->close();
     	}//end if
     ?>
</body>
</html>