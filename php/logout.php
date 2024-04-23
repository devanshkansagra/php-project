<?php
    session_unset();
    session_destroy();
    setcookie("Email", "", time() - 1, "/");
    setcookie("Password", "", time() - 1, "/");
    header("Location: ../public/index.html");
?>