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
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refnumber']) && isset($_POST['paymentstatus'])) {
    // Sanitize inputs
    $refnumber = mysqli_real_escape_string($conn, $_POST['refnumber']);
    $paymentstatus = mysqli_real_escape_string($conn, $_POST['paymentstatus']);

    // Update payment status in userpayments table
    $sql = "UPDATE userpayments SET paymentstatus='$paymentstatus' WHERE refnumber='$refnumber'";

    if ($conn->query($sql) === TRUE) {
        echo "Payment status updated successfully.";
        header("refresh:3;url=confirmOrder.php");
    } else {
        echo "Error updating payment status: " . $conn->error;
    }
} else {
    echo "Refnumber and paymentstatus are required.";
}

$conn->close();
?>
    </div>
</body>
</html>