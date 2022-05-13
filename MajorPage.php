<?php

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Major Page</title>
	<link rel="stylesheet" type="text/css" href="MajorPageStyle1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="menu-bar">
	<ul> 
		<li class="active"><i class="fa fa-home"></i>HOME</li>

	<li><a href="#">Presence Of Harmful Algal Blooms</a>
        <div class="submenu1">
        	<ul>
        		<li><a href="FAIdashboard.php">Floating Algae Index</a></li>
        		<li><a href="NDVIdashboard.php">Normalized Difference Vegetation Index</a></li>
        	</ul>
        </div>
        </li>
	<li><a href="#">Turbidity</a>
        <div class="submenu2">
        	<ul>
        		<li><a href="NDTIdashboard.php">Normalized Difference Turbidity Index</a></li>
        		
        	</ul>
        </div>
		</li>
	<li><a href="#">Nitrogen Content</a>
       <div class="submenu3">
        	<ul>
        		<li><a href="GNDVIdashboard.php">Green Normalized Difference Vegetation Index</a></li>
        		
        	</ul>
        </div>
	    </li>
	

    <li class="active"><a href="index.php">LOG OUT</a></li>

    



	</ul>
</div>

<p class="heading">Datasets Present in the Hub</p>








<div class="tableone">
    <?php
	include 'connection.php';
	$result = mysqli_query($connection,"SELECT * FROM dataset");
	echo "<table>
    <tr>
    <th>DatasetID</th>
    <th>Location</th>
    <th>Name of Water Body</th>
    <th>Capture Time</th>
    </tr>";

	while($row = mysqli_fetch_array($result))

     {

    echo "<tr>";

    echo "<td>" . $row['DatasetID'] . "</td>";

    echo "<td>" . $row['Location'] . "</td>";

    echo "<td>" . $row['WaterBodyName'] . "</td>";

    echo "<td>" . $row['CaptureTime'] . "</td>";

    echo "</tr>";

    }

    echo "</table>";
	
	
    mysqli_close($connection);

	?>

</div>
 
</body>
</html>

