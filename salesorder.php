<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <script type="text/javascript" src="js/javas.js"></script> 
	<?php 
		include 'theme.php';
	 ?>
    <div class="card-body">
   <table id = "tab" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <th class="text-center">ID</th>
          <th class="text-center">Shop Name</th>
          <th class="text-center">Customer</th>
          <th class="text-center">Cell No</th>
          <th class="text-center">Address</th>
          <th class="text-center">Area</th>
          <th class="text-center">Country</th>
        </thead>
        <tr><td>
        <div class="form-group">
            <select class="form-control" name="asID" onchange='custInfo(this.value)'>
        <option disabled="" selected="" value="">ID</option> 
                         <?php
                       include 'connection.php';
                       $conn = OpenCon();
                        $result2 = mysqli_query($conn, "SELECT * FROM customers13142");
                        while($row2 = mysqli_fetch_array($result2)) 
                        {
                          echo "<option value = '{$row2['CusID'] }'";
                          echo ">{$row2['CusID'] } - {$row2['CName'] }</option>";
                        }
                        // CloseCon($conn);
                      ?>
            </select>

          </div>
          </td>
           <!--  <td>
        <div class="form-group">
            <select class="form-control" name="asName">
        <option disabled="" selected="" value="">Name</option> 
                        <?php
                       //  include 'connection.php';
                       // $conn = OpenCon();
                        // echo "hello";
                        // while($row3 = mysqli_fetch_array($result2)) 
                        // {
                        //   echo "<option value = '{$row3['CusID'] }'";
                        //   echo ">{$row3['CusID'] } - {$row3['SName'] }</option>";
                        // }
                      ?>
            </select>
          </div>
          </td> -->
          <td></td> 
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr> 
        <?php


      ?>
      </table>

  </div>



<!--   <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3> -->
<div id="content">
  

</div>

</body>
</html>