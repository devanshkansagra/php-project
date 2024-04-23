<?php
if (isset($_FILES['fileInput']) && !empty($_FILES['fileInput']['name'])) {
    $targetDirectory = "../assets/";
    $targetFile = $targetDirectory . basename($_FILES['fileInput']['name']);

    if (file_exists($targetFile)) {
        echo "File already exists.";
    } else {
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