<!-- Search by select menu -->
<!DOCTYPE html>
<html>
<head>
	<title>Search 1</title>
</head>
<body> 

	 <form method="post">

	 	 <?php
	 	   include 'connect.php';
	 	   $con = dbconnect();
	 	   const A = 'any value';

	 	   /*--------------------------------------*/

	 	   $sql = "SELECT DISTINCT coulmn1 FROM ".TABLE_NAME;
	 	   $res = $con->query($sql);

	 	    echo "<select name='c1'>";
	 	    echo "<option selected disabled> Select coulmn1 </option>";
	 	    echo "<option>".A."</option>";
	 	    while ($row = $res->fetch_assoc()) {
	 	    	    $x=$row['coulmn1']
	 	    	    echo "<option>$x</option>";
	 	    }
	 	    echo "</select><br>";

	 	   /*--------------------------------------*/

	 	   $sql = "SELECT coulmn2 FROM ".TABLE_NAME;
	 	   $res = $con->query($sql);

	 	    echo "<select name='c2'>";
	 	    echo "<option selected disabled> Select coulmn2 </option>";
	 	    echo "<option>".A."</option>";
	 	    while ($row = $res->fetch_assoc()) {
	 	    	    $y=$row['coulmn2']
	 	    	    echo "<option>$y</option>";
	 	    }
	 	    echo "</select><br>";

	 	   /*--------------------------------------*/
	 	 ?>
	 	 <input type="submit" name="search" value="search"><br>
	 </form> 

	  <?php
	  	 if (isset($_POST['search'])) {
	  	 		$coulmn1=$_POST['c1'];
	  	 		$coulmn2=$_POST['c2'];

	  	 	if ($coulmn1!=A && $coulmn2!=A) {
	  	 			$sql="SELECT * FROM ".TABLE_NAME." WHERE coulmn1='$coulmn1' AND coulmn2='$coulmn2'";
	  	 		}
	  	 	elseif ($coulmn1==A && $coulmn2!=A) {
	  	 			$sql="SELECT * FROM ".TABLE_NAME." WHERE coulmn2='$coulmn2'";
	  	 		}
	  	 	elseif ($coulmn1!=A && $coulmn2==A) {
	  	 			$sql="SELECT * FROM ".TABLE_NAME." WHERE coulmn1='$coulmn1'";
	  	 		}
	  	 	elseif ($coulmn1==A && $coulmn2==A) {
	  	 			$sql="SELECT * FROM ".TABLE_NAME; 
	  	 		}
	  	 		$res = $con->query($sql);
	  	 		tableDisplay($res);		
	  	 }//end if isset
	   ?>
</body>
</html>
