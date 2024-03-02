<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media_queries.css">
    <link rel="stylesheet" href="../css/signupStyle.css">
    <link rel="icon" href="../assets/ntf.png" type="image/png">
    <script src="script.js"></script>
</head>
<?php
$fnameErr = $lnameErr = $phoneErr = $emailErr = $passwordErr = $cpasswordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpasswd = $_POST["cpassword"];
    if ($fname == "") {
        $fnameErr = "Please enter your first name properly";
    }
    if (empty($lname)) {
        $lnameErr = "Please Enter your last name properly";
    }
    if (empty($phone) || !is_numeric($phone) || strlen($phone) != 10) {
        $phoneErr = "Please enter your phone number properly";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please enter your email properly";
    }
    if (empty($password) || strlen($password) < 8) {
        $passwordErr = "Please Enter your password properly";
    }
    if ($password != $cpasswd) {
        $cpasswordErr = "Passwords doesn't match";
    }
}
?>

<body>

    <section class="section">
        <div class="header1">
            <div class="left">
                <img src="../assets/logo.png" alt="">
            </div>
        </div>
        <div class="headerSection">
            <div class="form">
                <p class="ftitle">Sign Up</p>
                <form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="POST">
                    <input type="text" name="firstName" id="fname" placeholder="First Name">
                    <span class="error">*
                        <?php echo $fnameErr; ?>
                    </span>
                    <input type="text" name="lastName" id="lname" placeholder="First Name">
                    <span class="error">*
                        <?php echo $lnameErr; ?>
                    </span>
                    <input type="text" name="phone" id="phone" placeholder="Mobile Number">
                    <span class="error">*
                        <?php echo $phoneErr; ?>
                    </span>
                    <input type="text" name="email" id="email" placeholder="Email or Phone number">
                    <span class="error">*
                        <?php echo $emailErr; ?>
                    </span>
                    <input type="password" name="password" id="passwd" placeholder="Password">
                    <span class="error">*
                        <?php echo $passwordErr; ?>
                    </span>
                    <input type="password" name="cpassword" id="cpasswd" placeholder="Confirm Password">
                    <span class="error">*
                        <?php echo $cpasswordErr; ?>
                    </span>
                    <input type="submit" value="Sign up" id="submitBtn">
                </form>
            </div>
        </div>
    </section>
</body>

</html>