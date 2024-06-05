<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Page</title>
    <link rel="stylesheet" href="profile_css.css">
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
    <h1 class="text">Item Inventory</h1>
    <div class="content">
        <div class="tbl-content">
        <table>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Remaining Stocks</th>
               
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
            $sql = "SELECT 'mamba' AS itemname, 'S' AS size, sstock AS stock FROM mamba
            UNION ALL
            SELECT 'mamba' AS itemname, 'M' AS size, mstock AS stock FROM mamba
            UNION ALL
            SELECT 'mamba' AS itemname, 'L' AS size, lstock AS stock FROM mamba
            UNION ALL
            SELECT 'lebron' AS itemname, 'S' AS size, sstock AS stock FROM lebron
            UNION ALL
            SELECT 'lebron' AS itemname, 'M' AS size, mstock AS stock FROM lebron
            UNION ALL
            SELECT 'lebron' AS itemname, 'L' AS size, lstock AS stock FROM lebron
            UNION ALL
            SELECT 'anniversary' AS itemname, 'S' AS size, sstock AS stock FROM anniversary
            UNION ALL
            SELECT 'anniversary' AS itemname, 'M' AS size, mstock AS stock FROM anniversary
            UNION ALL
            SELECT 'anniversary' AS itemname, 'L' AS size, lstock AS stock FROM anniversary
            UNION ALL
            SELECT 'felix' AS itemname, 'S' AS size, sstock AS stock FROM felix
            UNION ALL
            SELECT 'felix' AS itemname, 'M' AS size, mstock AS stock FROM felix
            UNION ALL
            SELECT 'felix' AS itemname, 'L' AS size, lstock AS stock FROM felix
            UNION ALL
            SELECT 'magatta' AS itemname, 'S' AS size, sstock AS stock FROM magatta
            UNION ALL
            SELECT 'magatta' AS itemname, 'M' AS size, mstock AS stock FROM magatta
            UNION ALL
            SELECT 'magatta' AS itemname, 'L' AS size, lstock AS stock FROM magatta
            UNION ALL
            SELECT 'dalidoll' AS itemname, 'S' AS size, sstock AS stock FROM dalidoll
            UNION ALL
            SELECT 'dalidoll' AS itemname, 'M' AS size, mstock AS stock FROM dalidoll
            UNION ALL
            SELECT 'dalidoll' AS itemname, 'L' AS size, lstock AS stock FROM dalidoll";
        
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['itemname']}</td>
                            <td>{$row['size']}</td>
                            <td>{$row['stock']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No sales records found.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
    </div>          
     <button onclick="window.location.href='inventorymgr.php'" style="width: 15%;">Add Stocks</button> <a href="adminprofile.php"><button style="width: 15%;">Back</button></a>
<br>
          
    
</div>
<script src="script.js"></script>
</body>
</html>
