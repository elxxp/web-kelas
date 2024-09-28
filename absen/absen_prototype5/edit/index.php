<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<title>Edit Panel</title>
<style>
        * {
            font-family: "Inter", sans-serif;
        }
        body::-webkit-scrollbar{
            display: none;
        }
        .error {
            margin-top: 25vh;
        }
        .error-emote {
            text-align: center;
        }
        .error h1, h3, p {
            text-align: center;
            margin-bottom: -2vh;
        }
        .error h1 {
            font-size: 2rem;
        }
        .error h3 {
            font-size: 1.1rem;
        }
        .error p {
            font-size: 1rem;
        }
        .error a {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }
</style>

<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'sekretaris'  && $_SESSION['role'] !== 'admin') {
    echo "
    <div class='error'>
        <div class='error-emote'>
            <img src='images/no_pedestrians.png'>
        </div>
        <h1>#403</h1>
        <h3>Has no access</h3>
        <p>There's nothing in here</p>
    </div>
    ";
    exit();
}

if (!isset($_COOKIE['username'])) {
    session_destroy(); 
    header("Location: #login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bandahara - Edit kas</h1>
    
    <a href="senin.php">edit kas senin</a><br>
    <a href="selasa.php">edit kas selasa</a><br>
    <a href="rabu.php">edit kas rabu</a><br>
    <a href="kamis.php">edit kas kamis</a><br>
    <a href="jumat.php">edit kas jumat</a><br><br>

    <a href="/twoniverse/absen/absen_prototype2/index.html">Kembali ke display</a> - <a href="reset.php">Reset absensi</a>
</body>
</html>