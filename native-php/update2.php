<!-- update 2 -->
<!DOCTYPE html>
<html>
<head>
	<title>Update 2</title>
</head>
<body>
	<form method="post">
		<select name="s" onchange="this.form.submit()">
			<option selected disabled>Select coulmn2</option>
			<?php 
				include 'connect.php';
				$con = dbconnect();
				$sql = "SELECT * FROM ".TABLE_NAME;
				$res = $con->query($sql);
				while ($row=$res->fetch_assoc()) {
					   $x = $row['coulmn2'];
					   echo "<option>$x</option>";
				}
			 ?>
		</select><br>
             <?php 
             	if (isset($_POST['s'])) {
             		$select=$_POST['s'];
             		$sql="SELECT * FROM ".TABLE_NAME." WHERE coulmn2='$select'";
             		$res = $con->query($sql);
             		$c1 = $row['coulmn1'];
             		$c3 = $row['coulmn3'];
             		echo "coulmn2 : <input name='c2' value='$select' readonly ><br>";
             		echo "coulmn1 : <input name='c1' value='$c1'              ><br>";
             		echo "coulmn3 : <input name='c3' value='$c3'              ><br>";
             		echo "<input type='submit' name='update' value='update' ";
             	}
              ?>

	</form>

	       <?php
	          if (isset($_POST['update'])) {
	               $coulmn1 = $_POST['c1'];
	               $coulmn2 = $_POST['c2'];
	               $coulmn3 = $_POST['c3'];
	               $sql = "UPDATE".TABLE_NAME."SET coulmn1='$coulmn1 , coulmn2='$coulmn2, coulmn3='$coulmn3'";
	               if ($con->query($sql==TRUE)) {
	               		echo "Update Successfully";
	               	 }
	               	 else
	               	 {
	               	 	echo "Update failed";
	               	 }
	          }
	       ?>
</body>
</html>