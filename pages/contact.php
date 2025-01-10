<?php
session_start();
include("../connect.php");
include("../google-auth/auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASYDINE RESTAURANT</title> 
    <link rel="stylesheet" href="../css/navbar.css"/>
    <link rel="stylesheet" href="../css/contact.css"/>
    <!-- sweet alert dependencies -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            if (isset($_SESSION['user_token'])) {
                // Display Google Auth data
                echo $_SESSION['full_name']; // Use the full name from the session
            } elseif (isset($_SESSION['email'])) {
                // Display data from the database
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
                if ($row = mysqli_fetch_assoc($query)) {
                    echo $row['firstName'] . ' ' . $row['lastName'];
                }
            } else {
                echo "Guest"; // Default message if no user is logged in
            }
            ?>
          </p>
          <div class="logout">
            <a href="../logout.php" class="logout-btn" onclick="confirmLogout(event)">Logout</a>
          </div>
        </div>
    </header>
    <div id="contact">
        <div class="contactUs">
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

                <!-- map box -->
                <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3255.532140888148!2d124.058161274077!3d11.279614049712793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a87606da5271e3%3A0xd606b5d8a5098d46!2sSugbo%20Maya%20Seafoods%2C%20Grill%20Restaurant!5e1!3m2!1sen!2sph!4v1736181835650!5m2!1sen!2sph"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/sweetalert.js"></script>
    <!-- dependencies form icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>