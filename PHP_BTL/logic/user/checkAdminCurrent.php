<?php

// Kiểm tra xem user_id có tồn tại trong session hay không
if (!isset($_SESSION['user_id'])) {
    header("Location: /php/login.php");
    exit();
}

// Lưu ý: Bạn có thể sử dụng session để lấy thông tin người dùng khác nếu cần thiết
$userID = $_SESSION['user_id'];

// Kết nối đến cơ sở dữ liệu
include "./database/connectDb.php";

// Truy vấn để lấy thông tin người dùng cụ thể
$sqlGetAdminCurrent = "SELECT * FROM `users` WHERE UserID = $userID";
$result = $conn->query($sqlGetAdminCurrent);

if ($result->num_rows > 0) {
    // Lấy dữ liệu từ kết quả truy vấn
    $adminCurrent = $result->fetch_assoc();
    
    // Đóng kết nối cơ sở dữ liệu
    $conn->close();

    // Trả về adminCurrent
    return $adminCurrent;
} else {
    // Đóng kết nối cơ sở dữ liệu
    $conn->close();

    // Nếu không tìm thấy, trả về một giá trị rỗng hoặc thông báo lỗi
    return null;
}
?>
