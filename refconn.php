<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "krookedweb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("MySQL Connection failed. Reason: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $pword = $_POST['password'];
    $action = $_POST['action'];

    // Validate password
    if (!preg_match('/^[A-Za-z0-9]{8,}$/', $pword)) {
        echo "Password must be at least 8 characters long and contain only letters and numbers.";
        exit;
    }

    // Sanitize inputs
    $uname = $conn->real_escape_string($uname);
    $pword = $conn->real_escape_string($pword);

    if ($action == 'login') {
        // Check the database for user
        $sql = "SELECT * FROM userdata WHERE username = '$uname'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pword, $row['password'])) {
                // Password is correct
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
        // Hash the password before saving it
        $pwordhashed = password_hash($pword, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO userdata (username, password) VALUES ('$uname', '$pwordhashed')";
        if ($conn->query($sql) === TRUE) {
            echo "Signup successful. You may now log in using your credentials.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
