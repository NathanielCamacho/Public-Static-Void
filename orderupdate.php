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
<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'admin') {
    header("Location: loginpage.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderid = $_POST['orderid'];
    $orderstatus = $_POST['orderstatus'];
    $sql = "UPDATE orders SET orderstatus = '$orderstatus' WHERE orderid = $orderid";

    if ($conn->query($sql) === TRUE) {
        echo "Order status updated successfully.";
    } else {
        echo "Error updating order status: " . $conn->error;
    }
}

$conn->close();

// Redirect back to the admin orders page
header("refresh:3;url=trackOrder.php");
exit();
?>
</div>
</body>
</html>