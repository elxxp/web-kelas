<?php
// Sertakan file konfigurasi
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $unhash_password = $_POST['password'];
    $role = 'user'; // Set peran (role) secara default ke 'user'

    $str_nama = strlen($nama);
    $str_user = strlen($username);
    $str_pass = strlen($unhash_password);

    if ($str_nama>=12){
        if ($str_user>=6){
            if ($str_pass>=8){

                $stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    // Jika username sudah terdaftar
                    echo "Username sudah terdaftar. Silakan pilih username lain.";
                } else {
                    // Jika username belum terdaftar, lakukan penyimpanan ke database
                    $stmt = $mysqli->prepare("INSERT INTO users (username, nama, password, role) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $username, $nama, $password, $role);

                    if ($stmt->execute()) {
                        echo "Registrasi berhasil!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                }
                $stmt->close();
                
            } else {
                echo "password harus 8 karakter atau lebih";
            }
        } else {
            echo "username harus 6 karakter atau lebih";
        }
    } else {
        echo "nama harus 12 karakter atau lebih";
    }
}



?>

<form method="POST" action="">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
