<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['Id'];
    $sname = $_POST['Pass'];
    $cname = $_POST['Active'];
    $cno = $_POST['Salesperson'];
    $sql1 = "SELECT * FROM users_13142 WHERE Id = '$sid'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    echo $cno;
    echo $address;
    if($sname == ""){
        $sname = $row1['Pass'];
    }
    if($cname == ""){
        $cname = $row1['Active'];
    }
    if($cno == ""){
        $cno = $row1['Salesperson'];
    }
    $sql = "UPDATE users_13142 SET Password= '$sname',Active='$cname',Salesperson='$cno'WHERE Id = '$sid'";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
    header("Location:user.php");
die();
?>