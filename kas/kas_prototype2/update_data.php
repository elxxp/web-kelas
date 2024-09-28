<?php
require 'config-kas.php';

$idsToUpdate = [];

foreach ($_POST as $key => $value) {
    if (preg_match('/^(jul4|aug1|aug2|aug3|aug4|sep1|sep2|sep3|sep4|okt1|okt2|okt3|okt4|nov1|nov2|nov3|nov4|des1|des2|des3|des4)_(\d+)$/', $key, $matches)) {
        $type = $matches[1];
        $id = $matches[2];
        $idsToUpdate[$id] = true;
        $value = $value == '1' ? 1 : 0;
        $sql = "UPDATE kas SET $type='$value' WHERE id='$id'";
        $conn->query($sql);
    }
}

$sql = "SELECT id FROM kas";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    if (!isset($idsToUpdate[$id])) {
        $sql = "UPDATE kas SET jul4=0, aug1=0, aug2=0, aug3=0, aug4=0, sep1=0, sep2=0, sep3=0, sep4=0, okt1=0, okt2=0, okt3=0, okt4=0, nov1=0, nov2=0, nov3=0, nov4=0, des1=0, des2=0, des3=0, des4=0 WHERE id='$id'";
        $conn->query($sql);
    }
}

header("Location: edit_data.php");

$conn->close();
?>
