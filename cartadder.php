<?php
session_start();

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

    // Retrieve data from the POST request
    $itemid = intval($_POST['product_id']);
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = intval($_POST['quantity']);

    // Query the database to get item details
    $sql = "SELECT * FROM products WHERE itemid = $itemid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $item = array(
            'id' => $row['itemid'],
            'name' => $row['itemname'],
            'price' => $row['itemprice'],
            'color' => $color,
            'size' => $size,
            'quantity' => $quantity
        );

        // Add the item to the shopping cart session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][] = $item;

        // Redirect to the cart page after adding the item
        header("Location: cart.php");
        exit();
    } else {
        // If item not found, redirect to the shop page
        header("Location: shopnow.html");
        exit();
    }

    $conn->close();
} else {
    // If necessary data not provided, redirect to the shop page
    header("Location: shopnow.html");
    exit();
}
?>
