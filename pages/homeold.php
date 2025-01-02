<?php
session_start();
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css"/>
    <link rel="stylesheet" href="../css/home.css">
    <title>Eazydine Restaurant</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar-content">
            <div class="logo_div">
                <h1>Eazy<span class="logo">Dine</span></h1>
            </div>
            <div class="account">
                <p >
                    Hello  <?php 
                    if(isset($_SESSION['email'])){
                    $email=$_SESSION['email'];
                    $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                    while($row=mysqli_fetch_array($query)){
                        echo $row['firstName'].' '.$row['lastName'];
                    }
                    }
                    ?>
                </p>
            </div>
            <div class="pages">
                <a href="home.php">Home</a>
                <a href="menu.php">Menu</a>
                <a href="about.php">About</a>
                <a href="location.php">location</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="logout">
                <a href="../logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </div>
    
    <div id="home">
        <div class="home_intro">
            <h1>Welcome to <span class="logo">EazyDine</span></h1>
            <h2 class="home-subtitle">A taste that will make you forget your name.</h2>
            <p class="home-para">Your ultimate guide to discovering the best dining experiences! Our website features a curated selection of restaurants, complete with reviews, menus, and exclusive offers. Whether you’re in the mood for a cozy café or a fine dining experience, EasyDine makes it effortless to explore, book, and enjoy delicious meals. Join us and elevate your dining adventures today!</p>
            <div class="buttons">
                <button >Our Menu</button>
                <button>Abouts us</button>
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