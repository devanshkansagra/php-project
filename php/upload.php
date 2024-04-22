<?php
// Check if file input is set and not empty
if (isset($_FILES['fileInput']) && !empty($_FILES['fileInput']['name'])) {
    $targetDirectory = "../assets/"; // Relative path to the assets directory
    $targetFile = $targetDirectory . basename($_FILES['fileInput']['name']);

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
    } else {
        // Try to move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $targetFile)) {
            echo "The file " . basename($_FILES['fileInput']['name']) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "No file uploaded.";
}
?>
