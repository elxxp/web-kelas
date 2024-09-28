<?php
session_start(); // Memulai sesi

// Jika pengguna sudah login, arahkan ke halaman dashboard yang sesuai
if (isset($_SESSION['user_id'])) {
    switch ($_SESSION['role']) {
        case 'admin':
            header("Location: admin_dashboard.php");
            break;
        case 'bendahara':
            header("Location: bendahara_dashboard.php");
            break;
        case 'member':
            header("Location: member_dashboard.php");
            break;
        default:
            header("Location: user_dashboard.php");
            break;
    }
    exit();
}

// Sertakan file konfigurasi
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $stmt = $mysqli->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password, $role);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            // Set session untuk login
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $role;

            // Redirect sesuai role
            sleep(1.5);
            switch ($role) {
                case 'admin':
                    header("Location: admin_dashboard.php");
                    break;
                case 'bendahara':
                    header("Location: bendahara_dashboard.php");
                    break;
                case 'member':
                    header("Location: member_dashboard.php");
                    break;
                default:
                    header("Location: user_dashboard.php");
                    break;
            }
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }

    $stmt->close();
}
?>

<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
