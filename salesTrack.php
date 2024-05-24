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
           

<div class="main">
    <h1 class="text">Inventory</h1>
    <div class="content">
        <table>
            <tr>
                <th>Product</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
               
            </tr>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "krookedweb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch sales records from the database
            $sql = "SELECT p.itemname, o.color, o.size, SUM(o.quantity) as total_quantity
                    FROM products p
                    JOIN ordercontents o ON p.itemid = o.itemid
                    GROUP BY p.itemname, o.color, o.size";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['itemname']}</td>
                            <td>{$row['color']}</td>
                            <td>{$row['size']}</td>
                            <td>{$row['total_quantity']}</td>
                           
                            
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No sales records found.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
    <div class="display_btn">
        <a href="adminprofile.php"><button>Back</button></a>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
