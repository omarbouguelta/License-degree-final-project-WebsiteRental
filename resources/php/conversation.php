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
$host_id = $_POST['host_id'];
$client_id = $_POST['client_id'];
$sender = $_POST['sender'];
$messageInput = $_POST['messageInput'];
$property_id = $_POST['property_id'];


if (trim($messageInput) === '') {
    header("Location: ../views/Chat.blade.php?property_id=".$property_id);
    exit;
  }

// Insert data into comments table
$stmt = $conn->prepare("INSERT INTO conversation (client_id, host_id,property_id, sender, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiiss", $client_id, $host_id, $property_id , $sender, $messageInput);



if ($stmt->execute()) {
    if($sender == "client")
            header("Location: ../views/Chat.blade.php?property_id=".$property_id);
    else {
        header("Location: ../views/hostChat.blade.php?client_id=".$client_id);
    }
} else {
    echo "Error: <br>" . mysqli_error($conn);
}

$stmt->close();
mysqli_close($conn);
?>
