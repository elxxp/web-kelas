<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'member') {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, Member " . $_SESSION['username'];
?>
<br><a href="logout.php">Logout</a>
