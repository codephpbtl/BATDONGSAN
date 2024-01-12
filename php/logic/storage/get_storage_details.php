<?php
include "../../database/connectDb.php";

// Kiểm tra xem có tham số 'id' được gửi qua không
if (isset($_GET['id'])) {
    $unitId = $_GET['id'];

    // Thực hiện truy vấn SQL để lấy chi tiết kho hàng
    $sql = "SELECT * FROM storageunits WHERE UnitID = $unitId";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Storage Unit</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

input,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"] {
    padding: 8px;
}

button {
    background-color: #4caf50;
    color: #ffffff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

select {
    padding: 10px;
}

/* Responsive styling */
@media screen and (max-width: 600px) {
    form {
        max-width: 100%;
    }
}
</style>
<body>
    <h2>Cập Nhật Kho Hàng</h2>
    <form action="/php/logic/storage/update_storage.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="unitId" value="<?php echo $row['UnitID']; ?>">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>" required><br>

        <label for="address">Địa Chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>" required><br>

        <label for="image">Ảnh</label>
        <input type="file" id="image" name="image" accept="image/*"><br>

        <label for="capacity">Dung Tích:</label>
        <input type="number" id="capacity" name="capacity" value="<?php echo $row['Capacity']; ?>" required><br>

        <label for="rate">Tỷ Lệ:</label>
        <input type="text" id="rate" name="rate" value="<?php echo $row['Rate']; ?>" required><br>

        <label for="available">Trạng Thái:</label>
        <select id="available" name="available">
            <option value="Yes" <?php echo ($row['Available'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
            <option value="No" <?php echo ($row['Available'] === 'No') ? 'selected' : ''; ?>>No</option>
        </select><br>

        <button type="submit">Cập Nhật Kho Hàng</button>
    </form>

</body>

</html>

<?php
    } else {
        // Trường hợp không tìm thấy dữ liệu
        echo "<p>Không có thông tin chi tiết cho kho hàng này</p>";
    }
} else {
    // Trường hợp không có tham số 'id'
    echo "<p>Không có ID kho hàng được cung cấp</p>";
}

// Đóng kết nối
$conn->close();
?>
