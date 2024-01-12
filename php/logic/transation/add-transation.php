<?php
include "../../database/connectDb.php";

// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $rentalID = $_POST["rentalID"];
    $paymentMethod = $_POST["paymentMethod"];
    $amount = $_POST["amount"];
    $transactionDate = $_POST["transactionDate"];

    // Đặt dấu nháy đơn xung quanh giá trị chuỗi
    $paymentMethod = "'" . $paymentMethod . "'";

    $sql = "INSERT INTO `transactions` (`RentalID`, `PaymentMethod`, `Amount`, `TransactionDate`) VALUES
            ($rentalID, $paymentMethod, $amount, '$transactionDate')";
            
    if ($conn->query($sql) === TRUE) {
        header("Location: /php/transactions-list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Nếu không phải là phương thức POST, chuyển hướng hoặc xử lý khác theo nhu cầu của bạn
    echo "Phương thức không hợp lệ";
}
?>
