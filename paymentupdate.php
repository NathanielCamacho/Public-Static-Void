<?php
session_start();

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

// Check if the form is submitted and required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refnumber']) && isset($_POST['paymentstatus'])) {
    // Sanitize inputs
    $refnumber = mysqli_real_escape_string($conn, $_POST['refnumber']);
    $paymentstatus = mysqli_real_escape_string($conn, $_POST['paymentstatus']);

    // Update payment status in userpayments table
    $sql = "UPDATE userpayments SET paymentstatus='$paymentstatus' WHERE refnumber='$refnumber'";

    if ($conn->query($sql) === TRUE) {
        echo "Payment status updated successfully.";
    } else {
        echo "Error updating payment status: " . $conn->error;
    }
} else {
    echo "Refnumber and paymentstatus are required.";
}

$conn->close();
?>
