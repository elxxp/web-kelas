<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

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

// Proses pembaruan data dari dropdown
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $tempoValue = $_POST['tempo_dropdown'];
    
    // Menyimpan nilai ke dalam tabel tempo_tenggat
    $sql = "UPDATE tempo_tenggat SET tempo = ? WHERE id = 1"; // Misalnya, Anda ingin memperbarui ID 1
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tempoValue);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Ambil nilai dropdown dari tabel tempo_tenggat
$sql = "SELECT tempo FROM tempo_tenggat WHERE id = 1"; // Misalnya, Anda ingin mengambil ID 1
$result = $conn->query($sql);
$currentTempo = $result->fetch_assoc()['tempo'];
?>

<!-- Tampilkan data dari tabel kas -->
<h2>Edit Data</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="tempo_dropdown">Pilih Nilai Tempo:</label>
    <select id="tempo_dropdown" name="tempo_dropdown">
        <option value="1" <?php echo $currentTempo == 1 ? 'selected' : ''; ?>>Kol1</option>
        <option value="2" <?php echo $currentTempo == 2 ? 'selected' : ''; ?>>Kol2</option>
        <option value="3" <?php echo $currentTempo == 3 ? 'selected' : ''; ?>>Kol3</option>
    </select>
    <input type="submit" name="update" value="Update">
</form>

<?php
// Tutup koneksi
$conn->close();
?>

</body>
</html>
