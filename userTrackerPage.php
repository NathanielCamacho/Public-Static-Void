
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
                          Payment Status    
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
    <h1>Parcel Information</h1>
    <div class="content">
        <div class="tbl-content">
    <table>
            <tr>
                <th>Order ID</th>
                <th>Item</th>
                <th>Item Quantity</th>
                <th>Total Amount</th>
                <th>Date Placed</th>


                <th>Payment Confirmed Timestamp</th>
                <th>Packed Timestamp</th>
                <th>Shipped Timestamp</th>
               
            </tr>
            <?php
            // Define an associative array mapping item IDs to item names
            $item_names = array(
                1 => "Mamba",
                2 => "LeBron",
                3 => "Anniversary Tee",
                4 => "Felix",
                5 => "Magatta",
                6 => "Dali Doll"
            );

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "krookedweb";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch orders from the database
            $sql = "SELECT o.orderid, o.totalamount, o.createstamp, o.updatestamp, o.orderstatus, o.placed_timestamp, o.payconfirmed_timestamp, o.packed_timestamp, o.shipped_timestamp, oc.itemid, oc.quantity, up.gcashname
                    FROM orders o
                    INNER JOIN ordercontents oc ON o.orderid = oc.orderid
                    INNER JOIN userpayments up ON o.userid = up.userid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["orderid"]; ?></td>
                        <td><?php echo $item_names[$row["itemid"]]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["totalamount"]; ?></td>
                        <td><?php echo $row["createstamp"]; ?></td>
                        <td><?php echo $row["payconfirmed_timestamp"]; ?></td>
                        <td><?php echo $row["packed_timestamp"]; ?></td>
                        <td><?php echo $row["shipped_timestamp"]; ?></td>
                      
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='10'>No orders found.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
    
</div>

<button onclick="window.location.href='userTrackerOrder.php'" > Back</button></div>


</body>
</html>