<?php
$mysqli = new mysqli('localhost', 'root', '', 'pawww');
if ($mysqli->connect_error) {
    die("Koneksi database gagal: " . $mysqli->connect_error);
}
?>
