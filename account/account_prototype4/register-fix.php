<?php
require 'config.php';
$status = "";
$nama = "";
$username = "";

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
                        $status = "
                            <div class='show border-error' id='nontification'>
                                <div id='nontification-header'>
                                    <p id='non-color' class='error'><i class='bx bxs-circle'></i></p>
                                    <p id='non-title'>Username tidak tersedia</p>
                                    <button id='btn-close'><i class='bx bx-x'></i></button>
                                </div>
                                <div id='nontification-body'>
                                    <p id='non-massage'><span class='bold'>@$username</span> telah digunakan</p>
                                </div>
                            </div>
                            ";
                    } else {
                        $stmt = $mysqli->prepare("INSERT INTO users (username, nama, password, role) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $username, $nama, $password, $role);
    
                        if ($stmt->execute()) {
                            $status = "
                                <div class='show border-success' id='nontification'>
                                    <div id='nontification-header'>
                                        <p id='non-color' class='success'><i class='bx bxs-circle'></i></p>
                                        <p id='non-title'>Akun berhasil dibuat</p>
                                        <button id='btn-close'><i class='bx bx-x'></i></button>
                                    </div>
                                    <div id='nontification-body'>
                                        <p id='non-massage'>dapat pergi ke halaman login</p>
                                    </div>
                                </div>
                                ";
                        } else {
                            $status = "
                                <div class='show border-error' id='nontification'>
                                    <div id='nontification-header'>
                                        <p id='non-color' class='error'><i class='bx bxs-circle'></i></p>
                                        <p id='non-title'>Error</p>
                                        <button id='btn-close'><i class='bx bx-x'></i></button>
                                    </div>
                                    <div id='nontification-body'>
                                        <p id='non-massage'>terjadi kesalah pada database</p>
                                    </div>
                                </div>
                                ";
                        }
                    }
                    $stmt->close();
                    
                } else {
                    $status = "
                        <div class='show border-warning' id='nontification'>
                            <div id='nontification-header'>
                                <p id='non-color' class='warning'><i class='bx bxs-circle'></i></p>
                                <p id='non-title'>Data tidak lengkap</p>
                                <button id='btn-close'><i class='bx bx-x'></i></button>
                            </div>
                            <div id='nontification-body'>
                                <p id='non-massage'>password harus 8 karakter atau lebih</p>
                            </div>
                        </div>
                        ";
                }
            } else {
                $status = "
                    <div class='show border-warning' id='nontification'>
                        <div id='nontification-header'>
                            <p id='non-color' class='warning'><i class='bx bxs-circle'></i></p>
                            <p id='non-title'>Data tidak lengkap</p>
                            <button id='btn-close'><i class='bx bx-x'></i></button>
                        </div>
                        <div id='nontification-body'>
                            <p id='non-massage'>username harus 6 karakter atau lebih</p>
                        </div>
                    </div>
                    ";
            }
        } else {
            $status = "
                <div class='show border-warning' id='nontification'>
                    <div id='nontification-header'>
                        <p id='non-color' class='warning'><i class='bx bxs-circle'></i></p>
                        <p id='non-title'>Data tidak lengkap</p>
                        <button id='btn-close'><i class='bx bx-x'></i></button>
                    </div>
                    <div id='nontification-body'>
                        <p id='non-massage'>nama harus 12 karakter atau lebih</p>
                    </div>
                </div>
                ";
        }
    } else {
        $status = "
            <div class='show border-error' id='nontification'>
                <div id='nontification-header'>
                    <p id='non-color' class='error'><i class='bx bxs-circle'></i></p>
                    <p id='non-title'>Data tidak lengkap</p>
                    <button id='btn-close'><i class='bx bx-x'></i></button>
                </div>
                <div id='nontification-body'>
                    <p id='non-massage'>informasi tidak boleh kosong</p>
                </div>
            </div>
            ";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles-account.css">
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
            <input type="text" name="nama" value="<?php echo $nama ?>" placeholder="Nama Lengkap - min.12"><i class='bx bxs-face'></i>
        </div>
        <div class="input">
            <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username - min.6"><i class='bx bxs-user'></i>
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Password - min.8"><i class='bx bxs-lock-alt'></i>
        </div>
        <div class="submit">
            <button type="submit">Register</button>  
        </div>
    </div>
    </form>
    <?php echo "$status"; ?>

    <div class="redirect">
        <p>Already have an account? <a href="#">Login</a>
    </div>
    
    <div class="credit">
        <p>©2024 X PPLG-2. All right reserved
    </div>
    <script src="main.js"></script>
</div>
</body>
</html>
