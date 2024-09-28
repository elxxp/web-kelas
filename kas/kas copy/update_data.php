<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kas_kelas";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data POST
// Ambil semua ID yang dikirimkan
$id_list = [];
foreach ($_POST as $key => $value) {
    if (preg_match('/^(jul4|aug1|aug2)_(\d+)$/', $key, $matches)) {
        $type = $matches[1];
        $id = $matches[2];
        $id_list[$id] = true;
        // Update nilai kolom berdasarkan checkbox
        $value = $value == '1' ? 1 : 0;
        $sql = "UPDATE kas SET $type='$value' WHERE id='$id'";
        $conn->query($sql);
    }
}

// Pastikan semua ID yang ada di database diperbarui
// Ambil semua ID dari database untuk memastikan bahwa kolom yang tidak diperbarui menjadi 0
$sql = "SELECT id FROM kas";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    if (!isset($id_list[$id])) {
        // Jika ID tidak ada dalam POST, set kolom jul4, aug1, aug2 ke 0
        $sql = "UPDATE kas SET jul4=0, aug1=0, aug2=0 WHERE id='$id'";
        $conn->query($sql);
    }
}

// Redirect kembali ke halaman edit
header("Location: edit_data.php");

// Tutup koneksi
$conn->close();
?>
