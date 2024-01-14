<?php
include "./check_login.php";
include "../../database/connectDb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNo = $_POST["phone_no"];

    // Cập nhật thông tin người dùng trong cơ sở dữ liệu
    $sqlUpdateProfile = "UPDATE `users` SET FullName='$fullName', Email='$email', Password='$password', PhoneNumber='$phoneNo' WHERE UserID=$userID";

    if ($conn->query($sqlUpdateProfile) === TRUE) {
        echo "Cập nhật hồ sơ thành công";
    } else {
        echo "Lỗi khi cập nhật hồ sơ: " . $conn->error;
    }
}

// Điều hướng người dùng về trang profile sau khi cập nhật
header("Location: /php/pages-profile.php");
?>
