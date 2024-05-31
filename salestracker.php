<?php
session_start();

// Check if the usertype is not set or is not 'admin'
if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] != 'admin') {
    // Redirect to the login page
    header("Location: ../login.php");
    exit(); // Stop further execution
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile_css.css">
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
    <div class="main-content">
    <?php
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

// Function to get sales data
function getSalesData($conn, $interval) {
    $sql = "
    SELECT p.itemname, p.itemprice, SUM(s.quantity) AS sold_items
    FROM products p
    LEFT JOIN sales s ON p.itemid = s.itemid
    WHERE s.saledate >= DATE_SUB(NOW(), INTERVAL $interval)
    GROUP BY p.itemname, p.itemprice
    ORDER BY p.itemname;
    ";
    return $conn->query($sql);
}

// Get sales data for different intervals
$weeklySales = getSalesData($conn, '1 WEEK');
$monthlySales = getSalesData($conn, '1 MONTH');
$yearlySales = getSalesData($conn, '1 YEAR');

$conn->close();
?>

<h1>Sales Numbers</h1>

<h2>Weekly Sales</h2>
<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Number of Sold Items</th>
    </tr>
    <?php $totalRevenueWeekly = 0; // Variable to store total revenue for weekly sales
    while($row = $weeklySales->fetch_assoc()): 
        $itemRevenue = $row['itemprice'] * $row['sold_items']; // Calculate revenue for the current item
        $totalRevenueWeekly += $itemRevenue; // Add item revenue to total revenue ?>
    <tr>
        <td><?php echo htmlspecialchars($row['itemname']); ?></td>
        <td><?php echo htmlspecialchars($row['itemprice']); ?></td>
        <td><?php echo htmlspecialchars($row['sold_items'] ?? 0); ?></td>
    </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="2">Total Revenue</td>
        <td><?php echo '$' . number_format($totalRevenueWeekly, 2); ?></td> <!-- Display total revenue for weekly sales -->
    </tr>
</table>

<h2>Monthly Sales</h2>
<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Number of Sold Items</th>
    </tr>
    <?php 
    $totalRevenueMonthly = 0; // Variable to store total revenue for monthly sales
    while($row = $monthlySales->fetch_assoc()): 
        $itemRevenue = $row['itemprice'] * $row['sold_items']; // Calculate revenue for the current item
        $totalRevenueMonthly += $itemRevenue; // Add item revenue to total revenue
    ?>
    <tr>
        <td><?php echo htmlspecialchars($row['itemname']); ?></td>
        <td><?php echo htmlspecialchars($row['itemprice']); ?></td>
        <td><?php echo htmlspecialchars($row['sold_items'] ?? 0); ?></td>
    </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="2">Total Revenue</td>
        <td><?php echo '$' . number_format($totalRevenueMonthly, 2); ?></td> <!-- Display total revenue for monthly sales -->
    </tr>
</table>

<h2>Yearly Sales</h2>
<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Number of Sold Items</th>
    </tr>
    <?php 
    $totalRevenueYearly = 0; // Variable to store total revenue for yearly sales
    while($row = $yearlySales->fetch_assoc()): 
        $itemRevenue = $row['itemprice'] * $row['sold_items']; // Calculate revenue for the current item
        $totalRevenueYearly += $itemRevenue; // Add item revenue to total revenue
    ?>
    <tr>
        <td><?php echo htmlspecialchars($row['itemname']); ?></td>
        <td><?php echo htmlspecialchars($row['itemprice']); ?></td>
        <td><?php echo htmlspecialchars($row['sold_items'] ?? 0); ?></td>
    </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="2">Total Revenue</td>
        <td><?php echo '$' . number_format($totalRevenueYearly, 2); ?></td> <!-- Display total revenue for yearly sales -->
    </tr>
</table>
    </div>
</body>
</html>
