<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<title>Senin - Edit</title>
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

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'sekertaris') {
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

$conn = new mysqli("localhost", "root", "", "absen");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Reset semua tabel dari Senin hingga Jumat
    $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
    $success = true;

    foreach ($days as $day) {
        $resetQuery = "UPDATE $day SET j1 = 0, j2 = 0, j3 = 0, j4 = 0, j5 = 0, j6 = 0, j7 = 0, j8 = 0, j9 = 0, j10 = 0, j11 = 0";
        if (!$conn->query($resetQuery)) {
            echo "Error resetting data for $day: " . $conn->error . "<br>";
            $success = false;
        }
    }

    if ($success) {
        echo "Suksek mereset!";
    }
}
?>

<h1>Reset Absensi</h1>
<form method="POST">
    <button type="submit">Reset Semua Data</button>
</form>

<a href="index.php">Kembali</a>

<?php
$conn->close();
?>
