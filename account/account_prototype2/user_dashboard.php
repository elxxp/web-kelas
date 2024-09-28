<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, User " . $_SESSION['username'];
?>
<br><a href="logout.php">Logout</a>
