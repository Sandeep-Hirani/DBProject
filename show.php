<!DOCTYPE html>
<html>

<?php 
      include 'theme.php';
    ?>
<body>

 <nav class="container p-5">
  <center><h3>INSERTION TABLE</h3></center>
    <form action="insert.php" method="post">
        <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="SID" placeholder= "Shop ID" type="text"/></div>
        <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="SName" placeholder= "Shop Name" type="text"/></div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="CName" placeholder= "Customer Name" type="text"/></div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="CNo" placeholder= "Cell Number" type="text"/></div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Address" placeholder= "Address" type="text"/></div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Area" placeholder= "Area" type="text"/></div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Country" placeholder= "Country" type="text"/></div>
        <div class="form-group">
            <select class="form-control" name="assigned">
        <option disabled="" selected="" value="">Assign Salesperson</option> 
                        <?php
                       include 'connection.php';
                        $conn = OpenCon();    
                        $sql = "SELECT * FROM salesperson_13142";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)) 
                        {
                          echo "<option value = '{$row['ID'] }'";
                          echo ">{$row['ID'] } - {$row['Name'] }</option>";
                        }
                      ?>
            </select>
          </div>
        <button class="btn btn-primary"   text-align: "center" type="submit">Insert</button>
    </form>
  </nav>
  <div class="card">  
  <div class="card-body">
<?php 
extract($_POST); 
 
  $data =  '<table Class ="table table-striped">
            <tr class>
                <th>CustomerID</th> 
                <th>Shop Name</th> 
                <th>Customer Name</th>
                <th>Customer No</th> 
                <th>Address</th> 
                <th>Area</th>
                <th>Country</th> 
                
                <th>  Edit / Delete</th> 
            </tr>'; 
   
    $conn = OpenCon();    
    $sql = "SELECT * FROM customers13142";
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
        <td>'.$row['CusID'].'</td>
        <td>'.$row['SName'].'</td>
        <td>'.$row['CName'].'</td>
        <td>'.$row['CNo'].'</td>
        <td>'.$row['Address'].'</td>
        <td>'.$row['Area'].'</td>
        <td>'.$row['Country'].'</td>
        <td>
        <button onclick="edit('.$row['CusID'].')" class="btn btn-warning">Edit</button>
      
        <button onclick="DeleteUser('.$row['CusID'].')" class="btn btn-danger">Delete</button>
        </td></tr>';
  	  }	
	  }  
    $data .= '</table>';
    echo $data;
    CloseCon($conn);
?>

</table>
 </div>
</div>
  <script>
    function DeleteUser(varJS) 
    {
      var page='delete.php?varJS='+varJS;
      document.location.href=page;
    }
    function edit(varJS) 
    {
      var page='update.php?varJS='+varJS;
      document.location.href=page;
    }
  </script>
</body>
</html>