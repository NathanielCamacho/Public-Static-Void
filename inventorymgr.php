<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] != 'admin') {
    header("Location: loginpage.php");
    exit();
}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "krookedweb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function updateStock($conn, $itemname, $size, $quantity, $operation) {
    // Determine which table and stock column to update based on the item name
    $tableName = '';
    switch (strtolower($itemname)) {
        case 'mamba':
            $tableName = 'mamba';
            break;
        case 'lebron':
            $tableName = 'lebron';
            break;
        case 'anniversary tee':
            $tableName = 'anniversary';
            break;
        case 'felix':
            $tableName = 'felix';
            break;
        case 'magatta':
            $tableName = 'magatta';
            break;
        case 'dali doll':
            $tableName = 'dalidoll';
            break;
        default:
            return "Error: No item name/details given.";
    }

    $stockColumn = strtolower($size) . "stock";

    // SQL query to fetch the current stock
    $sql = "SELECT $stockColumn FROM $tableName WHERE itemname = '$itemname'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStock = $row[$stockColumn];

        if ($operation === 'add') {
            $newStock = $currentStock + $quantity;
        } else {
            return "Error: Invalid operation.";
        }

        // Update stock value in the database
        $updateSql = "UPDATE $tableName SET $stockColumn = $newStock WHERE itemname = '$itemname'";
        if ($conn->query($updateSql) === TRUE) {
            return "Stock updated successfully.";
        } else {
            return "Error updating stock: " . $conn->error;
        }
    } else {
        return "Error: Item not found in $tableName table.";
    }
}

// Fetch product names for the select options
$productNames = [];
$productQuery = "SELECT DISTINCT itemname FROM (
    SELECT itemname FROM mamba
    UNION ALL
    SELECT itemname FROM lebron
    UNION ALL
    SELECT itemname FROM anniversary
    UNION ALL
    SELECT itemname FROM felix
    UNION ALL
    SELECT itemname FROM magatta
    UNION ALL
    SELECT itemname FROM dalidoll
) AS products";

$result = $conn->query($productQuery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productNames[] = $row['itemname'];
    }
}

$addMessage = $revMessage = "";
$popupMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["additemname"], $_POST["additemsize"], $_POST["addquantity"])) {
        $addItemName = $_POST["additemname"];
        $addItemSize = $_POST["additemsize"];
        $addQuantity = (int)$_POST["addquantity"];
        $addMessage = updateStock($conn, $addItemName, $addItemSize, $addQuantity, 'add');
        if (strpos($addMessage, 'successfully') !== false) {
            $popupMessage = $addMessage;
        }
    }

    if (isset($_POST["revitemname"], $_POST["revitemsize"], $_POST["revquantity"])) {
        $revItemName = $_POST["revitemname"];
        $revItemSize = $_POST["revitemsize"];
        $revQuantity = (int)$_POST["revquantity"];
        $revMessage = updateStock($conn, $revItemName, $revItemSize, $revQuantity, 'subtract');
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="profile_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="navbar">
        <a href="#">
            <img src="krooked product/white_logo.png" class="logo" alt="The Krooked Logo">
        </a>
        <div class="logo_name">The Krooked</div>

        <nav>
            <ul>
                <li>
                    <a href="confirmOrder.php">Payments status</a>
                </li>
                <li>
                    <a href="trackOrder.php">Check Order</a>
                </li>
                <li>
                    <a href="inventory.php">Inventory</a>
                </li>
                <li> 
                    <a href="logout.php" class="logout">
                        Logout     
                    </a>   
                </li> 
            </ul>
        </nav>
    </div>
</div>

<div class="main">
    <h1 class="text">Stocks Update</h1>
    <form method="post" action="">
       
        <p>Item: 
            <select name="additemname">
                <?php
                foreach ($productNames as $productName) {
                    echo "<option value=\"$productName\">$productName</option>";
                }
                ?>
            </select>
        </p>
        <p>Size: 
            <select name="additemsize">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
            </select>
        </p>
        <p>Count: <input type="number" name="addquantity" placeholder="15" class="addquantity" value="1" min="1"></p>
        <input type="submit" value="Add" class="submit"></form> 
   
</div>

<?php
if (!empty($popupMessage)) {
    echo "<script>alert('$popupMessage');</script>";
}
?>

</body>
</html>
