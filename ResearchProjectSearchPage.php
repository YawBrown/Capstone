<?php
include 'connection.php';
if(isset($_POST['Search'])){
    $ResearchID = $_POST['ResearchProject'];

    $initial_query = "SELECT * FROM RESEARCH_PROJECT WHERE ResearchID='$ResearchID'"; 
    $Count_result = mysqli_query($connection, $initial_query);
    
    if($Count_result==1){
    
        $sql="DELETE FROM RESEARCH_PROJECT WHERE ResearchID='$ResearchID'";
        if(mysqli_query($connection,$sql)){

            echo "<script>alert('Successfully Deleted Product Project'); location.href='ResearchProjectSearchPage.php';</script> ";
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
	<title>Research Project Delete Page</title>
	<link rel="stylesheet" type="text/css" href="RProjectSearchPageStyle.css">
</head>
<body>
	<div class="box">
		<h1>Delete Ongoing Research Projects</h1>
		<form method="POST">
			<input type="text" name="ResearchProject" placeholder="Type Research Project ID ">
			<input type="submit" name="Search" value="Delete">
		</form>
		

	</div>

<div class=floatt>
<a href="MajorPage.php">HOME</a>
</div>


</body>
</html>