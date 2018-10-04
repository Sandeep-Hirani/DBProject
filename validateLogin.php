<?php
    include 'connection.php';

    $conn = OpenCon();
    $ID = $_POST['username'];
    $Password = $_POST['password'];
    $sql = "SELECT * FROM users_13142 WHERE Id = '$ID'";
    $result = mysqli_query($conn, $sql);
    if( $result == false)
    {
        echo "No table";
    }
    else{
      $row = mysqli_fetch_array($result);
      if($row['Password'] == $Password){

        session_id( $ID );
        session_start();
        if($ID == 1){
            header("Location: http://localhost/Database/admin.php");    
        }else{
            header("Location: http://localhost/Database/salesPerson.php");    
        }
        
      }else{
        echo "no";
      }
    }
    CloseCon($conn);
  //  
//die();
?>