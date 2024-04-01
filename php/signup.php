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

        if($password != $cpassword) {
            echo "<script>alert('Passwords doesn't match')</script>";

        }

        $quer2 = "SELECT * FROM movieUsers WHERE Email = '$email'";
        $result = mysqli_query($conn, $quer2);
        
        if(mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email Already Exists')</script>";
        }
        else {
            $query = mysqli_query($conn, "INSERT INTO movieUsers(Name, Email, Password) VALUES ('$name','$email','$password')");
            echo "<script>alert('Submitted Successfully')</script>";
            header("location:/PHP-Project/public/index.html");
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
      <div class="input-box">
        <input type="file" id="profile-photo" accept="image/*">
        <label for="profile-photo" class="file-label">Upload Profile Photo</label>
        <div class="profile-preview" id="profile-preview" style="display: none;"></div>
        <span id="upload-label" class="upload-label"></span>
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

