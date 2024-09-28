<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <script>
        function uncheckRow(rowId) {
            document.querySelectorAll(`input[data-row='${rowId}']`).forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
    </script>
</head>
<body>

<?php
require 'config-kas-rename.php';

$sql = "SELECT id, nama, tab1, tab2, tab3, tab4, tab5, tab6, tab7, tab8, tab9, tab10, tab11, tab12, tab13, tab14, tab15, tab16, tab17, tab18, tab19, tab20, tab21 FROM kas_rename";
$result = $conn->query($sql);

echo "<form method='post' action='update_data.php'>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th rowspan='2'>Absen</th>
                <th rowspan='2'>Nama</th>
                <th colspan='1'>Juli</th>
                <th colspan='4'>Agustus</th>
                <th colspan='5'>September</th>
                <th colspan='4'>Oktober</th>
                <th colspan='4'>November</th>
                <th colspan='3'>Desember</th>
                <th rowspan='2'>Previlage</th>
            </tr>
            <tr>
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
        $id = $row["id"];
        $checkedCols = [];
        foreach (['tab1', 'tab2', 'tab3', 'tab4', 'tab5', 'tab6', 'tab7', 'tab8', 'tab9', 'tab10', 'tab11', 'tab12', 'tab13', 'tab14', 'tab15', 'tab16', 'tab17', 'tab18', 'tab19', 'tab20', 'tab21'] as $col) {
            $checkedCols[$col] = $row[$col] == 1 ? "checked" : "";
        }
        echo "<tr>
                <td>" . $id . "</td>
                <td>" . $row["nama"] . "</td>";
        foreach (['tab1', 'tab2', 'tab3', 'tab4', 'tab5', 'tab6', 'tab7', 'tab8', 'tab9', 'tab10', 'tab11', 'tab12', 'tab13', 'tab14', 'tab15', 'tab16', 'tab17', 'tab18', 'tab19', 'tab20', 'tab21'] as $col) {
            echo "<td><input type='checkbox' name='" . $col . "_" . $id . "' value='1' data-row='" . $id . "' " . $checkedCols[$col] . "></td>";
        }
        echo "<td><button type='button' onclick=\"uncheckRow('" . $id . "')\">Hapus</button></td>
              </tr>";
    }
    echo "</table><br>";
    echo "<input type='submit' value='Update Data'>";
} else {
    echo "NULL";
}

$conn->close();
?>

</form>
</body>
</html>
