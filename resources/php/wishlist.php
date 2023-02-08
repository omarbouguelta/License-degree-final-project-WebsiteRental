<?php
    session_start();
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "website-rental");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Get data from the AJAX request
    $property_id = $_POST['property_id'];
    $client_id = $_POST['client_id'];
    
    

    $Check_query = "SELECT * FROM wishlist WHERE property_id = '$property_id' AND client_id = '$client_id'";
    $Check_result = mysqli_query($conn, $Check_query) ;
    if($Check_result->num_rows > 0){
        $sql = "DELETE FROM wishlist WHERE property_id = '$property_id' AND client_id = '$client_id'";
       
    }
    else{
        $sql = "INSERT INTO wishlist (property_id, client_id) VALUES ('$property_id','$client_id')";
        
    }
    
    

    

    // Prepare and execute the query to insert data into the "wishlist" table
    
    $stmt = mysqli_query($conn, $sql);
    
    if($stmt->num_rows > 0) {
                // Return a success message to the client
                echo json_encode(array('status' => 'success'));
            } else {
                // Return an error message to the client
                echo json_encode(array('status' => 'error'));
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        
