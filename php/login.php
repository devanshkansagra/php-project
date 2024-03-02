<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media_queries.css">
    <link rel="stylesheet" href="../css/loginStyle.css">
    <link rel="icon" href="../assets/ntf.png" type="image/png">
    <script src="script.js"></script>
</head>
<?php 
    $emailErr = $passwordErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Please enter your email properly";
        }
        if(empty($password) || strlen($password) < 8) {
            $passwordErr = "Please Enter your password properly";
        }
        else {
            echo "<script>alert('Login Successfully') </script>";
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
                <p class="ftitle">Sign In</p>
                <form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="POST">
                    <input type="text" name="email" id="email" placeholder="Email or Phone number">
                    <span class="error">* <?php echo $emailErr;?> </span>
                    <input type="password" name="password" id="passwd" placeholder="Password">
                    <span class="error">* <?php echo $passwordErr; ?></span>
                    <input type="submit" value="Sign In" id="submitBtn">
                </form>
                <div class="choice">
                    <div class="input">
                        <input type="checkbox" name="remember" id="remember" checked>&nbsp;Remember me
                    </div>
                    <div class="ask">
                        Need Help?
                    </div>
                </div>
                <div class="new">
                    <span>New to Netflix?</span> Sign up now.
                </div>
                <div class="security">
                    <span class="sec">This page is protected by Google reCAPTCHA to ensure you're not a bot.</span><span
                        class="more" onclick="more()"> Learn more.</span>
                    <div class="moreDetails" id="details">
                        The information collected by Google reCAPTCHA is subject to the Google Privacy Policy and Terms
                        of Service, and is used for providing, maintaining, and improving the reCAPTCHA service and for
                        general security purposes (it is not used for personalised advertising by Google).
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</body>

</html>