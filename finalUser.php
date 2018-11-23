<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['Id'];
    $sname = $_POST['Pass'];
    $cname = $_POST['Active'];
    $cno = $_POST['Salesperson'];
    $name = $_POST['Name'];
    $contact = $_POST['Contact'];
    $sql1 = "SELECT * FROM users_13142 WHERE Id = '$sid'";
     $r  = mysqli_fetch_array(mysqli_query($conn, "SELECT * from salesperson_13142 where ID = '$sid'"));
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);

    if($sname == ""){
        $sname = $row1['Password'];
    }
    if($cname == ""){
        $cname = $row1['Active'];
    }
    if($cno == ""){
        $cno = $row1['Salesperson'];
    }
    if($name == ""){
        $name = $r['Name'];
    }
    if($contact == ""){
        $contact = $r['ContactNo'];
    }
     
    $sql = "UPDATE users_13142 SET Password= '$sname',Active='$cname',Salesperson='$cno'WHERE Id = '$sid'";
    $s = "UPDATE salesperson_13142 SET Name = '$name' , ContactNo = '$contact' where ID = '$sid'";
    if(!mysqli_query($conn,$sql) || !mysqli_query($conn,$s)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
    header("Location:user.php");
die();
?>