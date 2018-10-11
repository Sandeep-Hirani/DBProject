<?php 
	include 'connection.php';
	$conn = OpenCon();
	$check = $_POST["c1"];

if( $check == "add"){
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
}else if($check == "delete"){
	$orderNo = $_POST["c2"];
	 $sql = "DELETE from salesorder_13142 where orderNo = '$orderNo'";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
}else if($check == "searchProduct"){
	$val = $_POST["c2"];   
    $sql = "SELECT * FROM product_13142 WHERE ProductCode = '$val'";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
    	echo "No table";
    }
    else if ( mysqli_num_rows($result) > 0) 
    {
     $row = mysqli_fetch_array($result); 
     echo json_encode($row);
  	 	
  	}else{


  		echo "nodata";
  	}
}else if($check == 'searchCustomer'){
	$val = $_POST["c2"];   
    $sql = "SELECT * FROM customers13142 WHERE cusID = '$val'";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
    	echo "No table";
    }
    else if ( mysqli_num_rows($result) > 0) 
    {
     $row = mysqli_fetch_array($result); 
     echo json_encode($row);
	}
}else if( $check == "edit"){
	$ID = $_POST["c0"];
	$cusId = $_POST["c2"];
	$date = $_POST["c3"];
	$salesperson = $_POST["c4"];
	$product = $_POST["c5"];
	$quantity = $_POST["c6"];
	$rate = $_POST["c7"];
	$amount = $_POST["c8"];
    echo $cusId;
    $sql = "UPDATE salesorder_13142 SET cusID = '$cusId', orderdate = '$date' , salesID = '$salesperson' ,  product = '$product', 
    		quantity = '$quantity' ,rate = '$rate', amount = '$amount' WHERE orderNo = '$ID'  ";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
}else{


  		echo "nodata";
  	}


?>