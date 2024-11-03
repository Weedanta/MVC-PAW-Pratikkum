<?php
session_start();
require_once "pengurusBem.php";

$model = new pengurusBem();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memanggil metode login di model `pengurusBem`
    if ($model->login($username, $password)) {
        header("Location: index.php");
        exit;
    } else {
        // Tambahkan pesan error untuk debugging
        echo "Login gagal: username atau password salah.";
        // Untuk debugging, tampilkan data yang ada di database
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "<br>Username ditemukan: " . $user['username'];
            echo "<br>Password di database: " . $user['password'];
        } else {
            echo "<br>Username tidak ditemukan di database.";
        }
        exit;
    }
}
?>
