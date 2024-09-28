<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'sekretaris') {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, Sekertaris " . $_SESSION['nama'];
?>
<br><a href="logout.php">Logout</a>
