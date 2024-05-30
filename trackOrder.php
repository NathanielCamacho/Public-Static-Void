<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Tracking Page</title>
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

<div class="main">
    <h1 class="text">Customer's Order Tracking Page</h1>
    <hr>
    <br>
    <div class="Content">
        <table>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Item</th>
                <th>Item Quantity</th>
                <th>Total Amount</th>
                <th>Date Placed</th>
                <th>Last Updated</th>
                <th>Status</th>
                <th>Payment Confirmed Timestamp</th>
                <th>Packed Timestamp</th>
                <th>Shipped Timestamp</th>
                <th>Remove Order</th>
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
                        <td><?php echo $row["gcashname"]; ?></td>
                        <td><?php echo $item_names[$row["itemid"]]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["totalamount"]; ?></td>
                        <td><?php echo $row["createstamp"]; ?></td>
                        <td><?php echo $row["updatestamp"]; ?></td>
                        <td>
                            <form action="orderstatusupdate.php" method="post">
                                <input type="hidden" name="orderid" value="<?php echo $row["orderid"]; ?>">
                                <label class="radio-container">Payment Confirmed
                                    <input type="radio" name="orderstatus" value="payconfirmed" <?php if ($row["orderstatus"] === "payconfirmed") echo "checked"; ?>>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Packed
                                    <input type="radio" name="orderstatus" value="packed" <?php if ($row["orderstatus"] === "packed") echo "checked"; ?>>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Shipped
                                    <input type="radio" name="orderstatus" value="shipped" <?php if ($row["orderstatus"] === "shipped") echo "checked"; ?>>
                                    <span class="checkmark"></span>
                                </label>
                                <div class="display_btn"><button type="submit">Update</button></div>
                            </form>
                        </td>
                        <td><?php echo $row["payconfirmed_timestamp"]; ?></td>
                        <td><?php echo $row["packed_timestamp"]; ?></td>
                        <td><?php echo $row["shipped_timestamp"]; ?></td>
                        <td>
                            <form action="orderdelete.php" method="post">
                                <input type="hidden" name="orderid" value="<?php echo $row["orderid"]; ?>">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
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
   
    <div class="clear_btn"><button onclick="window.location.href='adminprofile.php'">Back</button></div>
</div>
    
<script src="script.js"></script>  
</body>
</html>
