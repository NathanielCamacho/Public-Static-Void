<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="profile_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="navbar">
        <a href="homepage.php">
            <img src="krooked product/white_logo.png" class="logo" alt="The Krooked Logo">
        </a>
        <div class="logo_name">The Krooked</div>

        <nav>
            <ul>
                <li>
                    <a href="shopnow.php" class="about">
                        <i class="fa-solid fa-table-list fa-xl"></i>
                    </a>
                </li>
                <li>
                    <a href="cart.php" class="cart">
                        <i class="fa-solid fa-cart-shopping fa-xl"></i>
                    </a>
                </li>
                <li>
                    <a href="loginpage.php" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="main">
    <center><h1>Payment Successful!</h1></center>
    <center><p>Your payment has been successfully processed.</p></center>
    <center><p>Your cart is now empty.</p></center>
    <center><a href="shopnow.php" class="continue_btn"><button>Continue Shopping</button></a></center>
</div>
</body>
</html>
