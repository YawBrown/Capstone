<?php 
include 'connection.php';
if(isset($_POST['Add'])){ 
$ProductID = $_POST['ProductID']; 
$Function = $_POST['Function_'];
$ProjectedLength = $_POST['ProjectedLength'];  
$Number_on_project = $_POST['Number_on_project'];
$Target_market = $_POST['Target_market'];  

     if(empty($ProductID)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($Function)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($ProjectedLength)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($Number_on_project)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($Target_market)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     else{ 
    $input_query ="INSERT INTO PRODUCT_PROJECT(ProductID,Function_,ProjectedLength,Number_on_project,Target_market) VALUES ('$ProductID','$Function','$ProjectedLength','$Number_on_project','$Target_market')"; 
    $result = mysqli_query($connection,$input_query);
    

     if($result){ 
         echo "<script>alert('Successfully Added Product Project'); location.href='AddProductProject.php';</script> "; 
     }else{ 
         echo "<script>alert('Unable to Add');</script>"; 
     }
}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Product Project</title>
	<link rel="stylesheet" type="text/css" href="AddProductProjectStyle.css">

</head>
<body>
	<div class="ProductForm">
		<h1> Add Product Project</h1>
	</div>
	<div class="main">
		<form method="POST">
			<div id="ProductID">
				<h2 class="name">ProductID</h2>
				<input class= "PID" type="text" name="ProductID" >
			</div>

	<h2 class="name">Function</h2>
	<input class="Fu"type="text" name="Function_">

	<h2 class="name">Projected Length</h2>
	<input class="PL"type="text" name="ProjectedLength">

	<h2 class="name">Number of people assigned to Project</h2>
	<input class="NP"type="Number" name="Number_on_project">

	<h2 class="name">Target Market</h2>
	<select class="TM" name="Target_market">
		<option value='youth'>Youth</option>
		<option value='middle-aged'>Middle-aged</option>
		<option value='elderly'>Elderly</option>
		<option value='general public'>General Public</option>
		

	</select>
	<input type="submit" name="Add" value="Add">
		</form>
	</div>
</div>
    <div class=floatt>
    <a href="MajorPage.php">HOME</a>
    </div>

</body>
</html>

