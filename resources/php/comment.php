<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website-rental";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$property_id = $_POST['property_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$comment_text = $_POST['comment_text'];

// Insert data into comments table
$sql = "INSERT INTO comments (property_id, name, email, comment_text)
VALUES ('$property_id', '$name', '$email', '$comment_text')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../views/Property.blade.php?property_id=".$property_id);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
