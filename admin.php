<!DOCTYPE html>

<html lang="en">
<head>
    <style>
p.serif {
    font-family: "Times New Roman", Times, serif;
       font-size: 80px;
}
</style>

</head>

    <body>
    	<?php 

    	include 'theme.php';
    	 ?>

    	    <center><p class="serif">Welcome Mr. Admin, this idfds sandeep hirani</p></center>
<?php 

    include 'connection.php';
extract($_POST); 
 
  $data =  '<table Class ="table table-striped">
            <tr class>
                <th>CustomerID</th> 
                <th>Seller Name</th> 
                <th>Customer Name</th>
            </tr>'; 
   
    $conn = OpenCon();    
    $sql = "SELECT customers13142.SName, cuslist_13142.CusID, salesperson_13142.Name
			FROM ((customers13142
			INNER JOIN cuslist_13142 ON cuslist_13142.CusID = customers13142.CusID)
			INNER JOIN salesperson_13142 ON cuslist_13142.SalesID = salesperson_13142.ID);";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
    	echo "No table";
    }
    else if ( mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_array($result)) 
      {
        $data .= '<tr>  
        <td>'.$row['SName'].'</td>
        <td>'.$row['CusID'].'</td>
        <td>'.$row['Name'].'</td>
        </td></tr>';
  	  }	
	}  
    $data .= '</table>';
    echo $data;
    CloseCon($conn);
?>
</table>
   
    </body>
 

</html>
