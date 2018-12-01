<?php
	include 'connection.php';
	 $conn = OpenCon();
	  $val = $_POST["var"];
	  $flag = $_POST["val"];
	$sql = "SELECT * FROM invoice_mst_13142 WHERE party_id = '$val' AND return_flag = '$flag'";
    $result1 = mysqli_query($conn, $sql);
        while($row1 = mysqli_fetch_array($result1)) 
        {
        	$invid = $row1[0];
            $ddate = $row1['inv_date'];
            $data =  "
            </br>
            </br>
					<div class='center'><h3>Order No: $invid on $ddate</h3></div>
					<div Class ='table table-striped'>
						<table >
						<thead>
					  		<tr class ='center'>
					    		<th>LineItemNo</th>
					    		<th>Product</th>
					    		<th>Quantity</th>
					    		<th>Rate</th>
					    		<th>Amount</th>
					  		</tr>
					  	</thead>
					  	";
			    $result = mysqli_query($conn, "SELECT * FROM invoice_det_13142 WHERE inv_id = '$invid'");
		        while($row = mysqli_fetch_array($result)) 
		        {
		        	$invdet = $row[0];
		        	$qty = $row[3];
		        	$rate = $row[4];
		        	$total = $row[5];
		        	$prod = $row[7];
		        	$result2 = mysqli_query($conn, "SELECT * FROM product_13142 WHERE productcode = '$prod'");
		        	$row3 = mysqli_fetch_array($result2);
		        	$product = $row3[1].' -' .$row3[2].' - '.$row3[3].' - '.$row3[4]; 
		        	// echo "<script type='text/javascript'>alert('$prod');</script>";  
				  	$data .= "
							  	<tbody class ='center'>
							  		<tr>
									    <td>$invdet</td>
									    <td id = 'some' >$product</td>
									    <td>$qty</td>
									    <td>$rate</td>
									    <td>$total</td>
							  		</tr>
							  	</tbody>
							
						
  					";
  				}
  				$data .="</table></div>";
  				echo $data;
}
?>