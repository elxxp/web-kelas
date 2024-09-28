<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

if (!isset($_COOKIE['username'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

echo "Selamat datang, " . $_SESSION['nama'];
?>
<br><a href="logout.php">Logout</a>
