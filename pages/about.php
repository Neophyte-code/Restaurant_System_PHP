<?php
session_start();
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASYDINE RESTAURANT</title>
    <link rel="stylesheet" href="../css/navbar.css"/>
    <link rel="stylesheet" href="../css/about.css"/>
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
                    :)
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

    <div class="about" id="about">
        <div class="image-container">
            <img src="../images/years.png" alt="years" class="years">
        </div>
        <div class="about-content">
            <h1 class="about-title">About Us</h1>
            <p class="p1">At EazyDine, we believe that dining should be more than just a meal – it should be an experience. Since our inception, we have dedicated ourselves to bringing the finest culinary delights to your table, blending tradition and innovation with every dish. Whether you're craving local favorites or international flavors, our menu is designed to excite your palate and satisfy your soul.</p>
            <p class="p2">Our journey started with a simple passion: to create a place where food lovers can come together to enjoy exceptional cuisine, outstanding service, and a warm, inviting atmosphere. Every ingredient we use is handpicked for its quality, ensuring that each dish is not only delicious but also prepared with the utmost care.</p>
        </div>
    </div>
</body>
</html>