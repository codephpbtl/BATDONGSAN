<?php
include "../../database/connectDb.php";

// Kiểm tra xem có tham số 'unitId' được gửi qua không
if (isset($_POST['unitId'])) {
    $unitId = $_POST['unitId'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $capacity = $_POST['capacity'];
    $rate = $_POST['rate'];
    $available = $_POST['available'];

    // Kiểm tra xem có file ảnh mới được tải lên không
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imagePath);
        $imageBase64 = "data:image/jpeg;base64," . base64_encode($imageData);

        // Cập nhật dữ liệu trong bảng storageunits với ảnh mới
        $sql = "UPDATE storageunits 
                SET Name='$name', Address='$address', Image='$imageBase64', Capacity=$capacity, Rate=$rate, Available='$available' 
                WHERE UnitID = $unitId";
    } else {
        // Không có ảnh mới, chỉ cập nhật các trường khác
        $sql = "UPDATE storageunits 
                SET Name='$name', Address='$address', Capacity=$capacity, Rate=$rate, Available='$available' 
                WHERE UnitID = $unitId";
    }

    // Thực hiện truy vấn cập nhật
    if ($conn->query($sql) === TRUE) {
        header("Location: /php/storage.php");
        exit();
    } else {
        echo "Error updating storage unit: " . $conn->error;
    }
} else {
    // Trường hợp không có tham số 'unitId'
    echo "Error: Unit ID is missing";
}

// Đóng kết nối
$conn->close();
?>
