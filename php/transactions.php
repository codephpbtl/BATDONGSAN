<?php
include "./database/connectDb.php";

// Lấy RentalID từ tham số truyền vào (giả sử bạn truyền qua biến GET)
$rentalID = isset($_GET['rentalID']) ? $_GET['rentalID'] : null;
$userID = isset($_GET['userID']) ? $_GET['userID'] : 99;


if ($rentalID === null) {
    echo "Không có ID thuê nhà được cung cấp.";
    exit();
}

// Truy vấn để lấy thông tin chi tiết hóa đơn, thông tin thuê nhà và thông tin storage unit
$sql = "SELECT r.*, s.Capacity AS UnitCapacity, s.Rate AS UnitRate, s.Date AS UnitDate, s.Available AS UnitAvailable,
                su.Name AS UnitName, su.Address AS UnitAddress, su.Image AS UnitImage
        FROM rentals r
        LEFT JOIN storageunits s ON r.UnitID = s.UnitID
        LEFT JOIN storageunits su ON r.UnitID = su.UnitID
        WHERE r.RentalID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $rentalID);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .invoice-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin: 5px 0;
        }

        .section-heading {
            margin-top: 20px;
        }

        .transaction-details {
            margin-top: 20px;
        }

        .transaction-details p {
            margin-bottom: 10px;
        }
        /* Thêm một lớp mới cho nút xóa */
        .delete-action button.btn-danger {
            margin-left: auto;
            display: block;
            background-color: #ff5858;
            color: #fff;
            border: none;
            border-radius: 8px;  /* Tăng độ cong của góc để làm nút trông to hơn */
            padding: 12px 20px;  /* Điều chỉnh padding để làm nút trông to và đẹp hơn */
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="invoice-container">
    <?php
    if ($result->num_rows > 0) {
        $rentalDetails = $result->fetch_assoc();
        ?>
        <h2>Thông tin chi tiết thuê nhà</h2>
        <p><strong>Mã thuê nhà:</strong> <?php echo $rentalDetails['RentalID']; ?></p>
        <p><strong>Ngày bắt đầu thuê nhà:</strong> <?php echo $rentalDetails['StartDate']; ?></p>
        <p><strong>Ngày kết thúc thuê nhà:</strong> <?php echo $rentalDetails['EndDate']; ?></p>
        <p><strong>Tổng giá thuê nhà:</strong> <?php echo $rentalDetails['TotalPrice']; ?></p>
        <p><strong>Trạng thái thuê nhà:</strong> <?php echo $rentalDetails['Status']; ?></p>

        <div class="section-heading">
            <h2>Thông tin nhà kho</h2>
            <p><strong>Diện Tích:</strong> <?php echo $rentalDetails['UnitCapacity']; ?></p>
            <p><strong>Tỷ Lệ:</strong> <?php echo $rentalDetails['UnitRate']; ?></p>
            <p><strong>Ngày:</strong> <?php echo $rentalDetails['UnitDate']; ?></p>
            <p><strong>Tên Nhà Kho:</strong> <?php echo $rentalDetails['UnitName']; ?></p>
            <p><strong>Địa Chỉ:</strong> <?php echo $rentalDetails['UnitAddress']; ?></p>
            <p><strong>Trạng Thái:</strong> <?php echo $rentalDetails['UnitAvailable']; ?></p>
        </div>

        <div class="transaction-details">
            <?php
            // Truy vấn để lấy thông tin giao dịch (transactions)
            $sqlTransactions = "SELECT * FROM transactions WHERE RentalID = ?";
            $stmtTransactions = $conn->prepare($sqlTransactions);
            $stmtTransactions->bind_param("i", $rentalID);
            $stmtTransactions->execute();
            $resultTransactions = $stmtTransactions->get_result();

            if ($resultTransactions->num_rows > 0) {
                echo "<h2>Thông tin giao dịch</h2>";
                while ($transaction = $resultTransactions->fetch_assoc()) {
                    echo "<p><strong>Mã giao dịch:</strong> {$transaction['TransactionID']}</p>";
                    echo "<p><strong>Phương thức thanh toán:</strong> {$transaction['PaymentMethod']}</p>";
                    echo "<p><strong>Số tiền:</strong> {$transaction['Amount']}</p>";
                    echo "<p><strong>Ngày giao dịch:</strong> {$transaction['TransactionDate']}</p>";
                }
            } else {
                echo "Không có thông tin giao dịch.";
            }
            ?>
        <div class="delete-action">
            <button class="btn btn-danger" onclick="confirmDelete('<?php echo $rentalID ?>', '<?php echo $userID; ?>')">Xóa</button>
        </div>
    <?php
    } else {
        echo "Không tìm thấy thông tin thuê nhà.";
    }
    ?>
    
</div>

<script>
    function confirmDelete(rentalId, userId) {
        var confirmDelete = confirm("Bạn có chắc chắn muốn xóa không?");
        if (confirmDelete) {
            // Chuyển hướng đến trang xử lý xóa với rentalId và userId được truyền
            window.location.href = './logic/rent/delete_rental.php?rentalId=' + rentalId + '&userId=' + userId;
        }
    }


</script>
</body>
</html>
