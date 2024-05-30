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
    <title>Payment Page</title>
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
        <h1>Payment Instructions</h1>
        <p>Please follow the steps below to complete your payment:</p><br>
        <ol>
            <li>1. Open GCash app</li><br>
            <li>2. Scan QR code</li><br>
            <img src="krooked product/QR.jpg" class="qr-code" alt="QR Code" witdh="300" height="300">
            <li>3. Input the required data</li><br>
        </ol>
        
        <form action="paymentlanding.php" method="post">
            <label for="gcash_name">GCash Account Name:</label>
            <input type="text" id="gcash_name" name="gcashname" placeholder="John Fitzgerald Kennedy" required>
            <label for="gcash_number">GCash Number:</label>
            <input type="text" id="gcash_number" name="gcashnum" placeholder="09XX-XXX-XXXX" pattern="[0-9]*" required>
            <label for="reference_number">Reference Number:</label>
            <input type="text" id="reference_number" name="refnumber" placeholder="XXXX-XXXX-XXXXX" pattern="[0-9]*" required>
            <label>Shipping Address:</label>
            <label for="street">Street:</label>
            <input type="text" id="street" name="street" placeholder="123 Apple Street" required>
            <label for="street">Barangay:</label>
            <input type="text" id="baranggay" name="baranggay" placeholder="Brgy. Malinis" required>
            <label for="street">City:</label>
            <input type="text" id="city" name="city" placeholder="Manila City" required>
            <label for="street">State:</label>
            <input type="text" id="state" name="state" placeholder="Metro Manila" required>
            <label for="street">Zip Code:</label>
            <input type="text" id="zipcode" name="zipcode" placeholder="1000" required>
            <p><br>By clicking submit, you acknowlege that we do not provide REFUNDS for any CANCELLATIONS.</p>
            <form action="clearcart.php" method="post">
            <button type="submit">Submit Payment</button> 
            </form>
            <button onclick="window.location.href='userprofile.php'">Back</button>
           

        </form>
    </div>
</body>
</html>
