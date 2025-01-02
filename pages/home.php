<?php
session_start();
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../css/navbar.css"/>
  <link rel="stylesheet" href="../css/home.css">
  <!--     -->
</head>
<body>
    <!-- Header -->
    <input type="checkbox" id="menu-toggle">
    <header>
        <div class="logo">
            <img src="../images/title.png" alt="image">
        </div>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <label for="menu-toggle" class="hamburger">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </label>
        </nav>
        <div class="profile">
          <p>
            <?php 
            if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
            while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
            }
            }
            ?>
          </p>
          <div class="logout">
            <a href="../logout.php" class="logout-btn">Logout</a>
          </div>
        </div>
    </header>
    <div id="home">
        <div class="home_intro">
            <h1 class="home-title">Welcome to EazyDine</h1>
            <h2 class="home-subtitle">A taste that will make you forget your name.</h2>
            <p class="home-para">Your ultimate guide to discovering the best dining experiences! Our website features a curated selection of restaurants, complete with reviews, menus, and exclusive offers. Whether you’re in the mood for a cozy café or a fine dining experience, EasyDine makes it effortless to explore, book, and enjoy delicious meals. Join us and elevate your dining adventures today!</p>
            <div class="buttons">
              <a href="menu.php">Our Menu</a>
              <a href="about.php">Abouts us</a>
            </div>
        </div>
        
        <div class="home_image">
            <div class="img-container">
                <img src="../images/food1.png" alt="image" class="images">
                <img src="../images/food2.png" alt="image" class="images">
                <img src="../images/food3.png" alt="image" class="images">
                <img src="../images/dialog-1.png" alt="dialog" class="dialog dialog-1">
                <img src="../images/dialog-2.png" alt="dialog" class="dialog dialog-2">
            </div>
        </div>
    </div>
</body>
</html>