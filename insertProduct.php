<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['Id'];
    $sname = $_POST['Brand'];
    $cname = $_POST['Type'];
    $number = $_POST['Shade'];
    $address = $_POST['Size'];
    $area = $_POST['Salesprice'];
    $sql = "INSERT INTO product_13142 (ProductCode, Brand, Type, Shade, Size, SalesPrice)
    VALUES ('$sid','$sname','$cname','$number','$address','$area')";

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