 <!DOCTYPE html>
<html>

<head>
 <title>Users</title>
<?php
    include 'theme.php';
  ?>
<body>
 <nav class="container p-5">
    <center>User Insertion </center>
    <form id = "myform" action ="insertUser.php" method="post">
        <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Id" placeholder= "ID" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Pass" placeholder= "Password" type="text"/>
        </div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Active" placeholder= "Active" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Name" placeholder= "Name" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="CNo" placeholder= "Contact Number" type="text"/>
        </div>
         <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="SalesPerson" placeholder= "SalesPerson" type="text"/>
        </div>
        <button id = "sub" class="btn btn-primary"   text-align: "center"  >Insert</button></form>
  </nav>
  <nav>
    <?php 
extract($_POST); 
  include 'connection.php';
  $data =  '<table Class ="table table-striped">
            <tr class>
                <th>ID</th> 
                <th>Password</th>
                <th>Active</th> 
                <th>Name</th> 
                <th>ContactNo</th> 
                <th>SalesPerson</th>
                <th>Edit</th>
                <th>Delete</th> 
            </tr>'; 
    $conn = OpenCon();    
    $sql = "SELECT * FROM users_13142";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
      echo "No table";
    }
    else if ( mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_array($result)) 
      {
        $ids = $row['Id'];
        $s = "SELECT * from salesperson_13142 where ID = '$ids'";
         //$product  = mysqli_fetch_array(mysqli_query($conn, "SELECT * from salesperson_13142 where ID = '$ids'"));
        $res = mysqli_query($conn, $s);
        $r = mysqli_fetch_array($res);
        $data .= '<tr>  
        <td>'.$row['Id'].'</td>
        <td>'.$row['Password'].'</td>
        <td>'.$row['Active'].'</td>
        <td>'.$r['Name'].'</td>
        <td>'.$r['ContactNo'].'</td>
        <td>'.$row['Salesperson'].'</td>
        <td>
        <button onclick="edit('.$row['Id'].')" class="btn btn-warning">Edit</button>
        </td><td>
        <button onclick="DeleteUser('.$row['Id'].')" class="btn btn-danger">Delete</button>
        </td></tr>';
      } 
    }  
    $data .= '</table>';
    echo $data;
    CloseCon($conn);
?>
<script>
    function DeleteUser(varJS) 
    {
    $.ajax({

      url:"deleteUser.php",
      type:"POST",
      data:{
        c1:"deleteUser",
        c2:varJS
       
      },
      success:function(data){
         location.reload();
      },
        
    });
    }
    function edit(varJS) 
    {
      var page='updateUser.php?varJS='+varJS;
      document.location.href=page;
    }
  </script>

  </nav>
</body>
</html>