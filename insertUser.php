<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['Id'];
    $sname = $_POST['Pass'];
    $cname = $_POST['Active'];
    $number = $_POST['SalesPerson'];
    $Name = $_POST['Name'];
    $CNo = $_POST['CNo'];
    $sql = "INSERT INTO users_13142 (Id, Password, Active, SalesPerson)
    VALUES ('$sid','$sname','$cname','$number')";
    $sql1 = "INSERT INTO salesperson_13142 (ID, Name, ContactNo)
    VALUES ('$sid','$Name','$CNo')";

    if(!mysqli_query($conn,$sql) or !mysqli_query($conn,$sql1) ) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
    header("Location: http://localhost/Database/user.php");
die();
?>