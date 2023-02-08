<?php
require_once '../../vendor/autoload.php';

session_start();

// init configuration
$clientID = '1074084558413-cu90j25ah3b5c3pt321kcs8ljd829hc4.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = "http://localhost/project/resources/php/googleadd.php";


// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email = $google_account_info->email;
  $name = $google_account_info->name;
  
   

} else {
  header("Location: ".$client->createAuthUrl()."");
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  
  
}
?>