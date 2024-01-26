<?php
include "../../database/connectDb.php";

// Kiểm tra xem có tham số 'unitId' được gửi qua không
if (isset($_POST['unitId'])) {
    // Nhận các giá trị từ form
    $unitId = $_POST['unitId'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $capacity = $_POST['capacity'];
    $rate = $_POST['rate'];
    $available = $_POST['available'];
    $description = $_POST['description'];

    // Kiểm tra xem có file ảnh mới được tải lên không
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imagePath);
        $imageBase64 = "data:image/jpeg;base64," . base64_encode($imageData);
    
        // Sử dụng Prepared Statements để ngăn chặn SQL Injection
        $sql = "UPDATE storageunits 
                SET Name=?, Address=?, Image=?, Capacity=?, Rate=?, Available=?, Description=? 
                WHERE UnitID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdsssi", $name, $address, $imageBase64, $capacity, $rate, $available, $description, $unitId);
    } else {
        // Không có ảnh mới, chỉ cập nhật các trường khác
        $sql = "UPDATE storageunits 
                SET Name=?, Address=?, Capacity=?, Rate=?, Available=?, Description=? 
                WHERE UnitID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdssi", $name, $address, $capacity, $rate, $available, $description, $unitId);
    }

    // Thực hiện truy vấn cập nhật
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: /php/storage.php");
        exit();
    } else {
        echo "Error updating storage unit: " . $stmt->error;
    }
} else {
    // Trường hợp không có tham số 'unitId'
    echo "Error: Unit ID is missing";
}

// Đóng kết nối
$conn->close();
?>
