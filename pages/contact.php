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
    <div id="contact">
        <div class="contactUs">
            <!-- <div class="contact-content">
                <h3>Get in touch</h3>
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
            </div> -->
            <div class="title">
                <h2>Get in Touch</h2>
            </div>
            <div class="box">

                <!-- contact form -->
                <div class="contact form">
                    <h3>Send a Message</h3>
                    <form action="">
                        <div class="formBox">

                            <div class="row50">
                                <div class="inputBox">
                                    <span>First Name</span>
                                    <input type="text" placeholder="John">
                                </div>
                                <div class="inputBox">
                                    <span>Last Name</span>
                                    <input type="text" placeholder="Doe">
                                </div>
                            </div>

                            <div class="row50">
                                <div class="inputBox">
                                    <span>Email</span>
                                    <input type="text" placeholder="johndoe@gmail.com">
                                </div>
                                <div class="inputBox">
                                    <span>Mobile</span>
                                    <input type="text" placeholder="0912 345 6789">
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <span>Message</span>
                                    <textarea placeholder="Write your message"></textarea>
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" value="send">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- info Box -->
                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class="infoBox">
                        <div>
                            <span><ion-icon name="location"></ion-icon></span>
                            <p>Poblacion, Daanbantayan, Cebu</p>
                        </div>
                        <div>
                            <span><ion-icon name="mail"></ion-icon></span>
                            <a href="mailto:jerwinnoval645@gmail.com">eazydine@gmail.com</a>
                        </div>
                        <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href="tel:0991185025">0991185025</a>
                        </div>
                    </div>
                </div>
                <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.963763978399!2d124.05816127402433!3d11.279614049712857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a87606da5271e3%3A0xd606b5d8a5098d46!2sSugbo%20Maya%20Seafoods%2C%20Grill%20Restaurant!5e1!3m2!1sen!2sph!4v1735034795819!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>