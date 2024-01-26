<?php
include "./database/connectDb.php";

// Kiểm tra xem có file đã được tải lên không
if (isset($_FILES['image'])) {
    $unitId = $_POST['unitId'];

    // Kiểm tra xem file đã được tải lên thành công hay không
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imagePath);
        $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageData);

        // Thêm dữ liệu vào bảng storageunits
        $sql = "INSERT INTO images (StorageUnitID,ImageData) 
                VALUES ('$unitId','$imageBase64')";

        if ($conn->query($sql) === TRUE) {
            header("Location: /php/show-image.php?UnitId=$unitId");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image: " . $_FILES['image']['error'];
    }
} else {
    echo "Error: Image file is missing";
}

$conn->close();
?>
