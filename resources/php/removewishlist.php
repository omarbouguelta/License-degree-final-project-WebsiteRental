<?php
    session_start();
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "website-rental");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Get data from the AJAX request
    $property_id = $_POST['property_id2'];
    $client_id = $_POST['client_id2'];
    // Prepare and execute the query to insert data into the "wishlist" table
    $sql = "DELETE FROM wishlist property_id = '$property_id' AND client_id = '$client_id' ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $property_id, $client_id);
    if(mysqli_stmt_execute($stmt)) {
                // Return a success message to the client
                echo json_encode(array('status' => 'success'));
            } else {
                // Return an error message to the client
                echo json_encode(array('status' => 'error'));
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        
