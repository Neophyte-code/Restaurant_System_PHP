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
    <link rel="stylesheet" href="../css/menu.css"/>
    <!-- sweet alert dependencies -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body >
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

    <div class="container">
        <div class="header">
            <div class="title">MENU</div>
            <div class="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
                <span>0</span>
            </div>
        </div>
        <div class="listProduct">

        </div>
    </div>
    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
            
        </div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div>
    <script src="../js/sweetalert.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>