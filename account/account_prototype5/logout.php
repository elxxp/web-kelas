<?php
session_start(); // Memulai sesi

// Menghapus semua sesi
session_unset();
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: login.php");
exit();
?>
