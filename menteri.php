<?php
require_once "session.php";

if (!isMenteri()) {
    echo "Anda tidak memiliki akses ke halaman ini.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Menteri</title>
</head>
<body>
    <h1>Selamat datang, Menteri</h1>
    <p>Halaman ini hanya dapat diakses oleh pengguna dengan peran Menteri.</p>
</body>
</html>
