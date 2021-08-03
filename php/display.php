<!-- //Dsipalay all data in database -->
<!DOCTYPE html>
<html>
<head>
	<title>Display values</title>
</head>
<body>
  <?php 
  	  include 'connect.php';
  	  $con = dbconnect();
  	  $sql = "SELECT * FROM ".TABLE_NAME;
  	  $res = $con->query($sql);
  	  tableDidplay($res);
  	  $con->close();
   ?>
</body>
</html>