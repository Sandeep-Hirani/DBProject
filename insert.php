<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['SID'];
    $sname = $_POST['SName'];
    $cname = $_POST['CName'];
    $number = $_POST['CNo'];
    $address = $_POST['Address'];
    $area = $_POST['Area'];
    $country = $_POST['Country'];
    $assigned = $_POST['assigned'];
    $sql = "INSERT INTO customers13142 (CusID,SName,CName,CNo,Address,Area,Country)
    VALUES ('$sid','$sname','$cname','$number','$address','$area','$country')";
    $sql1 = "INSERT INTO cuslist_13142 (SalesID,CusID)
    VALUES ('$assigned','$sid')";
    if(!mysqli_query($conn,$sql) || !mysqli_query($conn,$sql1)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
   header("Location: http://localhost/Database/show.php");
die();
?>