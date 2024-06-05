<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("Location: loginpage.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_POST['userid'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "krookedweb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Start transaction
    $conn->begin_transaction();

    try {
        // Find the orderid(s) associated with the userid
        $sql = "SELECT orderid FROM orders WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $orderids = [];
        while ($row = $result->fetch_assoc()) {
            $orderids[] = $row['orderid'];
        }
        $stmt->close();

        if (!empty($orderids)) {
            // Delete from ordercontents
            $sql = "DELETE FROM ordercontents WHERE orderid IN (" . implode(',', $orderids) . ")";
            if (!$conn->query($sql)) {
                throw new Exception($conn->error);
            }

            // Delete from orders
            $sql = "DELETE FROM orders WHERE orderid IN (" . implode(',', $orderids) . ")";
            if (!$conn->query($sql)) {
                throw new Exception($conn->error);
            }
        }

        // Delete from userpayments
        $sql = "DELETE FROM userpayments WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userid);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $stmt->close();

        // Commit transaction
        $conn->commit();
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        die("Error: " . $e->getMessage());
    }

    $conn->close();
    header("Location: adminpaymentpage.php");
    exit();
}
?>
