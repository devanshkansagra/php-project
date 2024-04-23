<?php 
    session_start();
    if(isset($_POST["otp"])) {
        $otp = $_POST["otp"];
        $sessionOTP = $_SESSION['otp'];
        $sessionOTPAdmin = $_SESSION['otpAdmin'];
        if($otp == $sessionOTP) {
            echo "
                <script>
                    alert('Verified Successfully');
                    window.location.href='/PHP-Project/php/home.php';
                    
                </script>
            ";
        }
        if($otp == $sessionOTPAdmin) {
            echo "
                <script>
                    alert('Verified Successfully');
                    window.location.href='/admin';
                    
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