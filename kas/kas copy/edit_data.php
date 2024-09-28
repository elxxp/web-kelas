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

// Ambil data dari tabel
$sql = "SELECT id, nama, jul4, aug1, aug2 FROM kas";
$result = $conn->query($sql);

// Tampilkan data dengan checkbox
echo "<form method='post' action='update_data.php'>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jul4</th>
                <th>Aug1</th>
                <th>Aug2</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        $checkedJul4 = $row["jul4"] == 1 ? "checked" : "";
        $checkedAug1 = $row["aug1"] == 1 ? "checked" : "";
        $checkedAug2 = $row["aug2"] == 1 ? "checked" : "";
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nama"]. "</td>
                <td><input type='checkbox' name='jul4_" . $row["id"] . "' value='1' $checkedJul4></td>
                <td><input type='checkbox' name='aug1_" . $row["id"] . "' value='1' $checkedAug1></td>
                <td><input type='checkbox' name='aug2_" . $row["id"] . "' value='1' $checkedAug2></td>
              </tr>";
    }
    echo "</table><br>";
    echo "<input type='submit' value='Update Data'>";
} else {
    echo "0 results";
}

// Tutup koneksi
$conn->close();
?>
