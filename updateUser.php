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
			$sql = "SELECT * FROM users_13142 WHERE Id='$varPHP'";    
    	$result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $r  = mysqli_fetch_array(mysqli_query($conn, "SELECT * from salesperson_13142 where ID = '$varPHP'"));
	?>
	<nav class="container p-5">  
  <form action="finalUser.php" method="post">
        <div class="form-group">
              <input type="hidden" name="Id" value=<?php echo $row['Id'] ?> />
            
        </div>
        <center>Update Information</center>
        <div class="form-group">
            <input class="form-control" name="Pass" placeholder= <?php echo $row['Password'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Active" placeholder=<?php echo $row['Active'] ?> type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="Name" placeholder=<?php echo $r['Name'] ?> type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="Contact" placeholder=<?php echo $r['ContactNo'] ?> type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Salesperson" placeholder=<?php echo $row['Salesperson'] ?> type="text"/>
        </div>
        <button class="btn btn-primary"   text-align: "center" type="submit">Update</button>
    </form>
</nav>
</body>
</html>