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
    <title>Profile</title>
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

    <div class="main">

      <h1>Sales Chart</h1>
    <canvas id="salesChart" width="400" height="200"></canvas>
    

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
  "#1e7145",
  "#6F4417"
],
            borderColor: [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#6F4417"
],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: false,},
                    title: {
      display: true,
      text: "Number of sold items"
    }
                
            },

            
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const salesChart = new Chart(
        document.getElementById('salesChart'),
        config
    );
</script> 
<hr>
<br>
        <h1>number of item sold</h1>
     
          <div class="calendar">
        <form method="POST" action="">
         
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="<?php echo htmlspecialchars($selectedStartDate); ?>">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="<?php echo htmlspecialchars($selectedEndDate); ?>">
            <br>
         
          <button type="submit">Filter</button>
          <br>
    </div>  
  
     </form>
      
            <h2>Sales from <?php echo htmlspecialchars($selectedStartDate); ?> to <?php echo htmlspecialchars($selectedEndDate); ?></h2>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Number of sales</th>
                </tr>
                <?php 
                $totalRevenue = 0; // Variable to store total revenue
                foreach($salesArray as $row): 
                    $itemRevenue = $row['itemprice'] * $row['sold_items']; // Calculate revenue for the current item
                    $totalRevenue += $itemRevenue; // Add item revenue to total revenue 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['itemname']); ?></td>
                    <td><?php echo htmlspecialchars($row['itemprice']); ?></td>
                    <td><?php echo htmlspecialchars($row['sold_items'] ?? 0); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">Total Revenue</td>
                    <td><?php echo '₱' . number_format($totalRevenue, 2); ?></td> <!-- Display total revenue -->
                </tr>
            </table>
        </div>


      
</body>
</html>
