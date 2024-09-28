<?php
$servername = "localhost";
$username = "twoh_7737";
$password = "#pepe3lge2ANTIbaper";
$dbname = "kas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
