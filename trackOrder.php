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

<div class="main">
    <h1 class="text">Track of Customer Order</h1>
    <hr>
    <br>
    <div class="Content">
        <table>
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Date Placed</th>
                <th>Status</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "krookedweb";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch orders from the database
            $sql = "SELECT orderid, totalamount, createstamp, orderstatus FROM orders";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["orderid"]; ?></td>
                        <td><?php echo $row["totalamount"]; ?></td>
                        <td><?php echo $row["createstamp"]; ?></td>
                        <td>
                            <form action="orderupdate.php" method="post">
                                <input type="hidden" name="orderid" value="<?php echo $row["orderid"]; ?>">
                                <label class="radio-container">Placed
                                    <input type="radio" name="orderstatus" value="placed" <?php if ($row["orderstatus"] === "placed") echo "checked"; ?>>
                                    <span class="checkmark"></span>
                                </label>
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
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>No orders found.</td></tr>";
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
