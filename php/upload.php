<?php
session_start();
include('./config.php');
$email = $_COOKIE["Email"];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileInput'])) {
    $fileTmpName = $_FILES['fileInput']['tmp_name'];
    $fileSize = $_FILES['fileInput']['size'];
    $fileError = $_FILES['fileInput']['error'];
    $fileType = $_FILES['fileInput']['type'];

    if ($fileError === UPLOAD_ERR_OK) {
        $fileExt = strtolower(pathinfo($_FILES['fileInput']['name'], PATHINFO_EXTENSION));
        $allowed = array('jpeg', 'jpg', 'png');

        if (in_array($fileExt, $allowed)) {
            if ($fileSize < 1000000) {
                $fileNameNew = $_GET["id"] . "." . $fileExt;

                $fileDestination = dirname(__DIR__)."/uploads/" . $fileNameNew;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {

                    $sql = "UPDATE movieUsers SET profilePhoto = '$fileNameNew' WHERE Email = '$email'";
                    setcookie("profilePhoto", $fileDestination, time() + (86400 * 30), "/");
                } else {
                    echo "Error occurred while uploading the file.";
                }
                echo "File is too large. Size should be less than 1 mb";
            }
        } else {
            echo "Wrong file extension.";
        }
    } else {
        echo "Error occurred during file upload.";
    }
} else {
    echo "No file selected.";
}
?>