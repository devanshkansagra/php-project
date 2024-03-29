<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="../css/stylesForLogin.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php 
    include('./config.php');
?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM movieUsers WHERE Email = '$email'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            header("location:/PHP-Project/public/index.html");
        }
        else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    }
?>
<body>
  <div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="email" placeholder="Email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="./forgotPassword.php">Forgot Password</a>
      </div>
      <input type="submit" class="btn" value="Login"></input>
      <div class="register-link">
        <p>Don't have an account? <a href="./signup.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
