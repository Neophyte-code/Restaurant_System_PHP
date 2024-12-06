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
    <link rel="stylesheet" href="../css/contact.css"/>
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
    <div id="contact" class="contact">
        <div class="contact-content">
            <h3>Contact Us</h3>
            <h1>Let's talk about your experiences</h1>
            <h6>Drop us a line through the form below and we'll get back to you</h6>
            <div class="contact-box">
                <div class="contact-left">
                    <span><img src="../images/locationicon.png" alt="location" class="location">&nbsp;123, Lugar sa mga loyal, Tapilon, Daanbantayan, Cebu</span>
                    <span><img src="../images/telephone.jpg" alt="telephone" class="telephone">&nbsp; 922-188-123</span>
                    <span><img src="../images/cellphone.png" alt="telephone" class="telephone">&nbsp; 09632122818</span>
                </div>
                <div class="contact-right">
                    <h5>Leave us a message</h5>
                    <input type="text" class="input-text" placeholder="Name">
                    <input type="text" class="input-text" placeholder="Email">
                    <textarea name="message" class="input text message-box" placeholder="Message"></textarea>
                    <button class="btn-send">Send</button>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>