<?php

// Requirement for Google auth
require_once('config.php');

// Authenticate code from Google OAuth Flow
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

    // Get profile info
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

    // Checking if user already exists in the database
    $sql = "SELECT * FROM googleusers WHERE email ='{$userinfo['email']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // User exists
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
    } else {
        // User does not exist, insert into database
        $sql = "INSERT INTO googleusers (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $token = $userinfo['token'];
        } else {
            echo "User  is not created";
            die();
        }
    }

    // Save user data into session
    $_SESSION['user_token'] = $token;
    $_SESSION['email'] = $userinfo['email']; // Save email
    $_SESSION['full_name'] = $userinfo['full_name']; // Save full name
} else {
    // Check if user is logged in via database credentials
    if (!isset($_SESSION['user_token']) && !isset($_SESSION['email'])) {
        header("Location: ../index.php"); // Redirect to login page if not logged in
        exit();
    }

    // If logged in via database credentials
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if ($row = mysqli_fetch_assoc($query)) {
            // User data is available
            $userinfo = $row; // Use this for displaying user info
        }
    }
}