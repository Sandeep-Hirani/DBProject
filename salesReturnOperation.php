<?php 
	include 'connection.php';
	$conn = OpenCon();
	$check = $_POST["c1"];

if( $check == "add"){
 $cusId = $_POST["c2"];
 $oNo = $_POST["c0"];
    $date = $_POST["c3"];
    $salesperson = $_POST["c4"];
  //  $product = $_POST["c5"];
    $quantity = $_POST["c6"];
    $rate = $_POST["c7"];
    $amount = $_POST["c8"];
    //echo $oNo;
    //$sq = "SELECT product from salesorder_13142 where orderNo = '$oNo' ";
     $sq = mysqli_fetch_array(mysqli_query($conn, "SELECT product from salesorder_13142 where orderNo = '$oNo' "));
     $product =  $sq['product'];
      $sql = "INSERT INTO salesReturn_13142 (ordNo, rDate, saleID, proID, rQuant,rRate, rAmount, custID) 
      VALUES ('$oNo','$date','$salesperson','$product','$quantity','$rate','$amount','$cusId')";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
}else if($check == "delete"){
	$orderNo = $_POST["c2"];
	 $sql = "DELETE from salesReturn_13142 where ordNo = '$orderNo'";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Deleted!';
    }
    else{
        echo 'Deleted';
    }

    CloseCon($conn);
}else if($check == "searchProduct"){
	$val = $_POST["c2"];   
    $sql = "SELECT * FROM product_13142 WHERE ProductCode = (Select product from salesorder_13142 where orderNo = '$val')";
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
}else if($check == "saleid"){
    $val = $_POST["c2"];   
    $sql = "SELECT salesID from salesorder_13142 where orderNo = '$val'";
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
        echo "cant find it";
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
    $sql = "UPDATE salesReturn_13142 SET custID = '$cusId', rDate = '$date' , saleID = '$salesperson' ,  proID = '$product', 
    		rQuant = '$quantity' ,rRate = '$rate', rAmount = '$amount' WHERE ordNo = '$ID'  ";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not edited!';
    }
    else{
        echo 'edited';
    }

    CloseCon($conn);
}else{


  		echo "nodata";
  	}


?>