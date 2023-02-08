<?php
require_once '../../vendor/autoload.php';

// init configuration
$clientID = '1074084558413-cu90j25ah3b5c3pt321kcs8ljd829hc4.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/project/resources/views/Myaccount.blade.php';

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
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "website-rental");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }


  $sql1 = "SELECT * FROM clients WHERE email = '$email'";
  $sql2 = "SELECT * FROM hosts WHERE email = '$email'";
  $result1 = $conn->query($sql1);
  $result2 = $conn->query($sql2);
  if ($result1->num_rows > 0  || $result2->num_rows > 0 ) {
      //Login
  }
  else{
    $sql = "INSERT INTO clients (name, email, password, profile_img) VALUES ( '$name',  '$email', '$hashed_password',  ' $encoded_image')";
    
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    header("Location: RetriveData.php");
    } else {
    echo "Error: " . $sql . "<br>"  ;
    }
  }

} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>