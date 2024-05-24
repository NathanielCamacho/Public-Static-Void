<?php
session_start();

// Database connection parameters
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

// Clear the ordercontents table by deleting its records
$sql_clear_ordercontents = "DELETE FROM ordercontents";
if ($conn->query($sql_clear_ordercontents) === TRUE) {
    echo "Ordercontents table cleared successfully.";
} else {
    echo "Error clearing ordercontents table: " . $conn->error;
}

// Reset auto_increment value for ordercontents table
$sql_reset_ordercontents_autoincrement = "ALTER TABLE ordercontents AUTO_INCREMENT = 1";
if ($conn->query($sql_reset_ordercontents_autoincrement) === TRUE) {
    echo "Auto_increment value for ordercontents table reset successfully.";
} else {
    echo "Error resetting auto_increment value for ordercontents table: " . $conn->error;
}

// Clear the cart
unset($_SESSION['cart']);

// Redirect to cart.php
header("Location: cart.php");
exit();
?>
