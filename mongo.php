<?php
include 'theme.php';
?>

<html>
<head>
<style>
div.figure {
  float: left;
  /*width: 20%;*/
  border: thin silver solid;
  margin: 0.5em;
  padding: 0.5em;
  text-align: center;
    color: black;
  /*font-style: italic;*/
  font-size: smaller;
  text-indent: 0;
  font-family: "Times New Roman", Times, serif;

}

div.figure img:hover {
    border: 1px solid #777;
    transform: scale(1.05); 
}
div.figure img{
	 width: 280;
  height: 280;
  object-fit: cover;
}
img.scaled {
  width: 100%;
}
table{
	font-family: "Times New Roman", Times, serif;
	float:right; 
	margin-right:0px;
	 width:40px

     border: 10px 
     border-radius: 25px;
    -moz-border-radius:20px;
    -webkit-border-radius:20px;
}
tr.spaceUnder>td {
  padding-bottom: 1em;
}
table td, table th {
    border: 1px solid black;
    text-align: left;
}
</style>
</head>
<body>
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->survery_13142->survery;

$result = $collection->find();

foreach ($result as $entry) {
     $path = $entry['path'];
     $name = $entry['name'];
     $time = date("Y-m-d",$entry['time']);
     //echo $path;
    
  echo "<div class=figure>
  <p>
  	<a target='_blank' href=$path>
  	<img class=scaled src=$path
    alt=$path>
  <p>
  	<h2>$name</h2> 
  
<table width='280'>
  <tr class='spaceUnder'>
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
    <td>Is Product Available?: Yes
</td>
  </tr>
  <tr class='spaceUnder'>
    <td>Is Product Positioned In Front?: Yes
</td>
  </tr>
  <tr class='spaceUnder'>
    <td>Is Competitor's Products More Promiment?: Yes
</td>
  </tr>
</table>
</div>";
}
?>

</body>
</html>