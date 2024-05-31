<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
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
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (!empty($cartItems)) {
    // Begin a transaction
    $conn->begin_transaction();

    try {
        foreach ($cartItems as $cartItem) {
            if (!empty($cartItem) && isset($cartItem['product_id'], $cartItem['size'], $cartItem['quantity'])) {
                $product_id = $cartItem['product_id'];
                $size = $cartItem['size'];
                $quantity = $cartItem['quantity'];

                // Determine which table to use based on the product ID
                $tableName = '';
                switch ($product_id) {
                    case 1:
                        $tableName = 'mamba';
                        break;
                    case 2:
                        $tableName = 'lebron';
                        break;
                    case 3:
                        $tableName = 'anniversary';
                        break;
                    case 4:
                        $tableName = 'felix';
                        break;
                    case 5:
                        $tableName = 'magatta';
                        break;
                    case 6:
                        $tableName = 'dalidoll';
                        break;
                    default:
                        // Handle if product ID is not recognized
                        throw new Exception("Product ID not recognized: $product_id");
                }

                // Determine which stock column to update based on size
                $stockColumn = strtolower($size) . "stock";

                // Fetch current stock value
                $sql = "SELECT $stockColumn FROM $tableName WHERE itemid = $product_id";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $currentStock = $row[$stockColumn];

                    // Check if there is enough stock
                    if ($currentStock >= $quantity) {
                        // Calculate the new stock value
                        $newStock = $currentStock - $quantity;

                        // Update stock value in the database
                        $updateSql = "UPDATE $tableName SET $stockColumn = $newStock WHERE itemid = $product_id";
                        $conn->query($updateSql);

                        // Insert sales data into the sales table
                        $insertSql = "INSERT INTO sales (itemid, quantity, saledate) VALUES ($product_id, $quantity, NOW())";
                        $conn->query($insertSql);
                    } else {
                        throw new Exception("Sorry, your chosen item is currently out of stock! Stay tuned on our social medias for restock announcements.");
                    }
                }
            }
        }

        // Commit the transaction
        $conn->commit();

        // Clear the cart after successful checkout
        unset($_SESSION['cart']);

        // Redirect to a success page
        header("Location: checkout.php");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        $conn->rollback();

        // Display the error message
        echo $e->getMessage();
        exit();
    }
} else {
    // Redirect back to the cart page if the cart is empty
    header("Location: cart.php");
    exit();
}
?>
</div>
</body>
</html>