<?php
session_start(); //start a session
$email = $_SESSION['email'] ;
getUserData($email);
function getUserData($email) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "website-rental");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement for clients table
    $sql = "SELECT client_id,name, profile_img, email FROM clients WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if ( mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // Store the data in session variables
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['profile_img'] = $row['profile_img'];
      $_SESSION['client_id'] = $row['client_id'];
      $_SESSION['type'] = "client";
      header("Location: ../views/Myaccount.blade.php");
    }
    else {
      // Prepare the SQL statement for hosts table
      $sql = "SELECT host_id,name, profile_img, email FROM hosts WHERE email = '$email'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Store the data in session variables
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['profile_img'] = $row['profile_img'];
        $_SESSION['host_id'] = $row['host_id'];
        $_SESSION['type'] = "host";
        header("Location: ../views/Myaccount.blade.php");
      }
      else {
        echo "No user found";
        
      }
    }
    mysqli_close($conn);
}


