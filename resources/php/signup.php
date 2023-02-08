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
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['confirm-password'];
  $type = $_POST['type'];
  if(isset($_FILES['picture'])){
    $photo = $_FILES['picture'];
}
else{
    $photo = "../views/uploads/buyer.png";
}


  
  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);



  
    $sql = "SELECT email FROM clients WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "exists";
    $_SESSION['message']="email already exists!";
    header("Location: ../views/auth/register.blade.php");
    return;
} else {
    $sql = "SELECT email FROM hosts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
}

if (mysqli_num_rows($result) > 0) {
    echo "exists";
    $_SESSION['message']="email already exists!";
    header("Location: ../views/auth/register.blade.php");
    return;
} else {
    
    echo "not exists";
}

    // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  if ($type == "clients") {
    /// Check if the file was uploaded
    // Get the file name
    $image_data = file_get_contents($photo);
    $encoded_image = base64_encode($image_data);
    // Insert the data into the database with the file name
    $sql = "INSERT INTO clients (name, email, password, profile_img) VALUES ( '$name',  '$email', '$hashed_password',  ' $encoded_image')";
    
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    header("Location: RetriveData.php");
    } else {
    echo "Error: " . $sql . "<br>"  ;
    }

    
} elseif ($type == "hosts") {
    
    // Get the file name
    $image_data = file_get_contents($photo);
    $encoded_image = base64_encode($image_data);
    // Insert the data into the database with the file name
    $sql = "INSERT INTO hosts (name, email, password, profile_img) VALUES ( '$name',  '$email', '$hashed_password',  '$encoded_image')";
    
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: RetriveData.php");
    } else {
    echo "Error: " . $sql . "<br>"  ;
    }



}
else {
    echo "faild to register";
    exit;
}

    
    
    $_SESSION['user']="is logged in";
    $_SESSION['email'] = $email ;
    //header("Location: RetriveData.php");

  $conn->close();

?>
