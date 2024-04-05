<?php 
  if(isset($_COOKIE["Email"]) && isset($_COOKIE["Password"])) {
    header("location:/PHP-Project/public/index.html");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../css/stylesForSignup.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php
include('./config.php');
?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nameErr = $emailErr = $passwordErr = $cpasswordErr = "";

        // Declaring the variables
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $lastLogin = date('Y-m-d H:i:s');

        if($password !== $cpassword) {
          echo "<script>alert('Passwords doesn't match')</script>";

        }
        else {
          $quer2 = "SELECT * FROM movieUsers WHERE Email = '$email'";
          $result = mysqli_query($conn, $quer2);
          
          if(mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email Already Exists')</script>";
          }
          else {
            
            // Setting the cookies
            setcookie("Email", $email, time() + 120, '/');
            setcookie("Password", $password, time() + 120, '/');
            
            $query = mysqli_query($conn, "INSERT INTO movieUsers(Name, Email, Password, LastLogin) VALUES ('$name','$email','$password', '$lastLogin')");

            echo "<script>alert('Submitted Successfully')</script>";
            header("location:/PHP-Project/public/index.html");
          }
        }
    }
?>

<body>
  <div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <h1>Sign Up</h1>
      <div class="input-box">
        <input type="text" name="name" id="name" placeholder="Name" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class='bx bx-envelope'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="input-box">
        <input type="password" name="cpassword" placeholder="Confirm Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
    
      <input type="submit" class="btn" value="Submit">
      <div class="register-link">
        <p>Already have an account? <a href="./login.php">Login</a></p>
      </div>
    </form>
  </div>
  <script src="../js/script.js"></script>
</body>
</html>

