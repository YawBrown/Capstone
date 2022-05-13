<?php 
include 'connection.php';
if(isset($_POST['Addd'])){ 

    $ResearchID = $_POST['ResearchID']; 
    $FieldOfStudy = $_POST['FieldOfStudy'];
    $Purpose = $_POST['Purpose'];  
    $Number_on_project = $_POST['Number_on_project'];
    

     if(empty($ResearchID)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($FieldOfStudy)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($Purpose)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($Number_on_project)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }

    else {
       
    



    $input_query = "INSERT INTO RESEARCH_PROJECT(ResearchID,FieldOfStudy,Purpose,Number_on_project) VALUES ('$ResearchID','$FieldOfStudy','$Purpose','$Number_on_project')"; 
    $result = mysqli_query($connection,$input_query); 

     if($result){ 
         echo "<script>alert('Successfully Added Research Project'); location.href='AddResearchProject.php';</script> "; 
     }else{ 
         echo "<script>alert('Unable to Add ');</script>"; 
     }

    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Research Project</title>
	<link rel="stylesheet" type="text/css" href="AddResearchProjectStyle.css">
</head>
<body>
	<div class="ResearchForm">
		<h1> Add Research Project</h1>
	</div>
	<div class="main">
		<form method="POST">
			<div id="ResearchID">
				<h2 class="name">ResearchID</h2>
				<input class= "RID" type="text" name="ResearchID" >
			</div>

	<h2 class="name">Field of Study</h2>
	<input class="FOS"type="text" name="FieldOfStudy">

	<h2 class="name">Purpose</h2>
	<input class="Pu"type="text" name="Purpose">

	<h2 class="name">Number of people assigned to Project</h2>
	<input class="NP"type="Number" name="Number_on_project">

	<input type="submit" name="Addd" value="Add">
		</form>
	</div>
   
    <div class=floatt>
    <a href="MajorPage.php">HOME</a>
    </div>
</body>
</html>