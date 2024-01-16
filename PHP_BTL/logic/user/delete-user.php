<?php
    include '../../database/connectDb.php';

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        $sql = "DELETE FROM `users` WHERE UserID = $userId";
        $result = $conn->query($sql);

        if ($result) {
           header("Location: /php/manager-user.php");
            exit();
        } else {
            echo "Error deleting user";
        }
    } else {
        echo "Invalid user ID";
    }
?>
