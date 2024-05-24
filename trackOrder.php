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
        <a href="homepage.php"> 
            <img src="krooked product/white_logo.png" class="logo" alt="The Krooked Logo"> 
        </a> 
        <div class="logo_name">The Krooked</div>
        
        <nav>   
            <ul>
                <li> 
                    <a href="loginpage.php" class="profile">
                        <i class="fa-solid fa-right-from-bracket fa-xl"></i>      
                    </a>   
                </li> 
            </ul>
        </nav>  
    </div>
</div>


<div class="main"> <h1 class="text">Track of Customer Order</h1>
<hr>
<br>
    <div class="Customers">
        <table>
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Date Placed</th>
                <th>Status</th>
            </tr>
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
                               
                                <div class="radio-group">
    <input class="radio-input" name="orderstatus" id="radio1" type="radio" value="placed" <?php if ($row["orderstatus"] === "placed") echo "checked"; ?> >
    <label class="radio-label" for="radio1">
      <span class="radio-inner-circle"></span>
      Placed
    </label>
    
    <input class="radio-input" name="radio-group" id="radio2" type="radio" value="payconfirmed" <?php if ($row["orderstatus"] === "payconfirmed") echo "checked"; ?>>
    <label class="radio-label" for="radio2">
      <span class="radio-inner-circle"></span>
      Payment Confirmed
    </label>
    
    <input class="radio-input" name="radio-group" id="radio3" type="radio" value="packed" <?php if ($row["orderstatus"] === "packed") echo "checked"; ?>>
    <label class="radio-label" for="radio3">
      <span class="radio-inner-circle"></span>
      Packed
    </label>
    <input class="radio-input" name="radio-group" id="radio3" type="radio" value="shipped" <?php if ($row["orderstatus"] === "shipped") echo "checked"; ?>>
    <label class="radio-label" for="radio3">
      <span class="radio-inner-circle"></span>
      Shipped
    </label>
  </div>
                               <div class="display_btn"> <button type="submit">Update</button></div>
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
    <div class="clear-orders">
        <form action="clearorders.php" method="post">
           <div class="clear_btn"> <button type="submit" onclick="return confirm('Are you sure you want to delete all orders?')">Clear All Orders</button></div>
        </form>
    </div>
    <div class="display_btn">
        <a href="adminprofile.php"><button>Back</button></a>
    </div>
</div>         
    <script src="script.js"></script>  
</body>
</html>
        
