<?php
// Konfigurasi Database
$host = "localhost"; // atau alamat server database Anda
$username = "root"; // username database Anda
$password = ""; // password database Anda
$dbname = "kas_kelas";

// Koneksi ke Database
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penyimpanan data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'save') {
    $deskripsi = $_POST['deskripsi'];
    $nominal = $_POST['nominal'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO pengeluaran (deskripsi, nominal, created_at) VALUES ('$deskripsi', '$nominal', '$tanggal')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pengeluaran berhasil disimpan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Proses penghapusan data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM pengeluaran WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pengeluaran berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Ambil data pengeluaran dari database
$sql = "SELECT * FROM pengeluaran ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Jejak Pengeluaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Sistem Jejak Pengeluaran</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Deskripsi Pengeluaran</label>
            <input type="text" class="form-control" name="deskripsi" required>
        </div>
        <div class="form-group">
            <label>Nominal Pengeluaran (Rp)</label>
            <input type="number" class="form-control" name="nominal" required>
        </div>
        <div class="form-group">
            <label>Tanggal Pengeluaran</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>
        <input type="hidden" name="action" value="save">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    
    <h3 class="mt-5">Daftar Pengeluaran</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Nominal (Rp)</th>
                <th>Tanggal</th>
                <th>Aksi</th> <!-- Kolom untuk tombol hapus -->
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                        <td><?php echo number_format($row['nominal'], 0, ',', '.'); ?></td>
                        <td>
                            <?php
                            // Format tanggal menjadi "12 Desember 2024"
                            $tanggalFormat = date("d F Y", strtotime($row['created_at']));
                            echo $tanggalFormat;
                            ?>
                        </td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pengeluaran.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
