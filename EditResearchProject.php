<?php 
include 'connection.php';
if(isset($_POST['Edit'])){ 

    $ResearchID = $_POST['ResearchID']; 
    $Change = $_POST['Change'];
    $NewInput = $_POST['NewValue'];  


     if(empty($ResearchID)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($Change)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }
     elseif(empty($NewInput)){
         echo "<script>alert(' Incomplete Form ');</script>"; 
     }

    else {
       
    



        $edit_query = "UPDATE RESEARCH_PROJECT SET $Change='$NewInput' WHERE ResearchID= '$ResearchID' ";
        $result = mysqli_query($connection,$edit_query);  

     if($result){ 
         echo "<script>alert('Successfully Updated Research Project'); location.href='EditResearchProject.php';</script> "; 
     }else{ 
         echo "<script>alert('Unable to Update');</script>"; 
     }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Research Project</title>
	<link rel="stylesheet" type="text/css" href="EditResearchProjectStyle.css">
</head>
<body>
	<div class="ProductForm">
		<h1> Edit Research Project</h1>
	</div>
	<div class="main">
		<form method="POST">
			<div id="ProductID">
				<h2 class="name">ResearchID</h2>
				<input class= "PID" type="text" name="ResearchID" >
			</div>



	<h2 class="name">Where to edit</h2>
	<select class="TM" name="Change">
		<option value='FieldOfStudy'>Field of Study</option>
		<option value='Purpose'>Purpose</option>
		<option value='Number_on_project'>Number of people assigned to Project</option>
		
		

	</select>


    <h2 class="name">New Input</h2>
	<input class="Fu"type="text" name="NewValue">


	<input type="submit" name="Edit" value="Update">
		</form>
	</div>
   
    <div class=floatt>
    <a href="MajorPage.php">HOME</a>
    </div>


</body>
</html>