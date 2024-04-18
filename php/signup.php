<?php
include('./config.php');
?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nameErr = $emailErr = $passwordErr = $cpasswordErr = "";

        // Declaring the variables
        $name = $_POST["name"];
        $email = $_POST["email"];
        $dob = $_POST["date"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $lastLogin = date('Y-m-d H:i:s');

        if($password != $cpassword) {
          echo "<script>alert('Passwords doesn't match')</script>";

        }
        else {
          $quer2 = "SELECT * FROM movieUsers WHERE Email = '$email'";
          $result = mysqli_query($conn, $quer2);
          
          if(mysqli_num_rows($result) > 0) {
            echo "
              <script>
                alert('Email Already Exists')
                window.location.href='/PHP-Project/php/signupForm.php'
              </script>
              ";
          }
          else {
            
            // Setting the cookies
            setcookie("Email", $email, time() + 120, '/');
            setcookie("Password", $password, time() + 120, '/');
            
            $query = mysqli_query($conn, "INSERT INTO movieUsers(Name, Email, DOB, Password, LastLogin) VALUES ('$name','$email','$dob','$password', '$lastLogin')");

            echo "
            <script>
              alert('Submitted Successfully')
              window.location.href='/PHP-Project/public/index.html'
            </script>";
          }
        }
    }
?>