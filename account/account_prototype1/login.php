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
$status = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $stmt = $mysqli->prepare("SELECT id, username, password, nama, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password, $nama, $role);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            // Set session untuk login
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            $_SESSION['nama'] = $nama;
            $_SESSION['role'] = $role;

            setcookie("username", $db_username, time() + 3600, "/"); // Expires in 1 minute

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
            $status = "Password salah!";
        }
    } else {
        $status = "Username tidak ditemukan!";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles-register.css">
    <script src="main.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="form-content">
    <img src="images/dev-dark.png">
    <div class="title">
        <h1>Login Account</h1>
        <p>insert information below</p>
    </div>
    
    <form method="POST" action="">
    <div class="input-box">
        <div class="input">
            <input type="text" name="username" placeholder="Username"><i class='bx bxs-user'></i>
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Password"><i class='bx bxs-lock-alt'></i>
        </div>
        <div class="status">
            <p><?php echo "$status"; ?></p>
        </div>
        <div class="submit">
            <button type="submit">Login</button>  
        </div>
    </div>
    </form>

    <div class="redirect">
        <p>Don't have a account? <a href="#">Register</a>
    </div>

    <div class="credit">
        <p>©2024 X PPLG-2. All right reserved
    </div>
</div>
</body>
</html>