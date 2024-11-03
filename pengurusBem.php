<?php
require "koneksiMVC.php";

class pengurusBem {
    public function login($username, $password) {
        global $mysqli;

        // Query untuk mengambil data user berdasarkan username
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        // Sementara: Verifikasi password sebagai teks biasa (untuk pengujian)
        if ($user && $user['password'] === $password) { 
            // Set sesi untuk username dan peran
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        } else {
            return false;
        }
    }
}
?>
