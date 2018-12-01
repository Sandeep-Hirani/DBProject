<?php
    include 'connection.php';

    $conn = OpenCon();
    $sid = $_POST['asID'];
    $payment = $_POST['Payment'];
    $pdate = date("Y/m/d");
    $sql = "INSERT INTO ppayments_13142 ( party_id, amount, pdate)
    VALUES ('$sid','$payment','$pdate')";
    if(!mysqli_query($conn,$sql)) {
        echo 'Not Added!';
    }
    else{
        echo 'Added';
    }

    CloseCon($conn);
    header("Location:payment.php");
die();
?>