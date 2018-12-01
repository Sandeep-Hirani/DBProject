<!DOCTYPE html>

<html>
<?php
// include 'theme.php';


?>
<head>
	<style>
#some{
	  text-align: left;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
    /*width: 100%;*/
    width: auto;
    margin-bottom: 20px;
    margin: 0px auto;  
    border: 1px solid #ddd;
}

th, td {
    text-align: center;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}

.center {
    
        font-family: "Times New Roman", Times, serif;
        text-align: center;
  
}​
</style>
</head>
<body>
	<!-- <?php  ?> -->
	 	<nav class="container p-5">
  <center><h3>Order History</h3></center>
        <div class="form-group">
            <datalist id="browsers">
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
  <input list="browsers" id=browsers-input style="width: 100%;">
        </div>
    </nav>
<div id = "ptable"></div>
</body>
</html>

<script>
	$("#browsers-input").on('input', function () {
    var val = this.value;
    if($('#browsers option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        custIn(this.value);
    }
});
	function custIn(val1){;
			custID = val1;
			var val4 = "<?  echo $_POST["var"]; ?>";
         	$('#ptable').load("pOrderTable.php",{var: custID,val: val4 });  
}
</script>