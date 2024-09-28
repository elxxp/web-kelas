<?php
// Konfigurasi database
$host = 'localhost';
$user = 'root'; // Sesuaikan dengan user database MySQL
$password = ''; // Sesuaikan dengan password user database MySQL
$database = 'kas_kelas';

// Membuat koneksi ke database
$koneksi = new mysqli($host, $user, $password, $database);

// Memeriksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data dari tabel kas
$sql = "SELECT * FROM kas";
$result = $koneksi->query($sql);

// Memeriksa apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>4 Jul</th>
                <th>1 Aug</th>
                <th>2 Aug</th>
                <th>3 Aug</th>
            </tr>";

    // Menampilkan data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['4jul'] . "</td>
                <td>" . $row['1aug'] . "</td>
                <td>" . $row['2aug'] . "</td>
                <td>" . $row['3aug'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan";
}

// Menutup koneksi
$koneksi->close();
?>
