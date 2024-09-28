<html>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
</html>

<?php
session_start();
$host = 'localhost';
$db   = 'kas_kelas';
$user = 'root';
$pass = '';

// Membuat koneksi
$mysqli = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'bendahara') {
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

$idsToUpdate = [];

foreach ($_POST as $key => $value) {
    if (preg_match('/^(tab1|tab2|tab3|tab4|tab5|tab6|tab7|tab8|tab9|tab10|tab11|tab12|tab13|tab14|tab15|tab16|tab17|tab18|tab19|tab20|tab21)_(\d+)$/', $key, $matches)) {
        $type = $matches[1];
        $id = $matches[2];
        $idsToUpdate[$id] = true;
        $value = $value == '1' ? 1 : 0;
        $sql = "UPDATE kas_rename SET $type='$value' WHERE id='$id'";
        $mysqli->query($sql);
    }
}

$sql = "SELECT id FROM kas";
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    if (!isset($idsToUpdate[$id])) {
        $sql = "UPDATE kas_rename SET tab1=0, tab2=0, tab3=0, tab4=0, tab5=0, tab6=0, tab7=0, tab8=0, tab9=0, tab10=0, tab11=0, tab12=0, tab13=0, tab14=0, tab15=0, tab16=0, tab17=0, tab18=0, tab19=0, tab20=0, tab21=0 WHERE id='$id'";
        $mysqli->query($sql);
        $success = "berhasil";
    }
}

header("Location: edit.php");

$mysqli->close();
?>
