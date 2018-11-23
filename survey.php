
<!-- <!DOCTYPE html> -->
<?php include 'theme.php'?>
<html lang="en">
<style>
div.figure {
    margin-left: 50;
    margin-top: 20;
  float: left;
  border: thin silver solid;
  padding: 0.8em;
  text-align: center;
  font-family: "Times New Roman", Times, serif;

}

div.figure img:hover {
    border: 1px solid #777;
    transform: scale(1.05); 
}
div.figure img{
  width: 300;
  height: 300;
  object-fit: cover;
}
img.scaled {
  width: 100%;
}
table{
    border-collapse: collapse;
    font-family: "Times New Roman", Times, serif;
    /*width: 102%;*/
    /*float:right; */
    margin-right:0px;
     /*width:40px*/
     /*padding:1px;*/
     /*border: 10px */
     /*border-radius: 25px;*/
    /*-moz-border-radius:20px;*/
    /*-webkit-border-radius:20px;*/
}
tr.spaceUnder>td {
  padding-bottom: 1em;
}
table td, table th {
    border: 1px solid black;
    text-align: left;
}
</style>
<head>        <!-- Required meta tags -->
        
    </head>
    <body >
    <nav class="container p-5">
       <form action="insertSurvey.php" method="post" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <input autocomplete="off" required autofocus class="form-control" name="Username" placeholder="Username" type="text"/>
        </div> -->
        <div class="form-group">
              <select required class="form-control" name="assigned">
        <option disabled="" selected="" value="">Select the customer</option> 
                        <?php
                        include 'connection.php';
                        $conn = OpenCon();    
                        $sql = "SELECT * FROM customers13142";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)) 
                        {
                          echo "<option value = '{$row['CName'] }'";
                          echo ">{$row['CusID'] } - {$row['CName'] }</option>";
                        }
                      ?>
            </select>
          </div>
        <div class="form-group">
           <input required type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <input type="checkbox" name="pA" value="Bike">Are my products available in shop?<br>
        <input type="checkbox" name="pP" value="Car" checked>Ary my products positioned in front?<br>
        <input type="checkbox" name="pC" value="Bike">Are competitor products more prominent?<br>
        <button class="btn btn-primary" type="submit">Insert</button>
        </form>
    </nav>
    <?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->survery_13142->survery;

$result = $collection->find();

foreach ($result as $entry) {
     $path = $entry['path'];
     $name = $entry['name'];
     $time = date("Y-m-d",$entry['time']);
     $pA = $entry['pAvailable'];
     $pP = $entry['pPositioned'];
     $pC = $entry['pCompetitors'];
     $a = 'No';
     $b = 'No';
     $c = 'No'; 
     if($pA==1){
     $a = 'Yes';}
     if($pP==1){
     $b = 'Yes';}
     if($pC==1){
     $c = 'Yes';
 }
  echo "<div class=figure >
  <p>
    <a target='_blank' href=$path>
    <img class=scaled src=$path alt=$path >
  <p>
    <h2>$name</h2> 
    </a>
  <font size='2' face='Courier New' >
<table >
  <tr class='spaceUnder' >
    <th>Info</th>
  </tr>
  <tr class='spaceUnder'>
    <td>Timestamp: $time</td>
  </tr>
  <tr class='spaceUnder'>
    <td>Geographical Coordinates: (-1,-1)
</td>
  </tr>
  <tr class='spaceUnder'>
    <td>Is Product Available?: $a
</td>
  </tr>
  <tr class='spaceUnder'>
    <td>Is Product Positioned In Front?: $b
</td>
  </tr>
  <tr class='spaceUnder'>
    <td>Is Competitor's Products More Promiment?:  $c
</td>
  </tr>
</table>
</font>
</div>";
}
?>
    </body>

</html>

<!-- <div id='googleMap' style='width:100%;height:400px;'></div>
<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById('googleMap'),mapProp);
}
</script>

<script src='https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap'></script> -->