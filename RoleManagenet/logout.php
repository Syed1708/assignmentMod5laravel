<?php

session_start();


if (isset($_SESSION['email'])) {
    
    // session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login
    header('Location: login.php');
    exit;
} else {
    // If the user is not authenticated, redirect to the login page
    header('Location: login.php');
    exit;
}
?>
