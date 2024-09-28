<?php
// Konfigurasi database
$servername = "localhost"; // atau alamat server database Anda
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "kas_kelas";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jul4, aug1, aug2 FROM kas";
$result = $conn->query($sql);

// Tampilkan data jika ada
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jul4</th>
                <th>Aug1</th>
                <th>Aug2</th>
            </tr>";
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nama"]. "</td>
                <td>" . $row["jul4"]. "</td>
                <td>" . $row["aug1"]. "</td>
                <td>" . $row["aug2"]. "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Tutup koneksi
$conn->close();
?>
