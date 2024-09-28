<?php
$hari = isset($_GET['hari']) ? $_GET['hari'] : 'senin';
$conn = new mysqli("localhost", "root", "", "absen");

$query = "SELECT * FROM $hari";
$result = $conn->query($query);

function getStatus($value) {
    switch ($value) {
        case 1: return "V";
        case 2: return "S";
        case 3: return "A";
        case 4: return "-";
        default: return " ";
    }
}
?>

<h1>Rabu</h1>
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
        <td><?php echo $row['nama']; ?></td>
        <?php for ($i = 1; $i <= 11; $i++) { ?>
            <td><?php echo getStatus($row["j$i"]); ?></td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>

<a href="index.html">Kembali</a>