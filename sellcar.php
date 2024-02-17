<?php
include "nav.php";
include "connection.php";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
?>
<html lang="en">
<head>
  <title>Post Content</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- LINKING Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- LINLING EXTERNAL STYLE SHEET -->
    <link rel="stylesheet" href="css/style.css">
</head>
 <style>
     body{
         background-color: #5E74A5;
         color: #333333;
     }
     *{
	margin: 0;
	padding: 0;
	overflow-x: hidden;
	flex-wrap: wrap;
}
</style>
    <body><br>
<br>
<div class="jumbotron">
    <form action="" method="post" enctype="multipart/form-data">
        <h1 style="overflow-y:hidden;">Welcome <?php echo $_SESSION['uname']?></h1>
        <div class="form-group">
      <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['uname'];?>" disabled />
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="carname" placeholder="Enter Car Name" required />
      </div>
      <div class="form-group">
      <input type="text" class="form-control" name="carprice" placeholder="Enter Car Price"  />
      </div>
      <div class="form-group">
      <input type="text" class="form-control" name="carspeed" placeholder="Enter Top Speed"  />
      </div>
      <div class="form-group">
      <input type="file" name="images[]" multiple>
      </div>
    <div class="form-group">
      <input type="submit" class="form-control" name="submit" value="upload" style="background-color:#F76C6C; color: white"/>
    </div>
    </form>
    </div>
  
    </body>
    <script src="removeBanner.js"></script>
</html>
<?php
if(isset($_POST['submit'])){
	if(isset($_POST['carname']) && $_POST['carname']!= ""){
$cname = $_POST['carname'];
$cprice = $_POST['carprice'];
$cspeed = $_POST['carspeed'];
$ctype;
$name = $_SESSION['uname'];
// code to set cartype to normal if car speed is less than equal to 100
if($cspeed <= 100){
    $ctype = "Normal";
}
// code to set cartype to Luxury if car speed is greater than 100 and less than or equal to 200
else if($cspeed > 100 && $cspeed <= 200){
    $ctype = "Luxury";
}
// code to set cartype to Sports if car speed is greater than 200
else{
    $ctype = "Sports";
}

// code to upload images
if(isset($_FILES['images']['name']) && count($_FILES['images']['name']) > 0) {
  $images = array();

  for($i = 0; $i < count($_FILES['images']['name']); $i++) {
      $tmpFilePath = $_FILES['images']['tmp_name'][$i];

      if($tmpFilePath != ""){
          $newFilePath = "uploads/" . $_FILES['images']['name'][$i];
          move_uploaded_file($tmpFilePath, $newFilePath);
          $images[] = $newFilePath;
      }
  }

  // Insert image paths into the database
  $imagePaths = implode(",", $images);
  $datainsert = "INSERT INTO sellcar (SELLERNAME, NAME, TYPE, PRICE, SPEED, IMAGES) VALUES('$name','$cname', '$ctype', '$cprice','$cspeed', '$imagePaths')";

  $execute = mysqli_query($connection, $datainsert);
  
  if($execute){
    echo "<script>window.alert('Content Inserted')</script>"; 
  }
  else {
    echo "<script>window.alert('Error Occurred')</script>";
  }
  }
  }
  else{
    echo "<script>window.alert('All fields required')</script>";
  }
  }




}

else{
    ?>
    <script>
        window.alert("Please Login");
        location.replace('login.php');
    </script>
    <?php
}
?>