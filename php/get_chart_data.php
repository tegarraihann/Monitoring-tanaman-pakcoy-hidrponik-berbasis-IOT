<?php
header('Content-Type: application/json');
include('config.php');

// Ambil parameter bulan (misal 04 untuk April)
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

$sql = "SELECT 
    DATE(created_at) as tanggal,
    ROUND(AVG(pm25), 2) as pm25,
    ROUND(AVG(kadar_asap), 2) as kadar_asap,
    ROUND(AVG(karbon_dioxida), 2) as karbon_dioxida,
    ROUND(AVG(suhu), 2) as suhu,
    ROUND(AVG(kelembapan), 2) as kelembapan,
    MAX(status) as status
FROM monitoring
WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?
GROUP BY DATE(created_at)
ORDER BY tanggal ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $bulan, $tahun);
$stmt->execute();
$result = $stmt->get_result();

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>
