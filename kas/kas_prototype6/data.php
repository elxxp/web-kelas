<!DOCTYPE html>
<html>
    <head>
        <title>Kas | Twoniverse</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: "Inter", sans-serif;
            }
            .edit-button {
                margin: 2.5rem 0rem 1rem;
                padding: 1rem 2rem;
                border: none;
                background-color: black;
                border-radius: 0.5rem;
            }
            .edit-button a {
                text-decoration: none;
                font-weight: bold;
                color: white;
            }
            .edit-button i {
                color: white;
                padding-left: 0.5rem;
                font-size: 1rem;
            }
            @media (max-width: 768px){
                .edit-button {
                    display: none;
                }
            }
    </style>
    </head>
<body>

<?php
$host = 'localhost';
$db   = 'kas_kelas';
$user = 'root';
$pass = '';

// Membuat koneksi
$mysqli = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$selected_tempo = 1;

// Fetch the current 'tempo_tenggat' value from the database
$sql = "SELECT tempo_tenggat FROM tempo WHERE id = 1"; // Assuming id=1 for now
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $selected_tempo = $row['tempo_tenggat'];
}

// Check if form is submitted to update the value
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tempo_tenggat = $_POST['tempo_tenggat'];

    // Update the selected value in the 'tempo' table
    $sql = "UPDATE tempo SET tempo_tenggat = ? WHERE id = 1"; // Assuming updating record with id=1
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $tempo_tenggat);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        $selected_tempo = $tempo_tenggat; // Update the selected value in the dropdown
    } else {
        echo "Error updating record: " . $mysqli->error;
    }

    $stmt->close();
}

$sql = "SELECT id, nama, tab1, tab2, tab3, tab4, tab5, tab6, tab7, tab8, tab9, tab10, tab11, tab12, tab13, tab14, tab15, tab16, tab17, tab18, tab19, tab20, tab21 FROM kas_rename";
$result = $mysqli->query($sql);
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
                <th rowspan='2' class='tabkas-head-tababsen'>Abs</th>
                <th rowspan='2' class='tabkas-head-tabnama'>Nama</th>
                <th colspan='4'>Juli</th>
                <th colspan='4'>Agustus</th>
                <th colspan='5'>September</th>
                <th colspan='4'>Oktober</th>
                <th colspan='4'>November</th>
                <th colspan='3'>Desember</th>
            </tr>
            <tr class='tabkas-tabtanggal'>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>05</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
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
    $result = $mysqli->query($sql);

    echo "<table border='1' class='tabtagihan'>
            <tr>
                <th class='tagihan-head-tababsen'>Abs</th>
                <th class='tagihan-head-tabnama'>Nama</th>
                <th class= 'tagihan-head-tabtagihan'>Tagihan</th>
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
                    <td class='tagihan-tababsen'>" . "#" . $row["id"] . "</td>
                    <td class='tagihan-tabnama'>" . $row["nama"] . "</td>
                    <td class='tagihan-tabtagihan'>" . "Rp, " . $tagihan_formated . "</td>
                  </tr>";
        }
    }
    echo "</table>";
} else {
    echo "NULL";
}

echo "<button class='edit-button'><a href='edit.php'>Edit Data</a></button>";

$mysqli->close();
?>
</body>
</html>