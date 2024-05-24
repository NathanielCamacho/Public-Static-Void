<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to delete all records from the userpayments table
$sql = "DELETE FROM userpayments";

if ($conn->query($sql) === TRUE) {
    echo "All payments have been cleared successfully.";
} else {
    echo "Error clearing payments: " . $conn->error;
}
header("Location: receipts.php");
exit();
$conn->close();
?>
