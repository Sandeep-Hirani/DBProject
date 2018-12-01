<script type="text/javascript" src="js/javas.js"></script> 
<div class="card">  
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table id = "myTable" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <th class="text-center">Order No</th>
          <th class="text-center">Customer</th>
          <th class="text-center">Date</th>
          <?php
            session_start();

                  if ( session_id()==1) {
                    echo "<th class='text-center'>Sales Person</th>";
                  }
          ?>
          
          <th class="text-center">Product</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Rate</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Button</th>
        </thead>     
         <?php
         $val = $_POST["var"];
          include 'connection.php';
          $conn = OpenCon();
          $currentid = session_id();
          if($currentid == 1){

              $sql0 = "SELECT * FROM salesorder_13142 where cusID = '$val'";    
          }else{
              $sql0 = "SELECT * FROM salesorder_13142 where cusID = '$val' AND salesID = '$currentid'";          
          }
      
      $result0 = mysqli_query($conn, $sql0);
      while($row = mysqli_fetch_array($result0)) 
      {
        $pro = $row['product'];
        $product  = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product_13142 WHERE ProductCode = '$pro'"));
        $out = $row['orderNo'];
        echo "<tr>";
        echo "<td class='pt-3-half' contenteditable='false'>".$row['orderNo']."</td>";
        echo "<td class='pt-3-half' contenteditable='false'>".$row['cusID']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['orderdate']."</td>";
        if(session_id()==1){

        echo "<td class='pt-3-half' contenteditable='true'>".$row['salesID']."</td>";
      }
        echo "<td class='pt-3-half' contenteditable='true'>".$product['ProductCode']." - ".$product['Brand']." -".$product['Type']." - ".$product['Shade']." -".$product['Size']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['quantity']."</td>";
        echo "<td class='pt-3-half' contenteditable='true'>".$row['rate']."</td>";
        echo "<td class='pt-3-half' contenteditable='false'>".$row['amount']."</td>";
        echo "<td>
             <span class='table-edit'><button type='button' class='btn btn-dark btn-rounded btn-sm my-0'>Save</button></span>
              <button type='button' onclick='delOrder($out)' class='btn btn-danger btn-rounded btn-sm my-0'>Remove</button>
          </td>";
        echo "</tr>";
      } 
      ?>
          <div id = "dvid">
            <tfoot>
          <td class="pt-3-half" contenteditable="false"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <?php 
          if(session_id()==1){
                  echo "<td class='pt-3-half' contenteditable='true'></td>";
          }
                            $sessionID = session_id();
           ?>
  
          <td> 
            <select required class="form-control" id = "assigned" name="assigned" onchange='changeAction(this.value, <?php echo $sessionID; ?> )'>
            <option disabled="" selected="" value="">Select Product</option> 
                        <?php
                        $result1 = mysqli_query($conn, "SELECT * FROM product_13142 ");
                        while($row1 = mysqli_fetch_array($result1)) 
                        {
                          echo "<option value = '{$row1['ProductCode'] }'";
                          echo ">{$row1['ProductCode'] }- {$row1['Type'] } - {$row1['Shade'] } - {$row1['Size'] }</option>";
                        }
                      ?>
            </select>

          </td>
          <td class="pt-3-half" contenteditable="true">1</td>
          <!-- <td><input value = "1" class="pt-3-half" contenteditable="true" min="1" name="Quantity"  type="number" style="width: 7em"></td> -->
          <td class="pt-3-half" contenteditable="true"></td>
          <td class="pt-3-half" contenteditable="true"></td>
          <td>
            <span class="table-add"><button id ="addButton" type="button"  onclick="javafunction(<?php echo $sessionID; ?>)" class="btn btn-primary btn-rounded btn-sm my-0">Add</button></span>
          </td>
        
        </tfoot>
        </div>
      </table>
    </div>
  </div>
</div>
Sales person column is visible in Admin id, because he assigns any sales person to the customer but salesperson can only assign himself. <br />
To edit, change anything in the field and click save button.(Not all fields are editable) <br / >
The drop down menu for the will show all the products from the database.
<script type="text/javascript">
  $('.table-edit').click(function () {


var val = <?php echo session_id()?>;      
var row = $(this).closest("tr");

var temp = row.find('td:eq(4)').text().substring(0,2);
var can = Number(temp);
var c0 = row.find('td:eq(0)').text();
var c2 = row.find('td:eq(1)').text();
var c3 = row.find('td:eq(2)').text();
if(val ==1){
var c4 = row.find('td:eq(3)').text();
var c5 = can;
var c6 = row.find('td:eq(5)').text();
var c7 = row.find('td:eq(6)').text();
var c8 = row.find('td:eq(7)').text();
}else{
var c4 = val;
var c5 = row.find('td:eq(3)').text();
var c6 = can;
var c7 = row.find('td:eq(5)').text();
var c8 = row.find('td:eq(6)').text();
}

    $.ajax({
      url:"salesOrderOperation.php",
      type:"POST",
      data:{
        c0:c0,
        c1:"edit",
        c2:c2,
        c3:c3,
        c4:c4,
        c5:c5,
        c6:c6,
        c7: c7,
        c8: c6*c7,
      },
      success:function(data,status){
         // $( "#myTable" ).load( " #myTable" );
         editOrder();
      },

    });
  
});



</script>
