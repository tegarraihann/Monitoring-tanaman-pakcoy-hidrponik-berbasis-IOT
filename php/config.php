<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pakcui";  // Nama database yang sesuai dengan milik Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
