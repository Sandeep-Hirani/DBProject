<?php
    include 'connection.php';
    $conn = OpenCon();
 	$varPHP = $_GET['varJS'];
	$sql = "DELETE FROM product_13142 WHERE ProductCode='$varPHP'";    
	echo $varPHP;
    if(!mysqli_query($conn,$sql)) {
        echo 'Not Deleted!';
    }
    else{
        echo 'Deleted';
    }	
    CloseCon($conn);
    header("Location:product.php");
	die();
?> 