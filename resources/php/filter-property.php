<?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "website-rental");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$priceSmaller = $_POST["priceSmaller"];
$priceBigger = $_POST["priceBigger"];
$location = $_POST["location"];
$type = $_POST["type"];
$lastMinute = $_POST["lastMinute"];

if ($priceSmaller != "" && $priceBigger != "" ) {
    $query = "SELECT * FROM properties WHERE price BETWEEN $priceSmaller AND $priceBigger";
}
else if ($priceBigger != "") {
    $query = "SELECT * FROM properties WHERE price >= $priceBigger ";
}
else {
    $query = "SELECT * FROM properties WHERE price <= $priceSmaller ";
}
// Build query


if ($location != "") {
    $query .= " AND location = '$location'";
}

if ($type != "") {
    $query .= " AND type = '$type'";
}

if ($lastMinute == "1") {
    $query .= " AND last_minute = 1";
}

// Execute query
$result = mysqli_query($conn, $query);

// Check if query is successful
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
        array_push($filteredProperties, $property);
    }
    
    // Return filtered properties as JSON
    echo json_encode($filteredProperties);
    
    } else {
        echo "No properties found with the given filters";
    }
    
    mysqli_close($conn);
    