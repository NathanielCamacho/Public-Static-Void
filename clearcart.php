<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}

// Clear the cart
unset($_SESSION['cart']);

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>
