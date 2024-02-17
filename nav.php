<?php
session_start();
//include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
<!-- ------------------------------------------------------------------------------------------------------------------ -->
<body>
  <nav class="navbar navbar-expand-md sticky-top" id="nav">
    <a class="navbar-brand" href="index.php" style="color: #F4D35E ">CarBecho</a>
      <button class="navbar-toggler" style="background-color: #F4D35E; color:F76C6C;" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" style="color: #F76C6C "></span>
      </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" id="navlink" href="#posts">View Car's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="navlink" href="#contact">Contact</a>
        </li>
      </ul>    
      <div class="btnn"  style="background-color:transparent;border: none;">
        <div class="container">
            <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
              { ?>
                <!------------------------------------------------------------------------------------------------->
                <div class="btn-group" >
                  <button type="button" class="btn btn-primary btn" style="float:right;"><?php echo $_SESSION["uname"];?></button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split btn" data-toggle="dropdown" style="float:right;">
                  <span class="caret" style="float:right;"></span>
                  </button>
                  <div class="dropdown-menu" id="navlink" style="background-color:rgba(94, 116, 165, 0.4);">
                    <a class="dropdown-item" id="navlink" href="sellcar.php" style="background-color:rgba(94, 116, 165, 0.4);">Sell a Car</a>
                    <a class="dropdown-item" id="navlink" href="viewlistings.php" style="background-color:rgba(94, 116, 165, 0.4);">View your listings</a> 
                    <a class="dropdown-item" id="navlink" href="logout.php" style="background-color:rgba(94, 116, 165, 0.4);">Logout</a>
                  </div>
                </div>
                <!-------------------------------------------------------------------------------------------------------->
                <?php
              }
              else{ ?>
                <div class="btn-group" >
                  <button type="button" class="btn btn-primary btn" id="navlink" style="background-color:rgba(94, 116, 165, 0.4);border: none;">Other</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="navlink" data-toggle="dropdown" style="background-color:rgba(94, 116, 165, 0.4);border: none;">
                  <span class="caret" id="navlink" style="background-color:rgba(94, 116, 165, 0.4);"></span>
                  </button>
                  <div class="dropdown-menu" id="navlink" style="background-color:rgba(94, 116, 165, 0.4);">
                    <a class="dropdown-item" id="navlink" href="sellcar.php" style="background-color:rgba(94, 116, 165, 0.4);">Sell a Car</a>
                    <a class="dropdown-item" id="navlink" href="login.php" style="background-color:rgba(94, 116, 165, 0.4);">Login</a> 
                    <a class="dropdown-item" id="navlink" href="signup.php" style="background-color:rgba(94, 116, 165, 0.4);">SignUp</a>
                  </div>
                </div>
                <?php 
              } ?>
        </div>
      </div>
    </div>
  </nav>
<br>
</body>
</html>