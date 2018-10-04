<?php 
include 'connection.php';
$conn = OpenCon();    
    $sql = "SELECT Name, SName FROM customers13142 c inner join cuslist_13142 l on c.CusID = l.CusID
    inner join salesperson_13142 s on l.SalesID = s.ID ";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
    	echo "No table";
    }
   	else if ( mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_array($result)) 
      {
        '<tr>  
        <td>'.$row['Name'].'</td>
        <td>'.$row['SName'].'</td>
        </tr>';
  	  }	
	  }  
if ( mysqli_num_rows($result) > 0) {
	echo "fjlskdjf;al";
}

 ?>