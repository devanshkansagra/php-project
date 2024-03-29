<?php 
    include('./config.php');
?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM movieUsers WHERE Email = '$email' AND Password = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            header("location:/PHP-Project/public/index.html");
        }
        else {
            echo "
                <script>
                    alert('Invalid Credentials');
                    window.location.href='/PHP-Project/php/login.php';
                </script>";
            // header("location:/PHP-Project/php/login.php");
        }
    }
?>