<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /php/login.php");
    exit(); 
}

$userID = $_SESSION['user_id'];
$userName = $_SESSION['user_email'];
?>
