<!-- update 1 -->
<!DOCTYPE html>
<html>
<head>
	<title>Update 1</title>
</head>
<body>
    <form method="post">
    	<select name="s">
    		<option selected disabled>Select coulmn2</option>
    		 <?php
    		   include 'connect.php';
    		   $con=dbconnect();
    		   $sql = "SELECT * FROM ".TABEL_NAME;
    		   $res = $con->query($sql);
               while ($row=$res->fetch_assoc()) {
               	   $x = $row['coulmn2'];
               	  echo "<option>$x</option>"
               }
    		 ?>
    	</select>

         Enter new c1 : <input type="text" name="c1"> <br>
         Enter new c3 : <input type="text" name="c3"> <br>

         <input type="submit" name="update" value="update">

    </form>
           <?php
                  if (isset($_POST['update'])) {
                  	 
                      $select = $_POST['s'];
                      $c1     = $_POST['c1'];
                      $c3     = $_POST['c3'];

                      $sql = "UPDATE ."TABLE_NAME".SET coulmn1='$c1' , coulmn3='$c3' WHERE coulmn2='$select' ";

                      if ($con->query($sql)==TRUE) {
                      	   echo "Update Successfly";
                      }
                      else
                      {
                      	echo "error in update";
                      }
                  }//end if isset


            ?>

</body>
</html>