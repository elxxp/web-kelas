<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'bendahara') {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, Bendahara " . $_SESSION['username'];
?>
<br><a href="logout.php">Logout</a>
