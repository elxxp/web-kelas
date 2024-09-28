<?php
require 'config-kas.php';

$idsToUpdate = [];

foreach ($_POST as $key => $value) {
    if (preg_match('/^(tab1|tab2|tab3|tab4|tab5|tab6|tab7|tab8|tab9|tab10|tab11|tab12|tab13|tab14|tab15|tab16|tab17|tab18|tab19|tab20|tab21)_(\d+)$/', $key, $matches)) {
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
        $sql = "UPDATE kas SET tab1=0, tab2=0, tab3=0, tab4=0, tab5=0, tab6=0, tab7=0, tab8=0, tab9=0, tab10=0, tab11=0, tab12=0, tab13=0, tab14=0, tab15=0, tab16=0, tab17=0, tab18=0, tab19=0, tab20=0, tab21=0 WHERE id='$id'";
        $conn->query($sql);
    }
}

header("Location: edit_data.php");

$conn->close();
?>
