<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, Admin " . $_SESSION['username'];
?>
<br><a href="logout.php">Logout</a>