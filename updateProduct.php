<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	 <?php 
      include 'theme.php';
    ?>
</head>
<body>
	<?php 
			include 'connection.php';
			$conn = OpenCon();
			$varPHP = $_GET['varJS'];
			$sql = "SELECT * FROM product_13142 WHERE ProductCode='$varPHP'";    
    		$result = mysqli_query($conn, $sql);

		
	$row = mysqli_fetch_array($result);
    		

	?>
	<nav class="container p-5">  
  <form action="finalProduct.php" method="post">
        <div class="form-group">
              <input type="hidden" name="ProductCode" value=<?php echo $row['ProductCode'] ?> />
            
        </div>
        <div class="form-group">
            <input class="form-control" name="Brand" placeholder= <?php echo $row['Brand'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Type" placeholder=<?php echo $row['Type'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Shade" placeholder=<?php echo $row['Shade'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Size" placeholder=<?php echo $row['Size'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="SalesPrice" placeholder=<?php echo $row['SalesPrice'] ?> type="text"/>
        </div>
        
        <button class="btn btn-primary"   text-align: "center" type="submit">Update</button>
    </form>
</nav>
</body>
</html>