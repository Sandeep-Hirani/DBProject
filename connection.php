<?php
 

#CONNECTION-

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "customer-13142";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 if($conn){
     
 }
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

?>

