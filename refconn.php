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
$dbusername = "root";
$dbpassword = "";
$dbname = "krookedweb";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


if ($conn->connect_error) {
    die("MySQL Connection failed. Reason: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $pword = $_POST['password'];
    $action = $_POST['action'];


    if (!preg_match('/^[A-Za-z0-9]{8,}$/', $pword)) {
        echo "Password must be at least 8 characters long and contain only letters and numbers.";
        exit;
    }


    $uname = $conn->real_escape_string($uname);
    $pword = $conn->real_escape_string($pword);

    if ($action == 'login') {
        $sql = "SELECT * FROM userdata WHERE username = '$uname'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($pword === $row['password']) {
                session_start();
                $_SESSION['username'] = $uname;
                header("Location: loginlanding.php");
                exit();
            } else {
                echo "Invalid username/password combination.";
            }
        } else {
            echo "Invalid username/password combination.";
        }
    } elseif ($action == 'signup') {
        $sql = "INSERT INTO userdata (username, password) VALUES ('$uname', '$pword')";
        if ($conn->query($sql) === TRUE) {
            echo "Signup successful. You may now log in using your credentials.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }    
}    

$conn->close();
?>
   <hr>
        
        <a href=loginpage.php class="btn"><button><h1>Go back to login page.</h1></button></a>
       <a href=homepage.php class="btn"><button><h1>Go back to home page.</h1></button></a>
  
    </div>
    </body>
</html>