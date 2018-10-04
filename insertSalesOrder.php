<?php 
	include 'connection.php';
	$conn = OpenCon();
	// $orderNo = $_POST["c1"];
	$cusId = $_POST["c2"];
	$date = $_POST["c3"];
	$salesperson = $_POST["c4"];
	$product = $_POST["c5"];
	$quantity = $_POST["c6"];
	$rate = $_POST["c7"];
	$amount = $_POST["c8"];
    
    $sql = "INSERT INTO salesorder_13142 (cusID, orderdate, salesID, product, quantity,rate, amount)
    VALUES ('$cusId','$date','$salesperson','$product','$quantity','$rate','$amount')";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
?>