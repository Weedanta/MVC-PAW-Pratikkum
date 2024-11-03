<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

function isMenteri() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'Menteri';
}

function isKepalaDepartemen() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Departemen';
}
?>
