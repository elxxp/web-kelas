<!DOCTYPE html>
<html>
    <head>
        <title>Display Data</title>
    </head>
<body>

<?php
require 'config-kas.php';

$sql = "SELECT id, nama, jul4, aug1, aug2, aug3, aug4, sep1, sep2, sep3, sep4, okt1, okt2, okt3, okt4, nov1, nov2, nov3, nov4, des1, des2, des3, des4 FROM kas";
$result = $conn->query($sql);
$tempo = 8; // kolom tempo (Agustus 4)

function countChecked($values) {
    return array_sum($values);
}

function countUnchecked($values) {
    return count($values) - array_sum($values);
}

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Absen</th>
                <th>Nama</th>
                <th>Jul4</th>
                <th>Aug1</th>
                <th>Aug2</th>
                <th>Aug3</th>
                <th>Aug4</th>
                <th>Sep1</th>
                <th>Sep2</th>
                <th>Sep3</th>
                <th>Sep4</th>
                <th>Okt1</th>
                <th>Okt2</th>
                <th>Okt3</th>
                <th>Okt4</th>
                <th>Nov1</th>
                <th>Nov2</th>
                <th>Nov3</th>
                <th>Nov4</th>
                <th>Des1</th>
                <th>Des2</th>
                <th>Des3</th>
                <th>Des4</th>
                <th>true</th>
                <th>false</th>
                <th>Tempo</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {

        $values = [
            $row["jul4"], $row["aug1"], $row["aug2"], $row["aug3"], $row["aug4"],
            $row["sep1"], $row["sep2"], $row["sep3"], $row["sep4"], $row["okt1"],
            $row["okt2"], $row["okt3"], $row["okt4"], $row["nov1"], $row["nov2"],
            $row["nov3"], $row["nov4"], $row["des1"], $row["des2"], $row["des3"], $row["des4"]
        ];
        $totalChecked = countChecked($values);
        $totalUnchecked = countUnchecked($values);

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["jul4"] . "</td>
                <td>" . $row["aug1"] . "</td>
                <td>" . $row["aug2"] . "</td>
                <td>" . $row["aug3"] . "</td>
                <td>" . $row["aug4"] . "</td>
                <td>" . $row["sep1"] . "</td>
                <td>" . $row["sep2"] . "</td>
                <td>" . $row["sep3"] . "</td>
                <td>" . $row["sep4"] . "</td>
                <td>" . $row["okt1"] . "</td>
                <td>" . $row["okt2"] . "</td>
                <td>" . $row["okt3"] . "</td>
                <td>" . $row["okt4"] . "</td>
                <td>" . $row["nov1"] . "</td>
                <td>" . $row["nov2"] . "</td>
                <td>" . $row["nov3"] . "</td>
                <td>" . $row["nov4"] . "</td>
                <td>" . $row["des1"] . "</td>
                <td>" . $row["des2"] . "</td>
                <td>" . $row["des3"] . "</td>
                <td>" . $row["des4"] . "</td>
                <td>" . $totalChecked . "</td>
                <td>" . $totalUnchecked . "</td>
                <td>" . $tempo . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


echo "<h2>Tabel Tagihan (tempo pada Agustus 4)</h2>";

if ($result->num_rows > 0) {
    $result = $conn->query($sql);

    echo "<table border='1'>
            <tr>
                <th>Absen</th>
                <th>Nama</th>
                <th>Tagihan</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        $values = [
            $row["jul4"], $row["aug1"], $row["aug2"], $row["aug3"], $row["aug4"],
            $row["sep1"], $row["sep2"], $row["sep3"], $row["sep4"], $row["okt1"],
            $row["okt2"], $row["okt3"], $row["okt4"], $row["nov1"], $row["nov2"],
            $row["nov3"], $row["nov4"], $row["des1"], $row["des2"], $row["des3"], $row["des4"]
        ];
        $totalChecked = countChecked($values);
        $totalUnchecked = countUnchecked($values);

        $tagihan = ($tempo - $totalChecked) * 2000;
        $tagihan_formated = number_format($tagihan, 0, '', '.');


        if ($totalChecked < $tempo) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . "Rp, " . $tagihan_formated . "</td>
                  </tr>";
        }
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
