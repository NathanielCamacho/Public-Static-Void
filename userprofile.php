<?php
session_start();
$userInfo = [];

if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "krookedweb";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$sql = "SELECT username, createstamp FROM userdata WHERE username='$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userInfo = [
        'username' => $row['username'],
        'regdate' => $row['createstamp'],
    ];
}
$conn->close();
?>
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
        <h1>Welcome, <?php echo isset($userInfo['username']) ? $userInfo['username'] : 'Guest'; ?>!</h1>
        <?php if (!empty($userInfo)): ?>
            <p>Registration Date & Time: <?php echo isset($userInfo['regdate']) ? $userInfo['regdate'] : 'N/A'; ?></p>
        <?php endif; ?>
        <button onclick="window.location.href='logout.php'" style="width: 20%;">Log Out Account</button>
        <button onclick="window.location.href='receipts.php'"style="width: 20%;">Check Payments</button>
        <button onclick="window.location.href='userTrackerOrder.php'"style="width: 19.1%;">Track Order</button>
    </div>
</body>
</html>
