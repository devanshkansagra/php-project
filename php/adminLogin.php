<?php
include('./config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
session_start();
if (isset($_POST["email"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $loginKey = $_POST["loginKey"];
    $query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password' AND LoginKey='$loginKey'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        try {

            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'lorem.ipsum.sample.email@gmail.com';
            $mail->Password   = 'tetmxtzkfgkwgpsc';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
    
            // Recipients
            $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'PHP-Project');
            $mail->addAddress($_POST["email"]);
            $mail->addReplyTo('lorem.ipsum.sample.email@gmail.com', 'PHP-Project');
    
            $otp = rand(100000, 999999);
            $_SESSION['otpAdmin'] = $otp;

            $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $charLen = strlen($characters);

            for($i = 0; $i < 8; $i++) {
                $randomIndex = mt_rand(0, $charLen-1);
                $loginKey .= $characters[$randomIndex];
            }
            $_SESSION['loginKey'] = $loginKey;
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New OTP Generated!';
            $mail->Body = "Your New otp is: $otp";
    
            echo "
                <script>
                    alert('Check your email for otp!');
                    window.location.href='/PHP-Project/php/otpVerify.php';
                </script>
            ";
            $mail->send();
            
            $updateLogin = "UPDATE admin SET LoginKey = '$loginKey' WHERE Email = '$email'";
            $updateQuery = mysqli_query($conn, $updateLogin);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
    else {
        echo "
            <script>
                alert('Invalid Credentials!');
                window.location.href='/PHP-Project/php/adminLogin.php';
            </script>
        ";
    }
}
