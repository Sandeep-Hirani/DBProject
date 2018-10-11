<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['SID'];
    $sname = $_POST['SName'];
    $cname = $_POST['CName'];
    $cno = $_POST['CNo'];
    $address = $_POST['Address'];
    $area = $_POST['Area'];
    $country = $_POST['Country'];
    $sql1 = "SELECT * FROM customers13142 WHERE CusID = '$sid'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    if($sname == ""){
        $sname = $row1['SName'];
    }
    if($cname == ""){
        $cname = $row1['CName'];
    }
    if($cno == ""){
        $cno = $row1['CNo'];
    }
    if($address == ""){
        $address = $row1['Address'];
    }
    if($area == ""){
        $area = $row1['Area'];
    }
    if($country == ""){
        $country = $row1['Country'];
    }
    echo $row1['SName'];
    $sql = "UPDATE customers13142 SET SName= '$sname',CName='$cname',CNo='$cno',Address='$address',Area='$area',Country='$country' WHERE CusID = '$sid'";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
    header("Location:show.php");
die();
?>