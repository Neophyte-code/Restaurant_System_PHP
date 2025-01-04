<?php
session_start();
include("../connect.php");

//requirement for google auth
require_once('../google-auth/config.php');

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

  // Handle errors in the token response
  if (isset($token['error'])) {
      echo "Error fetching token: " . htmlspecialchars($token['error']);
      die();
  }

  // Set access token if it's available
  if (isset($token['access_token'])) {
      $client->setAccessToken($token['access_token']);
  } else {
      echo "Access token not found!";
      die();
  }

  // get profile info
  $google_oauth = new Google\Service\Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'first_name' => $google_account_info['givenName'],
    'last_name' => $google_account_info['familyName'],
    'gender' => $google_account_info['gender'],
    'full_name' => $google_account_info['name'],
    'picture' => $google_account_info['picture'],
    'verifiedEmail' => $google_account_info['verifiedEmail'],
    'token' => $google_account_info['id'],
  ];

  // checking if user is already exists in database
  $sql = "SELECT * FROM googleusers WHERE email ='{$userinfo['email']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
    $token = $userinfo['token'];
  } else {
    // user is not exists
    $sql = "INSERT INTO googleusers (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $token = $userinfo['token'];
    } else {
      echo "User is not created";
      die();
    }
  }

  // save user data into session
  $_SESSION['user_token'] = $token;
} else {
  if (!isset($_SESSION['user_token'])) {
    header("Location: index.php");
    die();
  }

  // checking if user is already exists in database
  $sql = "SELECT * FROM googleusers WHERE token ='{$_SESSION['user_token']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
  }
}
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
            if (isset($_SESSION['user_token'])) {
              // Display Google Auth data
              echo $userinfo['full_name']; // Full name from Google Auth
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