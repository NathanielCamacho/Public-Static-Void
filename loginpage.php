<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: userprofile.php");
    exit();
}
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
            <a href="homepage.html">
                <img src="krooked product/white_logo.png" class="logo">
            </a>
            <div class="logo_name">The Krooked</div>
            <nav>
                <ul>
                    <li><a href="loginpage.php" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>
                    </a></li>
                    <li><a href="shopnow.html" class="cart">
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
        <form id="unameForm" action="refconn.php" method="post">
            <label for="uname"><b>Username</b></label>
            <input autocomplete="off" type="text" placeholder="Enter Username" id="uname" name="username" required>
            <span class="error" id="usernameError">Username cannot contain spaces.</span>

            <label for="psw"><b>Password</b></label>
            <input autocomplete="off" type="password" placeholder="Enter Password" id="psw" name="password" required>
            <span class="error" id="passwordError">Password must be at least 8 characters long and contain only letters and numbers.<br></span>

            <button type="submit" name="action" value="login">Login</button>
            <button type="submit" name="action" value="signup">Sign up</button>
            <label>
                <input type="checkbox" checked="checked" name="remember" class="checkbox"> Remember me
            </label>
        </form>

        <div class="container">
            <span class="psw"><a href="#" class="pass">Forgot password?</a></span>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
