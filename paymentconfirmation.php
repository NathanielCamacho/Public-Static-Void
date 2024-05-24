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
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="profile_css.css">
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
    <center><h1>Payment Confirmation</h1></center>
    <center><p>Your order has been placed successfully. Thank you for shopping with us!</p></center>
    <center><a href="checkout.php" class="continue_btn"><button>Continue Shopping</button></a></center>
</div>
</body>
</html>
