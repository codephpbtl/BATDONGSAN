<?php
    include "../../database/connectDb.php";
    
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $unitId = $_GET['id'];

        include "./database/connectDb.php";

        $sql = "DELETE FROM storageunits WHERE UnitID = $unitId";

        if ($conn->query($sql) === TRUE) {
            header("Location: /php/storage.php");
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }

        $conn->close();
    } else {
        header("Location: /php/storage.php");
        exit();
    }
?>
