<?php
session_start(); 

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

require 'config.php';
$status = "";
$username = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, username, password, nama, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($username!=="" && $username!=="") {
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $db_username, $db_password, $nama, $role);
            $stmt->fetch();
    
            if (password_verify($password, $db_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $db_username;
                $_SESSION['nama'] = $nama;
                $_SESSION['role'] = $role;
    
                setcookie("username", $db_username, time() + 5, "/"); // Expires in 1 minute

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
                $status = "
                    <div class='show border-warning' id='nontification'>
                        <div id='nontification-header'>
                            <p id='non-color' class='warning'><i class='bx bxs-circle'></i></p>
                            <p id='non-title'>Password salah!</p>
                            <button id='btn-close'><i class='bx bx-x'></i></button>
                        </div>
                        <div id='nontification-body'>
                            <p id='non-massage'>sihlakan coba lagi</p>
                        </div>
                    </div>
                    ";
            }
        } else {
            $status = "
                <div class='show border-warning' id='nontification'>
                    <div id='nontification-header'>
                        <p id='non-color' class='warning'><i class='bx bxs-circle'></i></p>
                        <p id='non-title'>Username tidak tersedia!</p>
                        <button id='btn-close'><i class='bx bx-x'></i></button>
                    </div>
                    <div id='nontification-body'>
                        <p id='non-massage'><span class='bold'>@$username</span> tidak tercatat dalam database</p>
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
                        <p id='non-massage'>masukan password dan username</p>
                    </div>
                </div>
                ";    
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
    <link rel="stylesheet" href="styles-account.css">
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
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username"><i class='bx bxs-user'></i>
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Password"><i class='bx bxs-lock-alt'></i>
        </div>
        <div class="submit">
            <button type="submit">Login</button>  
        </div>
    </div>
    </form>
    <?php echo "$status"; ?>

    <div class="redirect">
        <p>Don't have a account? <a href="#">Register</a>
    </div>

    <div class="credit">
        <p>©2024 X PPLG-2. All right reserved
    </div>
    <script src="main.js"></script>
</div>
</body>
</html>