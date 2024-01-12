<?php 
    include "../../database/connectDb.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ yêu cầu POST
    $statusList = $_POST['Status'];
    

    // Lặp qua danh sách trạng thái và cập nhật trong cơ sở dữ liệu
    foreach ($statusList as $rentalId => $newStatus) {
        // Cập nhật trạng thái trong cơ sở dữ liệu
        $updateSql = "UPDATE rentals SET Status = ? WHERE RentalID = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $newStatus, $rentalId);

        if ($stmt->execute()) {
            header("Location: /php/rentals.php");
        } else {
            echo "Có lỗi xảy ra khi cập nhật trạng thái.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
