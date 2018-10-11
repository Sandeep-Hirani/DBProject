<?php

    include 'connection.php';
    $conn = OpenCon();
    $check = $_POST["c1"];
  // $varPHP = $_GET['varJS'];
    if($check == "deleteUser"){
        $id = $_POST["c2"];
        $sql = "DELETE FROM users_13142 WHERE Id='$id'";    
  
    if(!mysqli_query($conn,$sql)) {
        echo 'Not Deleted!';
    }
    else{
        echo 'Deleted';
    } 
    CloseCon($conn);     

    }
  die();
?>