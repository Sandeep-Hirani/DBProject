  <?php 
  include 'theme.php';
  ?>
  <div class="card">  
  <div class="card-body">
 <?php 
extract($_POST); 
  include 'connection.php';
  $data =  '<table Class ="table table-striped">
            <tr class>
                <th>ID</th>
                <th>Name</th> 
                <th>ContactNo</th> 
            </tr>'; 
    $conn = OpenCon();    
    $sql = "SELECT * FROM salesperson_13142";
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
        <td>'.$row['ID'].'</td>
        <td>'.$row['Name'].'</td>
        <td>'.$row['ContactNo'].'</td>
        </tr>';
      } 
    }  
    $data .= '</table>';
    echo $data;
    CloseCon($conn);
?>
</div>
</div>

Data can be updated or deleted in the user section