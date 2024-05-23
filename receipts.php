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
    <div class="main">
    <h2>User Payments</h2>
    <br>
    <table>
        <thead>
            <tr>
                <th>GCash Account Name</th>
                <th>GCash Registered Number</th>
                <th>Transaction Reference Number</th>
                <th>Payment Status</th>
                <th>Payment Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch payment details from userpayments table and display in table rows
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "krookedweb";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT gcashname, gcashnum, refnumber, paymentstatus, paymentstamp FROM userpayments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $formattedTime = date("m/d/Y h:i A", strtotime($row['paymentstamp']));
                    echo "<tr>";
                    echo "<td>" . $row['gcashname'] . "</td>";
                    echo "<td>" . $row['gcashnum'] . "</td>";
                    echo "<td>" . $row['refnumber'] . "</td>";
                    echo "<td>" . $row['paymentstatus'] . "</td>";
                    echo "<td>" . $formattedTime . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No payments found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>

        
    </table>
    <br>
    <a href="userprofile.php">
    <button >BACK</button></a>
    </div>
</body>
</html>
