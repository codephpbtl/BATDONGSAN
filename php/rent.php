<?php
    include "./logic/user/check_login.php";
    include "./logic/user/checkAdminCurrent.php";
    include "./database/connectDb.php";

    // Kiểm tra giá trị của $userId
    $userId = isset($_GET['userId']) ? $_GET['userId'] : null;

    if ($userId === null) {
        echo "Không có ID người dùng được cung cấp.";
        exit();
    }

    // Sử dụng Prepared Statements
    $sqlRunGetUser = "SELECT * FROM `users` WHERE UserID = ?";
    $stmt = $conn->prepare($sqlRunGetUser);
    $stmt->bind_param("i", $userId);

    // Thực hiện truy vấn
    $stmt->execute();
    $resultUser = $stmt->get_result();

    // Kiểm tra xem có dữ liệu hay không
    if ($resultUser->num_rows > 0) {
        $user = $resultUser->fetch_assoc();
    } else {
        echo "Không tìm thấy thông tin người dùng";
        exit();
    }

    // Lấy danh sách nhà cho thuê
    $sqlGetRentals = "SELECT * FROM `rentals` WHERE UserID = ?";
    $stmtRentals = $conn->prepare($sqlGetRentals);
    $stmtRentals->bind_param("i", $userId);
    $stmtRentals->execute();
    $resultRentals = $stmtRentals->get_result();

    // Đóng kết nối và statement
    $stmt->close();
    $stmtRentals->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thuê nhà</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Thêm CSS tùy chỉnh nếu cần */
        .rental-item {
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
</head>
<body>
            <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                      
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <h4><?php echo $adminCurrent['FullName']; ?></h4>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <h2 style="text-align: center;">Trang Quản Trị Nhà Cho Khác Hàng Thuê</h2>
        <div style="padding: 2rem;">
            <?php
                if ($result->num_rows > 0) {
                    echo "<p>Tên Khác Hàng: " . $user['FullName'] . "</p>"; 
                    echo "<p>Số Điện Thoại: " . $user['PhoneNumber'] . "</p>"; 
                    echo "<p>Email: " . $user['Email'] . "</p>"; 
                }
            ?>
            <h3>Danh sách nhà cho thuê</h3>
            <ul style="padding: 0;">
                <?php
                    while ($rental = $resultRentals->fetch_assoc()) {
                        echo '<div class="card rental-item">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text"><strong>Ngày bắt đầu:</strong> ' . $rental['StartDate'] . '</p>';
                        echo '<p class="card-text"><strong>Ngày kết thúc:</strong> ' . $rental['EndDate'] . '</p>';
                        echo '<p class="card-text"><strong>Tổng giá:</strong> $' . $rental['TotalPrice'] . '</p>';
                        echo '<p class="card-text"><strong>Trạng thái:</strong> ' . $rental['Status'] . '</p>';
                         // So sánh ngày hiện tại với ngày kết thúc
                        $today = new DateTime();
                        $endDate = new DateTime($rental['EndDate']);
                        
                        if ($today > $endDate) {
                            echo '<p class="card-text text-danger"><strong>Trạng thái:</strong> Hết hạn</p>';
                        } else {
                            echo '<p class="card-text text-success"><strong>Trạng thái:</strong> Còn thời gian</p>';
                        }
                        echo '<div class="action-buttons">';
                        echo '<a href="/php/transactions.php?rentalID=' . $rental['RentalID'] . '&userID=' . $userId . '" class="btn btn-primary">Xem chi tiết</a>';
                        echo '</div>';
                        echo '</div>';

                }
            ?>
            </ul>
        </div>
        <script>
            
        </script>
</body>
</html>
