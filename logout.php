    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: userprofile.php");
    } else {
        header("Location: loginpage.php");
        exit();
    }
    ?>