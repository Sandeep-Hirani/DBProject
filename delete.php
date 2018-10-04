<?php
    include 'connection.php';
    $conn = OpenCon();
 	$varPHP = $_GET['varJS'];
	$sql = "DELETE FROM customers13142 WHERE CusID='$varPHP'";    
    $sql1 = "DELETE FROM cuslist_13142 WHERE CusID='$varPHP'";    
	echo $varPHP;
    if(!mysqli_query($conn,$sql) || !mysqli_query($conn,$sql1)) {
        echo 'Not Deleted!';
    }
    else{
        echo 'Deleted';
    }	
    CloseCon($conn);
    header("Location: http://localhost/Database/show.php");
	die();
?> 