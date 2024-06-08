<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("Location: loginpage.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize filter status
$filterStatus = isset($_POST['filterstatus']) ? $_POST['filterstatus'] : 'all';

// Adjust SQL query based on filter status
if ($filterStatus === 'all') {
    $sql = "SELECT up.gcashname, up.refnumber, up.street, up.gcashnum, up.baranggay, up.city, up.state, up.zipcode, up.paymentstatus, o.orderstatus
            FROM userpayments up
            INNER JOIN orders o ON up.userid = o.userid";
} else {
    $sql = "SELECT up.gcashname, up.refnumber, up.street, up.gcashnum, up.baranggay, up.city, up.state, up.zipcode, up.paymentstatus, o.orderstatus
            FROM userpayments up
            INNER JOIN orders o ON up.userid = o.userid
            WHERE up.paymentstatus = '$filterStatus'";
}

$result = $conn->query($sql);

$payments = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $payments[] = $row;
    }
} else {
    $noPaymentFound = true;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Payment Page</title>
   <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>

<div class="header">
        <div class="navbar">
            <a href="adminprofile.php"> 
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
                    <a href="logout.php" class="profile">
                  Logout     
                    </a>   
                </li> 
            </ul>
        </nav>  
        </div>
    </div>
           

<div class="main"> <h1>Customer's Payment Confirmation Page</h1>
    <div class="content">
    <form method="post" action="confirmOrder.php">
        <label for="filterstatus">Filter by Payment Status:</label>
        <br>
        <select name="filterstatus" id="filterstatus" style="width: 10%;">
            <option value="all" <?php if ($filterStatus === 'all') echo 'selected'; ?>>All</option>
            <option value="pending" <?php if ($filterStatus === 'pending') echo 'selected'; ?>>Pending</option>
            <option value="successful" <?php if ($filterStatus === 'successful') echo 'selected'; ?>>Successful</option>
            <option value="failed" <?php if ($filterStatus === 'failed') echo 'selected'; ?>>Failed</option>
        </select>
        <br>
        <button type="submit" class="filter_btn">Filter</button>
        <br>
    </form>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>GCash Number</th>
                <th>Reference Number</th>
                <th>Address</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($noPaymentFound) && $noPaymentFound): ?>
                <tr>
                    <td colspan="7">No payments found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($payments as $payment): ?>
                    <?php
                    // Mapping orderstatus to display values
                    switch ($payment['orderstatus']) {
                        case 'placed':
                            $orderstatus_display = "Order Placed";
                            break;
                        case 'payconfirmed':
                            $orderstatus_display = "Payment Confirmed";
                            break;
                        case 'packed':
                            $orderstatus_display = "Order Packed";
                            break;
                        case 'shipped':
                            $orderstatus_display = "Order Shipped";
                            break;
                        default:
                            $orderstatus_display = "Unknown";
                    }
                    ?>
                    <tr>
                        <td><?php echo $payment['gcashname']; ?></td>
                        <td><?php echo $payment['gcashnum']; ?></td>
                        <td><?php echo $payment['refnumber']; ?></td>
                        <td><?php echo $payment['street'] . ",<br>" . $payment['baranggay'] . ", " . $payment['city']; ?></td>
                        <td><?php echo $payment['paymentstatus']; ?></td>
                        <td><?php echo $orderstatus_display; ?></td>
                        <td>
                            <form action="paymentupdate.php" method="post">
                                <input type="hidden" name="refnumber" value="<?php echo $payment['refnumber']; ?>">
                                <select name="paymentstatus">
                                    <option value="">--Option--</option>
                                    <option value="pending" <?php if ($payment['paymentstatus'] === 'pending') echo 'selected'; ?>>Pending</option>
                                    <option value="successful" <?php if ($payment['paymentstatus'] === 'successful') echo 'selected'; ?>>Accept</option>
                                    <option value="failed" <?php if ($payment['paymentstatus'] === 'failed') echo 'selected'; ?>>Cancel</option>
                                </select>
                                <br>
                                <div class="display_btn"><button type="submit">Update</button></div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>
    </div>
    
            <a href="adminprofile.php"><button>Back</button></a>
        
    </div>

    <script src="script.js"></script>  
</body>
</html>
