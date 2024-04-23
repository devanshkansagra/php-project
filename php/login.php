<?php 
  if(isset($_COOKIE["Email"]) && isset($_COOKIE["Password"])) {
    header("location:/PHP-Project/public/afterLogin.html");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/sv.png" type="image/png">
  <title>Login</title>
  <link rel="stylesheet" href="../css/stylesForLogin.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="./sendLogin.php" method="POST">
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
        <p>Don't have an account? <a href="./signupForm.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>

<?php
session_start();

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "movie";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];


    $query = "SELECT id, name, email, profilephoto, date_of_birth, gender FROM movieUsers WHERE Email = '$email' AND Password = '$password'";

    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);


        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["name"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["user_profilephoto"] = $row["profilephoto"];
        $_SESSION["user_date_of_birth"] = $row["date_of_birth"];
        $_SESSION["user_gender"] = $row["gender"];


        header("Location: /PHP-Project/public/afterLogin.html");
        exit();
    } else {
        echo "Invalid email or password!";
    }

    mysqli_free_result($result);
}

mysqli_close($connection);
?>
