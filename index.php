<?php 
include 'connection.php';
$errorss = array(); 
if($connection) {


    if(isset($_POST['Login'])){ 
        
        $user_name = $_POST['Username']; 
        $user_password =$_POST['Password']; 
        $user_password = md5($user_password);
  
        
    
        if (empty($user_name)){ 
            $errorss['validate_mail'] = "Invalid Email or Password"; 
        } 
    
    elseif (empty($user_password)){ 
            $errorss['validate_password'] = "Invalid Password"; 
    } 
    
    
    
    // Error handling 
        if(count($errorss) == 0){ 
            $sql = "SELECT * FROM LOGIN WHERE user_name ='$user_name'"; 
            $result = mysqli_query($connection,$sql); 
            echo mysqli_num_rows($result);
            if (mysqli_num_rows($result)==1){ 
                $row = mysqli_fetch_array($result);  
                if($user_password==$row['user_password']){ 
                    $_SESSION["logged_in"] = true; 
                    echo "<script>alert('Login Successful'); location.href='MajorPage.php';</script> "; 
                    
    
    
                 } else{ 
                    
                    echo "<script>alert('Login Failure'); location.href='index.php';</script> "; 
                 }  
                
            }  else{ 
                $errorss['validate'] = "Details No Match"; 
            } 
        } 
    
    } 
    
 
} else{ 
    return false; 
    mysqli_connect_error(); 
} 
 
 
 
mysqli_close($connection); 
 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
    <div class="Namee">
    	<p>Remote Sensing Data Hub</p>
    	

    </div>
    

	<div class="loginbox">
	<img src="avatar.PNG" class="avatar">
	<h1>Login Here</h1>
	<form id="login-form" method="POST">
		<p>Username</p>
		<input type="text" name="Username" id= "Username" placeholder="Enter Username">
		<p>Password</p>
		<input type="password" name="Password" id= "password" placeholder="Enter Password">
		<input type="submit" name="Login" value="Login">


		<a href="registration.php">Don't have an account?</a>



	</form>
   </div>
   <script src="login.js"></script>
</body>
</html>