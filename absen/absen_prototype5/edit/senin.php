<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<title>Senin - Edit</title>
<style>
        * {
            font-family: "Inter", sans-serif;
        }
        body::-webkit-scrollbar{
            display: none;
        }
        .error {
            margin-top: 25vh;
        }
        .error-emote {
            text-align: center;
        }
        .error h1, h3, p {
            text-align: center;
            margin-bottom: -2vh;
        }
        .error h1 {
            font-size: 2rem;
        }
        .error h3 {
            font-size: 1.1rem;
        }
        .error p {
            font-size: 1rem;
        }
        .error a {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }


</style>

<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'sekretaris' && $_SESSION['role'] !== 'admin') {
    echo "
    <div class='error'>
        <div class='error-emote'>
            <img src='images/no_pedestrians.png'>
        </div>
        <h1>#403</h1>
        <h3>Has no access</h3>
        <p>There's nothing in here</p>
    </div>
    ";
    exit();
}

if (!isset($_COOKIE['username'])) {
    session_destroy(); 
    header("Location: #login");
    exit();
}

$hari = isset($_GET['hari']) ? $_GET['hari'] : 'senin';
$conn = new mysqli("localhost", "root", "", "absen");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    foreach ($_POST['absen'] as $id => $absenValues) {
        $fields = [];
        foreach ($absenValues as $field => $value) {
            $fields[] = "$field = $value";
        }
        $updateQuery = "UPDATE $hari SET " . implode(", ", $fields) . " WHERE id = $id";
        if (!$conn->query($updateQuery)) {
            echo "Error: " . $conn->error;
        }
    }
    echo "Data berhasil diupdate!";
}

$query = "SELECT * FROM $hari";
$result = $conn->query($query);
if (!$result) {
    die("Error retrieving data: " . $conn->error);
}
?>

<h1>Senin</h1>
<form method="POST">
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
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <?php for ($i = 1; $i <= 11; $i++) { ?>
                <td>
                    <select name="absen[<?php echo $row['id']; ?>][j<?php echo $i; ?>]">
                        <option value="0" <?php echo $row["j$i"] == 0 ? 'selected' : ''; ?>> </option>
                        <option value="1" <?php echo $row["j$i"] == 1 ? 'selected' : ''; ?>>Masuk</option>
                        <option value="2" <?php echo $row["j$i"] == 2 ? 'selected' : ''; ?>>Sakit</option>
                        <option value="3" <?php echo $row["j$i"] == 3 ? 'selected' : ''; ?>>Izin</option>
                        <option value="4" <?php echo $row["j$i"] == 4 ? 'selected' : ''; ?>>Alpha</option>
                    </select>
                </td>
            <?php } ?>
            <td>
                <button type="button" onclick="setStatus(<?php echo $row['id']; ?>, 1)">Masuk</button>
                <button type="button" onclick="setStatus(<?php echo $row['id']; ?>, 2)">Sakit</button>
                <button type="button" onclick="setStatus(<?php echo $row['id']; ?>, 3)">Izin</button>
            </td>
        </tr>
        <?php } ?>
    </table>
    <button type="submit" name="update">Update</button>
</form>

<a href="index.php">Kembali</a>

<script>
    function setStatus(id, status) {
        const statusMap = {
            1: "Masuk",
            2: "Sakit",
            3: "Izin"
        };

        for (let i = 1; i <= 11; i++) {
            const select = document.querySelector(`select[name="absen[${id}][j${i}]"]`);
            select.value = status;
        }
    }
</script>

<?php
$conn->close();
?>
