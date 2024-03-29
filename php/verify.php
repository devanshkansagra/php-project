<?php 
    session_start();
    if(isset($_POST["otp"])) {
        $otp = $_POST["otp"];
        $sessionOTP = $_SESSION['otp'];
        if($otp == $sessionOTP) {
            echo "
                <script>
                    alert('Verified Successfully');
                    window.location.href='/PHP-Project/public/index.html';
                    
                </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('Invalid OTP');
                    window.location.href='/PHP-Project/php/otpVerify.php';
                </script>
            ";
        }
    }
?>