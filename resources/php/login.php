<?php

    session_start();
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "website-rental";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$email = $_POST['email'];
$password = $_POST['Password'];

// Get the hashed password from the clients table
$sql = "SELECT password FROM clients WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"];

    // Compare the plaintext password to the hashed password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['user']="is logged in";
        $_SESSION['email']= $email;
        $_SESSION['type']= "client";
        header("Location: RetriveData.php");
        echo "Password is valid!";
        // Start a session, redirect to a secure page, or do whatever you need to do after a successful login
    } else {
        echo "Invalid password";
        $_SESSION['password']="Password is wrong!";
        header("Location: ../views/auth/login.blade.php?pwd=wrong");
        exit;
      }
  } else {
      // Get the hashed password from the hosts table
      $sql = "SELECT password FROM hosts WHERE email = '$email'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          $hashed_password = $row["password"];

          // Compare the plaintext password to the hashed password
          if (password_verify($password, $hashed_password)) {
            $_SESSION['user']="is logged in";
            $_SESSION['email']= $email;
            $_SESSION['type']= "host";
            header("Location: RetriveData.php");
            echo "Password is valid!";
            
              // Start a session, redirect to a secure page, or do whatever you need to do after a successful login
          } else {
              echo "Invalid password";
              $_SESSION['password']="Password is wrong!";
              header("Location: ../views/auth/login.blade.php");
              exit;
          }
      } else {
          echo "Invalid email";
          $_SESSION['message']="Login Failed. email not Found!";
          header("Location: ../views/auth/login.blade.php");
          exit;
      }
  }
  $conn->close();
  ?>