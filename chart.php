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
$password = ""; // Correctly use the password variable
$dbname = "krookedweb";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname); // Use password instead of username twice

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedStartDate = isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-01');
$selectedEndDate = isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-t');

// Function to get sales data
function getSalesData($conn, $startDate, $endDate) {
    $sql = "
    SELECT p.itemname, p.itemprice, SUM(s.quantity) AS sold_items
    FROM products p
    LEFT JOIN sales s ON p.itemid = s.itemid
    WHERE s.saledate BETWEEN ? AND ?
    GROUP BY p.itemname, p.itemprice
    ORDER BY p.itemname;
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $startDate, $endDate);
    $stmt->execute();
    return $stmt->get_result();
}

// Get sales data for the selected date range
$salesData = getSalesData($conn, $selectedStartDate, $selectedEndDate);

$salesArray = [];
while($row = $salesData->fetch_assoc()) {
    $salesArray[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Track</title>
    <link rel="stylesheet" href="profile_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="main">
        <h1>Chart</h1>
         
         
       
         
        
        <canvas id="salesChart" width="400" height="200"></canvas>
        <button onclick="window.location.href='adminprofile.php'">Back</button>
   

<script>
    const salesData = <?php echo json_encode($salesArray); ?>;

    const labels = salesData.map(item => item.itemname);
    const data = {
        labels: labels,
        datasets: [{
            label: 'Number of Sold Items',
            data: salesData.map(item => item.sold_items),
            backgroundColor: [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
],
            borderColor: [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
               
            }
            
        }
    };

    const salesChart = new Chart(
        document.getElementById('salesChart'),
        config
    );
</script> </div>
</div>
</body>
</html>
