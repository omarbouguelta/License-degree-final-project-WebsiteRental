<?php
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website-rental";
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    session_start();

    //Getting the host id
    $email = $_SESSION['email'];
    $sql = "SELECT host_id FROM hosts WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    

    // Get the data from the form
    $host_id =  $row["host_id"];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    if(isset($_POST['last_minute'])){
        $last_minute = $_POST['last_minute'];
    }
    else{
        $last_minute = "0";
    }
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    if(isset($_FILES['picture'])){
        $photo = $_FILES['picture'];
    }
    else{
        $photo = "";
    }
    

    /// Check if the file was uploaded
    if ($photo['error'] === UPLOAD_ERR_OK) {
        // Get the file name
        $file_name = $photo['name'];
        // Move the file to the uploads folder
        move_uploaded_file($photo['tmp_name'], '../views/uploads/' . $file_name);
        // Insert the data into the database with the file name
        $sql = "INSERT INTO properties (host_id, location, price, type, last_minute, title, description, photo) VALUES ('$host_id', '$location', '$price', '$type', '$last_minute', '$title', '$description', '$file_name');";
        
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: ../views/Myaccount.blade.php#MyListings");
        } else {
        echo "Error: " . $sql . "<br>"  ;
        }
    }
        // Close the connection
    mysqli_close($conn);
?>
