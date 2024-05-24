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

$sql = "SELECT gcashname, refnumber, shipaddress FROM userpayments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $refnumber = $row["refnumber"];
        $shipaddress = $row["shipaddress"];
        $gcashname = $row["gcashname"];
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
   <title>ADMIN</title>
   <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
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
           

<div class="main"> <h1>Customer Confirmation of Order</h1>
    <div class="content">

        <table>
            <tr>
                <th>Customers</th>
                <th>Reference Number</th>
                <th>Customer's Address</th>
                <th>Order Status</th>
            </tr>

            <?php if (isset($noPaymentFound) && $noPaymentFound): ?>
                <tr>
                    <td colspan="4">No payments found.</td>
                </tr>
            <?php else: ?>
                <tr>
                    <td><?php echo $gcashname; ?></td>
                    <td><?php echo $refnumber; ?></td>
                    <td><?php echo $shipaddress; ?></td>
                    <td>
                        <form action="paymentupdate.php" method="post">
                            <input type="hidden" name="refnumber" value="<?php echo $refnumber; ?>">
                            <input type="hidden" name="gcashname" value="<?php echo $gcashname; ?>">
                            <input type="hidden" name="shipaddress" value="<?php echo $shipaddress; ?>">
                            <select name="paymentstatus">
                                <option value="">--Choose an Option--</option>
                                <option value="pending">Pending</option>
                                <option value="successful">Accept</option>
                                <option value="failed">Cancel</option>
                            </select>
                            <div class="status_btn"><button type="submit">Update</button></div>
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <div class="display_btn">
            <a href="adminprofile.php"><button>Back</button></a>
        </div>
    </div>

    <script src="script.js"></script>  
</body>
</html>
