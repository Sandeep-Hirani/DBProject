<?php

echo "yes";
    include 'connection.php';
    $conn = OpenCon();
  $varPHP = $_GET['varJS'];
    $sql = "DELETE FROM users_13142 WHERE Id='$varPHP'";    
  
    if(!mysqli_query($conn,$sql)) {
        echo 'Not Deleted!';
    }
    else{
        echo 'Deleted';
    } 
    CloseCon($conn);
    header("Location: http://localhost/Database/user.php");
  die();
?>