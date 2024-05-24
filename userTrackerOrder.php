<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders and their contents from the database
$sql = "select o.orderid, o.totalamount, o.createstamp, o.orderstatus, oc.itemid,oc.quantity,oc.color,oc.size,p.itemname from orders as o inner join ordercontents as oc on o.orderid = oc.orderid inner join products as p on oc.itemid = p.itemid;"; // Adjust the query according to your database schema
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcel Information</title>
    <link rel="stylesheet" href="profile_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="navbar">
        <a href="homepage.php"> 
            <img src="krooked product/white_logo.png" class="logo" alt="The Krooked Logo"> 
        </a> 
        <div class="logo_name">The Krooked</div>
        
        <nav>   
        <ul>
            <li> 
                <a href="shopnow.php" class="about">
                    <i class="fa-solid fa-table-list fa-xl"></i> 
                </a>
            </li>
            <li>     
                <a href="cart.php" class="cart">
                    <i class="fa-solid fa-cart-shopping fa-xl"></i>        
                </a>
            </li>
            <li> 
                <a href="loginpage.php" class="profile">
                    <i class="fa-regular fa-user fa-xl"></i>         
                </a>   
            </li> 
        </ul>
        </nav>  
    </div>
</div>


<div class="main"><h2>Parcel Information</h2>
<br>
    <div class="content">
        <table>
            <tr>
                <th>Order ID</th>
                <th>Order Amount</th>
                <th>Date of Order Placement</th>
                <th>Order Status</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Color</th>
                <th>Size</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["orderid"]; ?></td>
                        <td><?php echo $row["totalamount"]; ?></td>
                        <td><?php echo $row["createstamp"]; ?></td>
                        <td><?php echo $row["orderstatus"]; ?></td>
                        <td><?php echo $row["itemname"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["size"]; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='8'>No orders found.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div><div class="display_btn">
    <a href="userprofile.php"><button>Back</button></a>
</div>
</div>

</body>
</html>
