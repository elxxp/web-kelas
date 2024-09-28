<?php
$hari = isset($_GET['hari']) ? $_GET['hari'] : 'senin';
$conn = new mysqli("localhost", "root", "", "absen");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['absen'] as $id => $absenValues) {
        $fields = [];
        foreach ($absenValues as $field => $value) {
            // Ensure the value is safe to insert into the query
            $value = intval($value); // Ensure the value is an integer
            $fields[] = "$field = $value";
        }
        $updateQuery = "UPDATE $hari SET " . implode(", ", $fields) . " WHERE id = $id";
        if (!$conn->query($updateQuery)) {
            echo "Error: " . $conn->error;
        }
    }
    echo "Data berhasil diupdate!";
}

$query = "SELECT * FROM $hari";
$result = $conn->query($query);
if (!$result) {
    die("Error retrieving data: " . $conn->error);
}
?>

<form method="POST">
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>01</th>
            <th>02</th>
            <th>03</th>
            <th>04</th>
            <th>05</th>
            <th>06</th>
            <th>07</th>
            <th>08</th>
            <th>09</th>
            <th>10</th>
            <th>11</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <?php for ($i = 1; $i <= 11; $i++) { ?>
                <td>
                    <select name="absen[<?php echo $row['id']; ?>][j<?php echo $i; ?>]">
                        <option value="1" <?php echo $row["j$i"] == 1 ? 'selected' : ''; ?>>Masuk</option>
                        <option value="2" <?php echo $row["j$i"] == 2 ? 'selected' : ''; ?>>Sakit</option>
                        <option value="3" <?php echo $row["j$i"] == 3 ? 'selected' : ''; ?>>Alpha</option>
                        <option value="4" <?php echo $row["j$i"] == 0 ? 'selected' : ''; ?>> </option>
                    </select>
                </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
    <button type="submit">Update</button>
</form>

<?php
$conn->close();
?>
