<?php
include "./database/connectDb.php";

// Truy vấn để lấy dữ liệu
$query = "SELECT Status, COUNT(*) AS Count, SUM(TotalPrice) AS TotalPriceSum FROM rentals GROUP BY Status";
$result = $conn->query($query);

// Xử lý kết quả và chuyển đổi thành JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

// Đóng kết nối
$conn->close();
?>
