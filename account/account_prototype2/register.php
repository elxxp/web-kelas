<?php
// Sertakan file konfigurasi
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'user'; // Set peran (role) secara default ke 'user'

    // Query untuk memasukkan data ke dalam tabel users
    $stmt = $mysqli->prepare("INSERT INTO users (username, nama, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $nama, $password, $role);

    if ($stmt->execute()) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
