<?php
// session_start();
include "nav.php";
include "connection.php";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
if(isset($_POST['go'])){
$mail = $_POST['email'];
$pass = $_POST['password'];
$checkall = "SELECT * FROM users WHERE EMAIL = '$mail'";
$result = mysqli_query($connection, $checkall);
$count = mysqli_num_rows($result);		
if($count==0){
?>
<script type="text/javascript">
//window.location="register.php";
alert("USER DOES NOT EXIST PLEASE REGISTER");
</script>
<?php
}

$checkal = "SELECT * FROM users WHERE EMAIL = '$mail' AND PASSWORD='$pass'";
$resultt = mysqli_query($connection, $checkal);
$countt = mysqli_num_rows($resultt);		
if($countt==0){
?>
<script type="text/javascript">
//window.location="register.php";
alert("INCORRECT PASSWORD PLEASE CHECK THE PASSWORD AND ENTER AGAIN");
</script>
<?php
}
else{
    $querry1 = "SELECT * FROM users WHERE EMAIL = '$mail' AND PASSWORD='$pass'";
        $querry2 = mysqli_query($connection,$querry1);
        $i = 0;
        while($querry3 = mysqli_fetch_assoc($querry2)){
            $i++;
            $id = $querry3['ID'];
            $name = $querry3['NAME'];
        }
     $_SESSION["loggedin"] = true;
    $_SESSION["uname"] = $name;
?>
<script type="text/javascript">

window.location="index.php";
alert("PLEASE WAIT REDIRECTING");
</script>
<?php
}
}
?>















<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- LINLING EXTERNAL STYLE SHEET -->
    <link rel="stylesheet" href="css/style.css">    
     <!-- LINKING Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
</head>
 <style>
     *{
         text-transform: none;
     }    
</style>   
    
    <body style="background-color:#5E74A5">
<div class="container login jumbotron" id="login"  style="margin-left:2%;margin-right:2%; color:#333333;">
  <h2>Log In</h2>
 
  <form method="POST" action="">
    
    <div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Enter Email">
    </div>
          <div class="form-group">
      <!--<label for="pwd">Password:</label>-->
       <input type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-primary" name="go" style="background-color:#F76C6C">Submit</button>
  </form>
    </div>     
 <script src="./removebanner.js"></script>
</body>
</html>