<?php
    include "../../database/connectDb.php";

    // Kiểm tra xem có tham số rentalId và userId được truyền từ URL không
    if (isset($_GET['rentalId']) && isset($_GET['userId'])) {
        $rentalId = $_GET['rentalId'];
        $userId = $_GET['userId'];

        // Sử dụng Prepared Statements để tránh SQL injection
        $sqlDeleteTransactions = "DELETE FROM `transactions` WHERE RentalID = ?";
        $stmtTransactions = $conn->prepare($sqlDeleteTransactions);
        $stmtTransactions->bind_param("i", $rentalId);
        $stmtTransactions->execute();

        // Sau khi xóa transactions, bạn có thể tiếp tục xóa rentals
        $sqlDeleteRental = "DELETE FROM `rentals` WHERE RentalID = ?";
        $stmtRental = $conn->prepare($sqlDeleteRental);
        $stmtRental->bind_param("i", $rentalId);

        // Thực hiện truy vấn DELETE
        if ($stmtRental->execute()) {
            // Thực hiện thêm phần xóa user tại đây (ví dụ, bạn cần thêm code để xóa user từ bảng users)
            
            // Chuyển hướng đến trang rent.php
            header("Location: /php/rent.php?userId=" . $userId);
            exit();
        } else {
            echo "Lỗi khi xóa: " . $stmtRental->error;
        }

        // Đóng kết nối và statement
        $stmtTransactions->close();
        $stmtRental->close();
        $conn->close();
    } else {
        echo "Không có rentalId hoặc userId được cung cấp.";
    }
?>
