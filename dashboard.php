<html>
   <?php 
      include 'theme.php';
      ?>
   <head>
      <style type="text/css">
      #rad1{
        /*margin-bottom: 70%;*/
      }
        #rad{
          /*vertical-align: middle;
            margin-bottom: 50px;
            margin-left: 20px;
            margin: 50px;*/
            /*align-self: center;*/
        }
         #left{
         /*margin-bottom: 300px;*/
         background-color: Transparent;
         background-repeat:no-repeat;
         border: none;
         cursor:pointer;
         overflow: hidden;
         outline:none;
         }
         #right{
         margin-top: 285px;
         background-color: Transparent;
         background-repeat:no-repeat;
         border: none;
         cursor:pointer;
         overflow: hidden;
         outline:none;
         }
         #container{
         /*align-self: center;*/
         }
      </style>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Google Charts Tutorial</title>
      <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript" src="js/dashboard.js"></script> 
      <script type="text/javascript" src="js/dashCompare.js"></script> 
   </head>
   <body>

      <div class="container">
         <div class="row" >
            <button id = "left" class="w3-button w3-black w3-display-left"  onclick="edit(-1,'ordertobrand',1)">&#10094;</button>
            <div class="col-sm-10">
              
                  
               <div id = "ordertobrand" style = "width: 1050px; height: 600px;"></div>
             <center>   <div id="rad1">
                          <input type="radio" name="ordertobrand" value="Pie Chart" > Pie Chart
                          <input type="radio" name="ordertobrand" value="Column Chart"> Column Chart
                          <input type="radio" name="ordertobrand" value="Bar Chart" checked=""> Bar Char
                          <input type="radio" name="ordertobrand" value="Line Chart"> Line Char
                          <input type="radio" name="ordertobrand" value="Histogram"> Histogram
                        </div></center>  
            </div>
            <div class="col-sm-1">
               <button id ="right" class="w3-button w3-black w3-display-right; vertical-align: middle" onclick="edit(1,'ordertobrand',1)">&#10095;</button>
            </div>
         </div>
      </div>
    </br>
  </br>

      <div class="container">
         <div class="row" >
            <button id = "left" class="w3-button w3-black w3-display-left"  onclick="edit(-1,'topCustomers',1)">&#10094;</button>
            <div class="col-sm-10">
               <div id = "topCustomers" style = "width: 1050px; height: 600px;"></div>
               <center>
                <input type="radio" name="topCustomers" value="Pie Chart" checked=""> Pie Chart
                          <input type="radio" name="topCustomers" value="Column Chart"> Column Chart
                          <input type="radio" name="topCustomers" value="Bar Chart"> Bar Char
                          <input type="radio" name="topCustomers" value="Line Chart"> Line Char
                          <input type="radio" name="topCustomers" value="Histogram"> Histogram
                          </center>
            </div>
            <div class="col-sm-1">
               <button id ="right" class="w3-button w3-black w3-display-right; vertical-align: middle" onclick="edit(1,'topCustomers',1)">&#10095;</button>
            </div>
         </div>
      </div>

 </br>
  </br>
      <div class="container">
         <div class="row" >
            <button id = "left" class="w3-button w3-black w3-display-left"  onclick="edit(-1,'amountReceived',1)">&#10094;</button>
            <div class="col-sm-10">
               <div id = "amountReceived" style = "width: 1050px; height: 600px;"></div>
                <input type="radio" name="amountReceived" value="Pie Chart" checked=""> Pie Chart
                          <input type="radio" name="amountReceived" value="Column Chart"> Column Chart
                          <input type="radio" name="amountReceived" value="Bar Chart"> Bar Char
                          <input type="radio" name="amountReceived" value="Line Chart"> Line Char
                          <input type="radio" name="amountReceived" value="Histogram"> Histogram
            </div>
            <div class="col-sm-1">
               <button id ="right" class="w3-button w3-black w3-display-right; vertical-align: middle" onclick="edit(1,'amountReceived',1)">&#10095;</button>
            </div>
         </div>
      </div>
</br>
</br>
</br>
</br>
      <div class="container">
         <datalist id="pro">
    <option value="Internet Explorer">sdas
     <?php
     include 'theme.php';
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
  <center>
    <label>Brand A</label>
  <input list="pro" id=product style="width: 40%;">
  <label>Brand B </label>
  <input list="pro" id=some style="width: 40%;"></center>
         <div class="row" >
            <div class="col-sm-10">
               <div id = "compare" style = "width: 1050px; height: 600px;"></div>
               <center>
               <div id = "rad">
                <input type="radio" name="compare" value="Pie Chart" checked=""> Pie Chart
                          <input type="radio" name="compare" value="Column Chart"> Column Chart
                          <input type="radio" name="compare" value="Bar Chart"> Bar Char
                          <input type="radio" name="compare" value="Line Chart"> Line Char
                          <input type="radio" name="compare" value="Histogram"> Histogram
                        </div>
                        </center>
            </div>
            <div class="col-sm-1">
            </div>
         </div>
      </div>
   </body>
</html>
 <script type="text/javascript">
 
  var a=0;
  var b=0;
   $('input[type=radio][name=compare]').change(function() {
    if(a>0 && b>0){
        edits("compare",document.getElementById('product').value,document.getElementById('some').value);
    }
   
});
    $('input[type=radio][name=topCustomers]').change(function() {

        edit(0,'topCustomers',1);   
      });
     $('input[type=radio][name=ordertobrand]').change(function() {

        edit(0,'ordertobrand',1);   
      });
    $("#product").on('input', function () {
    var val = this.value;
    if($('#pro option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
      a++;
      if(b!=0){
        edits("compare",this.value,document.getElementById('some').value);
      }
        // alert(this.value);
    }
});
    $("#some").on('input', function () {
    var val = this.value;
    if($('#pro option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        b++;
        if(a!=0){
        edits("compare",this.value,document.getElementById('product').value);
      }
    }
});
  </script>