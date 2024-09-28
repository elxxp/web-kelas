<?php
require 'config.php';
$status = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $unhash_password = $_POST['password'];
    $role = 'user';

    $str_nama = strlen($nama);
    $str_user = strlen($username);
    $str_pass = strlen($unhash_password);

    if ($nama!=="" && $username!=="" && $unhash_password!==""){
        if ($str_nama>=12){
            if ($str_user>=6){
                if ($str_pass>=8){
    
                    $stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $stmt->store_result();
    
                    if ($stmt->num_rows > 0) {
                        $status = "Username sudah terdaftar. Silakan pilih username lain.";
                    } else {
                        $stmt = $mysqli->prepare("INSERT INTO users (username, nama, password, role) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $username, $nama, $password, $role);
    
                        if ($stmt->execute()) {
                            $status = "Registrasi berhasil!";
                        } else {
                            $status = "Error: " . $stmt->error;
                        }
                    }
                    $stmt->close();
                    
                } else {
                    $status = "password harus 8 karakter atau lebih";
                }
            } else {
                $status = "username harus 6 karakter atau lebih";
            }
        } else {
            $status = "nama harus 12 karakter atau lebih";
        }
    } else {
        $status = "data tidak lengkap";
    }
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
        <h1>Register Account</h1>
        <p>insert information below</p>
    </div>
    
    <form method="POST" action="">
    <div class="input-box">
        <div class="input">
            <input type="text" name="nama" placeholder="Nama Lengkap - min.12"><i class='bx bxs-face'></i>
        </div>
        <div class="input">
            <input type="text" name="username" placeholder="Username - min.6"><i class='bx bxs-user'></i>
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Password - min.8"><i class='bx bxs-lock-alt'></i>
        </div>
        <div class="status">
            <p><?php echo "$status"; ?></p>
        </div>
        <div class="submit">
            <button type="submit">Register</button>  
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
