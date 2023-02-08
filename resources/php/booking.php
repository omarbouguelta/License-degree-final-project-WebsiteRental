<?php
  // Get the form data
  $property_id = $_POST['property_id'];
  $client_id = $_POST['client_id'];
  $offer = $_POST['offer'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "website-rental");

  $Check_query = "SELECT * FROM bookings WHERE property_id = '$property_id' AND client_id = '$client_id'";
    $Check_result = mysqli_query($conn, $Check_query) ;
    if($Check_result->num_rows > 0){
        $sql = "DELETE FROM bookings WHERE property_id = '$property_id' AND client_id = '$client_id'";
       
    }
    else{
        $sql = "INSERT INTO bookings (property_id, client_id, start_date, end_date, offer) VALUES ('$property_id', '$client_id', '$start_date', '$end_date', '$offer')";
        
    }

  // Insert the booking information into the "bookings" table
  $conn->query($sql);

  header("Location: ../views/Listings.blade.php");
  // Close the database connection
  $conn->close();
?>
