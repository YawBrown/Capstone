<?php
include 'connection.php';
if(isset($_POST['Searchh'])){
    $ProductID = $_POST['ProductProject'];

    $initial_query = "SELECT * FROM PRODUCT_PROJECT WHERE ProductID='$ProductID'"; 
    $Count_result = mysqli_query($connection, $initial_query);
    
    if($Count_result==1){
    
        $sql="DELETE FROM PRODUCT_PROJECT WHERE ProductID='$ProductID'";
        if(mysqli_query($connection,$sql)){

            echo "<script>alert('Successfully Deleted Product Project'); location.href='ProductProjectSeachPage.php';</script> ";
        }else{
            echo "<script>alert(' Error Deleting Record ');</script>";
        }

    }
    else{
        echo "<script>alert('No such project found ');</script>";
    }

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product Project Delete Page</title>
	<link rel="stylesheet" type="text/css" href="PProjectSearchPageStyle.css">
</head>
<body>
	<div class="box">
		<h1>Delete Ongoing Product Projects</h1>
		<form method="POST">
			<input type="text" name="ProductProject" placeholder="Type Product Project ID ">
			<input type="submit" name="Searchh" value="Delete">
		</form>
		

	</div>

<div class=floatt>
<a href="MajorPage.php">HOME</a>
</div>

</body>
</html>