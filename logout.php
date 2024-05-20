<?php
session_start(); // Start PHP session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: loginpage.php");
exit();
?>