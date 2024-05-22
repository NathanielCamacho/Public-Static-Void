<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                    <a href="loginpage.php" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>         
                    </a>   
                </li>       
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
            </ul>
        </nav>  
        </div>
    </div>
    <div class="main">
        <h1>Reset Password</h1>
        <p>Please enter your username and the date when your account was created to proceed with password reset.</p>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="createstamp">Account Creation Date:</label>
            <input type="text" name="createstamp" id="createstamp" placeholder="yyyy-mm-dd" required>
            <button type="submit">Validate</button>
        </form>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krookedweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "krookedweb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['username']) && isset($_POST['createstamp'])) {
        $username = $_POST['username'];
        $createstamp_input = $_POST['createstamp'];

        $sql = "SELECT *, DATE(createstamp) AS date_created FROM userdata WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $createstamp = $row['date_created'];
            if ($createstamp === $createstamp_input) {
                $_SESSION['reset_username'] = $username;
                header("Location: resetpw.php");
                exit();
            } else {
                $error = "Entered date does not match the account creation date.";
            }
        } else {
            $error = "User not found.";
        }
        $conn->close();
    }
}
?>
    </div>
</body>
</html>
