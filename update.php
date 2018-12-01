<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	 <?php 
      include 'theme.php';
    ?>
</head>
<body>
	<center>Update Information</center> 
	<?php 
			include 'connection.php';
			$conn = OpenCon();
			$varPHP = $_GET['varJS'];
			$sql = "SELECT * FROM customers13142 WHERE CusID='$varPHP'";    
    		$result = mysqli_query($conn, $sql);

		
	$row = mysqli_fetch_array($result);

	?>
	<nav class="container p-5">  
  <form action="final.php" method="post">
   
              <input type="hidden" name="SID" value=<?php echo $row['CusID'];  ?> />
            
                <div class="form-group">
            <input class="form-control" name="SName" placeholder= <?php echo $row['SName'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="CName" placeholder=<?php echo $row['CName'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="CNo" placeholder=<?php echo $row['CNo'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Address" placeholder=<?php echo $row['Address'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Area" placeholder=<?php echo $row['Area'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Country" placeholder=<?php echo $row['Country'] ?> type="text"/>
        </div>
        <button class="btn btn-primary"   text-align: "center" type="submit">Update</button>
    </form>
</nav>
</body>
</html>