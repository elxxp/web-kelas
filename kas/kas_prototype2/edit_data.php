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

$sql = "SELECT id, nama, jul4, aug1, aug2, aug3, aug4, sep1, sep2, sep3, sep4, okt1, okt2, okt3, okt4, nov1, nov2, nov3, nov4, des1, des2, des3, des4 FROM kas";
$result = $conn->query($sql);

echo "<form method='post' action='update_data.php'>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
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
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $checkedCols = [];
        foreach (['jul4', 'aug1', 'aug2', 'aug3', 'aug4', 'sep1', 'sep2', 'sep3', 'sep4', 'okt1', 'okt2', 'okt3', 'okt4', 'nov1', 'nov2', 'nov3', 'nov4', 'des1', 'des2', 'des3', 'des4'] as $col) {
            $checkedCols[$col] = $row[$col] == 1 ? "checked" : "";
        }
        echo "<tr>
                <td>" . $id . "</td>
                <td>" . $row["nama"] . "</td>";
        foreach (['jul4', 'aug1', 'aug2', 'aug3', 'aug4', 'sep1', 'sep2', 'sep3', 'sep4', 'okt1', 'okt2', 'okt3', 'okt4', 'nov1', 'nov2', 'nov3', 'nov4', 'des1', 'des2', 'des3', 'des4'] as $col) {
            echo "<td><input type='checkbox' name='" . $col . "_" . $id . "' value='1' data-row='" . $id . "' " . $checkedCols[$col] . "></td>";
        }
        echo "<td><button type='button' onclick=\"uncheckRow('" . $id . "')\">Hapus</button></td>
              </tr>";
    }
    echo "</table><br>";
    echo "<input type='submit' value='Update Data'>";
} else {
    echo "0 results";
}

$conn->close();
?>

</form>
</body>
</html>
