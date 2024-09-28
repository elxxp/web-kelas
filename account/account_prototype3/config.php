<?php
// Konfigurasi Database
$host = 'localhost'; // Host database
$db   = 'user_management'; // Nama database
$user = 'root'; // Username database
$pass = ''; // Password database

// Membuat koneksi
$mysqli = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
