<!DOCTYPE html>

<html lang="en">


    <body>

         <style>
.center {
    
        font-family: "Times New Roman", Times, serif;
        text-align: center;
  
}​
</style>
    	<?php 

    	include 'theme.php';
    	 ?>

    	  <div class="center"><h1>Welcome, Mr. Admin</h1></div>
<div class="card-body">
<?php
    include 'connection.php';
extract($_POST); 
 
  $data =  '<table Class ="table table-striped">
            <tr class>
                <th>Customer Name</th> 
                
                <th>Assigned SalesPerson</th>
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
        <td>'.$row['Name'].'</td>
        </td></tr>';
  	  }	
	}  
    $data .= '</table>';
    echo $data;
    CloseCon($conn);
?>
</table>
   </div>
    </body>
 

</html>
