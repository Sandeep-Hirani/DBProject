 
 <datalist id="pro">
    <option value="Internet Explorer">sdas
     <?php
     include 'theme.php';
       include 'connection.php';
       $conn = OpenCon();
         $result1 = mysqli_query($conn, "SELECT * FROM product_13142 ");
                        while($row1 = mysqli_fetch_array($result1)) 
                        {
                          echo "<option value = '{$row1['ProductCode'] }'";
                          echo ">{$row1['Brand'] }- {$row1['Type'] } - {$row1['Shade'] } - {$row1['Size'] }</option>";
        }
      ?>
  </datalist>
  <input list="pro" id=product>
  <script type="text/javascript">
  	$("#product").on('input', function () {
    var val = this.value;
    if($('#pro option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        alert(this.value);
    }
});
  </script>
  
