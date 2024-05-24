<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}

// Check if the necessary data is provided
if (isset($_POST['product_id'], $_POST['color'], $_POST['size'], $_POST['quantity'])) {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "krookedweb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the POST request and perform basic validation
    $item_id = intval($_POST['product_id']);
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = intval($_POST['quantity']);

    // Validate session user ID
    if (!isset($_SESSION['userid'])) {
        header("Location: loginpage.php");
        exit();
    }
    $user_id = $_SESSION['userid'];

    // Get the price of the item from the database
    $sql_get_price = "SELECT itemprice FROM products WHERE itemid = $item_id";
    $result = $conn->query($sql_get_price);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $item_price = $row['itemprice'];
        // Calculate the total amount
        $totalamount = $item_price * $quantity;

        // Insert into orders table
        $sql_insert_order = "INSERT INTO orders (userid, totalamount, orderstatus, createstamp)
                             VALUES ($user_id, $totalamount, 'placed', NOW())";
        $conn->query($sql_insert_order);
        $order_id = $conn->insert_id;

        // Insert into ordercontents table
        $sql_insert_ordercontent = "INSERT INTO ordercontents (orderid, itemid, quantity, color, size)
                                    VALUES ($order_id, $item_id, $quantity, '$color', '$size')";
        $conn->query($sql_insert_ordercontent);

        // Store cart item in session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][] = array(
            'product_id' => $item_id,
            'color' => $color,
            'size' => $size,
            'quantity' => $quantity,
            'totalamount' => $totalamount
        );

        // Redirect to the cart page after adding the item
        header("Location: cart.php");
        exit();
    } else {
        // If item price not found, redirect to the shop page
        header("Location: shopnow.php");
        exit();
    }
} else {
    // If necessary data not provided, redirect to the shop page
    header("Location: shopnow.php");
    exit();
}
?>
