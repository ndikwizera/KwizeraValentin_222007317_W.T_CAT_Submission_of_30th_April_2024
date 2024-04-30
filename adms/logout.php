<?php
session_start(); // Start the PHP session

// Check if the user is logged in
 {
    

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page as needed
    header("Location: login.php");
    exit;
} 
?>
