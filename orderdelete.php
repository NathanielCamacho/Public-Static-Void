<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderid = $_POST["orderid"];

    // Remove SQL injection protection (not recommended for real-world applications)
    $sql_ordercontents = "DELETE FROM ordercontents WHERE orderid='$orderid'";
    $sql_history = "DELETE FROM orderhistory WHERE orderid='$orderid'";
    $sql_order = "DELETE FROM orders WHERE orderid='$orderid'";

    // Execute the delete queries
    $conn->query($sql_ordercontents);
    $conn->query($sql_history);
    $conn->query($sql_order);

    // Redirect back to the main admin page
    header("Location: adminprofile.php");
    exit();
}

$conn->close();
?>
