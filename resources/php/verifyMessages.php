<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "website-rental");

// Retrieve the client_id and host_id from the query string
$client_id = $_GET["client_id"];
$host_id = $_GET["host_id"];

// Query the conversation table
$message_query = "SELECT * FROM conversation WHERE client_id = '$client_id' AND host_id = '$host_id'";
$message_result = $conn->query($message_query);


$chat_content = '';
while ($row = mysqli_fetch_assoc($message_result)) {
  if ($row["sender"] == "client" && $row["message"] != "") {
    $chat_content .= '<h3 class="right">' . $row["message"] . '</h3>';
  } elseif ($row["sender"] == "host" && $row["message"] != "") {
    $chat_content .= '<h3 class="left">' . $row["message"] . '</h3>';
  }
}

// Return the chat content as the response
echo $chat_content;
?>
