<?php
session_start();
if (!isset($_SESSION['reset_username'])) {
    header("Location: forgotpw.php");
    exit();
}
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
                <img src="krooked product/white_logo.png" class="logo">
            </a>
            <div class="logo_name">The Krooked</div>
            <nav>
                <ul>
                    <li><a href="loginpage.php" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>
                    </a></li>
                    <li><a href="shopnow.php" class="cart">
                        <i class="fa-solid fa-cart-shopping fa-xl"></i>
                    </a></li>
                    <li><a href="about.html" class="about">
                        <i class="fa-regular fa-address-card fa-xl"></i>
                    </a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="main">
        <h1>Create New Password</h1>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form action="resetpwlanding.php" method="post">
            <label for="password1">New Password:</label>
            <input type="password" id="password1" name="password1" required>
            <label for="password2">Confirm Password:</label>
            <input type="password" id="password2" name="password2" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
