<!DOCTYPE html>
<html>
<head>
<style>
table{
border-style:solid;
border-width:5px;
border-color:red;
}

.floatt{
    
text-align:center;
position: relative;
left: 100px;
height: 25px;
width: 50px;
background-color: red;    
text-decoration:none ;
font-weight:bold;  
 }

 floatt a{
text-decoration:none ;
font-weight:bold; 
}




</style>
</head>
<body>
<?php
include 'connection.php';
$result = mysqli_query($connection,"SELECT * FROM PRODUCT_PROJECT");
echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Function</th>
<th>ProjectedLength</th>
<th>Number on project</th>
<th>Target Market</th>
</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['ProductID'] . "</td>";

  echo "<td>" . $row['Function_'] . "</td>";

  echo "<td>" . $row['ProjectedLength'] . "</td>";

  echo "<td>" . $row['Number_on_project'] . "</td>";

  echo "<td>" . $row['Target_market'] . "</td>";

  echo "</tr>";

  }

echo "</table>";


echo "<br>";
echo "<br>";



$result = mysqli_query($connection,"SELECT * FROM RESEARCH_PROJECT");
echo "<table border='1'>
<tr>
<th>Research ID</th>
<th>Field Of Study</th>
<th>Purpose</th>
<th>Number on project</th>
</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['ResearchID'] . "</td>";

  echo "<td>" . $row['FieldOfStudy'] . "</td>";

  echo "<td>" . $row['Purpose'] . "</td>";

  echo "<td>" . $row['Number_on_project'] . "</td>";

  echo "</tr>";

  }

echo "</table>";


 

mysqli_close($connection);

?>

<br>
<br>
<br>

<div class=floatt>
<a href="MajorPage.php">HOME</a>
</div>


</body>
</html>

