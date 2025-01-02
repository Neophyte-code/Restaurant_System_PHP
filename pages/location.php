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
    <link rel="stylesheet" href="../css/location.css">
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
    
    <div id="location">
        
    </div>
    
</body>
</html>