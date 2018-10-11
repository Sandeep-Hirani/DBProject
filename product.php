 <!DOCTYPE html>
<html>

<head>
 <title>Add Product</title>
<?php
    include 'theme.php';
  ?>
  
<body>
 <nav class="container p-5">
    <center>Product Insertion </center>
    <form id = "myform" action ="insertProduct.php" method="post">
        <div class="form-group">
            <input class="form-control" name="Id" placeholder= "Product Code" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="Brand" placeholder= "Brand" type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Type" placeholder= "Type" type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Shade" placeholder= "Shade" type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Size" placeholder= "Size" type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="Salesprice" placeholder= "Salesprice" type="text"/>
        </div>
        <button id = "sub" class="btn btn-primary"   text-align: "center"  >Insert</button>
        
    </form>
  </nav>

  <div class="card">  
  <div class="card-body">
  <nav>
    <?php 
extract($_POST); 
  include 'connection.php';
  echo '<div class="card-body">';
  $data =  '<table Class ="table table-striped">
            <tr class>
                <th>Product Code</th> 
                <th>Brand</th> 
                <th>Type</th>
                <th>Shade</th> 
                <th>Size</th> 
                <th>Salesprice</th>
                <th>Edit</th>
                <th>Delete</th> 
            </tr>'; 
    $conn = OpenCon();    
    $sql = "SELECT * FROM product_13142";
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
        <td>'.$row['ProductCode'].'</td>
        <td>'.$row['Brand'].'</td>
        <td>'.$row['Type'].'</td>
        <td>'.$row['Shade'].'</td>
        <td>'.$row['Size'].'</td>
        <td>'.$row['SalesPrice'].'</td>
        <td>
        <button onclick="edit('.$row['ProductCode'].')" class="btn btn-warning">Edit</button>
        </td><td>
        <button onclick="DeleteUser('.$row['ProductCode'].')" class="btn btn-danger">Delete</button>
        </td></tr>';
      } 
    }  
    $data .= '</table>';

    echo $data;
    echo '</div>';
    CloseCon($conn);
?>
<script>
    function DeleteUser(varJS) 
    {
      var page='deleteProduct.php?varJS='+varJS;
      document.location.href=page;
    }
    function edit(varJS) 
    {
      var page='updateProduct.php?varJS='+varJS;
      document.location.href=page;
    }
  </script>

  </nav>
</div>
</div>
</body>
</html>