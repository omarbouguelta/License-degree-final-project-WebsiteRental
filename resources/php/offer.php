<?php

if(isset($_POST['offer'])) {
    $status = $_POST['offer'];
    $booking_id = $_POST['booking_id'];
    
    $conn = mysqli_connect("localhost", "root", "", "website-rental");
    $sql = "UPDATE bookings SET status='$status' WHERE booking_id='$booking_id'";
    
    if(mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

