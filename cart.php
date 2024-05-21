<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}
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
    <style>
        body {
            color: black;
        }
        .header,
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
                <img src="krooked product/white_logo.png" class="logo">
            </a>
            <div class="logo_name">The Krooked</div>
            <nav>
                <ul>
                    <li><a href="loginpage.php" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>
                    </a></li>
                    <li><a href="shopnow.php" class="cart">
                        <i class="fa-solid fa-cart-shopping fa-xl"></i>
                    </a></li>
                    <li><a href="about.html" class="about">
                        <i class="fa-regular fa-address-card fa-xl"></i>
                    </a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="main">
        <center><h1>Your Shopping Cart</h1></center>
        <?php if (count($cartItems) > 0): ?>
            <center><table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                $totalPrice = 0;
                foreach ($cartItems as $item):
                    $itemTotal = $item['price'] * $item['quantity'];
                    $totalPrice += $itemTotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($itemTotal, 2); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                    <td><?php echo number_format($totalPrice, 2); ?></td>
                </tr>
            </table></center>
            <form action="checkout.php" method="post">
                <button type="submit" class="checkout-button">Proceed to Checkout</button>
            </form>
            <form action="clearcart.php" method="post">
                <button type="submit" class="clear-cart-button">Clear Cart</button>
            </form>
        <?php else: ?>
            <center><p>Your cart is empty.</p></center>
            <center><a href="shopnow.php">Continue Shopping</a></center>
        <?php endif; ?>
    </div>
</body>
</html>
