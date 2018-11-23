<?php include "theme.php"  ?>
<!DOCTYPE html>
<html>
<head>
	<style>
	#design-cast {
    position: relative;
    overflow: hidden;
}

.member {
    float: left;
    width: 31%;
    margin: 1% 1% 45px 1%;
}
/*.member:hover {
    border: 1px solid #777;
    transform: scale(1.05); 
}*/

.name {
    position: absolute;
    bottom: 0px;
}

.member img {
    width: 100%;
    display: block;
}
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 250px;
}

div.gallery:hover {
    border: 1px solid #777;
    transform: scale(1.2); 
}

div.gallery img {
    /*width: 100%;
    height: auto;*/
 /*    display: block;
  max-width:250px;
  max-height:150px;*/
  width: 250;
  height: 250;
  object-fit: cover;
}

div.desc {
    padding: 15px;
    text-align: center;
}
div.figure {
  float: left;
  /*width: 20%;*/
  border: thin silver solid;
  margin: 0.5em;
  padding: 0.5em;
  text-align: center;
  font-style: italic;
  font-size: smaller;
  text-indent: 0;
}
div.figure img:hover {
    border: 1px solid #777;
    transform: scale(1.2); 
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

	float:right; 
	margin-right:0px;
	 width:40px
     border: 10px 
     border-radius: 25px;
    border-radius:10px;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
}
tr.spaceUnder>td {
  padding-bottom: 1em;
}
table td, table th {
    border: 1px solid black;
    text-align: left;
}
</style>
	<title>Test</title>
</head>
<body>
<!-- <div style="width:500px">
	<div class='gallery'>
	  <a target='_blank' href="uploads/3.png">
	    <img src="uploads/3.png" alt='Cinque Terre' width='500' height='500'>
	  </a>
	</div>
	<div class='desc'>Customer Name : Sandeep</div>
</div> -->

<div class=figure>
  <p>
  	<a target='_blank' href='uploads/q4.png'>
  	<img class=scaled src='uploads/q4.png'
    alt='St. Tropez'>
  <p>
  	<h2>Alina Ahmed</h2> 
  
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
</div>
</body>
</html>