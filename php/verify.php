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
                    window.location.href='/PHP-Project/public/index.html';
                    
                </script>
            ";
        }
        if($otp == $sessionOTPAdmin) {
            try {

                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'lorem.ipsum.sample.email@gmail.com';
                $mail->Password   = 'tetmxtzkfgkwgpsc';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
        
                // Recipients
                $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'PHP-Project');
                $mail->addAddress($_POST["email"]);
                $mail->addReplyTo('lorem.ipsum.sample.email@gmail.com', 'PHP-Project');
    
                $loginKey = $_SESSION['loginKey'];
    
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Security update!';
                $mail->Body = "Your new security key is: $loginKey";
        
                $mail->send();
                $_SESSION['showAlert'] = true;
                echo "
                    <script>
                        alert('New Security key is sent via email check it out!');
                        window.location.href='/PHP-Project/php/adminPanel.php';
                    </script>
                ";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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