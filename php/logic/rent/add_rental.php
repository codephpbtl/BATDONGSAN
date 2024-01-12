<?php
include "../../database/connectDb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $userID = $_POST['userID'];
    $unitID = $_POST['unitID'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $totalPrice = $_POST['totalPrice'];
    $status = $_POST['status'];

    // Thực hiện truy vấn SQL để thêm dữ liệu vào bảng rentals
    $sql = "INSERT INTO rentals (UserID, UnitID, StartDate, EndDate, TotalPrice, Status) 
            VALUES ('$userID', '$unitID', '$startDate', '$endDate', '$totalPrice', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /php/rentals.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
