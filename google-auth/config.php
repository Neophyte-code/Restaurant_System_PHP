<?php

require_once 'vendor/autoload.php';
include(__DIR__ . '/../connect.php');

//init configuration
$clientID = '1042135987671-8v9vnuofdgp1k94kej96qg7mmv12df1v.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Restaurant_System_PHP/pages/home.php';

//create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');

