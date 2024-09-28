<?php
session_start();

// Check if the user is logged in and has the correct role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'bendahara') {
    header("Location: login.php");
    exit();
}

// Check if the cookie is set
if (!isset($_COOKIE['username'])) {
    // If the cookie is not set, log out the user
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to the login page
    exit();
}


// Display welcome message
echo "Selamat datang, Bendahara " . $_SESSION['nama'];
?>
<br><a href="logout.php">Logout</a>
