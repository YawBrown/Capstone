<?php 
include 'connection.php';

$errors = array();  
if(isset($_POST['Create'])){ 
     
    $users_name = $_POST['Username']; 
    $user_password =$_POST['Password']; 
    $user_email = $_POST['Email']; 
    $password = md5($user_password); 
    $user_cpassword =$_POST['Cpassword']; 
 
    $regex_email = '/^[^@]+@[^@]+\.[^@]+$/'; 
     
    $username_query = "SELECT * FROM LOGIN WHERE user_name='$users_name'"; 
    $usernameCount_result = mysqli_query($connection, $username_query); 
 
  
    $usermail_query = "SELECT * FROM LOGIN WHERE user_email='$user_email'"; 
    $usermailCount_result = mysqli_query($connection, $usermail_query); 
 
 
    if (empty($users_name)){ 
        $errors['validate_name'] = "Invalid Username"; 
    } else if(mysqli_num_rows($usernameCount_result)>0) { 
        $errors['validate_name'] = "Username already exists"; 
    } 
         
    if(!preg_match($regex_email,$user_email)) { 
        $errors['validate_email'] = "Invalid Mail"; 
    }  
     
    else if(mysqli_num_rows($usermailCount_result)>0) { 
        $errors['validate_email'] = "Email already exists"; 
    } 
 
    if (empty($user_password)){ 
        $errors['validate_password'] = "Invalid Password"; 
    } 
 
   if ($user_password !== $user_cpassword){ 
        $errors['validate_cpassword'] = "Password Does not Match"; 
    } 
 
    if(count($errors)==0){ 
        $input_query = "INSERT INTO LOGIN(user_name,user_email,user_password) VALUES ('$users_name','$user_email','$password')"; 
        $result = mysqli_query($connection,$input_query); 
 
        if($result){ 
            echo "<script>alert('Successfully Created Account'); location.href='index.php';</script> "; 
        }else{ 
            echo "<script>alert('Failed to Create Account');</script>"; 
        } 
 
    } 
 
} 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="registrationstyle1.css">
</head>
<body>
<div class="form">
<h1>Register Here</h1>
<form class="register-form" method="POST">
<p>Username</p>
<input type="text" name="Username" placeholder="Username">
<p>Password</p>
<input type="password" name="Password" placeholder="Password">
<p>Confirm Password</p>
<input type="password" name="Cpassword" placeholder="Password">

<p>Email</p>
<input type="text" name="Email" placeholder="Email ID">
<br>
<br>
<br>

<input type="submit" name="Create" value="Create Account">

<br>
<a href="index.php">Already have an account?</a>


</form>



</div>

</body>
</html>