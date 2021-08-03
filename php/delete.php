<!-- Delete record -->
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
     
    <form method="post">
    	<select name="s">
        <option selected disabled>Select coulmn2</option>
         <?php

          include 'connect.php';
          $con = dbconnect();
          $sql = "SELECT * FROM ".TABLE_NAME;
          $res = $con->query($sql);
          while ($row = $res->fetch_assoc()) {
                 $x =$row['coulmn2'];
                 echo "<option>$x</option>";
          }
           ?>
        </select><br>
        <input type="submit" name="delete" value="delete">
    </form>

    <?php 

    	if (isset($_POST['s'])) {
    		$select = $_POST['s'];
    		$sql = "DELETE FROM".TABLE_NAME."WHERE coulmn2='$select' ";
    		if ($con->query($sql)==TRUE) {
    			  echo "Deleted Succefuly";
    		}
    		else{
                 echo "Delete Failed";
    		}
    	}//end if set
     ?>

</body>
</html>