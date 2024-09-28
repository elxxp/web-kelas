<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Adjust with your DB credentials
$password = "";
$dbname = "kas_kelas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize selected value and result
$selected_tempo = 1; // Default selection
$calculated_value = 0; // For the multiplied result

// Fetch the current 'tempo_tenggat' value from the database
$sql = "SELECT tempo_tenggat FROM tempo WHERE id = 1"; // Assuming id=1 for now
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $selected_tempo = $row['tempo_tenggat'];
    $calculated_value = $selected_tempo * 2000; // Multiply the fetched value by 2000
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
        $calculated_value = $selected_tempo * 2000; // Update the calculated value
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tempo</title>
</head>
<body>
    <form method="post" action="">
        <label for="tempo_tenggat">Pilih Tanggal Tempo:</label>
        <select name="tempo_tenggat" id="tempo_tenggat">
            <option value="1" <?php echo ($selected_tempo == 1) ? 'selected' : ''; ?>>10 Januari</option>
            <option value="2" <?php echo ($selected_tempo == 2) ? 'selected' : ''; ?>>12 Januari</option>
            <option value="3" <?php echo ($selected_tempo == 3) ? 'selected' : ''; ?>>14 Januari</option>
        </select>
        <br><br>
        <button type="submit">Update</button>
    </form>

    <br>
    <!-- Display the result of multiplying tempo_tenggat by 2000 -->
    <p>Hasil perkalian nilai database dengan 2000: <?php echo $calculated_value; ?></p>
</body>
</html>
