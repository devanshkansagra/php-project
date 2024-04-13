<?php
include('./config.php');
?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Declaring the variables
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // check if admin email already exists
        $quer2 = "SELECT * FROM admin WHERE Email = '$email'";
        $result = mysqli_query($conn, $quer2);
          
        if(mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email Already Exists')</script>";
        }
        else {
            
            $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $charLen = strlen($characters);
            $loginKey = "";

            for($i = 0; $i < 8; $i++) {
                $randomIndex = mt_rand(0, $charLen-1);
                $loginKey .= $characters[$randomIndex];
            }
            
            $query = mysqli_query($conn, "INSERT INTO admin(firstName, lastName, Email, Password, loginKey) VALUES ('$firstName', '$lastName','$email','$password', '$loginKey')");

            echo "
                <script>
                    alert('Submitted Successfully')
                    window.location.href='/PHP-Project/php/adminPanel.php';
                </script>
            ";
        }
    }
?>