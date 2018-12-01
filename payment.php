<!DOCTYPE html>
<html>
   <head>
      <title></title>
   </head>
   <body>
     
      <?php 
         include 'theme.php';
         ?>

         <form action="insertPayment.php" method="post">
           
          <div  id="welcomeDiv" class="card-body">
            <h3><center>Receive Payment</center></h3>
      <div class="form-group">
         Customer Name:<br>
         <select class="form-control" name="asID" >
            <option disabled="" selected="" value="">ID</option>
            <?php
               include 'connection.php';
               $conn = OpenCon();
                $result2 = mysqli_query($conn, "SELECT * FROM customers13142");
                while($row2 = mysqli_fetch_array($result2)) 
                {
                  echo "<option value = '{$row2['CusID'] }'";
                  echo ">{$row2['CusID'] } - {$row2['SName'] }</option>";
                }
               ?>
         </select>
            </br>
           Amount Received:<br>
          <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Payment" placeholder= "Payment" type="number" style="width: 100%"/></div>
         <div class="form-group">
           <br>
           <input  class="btn btn-warning" type="submit" value="Submit">
           </div>
      </div>
         </form> 
           
   </body>
</html>