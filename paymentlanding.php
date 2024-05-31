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
        </div>
    </div>
    <div class="main">
    <?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gcashname = $_POST['gcashname'];
    $gcashnumber = $_POST['gcashnum'];
    $refnumber = $_POST['refnumber'];
    $street = $_POST['street'];
    $baranggay = $_POST['baranggay'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "krookedweb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $userid_query = "SELECT userid FROM userdata WHERE username = '$username'";
    $result = $conn->query($userid_query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userid = $row['userid'];

        
        $sql = "INSERT INTO userpayments (`userid`, `gcashname`, `gcashnum`, `refnumber`, `paymentstatus`, `street`, `baranggay`, `city`, `state`, `zipcode`) 
                VALUES ('$userid', '$gcashname', '$gcashnumber', '$refnumber', 'Pending', '$street','$baranggay','$city','$state','$zipcode')";

        if ($conn->query($sql) === TRUE) {
                echo "Payment submitted successfully. Redirecting...";
                header("refresh:3;url=userprofile.php");
            } else {
                echo "Error inserting payment details: " . $conn->error;
            }
        } else {
            echo "Error: User not found.";
    }
} else {
echo "Error: User not found.";
}

// Clear the cart
unset($_SESSION['cart']);



    $conn->close();
?>
    </div>
</body>
</html>
