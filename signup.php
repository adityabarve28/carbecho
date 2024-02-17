<?php 
include "nav.php"; 
include "connection.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SINGUP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- LINLING EXTERNAL STYLE SHEET -->
    <link rel="stylesheet" href="css/style.css">    
     <!-- LINKING Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
 <style>
     *{
         text-transform: none;
     }    
</style>   
    
    <body style="align:center; background-color:#5E74A5 ">
<div class="container login jumbotron" id="login"  style="margin-left:2%;margin-right:2%;color:#333333;">
    <form method = "POST" action = "">
<div class="header">
  <h1>SIGNUP</h1>
  <p></p>
    </div>
<div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Enter Email">
    </div>
        <div class="form-group">
      <input type="text" class="form-control" name="name" placeholder="Enter Username">
    </div>
        <div class="form-group">
      <input type="text" class="form-control" name="contact" placeholder="Enter Contact no">
    </div>
          <div class="form-group">
             <input type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-primary" name="go" style="background-color:#F76C6C">Submit</button>
</form>
     </div>    
    
 <script src="./removebanner.js"></script>
</body>
</html>












<?php
if(isset($_POST['go'])){
	if(isset($_POST['name']) && $_POST['name']!= "" && isset($_POST['email']) && $_POST['email']!= ""){
	if(isset($_POST['contact']) && $_POST['contact']!= "" && isset($_POST['password']) && $_POST['password']!= ""){	
$name = $_POST['name'];
$mail = $_POST['email'];
$mob = $_POST['contact'];
$pass = $_POST['password'];
// Code to check if email already in use or not
$check = "SELECT * FROM users WHERE EMAIL = '$mail'";
$execute2 = mysqli_query($connection, $check);
if(mysqli_num_rows($execute2)>0){
  echo "<script>alert('EMAIL ALREADY IN USE')</script>";
}

else{

// Hash the password using password_hash() function
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

$datainsert = "INSERT INTO users (NAME, EMAIL, CONTACT, PASSWORD) VALUES('$name', '$mail', '$mob','$hashedPassword')";

$execute = mysqli_query($connection, $datainsert);

if($execute){
	echo "<script> alert('User registered');
  window.location='login.php';</script>"; 
}
else {
	echo "<script> alert('Error Occoured');</script>";
}
}
}
else{
	echo "<h1>ALL FIELDS REQUIRED</h1>";
}
}
}
?>