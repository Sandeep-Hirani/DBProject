<!DOCTYPE html>

<html lang="en">
<head>
    <style>
p.serif {
    font-family: "Times New Roman", Times, serif;
       font-size: 80px;
}
</style>

</head>

    <body>
        <?php 
        include 'theme.php';
        include 'connection.php';
         $conn = OpenCon();
         			$sid = session_id();    
				    $sql = "SELECT * FROM salesperson_13142 WHERE ID = '$sid'";
				    
				    $result = mysqli_query($conn, $sql);
				    if( $result == false)
				    {
				    	echo "No table";
				    }
				    else if ( mysqli_num_rows($result) > 0) 
				    {
				      $row = mysqli_fetch_array($result) ;

				      $out =  $row['Name'];
				  	}else{
				  		echo "string";
				  	}
         ?>
   
    </body>
    <center><p class="serif">Welcome, Mr. <?php echo $out ?></p></center>

</html>
