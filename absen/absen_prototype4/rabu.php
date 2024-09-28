<style>
    .masuk {
        background-color: green;
        color: transparent;
        padding: 0rem 0.4rem;
    }
    .sakit {
        background-color: blue;
        color: transparent;
        padding: 0rem 0.4rem;
    }
    .izin {
        background-color: orange;
        color: transparent;
        padding: 0rem 0.4rem;
    }
    .alpha {
        background-color: red;
        color: transparent;
        padding: 0rem 0.4rem;
    }
</style>
<?php
$hari = isset($_GET['hari']) ? $_GET['hari'] : 'rabu';
$conn = new mysqli("localhost", "root", "", "absen");

$query = "SELECT * FROM $hari";
$result = $conn->query($query);

function getStatus($value) {
    switch ($value) {
        case 1: return "<span class='masuk'>#</span>";
        case 2: return "<span class='sakit'>#</span>";
        case 3: return "<span class='izin'>#</span>";
        case 4: return "<span class='alpha'>#</span>";
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