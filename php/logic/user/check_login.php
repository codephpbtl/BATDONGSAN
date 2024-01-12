<?php
// Bắt đầu session (phải đặt trước mọi lệnh HTML hoặc mã PHP khác)
session_start();

// Kiểm tra xem user_id có tồn tại trong session hay không
if (!isset($_SESSION['user_id'])) {
    header("Location: /php/login.php");
    exit(); 
}

$userID = $_SESSION['user_id'];
$userName = $_SESSION['user_email'];
?>
