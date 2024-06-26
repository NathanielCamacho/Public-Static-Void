
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
    <!-- Your signup/login form here -->
    <?php
session_start();

if (isset($_SESSION['username'])) {
    if ($_SESSION['usertype'] == 'admin') {
        header("Location: adminprofile.php");
        exit();
    } else {
        header("Location: userprofile.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "krookedweb";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $inputUsername = $conn->real_escape_string($_POST['username']);
    $inputPassword = $conn->real_escape_string($_POST['password']);
    $action = $_POST['action'];

    if ($action == 'login') {
        $sql = "SELECT userid, password, usertype FROM userdata WHERE username = '$inputUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($inputPassword == $row['password']) {
                $_SESSION['username'] = $inputUsername;
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['usertype'] = $row['usertype'];
                
                if ($row['usertype'] == 'admin') {
                    header("Location: adminprofile.php");
                } else {
                    header("Location: userprofile.php");
                }
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that username.";
           
        }
    } elseif ($action == 'signup') {
        $checkUserSql = "SELECT * FROM userdata WHERE username = '$inputUsername'";
        $checkResult = $conn->query($checkUserSql);

        if ($checkResult->num_rows > 0) {
            echo "Username already taken. Please choose a different username.";
             header("refresh:1;url=signuppage.php");
             exit();
        } else {
            $sql = "INSERT INTO userdata (username, password, usertype) VALUES ('$inputUsername', '$inputPassword', 'user')";
            if ($conn->query($sql) === TRUE) {
                // Automatically log in the user after successful signup
                $_SESSION['username'] = $inputUsername;
                $_SESSION['userid'] = $conn->insert_id; // Assuming you have an auto-increment user ID
                $_SESSION['usertype'] = 'user';
                
                // Redirect to homepage
                header("Location: homepage.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();
}
?>
</div>
</body>
</html>
