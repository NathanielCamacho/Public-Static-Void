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
    $orderstatus = $_POST["orderstatus"];

    // Remove SQL injection protection
    $sql_update = "UPDATE orders SET orderstatus='$orderstatus', updatestamp=NOW()";
    $sql_history = "INSERT INTO orderhistory (orderid, orderstatus) VALUES ('$orderid', '$orderstatus')";

    // Add status timestamp
    switch ($orderstatus) {
        case 'payconfirmed':
            $sql_update .= ", payconfirmed_timestamp=NOW()";
            break;
        case 'packed':
            $sql_update .= ", packed_timestamp=NOW()";
            break;
        case 'shipped':
            $sql_update .= ", shipped_timestamp=NOW()";
            break;
    }
    $sql_update .= " WHERE orderid='$orderid'";

    // Execute the update and insert queries
    $conn->query($sql_update);
    $conn->query($sql_history);

    // Redirect back to the admin page
    header("Location: adminprofile.php");
    exit();
}

$conn->close();
?>
