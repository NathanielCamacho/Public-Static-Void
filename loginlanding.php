<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: profile.html");
    exit();
}
echo "Login successful.";
?>
<a href="shopnow.html">Continue to product catalog</a>
