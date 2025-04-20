<?php
include('config.php');  // Pastikan ini mengarah ke file config.php yang benar

// Query untuk mengambil data dari tabel
$sql = "SELECT * FROM monitoring ORDER BY id DESC LIMIT 1";  // Pastikan nama tabel sesuai
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data dalam bentuk array asosiatif
    $row = $result->fetch_assoc();
    echo json_encode($row);  // Mengembalikan data sebagai JSON
} else {
    echo json_encode(["message" => "Data tidak ditemukan"]);  // Mengembalikan error jika tidak ada data
}

// Menutup koneksi
$conn->close();
?>
