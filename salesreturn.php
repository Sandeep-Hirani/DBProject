<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style >
    .wrapper{
      text-align: center;
    }
  </style>
</head>
<body>
  <script type="text/javascript" src="js/returnJS.js"></script> 
  <?php 
    include 'theme.php';
   ?>
 </br>
 <div class = "wrapper">
   <button type="button"  onclick="showDiv()" class="btn btn-primary btn-rounded btn-sm my-0">Make a Return</button>
   <button type="button"  onclick="showOrder()" class="btn btn-primary btn-rounded btn-sm my-0">Browse previous Returns</button>
   </div>
    <div  id="welcomeDiv" class="card-body">
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
                          echo ">{$row2['CusID'] } - {$row2['SName'] }</option>";
                        }
                      ?>
            </select>

          </div>
          </td>
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
<div id="content1">
  

</div>

<div id = "order">
  

</div>

</body>
</html>

<script>
  $( document ).ready(function() {
    $('#welcomeDiv').hide();
});
  function showDiv() {
    $('#order').hide();
    $('#welcomeDiv').show();
    $('#content1').show();
}
function showOrder() {
  // $('#content1').hide();
  $('#welcomeDiv').hide();
  $('#content1').hide();
  $('#order').show();
  $('#order').load("previousOrders.php",{var: 1});  
}
</script>