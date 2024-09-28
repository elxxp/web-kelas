<!DOCTYPE html>
<html>
    <head>
        <title>Display Data</title>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>

<?php
require 'config-kas-rename.php';

$selected_tempo = 1;

// Fetch the current 'tempo_tenggat' value from the database
$sql = "SELECT tempo_tenggat FROM tempo WHERE id = 1"; // Assuming id=1 for now
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $selected_tempo = $row['tempo_tenggat'];
}

// Check if form is submitted to update the value
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tempo_tenggat = $_POST['tempo_tenggat'];

    // Update the selected value in the 'tempo' table
    $sql = "UPDATE tempo SET tempo_tenggat = ? WHERE id = 1"; // Assuming updating record with id=1
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tempo_tenggat);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        $selected_tempo = $tempo_tenggat; // Update the selected value in the dropdown
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$sql = "SELECT id, nama, tab1, tab2, tab3, tab4, tab5, tab6, tab7, tab8, tab9, tab10, tab11, tab12, tab13, tab14, tab15, tab16, tab17, tab18, tab19, tab20, tab21 FROM kas_rename";
$result = $conn->query($sql);
$tempo = $selected_tempo; // kolom tempo

function convertValue($value) {
    return $value == 1 ? '<span class="check">V</span>' : '<span class="uncheck">X</span>';
}

function countChecked($values) {
    return array_sum($values);
}

function countUnchecked($values) {
    return count($values) - array_sum($values);
}

if ($result->num_rows > 0) {
    echo "<h1 class='tabjudul'>Data Kas X PPLG-2</h1>";
    echo "<div class='tabkas'>
    <table border='1'>
    <tr>
                <th rowspan='2' class='tabkas-tababsen'>Abs</th>
                <th rowspan='2' class='tabkas-tabnama'>Nama</th>
                <th colspan='4'>Juli</th>
                <th colspan='4'>Agustus</th>
                <th colspan='5'>September</th>
                <th colspan='4'>Oktober</th>
                <th colspan='4'>November</th>
                <th colspan='3'>Desember</th>
            </tr>
            <tr class='tabkas-tabtanggal'>
                <th>07</th>
                <th>14</th>
                <th>21</th>
                <th>28</th>
                <th>04</th>
                <th>11</th>
                <th>18</th>
                <th>25</th>
                <th>01</th>
                <th>08</th>
                <th>15</th>
                <th>22</th>
                <th>29</th>
                <th>06</th>
                <th>13</th>
                <th>20</th>
                <th>27</th>
                <th>03</th>
                <th>10</th>
                <th>17</th>
                <th>24</th>
                <th>01</th>
                <th>08</th>
                <th>15</th>
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


        echo "<tr class='tabdata'>
                <td class='tabkas-tababsen'>" . "#" .$row["id"] . "</td>
                <td class='tabkas-tabnama'>" . $row["nama"] . "</td>
                <td>" . "-" . "</td>
                <td>" . "-" . "</td>
                <td>" . "-" . "</td>
                <td>" . convertValue($row["tab1"]) . "</td>
                <td>" . convertValue($row["tab2"]) . "</td>
                <td>" . convertValue($row["tab3"]) . "</td>
                <td>" . convertValue($row["tab4"]) . "</td>
                <td>" . convertValue($row["tab5"]) . "</td>
                <td>" . convertValue($row["tab6"]) . "</td>
                <td>" . convertValue($row["tab7"]) . "</td>
                <td>" . convertValue($row["tab8"]) . "</td>
                <td>" . convertValue($row["tab9"]) . "</td>
                <td>" . convertValue($row["tab10"]) . "</td>
                <td>" . convertValue($row["tab11"]) . "</td>
                <td>" . convertValue($row["tab12"]) . "</td>
                <td>" . convertValue($row["tab13"]) . "</td>
                <td>" . convertValue($row["tab14"]) . "</td>
                <td>" . convertValue($row["tab15"]) . "</td>
                <td>" . convertValue($row["tab16"]) . "</td>
                <td>" . convertValue($row["tab17"]) . "</td>
                <td>" . convertValue($row["tab18"]) . "</td>
                <td>" . convertValue($row["tab19"]) . "</td>
                <td>" . convertValue($row["tab20"]) . "</td>
                <td>" . convertValue($row["tab21"]) . "</td>
              </tr>";
    }
    echo "</table>
    </div>";
} else {
    echo "0 results";
}


echo "<h2>Tabel Tagihan</h2>";

if ($result->num_rows > 0) {
    $result = $conn->query($sql);

    echo "<table border='1' class='tabtagihan'>
            <tr>
                <th class='tagihan-tababsen'>Abs</th>
                <th class='tagihan-tabnama'>Nama</th>
                <th class= 'tagihan-tabtagihan'>Tagihan</th>
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
                    <td>" . "#" . $row["id"] . "</td>
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
