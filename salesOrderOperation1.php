<?php 
	include 'connection.php';
	$conn = OpenCon();
	$check = $_POST["c1"];

if( $check == "add"){
	$party = $_POST["c2"];
	$inv_id = $_POST["c3"];
	$qty = $_POST["c4"];
	$rate = $_POST["c5"];
	$amount = $_POST["c6"];
	$pid = $_POST["c7"];
    $ty = (int)$inv_id;
    $sql = "INSERT INTO invoice_det_13142 (party_id, inv_id, qty, rate, total,return_flag, item_id)
    VALUES ('$party','$ty','$qty','$rate','$amount', '0','$pid')";
    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
}else if( $check == "addorder"){
     $result = mysqli_query($conn, "SELECT max(inv_id) as id FROM  invoice_mst_13142"); 
    $ro = mysqli_fetch_array($result);
    $ord = $ro['id']+1;
    $party = $_POST["c3"];
    $pdate =date("Y/m/d");
    
    $sql = "INSERT INTO invoice_mst_13142 (INV_ID,inv_date,party_ID) VALUES ('$ord','$pdate','$party')";
    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        if(!mysqli_query($conn,"commit")) {
     //   echo 'Not commited!';
    }
            else{
                mysqli_query($conn,"commit");
                //echo 'commited';
            }
        //echo 'Added';
            echo $ord;
    }

    CloseCon($conn);
}else if($check == "delete"){
	$orderNo = $_POST["c2"];
	 $sql = "DELETE from invoice_det_13142 where inv_det_id = '$orderNo'";

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
	$invd_id = $_POST["c0"];
	$cusId = $_POST["c2"];
	$inv_id = $_POST["c3"];
	$qty = $_POST["c4"];
	$rate = $_POST["c5"];
	$amount = $_POST["c6"];
	$proc = $_POST["c7"];
    $sql = "UPDATE invoice_det_13142 SET party_id = '$cusId', qty = '$qty' , rate = '$rate' ,  total = '$amount', 
    		item_id = '$proc' WHERE inv_det_id = '$invd_id'  ";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Update!';
    }
    else{
        echo 'Updated';
    }

    CloseCon($conn);
}else{


  		echo "nodata";
  	}


?>