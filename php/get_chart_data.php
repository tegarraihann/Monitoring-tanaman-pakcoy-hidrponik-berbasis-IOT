<?php
header('Content-Type: application/json');
include('config.php');

// Ambil data 30 hari terakhir
$sql = "SELECT 
    DATE_FORMAT(tanggal, '%Y-%m-%d %H:%i:%s') as tanggal,
    suhu,
    tds,
    ph,
    tinggi
FROM monitoring
ORDER BY tanggal DESC
LIMIT 30";

$result = $conn->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode([]);
}

$conn->close();
?>
