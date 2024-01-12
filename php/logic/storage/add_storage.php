<?php
include "../../database/connectDb.php";

// Kiểm tra xem có file đã được tải lên không
if (isset($_FILES['image'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $capacity = $_POST['capacity'];
    $rate = $_POST['rate'];
    $available = $_POST['available'];

    // Kiểm tra xem file đã được tải lên thành công hay không
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imagePath);
        $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageData);

        // Thêm dữ liệu vào bảng storageunits
        $sql = "INSERT INTO storageunits (Name, Address, Image, Capacity, Rate, Available) 
                VALUES ('$name', '$address', '$imageBase64', $capacity, $rate, '$available')";

        if ($conn->query($sql) === TRUE) {
            header("Location: /php/storage.php");
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
