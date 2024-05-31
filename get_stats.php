<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get amount sold per product
$amount_sold_per_product = [];
$sql = "SELECT productname, SUM(quantity) as amount_sold FROM orderdetails GROUP BY productname";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $amount_sold_per_product[] = [
        "product" => $row["productname"],
        "amount_sold" => $row["amount_sold"]
    ];
}

// Get best seller
$sql = "SELECT productname FROM orderdetails GROUP BY productname ORDER BY SUM(quantity) DESC LIMIT 1";
$result = $conn->query($sql);
$best_seller = $result->fetch_assoc()["productname"];

// Get income this month
$sql = "SELECT SUM(totalamount) as income_this_month FROM orders WHERE MONTH(createstamp) = MONTH(CURRENT_DATE()) AND YEAR(createstamp) = YEAR(CURRENT_DATE())";
$result = $conn->query($sql);
$income_this_month = $result->fetch_assoc()["income_this_month"];

// Get income comparison to previous month
$sql = "SELECT 
    SUM(totalamount) as income_last_month,
    (SELECT SUM(totalamount) FROM orders WHERE MONTH(createstamp) = MONTH(CURRENT_DATE()) AND YEAR(createstamp) = YEAR(CURRENT_DATE())) as income_this_month 
    FROM orders WHERE MONTH(createstamp) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(createstamp) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$income_comparison = $row["income_this_month"] - $row["income_last_month"];

// Output the data in JSON format
echo json_encode([
    "amount_sold_per_product" => $amount_sold_per_product,
    "best_seller" => $best_seller,
    "income_this_month" => $income_this_month,
    "income_comparison" => $income_comparison
]);

$conn->close();
?>
