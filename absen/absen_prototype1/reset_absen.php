<?php
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
        echo "Semua data berhasil direset menjadi 0 untuk setiap hari!";
    }
}
?>

<h3>Reset Data untuk Semua Hari</h3>
<p>Apakah Anda yakin ingin mengubah semua nilai menjadi 0 untuk Senin hingga Jumat?</p>
<form method="POST">
    <button type="submit">Reset Semua Data</button>
</form>

<a href="edit_absen.php?hari=senin">Kembali ke Halaman Edit</a>

<?php
$conn->close();
?>
