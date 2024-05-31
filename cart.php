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

// Check if the cart is already set in the session, otherwise initialize it
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>

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
<h1>Your Shopping Cart</h1>
<?php if (!empty($cartItems)): ?>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" >
      <thead>
        <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" >
      <tbody>
        <tr>
        <?php
                    $totalPrice = 0;
                    foreach ($cartItems as $cartItem) {
                        // Ensure the cart item is not null
                        if (!empty($cartItem) && isset($cartItem['product_id'], $cartItem['size'], $cartItem['quantity'])) {
                            $product_id = $cartItem['product_id'];
                            $size = $cartItem['size'];
                            $quantity = $cartItem['quantity'];

                            // Fetch product details from the database using the product ID
                            $sql = "SELECT itemname, itemprice FROM products WHERE itemid = $product_id";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $product_name = $row['itemname'];
                                $product_price = $row['itemprice'];
                                $itemTotal = $product_price * $quantity;
                                $totalPrice += $itemTotal;
                                $totalAmount = $totalPrice + 38.00;
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($product_name); ?></td>
                                    <td><?php echo number_format($product_price, 2); ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo number_format($itemTotal, 2); ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
        </tr>
        <tr>
                        <td colspan="3" style="text-align: right;"><strong>Shipping fee:</strong></td>
                        <td><?php echo number_format(38, 2); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                        <td><?php echo number_format($totalAmount, 2); ?></td>
                    </tr>
        
      </tbody>
    </table>
  </div>
        
                <p><br>ALL ORDERS SUBMITTED ARE CONSIDERED FINAL. PLEASE DOUBLE-CHECK YOUR ORDERS TO AVOID ANY ISSUES!</p>
        

            <div class="display_btn">
            <form action="clearcart.php" method="post">
                <button type="submit" class="clear-cart-button">Clear Cart</button>
            </form>
            <form action="checkout.php" method="post">
                <button type="submit" class="checkout-button">Proceed to Checkout</button>
            </form>
            </div>
        <?php else: ?>
            <center><p>Your cart is empty.</p></center>
            <center><a href="shopnow.php" class="continue_btn"><button>Continue Shopping</button></a></center>
        <?php endif; ?>
    </div>
</body>
</html>
