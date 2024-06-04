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
        } else if ($operation === 'subtract') {
            if ($currentStock >= $quantity) {
                $newStock = $currentStock - $quantity;
            } else {
                return "Error: Not enough stock to remove.";
            }
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

$addMessage = $revMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["additemname"], $_POST["additemsize"], $_POST["addquantity"])) {
        $addItemName = $_POST["additemname"];
        $addItemSize = $_POST["additemsize"];
        $addQuantity = (int)$_POST["addquantity"];
        $addMessage = updateStock($conn, $addItemName, $addItemSize, $addQuantity, 'add');
    }

    if (isset($_POST["revitemname"], $_POST["revitemsize"], $_POST["revquantity"])) {
        $revItemName = $_POST["revitemname"];
        $revItemSize = $_POST["revitemsize"];
        $revQuantity = (int)$_POST["revquantity"];
        $revMessage = updateStock($conn, $revItemName, $revItemSize, $revQuantity, 'subtract');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="admin.css">
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
                    <a href="logout.php" class="profile">
                        <i class="fa-solid fa-right-from-bracket fa-xl"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="main">
    <h1 class="text">Inventory Management</h1>
    <form method="post" action="">
        <p><input type="radio" name="operation" value="add"> Add Stocks</p>
        <p><input type="radio" name="operation" value="subtract"> Remove Stocks</p><br>
        <input type="submit" value="Continue">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["operation"])): ?>
            <?php if ($_POST["operation"] == "add"): ?>
                <h2>Add Stocks</h2>
                <p>Item: <input type="text" name="additemname" placeholder="Mamba"></p>
                <p>Size: <input type="text" name="additemsize" placeholder="S/M/L"></p>
                <p>Count: <input type="number" name="addquantity" placeholder="15"></p><br>
                <input type="submit" value="   Add   ">
            <?php else: ?>
                <h2>Remove Stocks</h2>
                <p>Item: <input type="text" name="revitemname" placeholder="Mamba"></p>
                <p>Size: <input type="text" name="revitemsize" placeholder="S/M/L"></p>
                <p>Count: <input type="number" name="revquantity" placeholder="15"></p><br>
                <input type="submit" value="  Remove  ">
            <?php endif; ?>
        <?php endif; ?>
		<?php if ($addMessage && strpos($addMessage, 'Error') === false): ?>
                <p><?php echo $addMessage; ?></p>
            <?php elseif ($addMessage): ?>
                <p style="color: red;"><?php echo $addMessage; ?></p>
            <?php endif; ?>
            
            <!-- Display error/success messages for subtract operation -->
            <?php if ($revMessage && strpos($revMessage, 'Error') === false): ?>
                <p><?php echo $revMessage; ?></p>
            <?php elseif ($revMessage): ?>
                <p style="color: red;"><?php echo $revMessage; ?></p>
            <?php endif; ?>
    </form>
    <button onclick="window.location.href='inventory.php'">Back</button>
</div>
</body>
</html>