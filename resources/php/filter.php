<?php

        session_start();
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "website-rental");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//get the highest price
$sql = "SELECT MAX(price) from properties " ;
$temp = mysqli_query($conn, $sql);
$temp_price = mysqli_fetch_assoc($temp) ;


// Retrieve form data
$priceSmaller = $_POST["priceSmaller"];
$priceBigger = $_POST["priceBigger"];
$location = $_POST["location"];
$type = $_POST["type"];
if(isset($_POST['last_minute'])){
    $last_minute = $_POST['last_minute'];
}
else{
    $last_minute = "0";
}


if ($priceBigger != "") {
    $query = "SELECT * FROM properties WHERE price >= $priceBigger ";
    if($priceSmaller != ""){
        $query = $query . " AND price <= $priceSmaller";
    }
    
}
elseif ($priceSmaller != ""){
    $query = "SELECT * FROM properties WHERE price <= $priceSmaller ";
    
}
elseif ($priceBigger == "" && $priceSmaller == "") {
    $query = 'SELECT * FROM properties WHERE price >= 0 AND price <= '.$temp_price["MAX(price)"].' ';
}

   
if ($location != "") {
    $query .= " AND location = '$location'";
}

if ($type != "") {
    $query .= " AND type = '$type'";
}

if ($last_minute == "yes") {
    $query .= " AND last_minute = 1";
}

if ($last_minute == "no") {
    $query .= " AND last_minute = 0";
}


// Execute query
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    // Fetch and output data
    $filteredProperties = array();
    
    while($row = mysqli_fetch_assoc($result)) {
        $property = array(
            "property_id" => $row["property_id"],
            "title" => $row["title"],
            "price" => $row["price"],
            "location" => $row["location"],
            "type" => $row["type"],
            "last_minute" => $row["last_minute"],
            "rating" => $row["rating"],
            "description" => $row["description"]
        );
        
        echo "success" ;
    }

    

    $_SESSION['filterdata']= $query ;
    $_SESSION['filter'] = "true" ;
    header("Location: ../views/Listings.blade.php");
    
    
    } else {
        echo "No properties found with the given filters";
    }
    
    mysqli_close($conn);

?>