<!DOCTYPE html>
<html>
    <head>
        <title>Display Data Admin</title>
    </head>
<body>

<?php
require 'config-kas-rename.php';

$sql = "SELECT id, nama, tab1, tab2, tab3, tab4, tab5, tab6, tab7, tab8, tab9, tab10, tab11, tab12, tab13, tab14, tab15, tab16, tab17, tab18, tab19, tab20, tab21 FROM kas_rename";
$result = $conn->query($sql);
$tempo = 7; // kolom tempo

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
                <th>tab1</th>
                <th>tab2</th>
                <th>tab3</th>
                <th>tab4</th>
                <th>tab5</th>
                <th>tab6</th>
                <th>tab7</th>
                <th>tab8</th>
                <th>tab9</th>
                <th>tab10</th>
                <th>tab11</th>
                <th>tab12</th>
                <th>tab13</th>
                <th>tab14</th>
                <th>tab15</th>
                <th>tab16</th>
                <th>tab17</th>
                <th>tab18</th>
                <th>tab19</th>
                <th>tab20</th>
                <th>tab21</th>
                <th>true</th>
                <th>false</th>
                <th>Tempo</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {

        $values = [
            $row["tab1"], $row["tab2"], $row["tab3"], $row["tab4"], $row["tab5"],
            $row["tab6"], $row["tab7"], $row["tab8"], $row["tab9"], $row["tab10"],
            $row["tab11"], $row["tab12"], $row["tab13"], $row["tab14"], $row["tab15"],
            $row["tab16"], $row["tab17"], $row["tab18"], $row["tab19"], $row["tab20"], $row["tab21"]
        ];
        $totalChecked = countChecked($values);
        $totalUnchecked = countUnchecked($values);

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["tab1"] . "</td>
                <td>" . $row["tab2"] . "</td>
                <td>" . $row["tab3"] . "</td>
                <td>" . $row["tab4"] . "</td>
                <td>" . $row["tab5"] . "</td>
                <td>" . $row["tab6"] . "</td>
                <td>" . $row["tab7"] . "</td>
                <td>" . $row["tab8"] . "</td>
                <td>" . $row["tab9"] . "</td>
                <td>" . $row["tab10"] . "</td>
                <td>" . $row["tab11"] . "</td>
                <td>" . $row["tab12"] . "</td>
                <td>" . $row["tab13"] . "</td>
                <td>" . $row["tab14"] . "</td>
                <td>" . $row["tab15"] . "</td>
                <td>" . $row["tab16"] . "</td>
                <td>" . $row["tab17"] . "</td>
                <td>" . $row["tab18"] . "</td>
                <td>" . $row["tab19"] . "</td>
                <td>" . $row["tab20"] . "</td>
                <td>" . $row["tab21"] . "</td>
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
            $row["tab1"], $row["tab2"], $row["tab3"], $row["tab4"], $row["tab5"],
            $row["tab6"], $row["tab7"], $row["tab8"], $row["tab9"], $row["tab10"],
            $row["tab11"], $row["tab12"], $row["tab13"], $row["tab14"], $row["tab15"],
            $row["tab16"], $row["tab17"], $row["tab18"], $row["tab19"], $row["tab20"], $row["tab21"]
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
    echo "NULL";
}

$conn->close();
?>

</body>
</html>
