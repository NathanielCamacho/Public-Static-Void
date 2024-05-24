<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start a transaction
$conn->begin_transaction();

try {
    // Clear the ordercontents table
    $sql_ordercontents = "DELETE FROM ordercontents";
    if (!$conn->query($sql_ordercontents)) {
        throw new Exception("Error deleting from ordercontents: " . $conn->error);
    }

    // Clear the orders table
    $sql_orders = "DELETE FROM orders";
    if (!$conn->query($sql_orders)) {
        throw new Exception("Error deleting from orders: " . $conn->error);
    }

    // Commit the transaction
    $conn->commit();
    echo "All orders and related contents have been deleted successfully.";
} catch (Exception $e) {
    // Rollback the transaction if an error occurs
    $conn->rollback();
    echo $e->getMessage();
}

$conn->close();

// Redirect back to admin orders page
header("Location: adminprofile.php");
exit();
?>
