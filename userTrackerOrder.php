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
                          <a href="receipts.php" class="about">
                              Check Payments
                          </a>
                      </li>
                      <li>     
                          <a href="userTrackerOrder.php" class="cart">
                              Track Order        
                          </a>
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
    <h2>My Purchase</h2>
<br>
  
 
 
 <div class="content">
        <table>
            <tr>
                <th>Order ID</th>
               
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
                        <td><?php echo $row["itemname"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["size"]; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>No orders found.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        </div>
    <br><div class="display_btn">
    <a href="userprofile.php"><button>Back</button></a>
</div>
</div>

</body>
</html>
