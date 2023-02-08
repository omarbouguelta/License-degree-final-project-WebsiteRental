<?php
    // Get the file
    $file = $_FILES["file"];

    // Get the file name
    $fileName = $file["name"];

    // Set the upload directory
    $uploadDir = "../views/uploads/";

    // Set the file path
    $filePath = $uploadDir . $fileName;

    // Check if the file has been uploaded
    if (move_uploaded_file($file["tmp_name"], $filePath)) {
        // Return the file path
        echo $filePath;
    }
?>
