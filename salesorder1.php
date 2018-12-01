<!DOCTYPE html>
<html>
<head>
   <style >
    .wrapper{
      text-align: center;
      /*font-size: 24px;*/
    }
  </style>
  <title></title>
</head>
<body>
   <?php 
    include 'theme.php';
   ?>
 </br>
  <div class = "wrapper">
   <button id ="addButton" type="button"  onclick="showDiv()" class="btn btn-primary btn-rounded btn-sm my-0">Make an order</button>
   <button id ="addButton" type="button"  onclick="showOrder()" class="btn btn-primary btn-rounded btn-sm my-0">Browse previous Orders</button>
   </div>
  <script type="text/javascript" src="js/javas1.js"></script> 
 
    <div id="welcomeDiv" class="card-body">
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
            <datalist id="browsers">
    <option value="Internet Explorer">sdas
         <?php
         // include 'theme.php';
           include 'connection.php';
           $conn = OpenCon();
            $result2 = mysqli_query($conn, "SELECT * FROM customers13142");
            while($row2 = mysqli_fetch_array($result2)) 
            {
              echo "<option value = '{$row2['CusID'] }'";
              echo ">{$row2['SName'] }</option>";
            }
          ?>
      </datalist>
      <input list="browsers" id=browsers-input style="width: 100%;">
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
  var coun=0;
    $("#browsers-input").on('input', function () {
    var val = this.value;
    if($('#browsers option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        coun=0;
        custInfo(this.value);
    }
});
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
  $('#order').load("previousOrders.php",{var: 0});  
}
</script>