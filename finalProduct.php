<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['ProductCode'];
    $sname = $_POST['Brand'];
    $cname = $_POST['Type'];
    $cno = $_POST['Shade'];
    $address = $_POST['Size'];
    $area = $_POST['SalesPrice'];
    $sql1 = "SELECT * FROM product_13142 WHERE ProductCode = '$sid'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    echo $cno;
    echo $address;
    if($sname == ""){
        $sname = $row1['Brand'];
    }
    if($cname == ""){
        $cname = $row1['Type'];
    }
    if($cno == ""){
        $cno = $row1['Shade'];
    }
    if($address == ""){
        $address = $row1['Size'];
    }
    if($area == ""){
        $area = $row1['SalesPrice'];
    }
    $sql = "UPDATE product_13142 SET Brand= '$sname',Type='$cname',Shade='$cno',Size='$address',SalesPrice='$area' WHERE ProductCode = '$sid'";

    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
    header("Location:product.php");
die();
?>