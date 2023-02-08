<?php

   session_start();
   
   $client_id = $_SESSION['client_id'] ;


  $propertyId = $_POST['property_id'];
  $propertyRating = $_POST['property_rating'];

  echo $propertyId, $propertyRating ;

  // Connect to the database
  $conn =  mysqli_connect("localhost", "root", "", "website-rental");

  // Retrieve the current rating for the property
  $property_query = $conn->query("SELECT rating FROM properties WHERE property_id = '$propertyId'");
  
    if($property_query){
        $property_rating = $property_query->fetch_assoc()['rating'] ;
    }
    else {
        $property_rating = 0 ;
    }


  

  
  // Retrieve the number of ratings for the property
  $rating_query = $conn->query("SELECT COUNT(*) as count FROM rating WHERE property_id = '$propertyId' ");
  try{
        $rating_count = $rating_query->fetch_assoc()['count'];
  }
  catch (Exception $e) {
    $rating_count = 0 ;
  }
  

  if ($rating_count == 0) {
    // Update the property rating and insert a new rating into the rating table
    $conn->query("UPDATE properties SET rating = '$propertyRating' WHERE property_id = '$propertyId'");
    $conn->query("INSERT INTO rating (client_id,property_id, rate, total_rates) VALUES ('$client_id','$propertyId', '$propertyRating', '1')");
  } 
  else {

        echo 'property_rating :' . $property_rating . '/ rating_count : '   . $rating_count .'';
        // Calculate the new property rating
        $new_rating = $property_rating * $rating_count + $propertyRating ;
        $new_rating = $new_rating / ($rating_count + 1);
    
        // Update the property rating and insert a new rating into the rating table
        $conn->query("UPDATE properties SET rating = '$new_rating' WHERE property_id = '$propertyId'");
        $conn->query("INSERT INTO rating (client_id,property_id, rate, total_rates) VALUES ('$client_id','$propertyId', '$propertyRating', '$rating_count'+1)");
      }
      if(isset($_GET['property']) && $_GET['property'] == "1"){
        header("Location: ../views/Property.blade.php?property_id=".$propertyId);
      }
      else{
        header("Location: ../views/Listings.blade.php");
      }
      

      // Close the database connection
      $conn->close();
    ?>
    