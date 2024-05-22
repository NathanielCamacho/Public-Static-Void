<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: userprofile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&display=swap" rel="stylesheet">
    <style>
        body {
            color: black;
        }
        .header
        .main h1,
        .main p,
        .main button {
            color: black;
        }
        .header nav ul li a {
            color: white; /* Keep navigation links white */
        }
    </style>
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
                    <a href="loginpage.php" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>         
                    </a>   
                </li>       
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
            </ul>
        </nav>  
        </div>
    </div>
    <div class="main">
        <h1>Payment Instructions</h1>
        <p>Please follow the steps below to complete your payment:</p><br>
        <ol>
            <li>Open GCash app</li><br>
            <li>Scan QR code</li><br>
        </ol>
        <img src="krooked product/QR.jpg" class="qr-code" alt="QR Code" witdh="300" height="300">
        <form action="paymentlanding.php" method="post">
            <label for="gcash_name">GCash Account Name:</label>
            <input type="text" id="gcash_name" name="gcashname" required>
            <label for="gcash_number">GCash Number:</label>
            <input type="text" id="gcash_number" name="gcashnum" placeholder="09XX-XXX-XXXX" pattern="[0-9]*" required>
            <label for="reference_number">Reference Number:</label>
            <input type="text" id="reference_number" name="refnumber" placeholder="XXXX-XXXX-XXXXX" pattern="[0-9]*" required>
            <button type="submit">Submit Payment</button>
            
        </form>
    </div>
</body>
</html>
