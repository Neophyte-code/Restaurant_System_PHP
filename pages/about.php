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
    <link rel="stylesheet" href="../css/about.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <div class="about" id="about">
        <div class="about-container">
                <img src="../images/about-image.jpg" alt="years" class="years">
                <div class="about-content">
                    <h1 class="about-title">About Us</h1>
                    <p class="p1">At EazyDine, we believe that dining should be more than just a meal – it should be an experience. Since our inception, we have dedicated ourselves to bringing the finest culinary delights to your table, blending tradition and innovation with every dish. Whether you're craving local favorites or international flavors, our menu is designed to excite your palate and satisfy your soul.</p>
                    <p class="p2">Our journey started with a simple passion: to create a place where food lovers can come together to enjoy exceptional cuisine, outstanding service, and a warm, inviting atmosphere. Every ingredient we use is handpicked for its quality, ensuring that each dish is not only delicious but also prepared with the utmost care.</p>
                    <div class="icons">
                        <button id="myBtnFB"><i class="fa-brands fa-facebook icon"></i></button>
                        <button id="myBtnGH"><i class="fa-brands fa-github icon"></i></button>
                        <button id="myBtnIG"><i class="fa-brands fa-instagram icon"></i></button>
                    </div>
                </div>
        </div>
    </div>
    <!-- My Modal FB-->
     <div id="myModalFB" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 class="modal-title">Facebook</h1>
            <div class="modal-acc">
                <a href="https://web.facebook.com/jerwin.noval.14"><img src="../images/jerwin.jpg"  alt="">Jerwin Noval</a>
            </div>
            <div class="modal-acc">
                <a href="https://web.facebook.com/profile.php?id=100023177722252"><img src="../images/jade.jpg"  alt="">Jade Emmarie Arreglo</a>
            </div>
            <div class="modal-acc">
                <a href="https://web.facebook.com/janelorraine.olah"><img src="../images/jane.jpg"  alt="">Jane Lorraine Olasiman</a>
            </div>
            <div class="modal-acc">
                <a href="https://web.facebook.com/reliza.mongaya"><img src="../images/reliza.jpg"  alt="">Reliza Mongaya</a>
            </div>
            <div class="modal-acc">
                <a href="https://web.facebook.com/@maerycarmel.rosales.5"><img src="../images/carmel.jpg"  alt="">Maery Carmel Rosales</a>
            </div>
        </div>
     </div>

     <!-- My Modal Github-->
     <div id="myModalGH" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 class="modal-title">Github</h1>
            <div class="modal-acc">
                <a href="https://github.com/Neophyte-code"><img src="../images/jerwin.jpg"  alt="">Jerwin Noval</a>
            </div>
        </div>
     </div>

     <!-- My Modal IG-->
     <div id="myModalIG" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 class="modal-title">Instagram</h1>
            <div class="modal-acc">
                <a href="https://www.instagram.com/mr.novadev/"><img src="../images/jerwin.jpg"  alt="">Jerwin Noval</a>
            </div>
            <div class="modal-acc">
                <a href="https://www.instagram.com/jearreglo_/"><img src="../images/jade.jpg"  alt="">Jade Emmarie Arreglo</a>
            </div>
            <div class="modal-acc">
                <a href="https://www.instagram.com/jane_lorraine09/"><img src="../images/jane.jpg"  alt="">Jane Lorraine Olasiman</a>
            </div>
            <div class="modal-acc">
                <a href="https://www.instagram.com/its_aziler/"><img src="../images/reliza.jpg"  alt="">Reliza Mongaya</a>
            </div>
        </div>
     </div>
    <script src="../js/sweetalert.js"></script>
    <script src="../js/Modal.js"></script>
</body>
</html>