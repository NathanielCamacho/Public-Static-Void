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
            color: white;
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

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderId = isset($_GET['orderid']) ? intval($_GET['orderid']) : 0;
$orderDetails = [];
$orderContents = [];

if ($orderId > 0) {
    $order_query = "SELECT * FROM orders WHERE orderid = '$orderId'";
    $result = $conn->query($order_query);
    if ($result->num_rows > 0) {
        $orderDetails = $result->fetch_assoc();
    }

    $order_contents_query = "SELECT oc.*, p.itemname, p.itemprice FROM ordercontents oc
                             JOIN products p ON oc.itemid = p.itemid
                             WHERE oc.orderid = '$orderId'";
    $result = $conn->query($order_contents_query);
    while ($row = $result->fetch_assoc()) {
        $orderContents[] = $row;
    }
}

$conn->close();
?>
        <h1>My Orders</h1>
        <?php if ($result_orders->num_rows > 0): ?>
            <center><table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                    <th>Item Color</th>
                    <th>Item Size</th>
                    <th>Total Price</th>
                </tr>
                <?php while ($row_order = $result_orders->fetch_assoc()): ?>
                    <?php
                    $orderid = $row_order['orderid'];
                    $sql_contents = "SELECT * FROM ordercontents WHERE orderid = $orderid";
                    $result_contents = $conn->query($sql_contents);
                    ?>
                    <?php while ($row_content = $result_contents->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row_order['orderid']; ?></td>
                            <td><?php echo $row_order['createstamp']; ?></td>
                            <td><?php echo $row_content['quantity']; ?></td>
                            <td><?php echo $row_content['color']; ?></td>
                            <td><?php echo $row_content['size']; ?></td>
                            <td><?php
                                $itemid = $row_content['itemid'];
                                $quantity = $row_content['quantity'];
                                $sql_item = "SELECT itemprice FROM products WHERE itemid = $itemid";
                                $result_item = $conn->query($sql_item);
                                if ($result_item->num_rows > 0) {
                                    $row_item = $result_item->fetch_assoc();
                                    $itemprice = $row_item['itemprice'];
                                    $totalprice = $itemprice * $quantity;
                                    echo $totalprice;
                                } else {
                                    echo "Price not available";
                                }
                            ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endwhile; ?>
            </table></center>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
