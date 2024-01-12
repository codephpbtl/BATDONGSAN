<?php
include "./database/connectDb.php";

// Truy vấn để lấy dữ liệu từ bảng transactions
$queryTransactions = "SELECT PaymentMethod, SUM(Amount) AS AmountSum FROM transactions GROUP BY PaymentMethod";
$resultTransactions = $conn->query($queryTransactions);

// Xử lý kết quả và chuyển đổi thành JSON
$dataTransactions = array();
while ($rowTransactions = $resultTransactions->fetch_assoc()) {
    $dataTransactions[] = $rowTransactions;
}

// Đóng kết nối
$conn->close();

// Trả về dữ liệu dưới dạng JSON
echo json_encode($dataTransactions);
?>
