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
require 'config-kas.php';

$sql = "SELECT id, nama, tab1, tab2, tab3, tab4, tab5, tab6, tab7, tab8, tab9, tab10, tab11, tab12, tab13, tab14, tab15, tab16, tab17, tab18, tab19, tab20, tab21 FROM kas";
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

$selected_tempo = 1; 

$sql = "SELECT tempo_tenggat FROM tempo WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $selected_tempo = $row['tempo_tenggat'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tempo_tenggat = $_POST['tempo_tenggat'];

    $sql = "UPDATE tempo SET tempo_tenggat = ? WHERE id = 1"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tempo_tenggat);

    if ($stmt->execute()) {
        $selected_tempo = $tempo_tenggat;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

</form><br><br>
<form method="post" action="">
        <label for="tempo_tenggat">Pilih Tanggal Tempo:</label>
        <select name="tempo_tenggat" id="tempo_tenggat">
            <option value="1" <?php echo ($selected_tempo == 1) ? 'selected' : ''; ?>>28 Juli</option>
            <option value="2" <?php echo ($selected_tempo == 2) ? 'selected' : ''; ?>>04 Agustus</option>
            <option value="3" <?php echo ($selected_tempo == 3) ? 'selected' : ''; ?>>11 Agustus</option>
            <option value="4" <?php echo ($selected_tempo == 4) ? 'selected' : ''; ?>>18 Agustus</option>
            <option value="5" <?php echo ($selected_tempo == 5) ? 'selected' : ''; ?>>25 Agustus</option>
            <option value="6" <?php echo ($selected_tempo == 6) ? 'selected' : ''; ?>>01 September</option>
            <option value="7" <?php echo ($selected_tempo == 7) ? 'selected' : ''; ?>>08 September</option>
            <option value="8" <?php echo ($selected_tempo == 8) ? 'selected' : ''; ?>>15 September</option>
            <option value="9" <?php echo ($selected_tempo == 9) ? 'selected' : ''; ?>>22 September</option>
            <option value="10" <?php echo ($selected_tempo == 10) ? 'selected' : ''; ?>>29 September</option>
            <option value="11" <?php echo ($selected_tempo == 11) ? 'selected' : ''; ?>>06 Oktober</option>
            <option value="12" <?php echo ($selected_tempo == 12) ? 'selected' : ''; ?>>13 Oktober</option>
            <option value="13" <?php echo ($selected_tempo == 13) ? 'selected' : ''; ?>>20 Oktober</option>
            <option value="14" <?php echo ($selected_tempo == 14) ? 'selected' : ''; ?>>27 Oktober</option>
            <option value="15" <?php echo ($selected_tempo == 15) ? 'selected' : ''; ?>>03 November</option>
            <option value="16" <?php echo ($selected_tempo == 16) ? 'selected' : ''; ?>>10 November</option>
            <option value="17" <?php echo ($selected_tempo == 17) ? 'selected' : ''; ?>>17 November</option>
            <option value="18" <?php echo ($selected_tempo == 18) ? 'selected' : ''; ?>>24 November</option>
            <option value="19" <?php echo ($selected_tempo == 19) ? 'selected' : ''; ?>>01 Desember</option>
            <option value="20" <?php echo ($selected_tempo == 20) ? 'selected' : ''; ?>>08 Desember</option>
            <option value="21" <?php echo ($selected_tempo == 21) ? 'selected' : ''; ?>>15 Desember</option>
        </select>
        <br><br>
        <button type="submit">Update Tempo</button>
    </form>
</body>
</html>
