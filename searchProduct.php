<?php

	include 'connection.php';
	$val = $_POST["c1"];
	$conn = OpenCon();    
    $sql = "SELECT * FROM product_13142 WHERE ProductCode = '$val'";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
    	echo "No table";
    }
    else if ( mysqli_num_rows($result) > 0) 
    {
     $row = mysqli_fetch_array($result); 
     // echo $row['Brand'];
     echo json_encode($row);
  	 	
  	}else{


  		echo "nodata";
  	}



?>