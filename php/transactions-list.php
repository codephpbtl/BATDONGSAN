<?php
include "./database/connectDb.php";
include "./logic/user/pagination.php";

// Số mục trên mỗi trang
$itemsPerPage = 10;

// Trang hiện tại
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Thực hiện truy vấn SQL với giới hạn (không có LIMIT ở đây)
$sql = "SELECT transactions.*, users.FullName AS UserName, users.UserID AS UserID, rentals.RentalID AS RentalID
        FROM transactions
        LEFT JOIN rentals ON transactions.RentalID = rentals.RentalID
        LEFT JOIN users ON rentals.UserID = users.UserID";

$searchValue = isset($_POST['searchValue']) ? $_POST['searchValue'] : '';

// Thêm điều kiện WHERE vào truy vấn SQL nếu có giá trị trong $userNameFilter
if (!empty($searchValue)) {
    $sql .= " WHERE users.FullName LIKE '%$searchValue%'";
}

// Thêm LIMIT vào cuối truy vấn SQL
$sql .= " LIMIT $offset, $itemsPerPage";

$result = $conn->query($sql);

// Kiểm tra và hiển thị dữ liệu
if ($result !== false && $result->num_rows > 0) {
    // Lặp qua kết quả và lưu vào mảng để sử dụng trong HTML
    $rentalsData = [];
    while ($row = $result->fetch_assoc()) {
        $rentalsData[] = $row;
    }
} else {
    $rentalsData = [];
}

// Tính toán tổng số trang
$totalItemsSql = "SELECT COUNT(*) AS total FROM rentals";
$totalItemsResult = $conn->query($totalItemsSql);
$totalItems = $totalItemsResult->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Đóng kết nối
$conn->close();
?>
<!-- ... (phần HTML tiếp theo không thay đổi) -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Admin-Pro lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Admin-Pro lite design, Admin-Pro lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Admin-Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>HTT - Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- page css -->
    <link href="css/pages/google-vector-map.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Pro</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
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
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-dark" href="#"><img src="../assets/images/users/1.jpg"
                                    alt="user" class="profile-pic" /></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i
                                    class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i
                                    class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a></li>
                                    <li> 
                                        <a class="waves-effect waves-dark" href="manager-user.php" aria-expanded="false">
                                            <i class="mdi mdi-account"></i>
                                            <span class="hide-menu">User</span>
                                        </a>
                                    </li>                                    
                        <li> <a class="waves-effect waves-dark" href="storage.php" aria-expanded="false"><i
                                    class="mdi mdi-table"></i><span class="hide-menu">Nhà Kho</span></a></li>
                                    <li> <a class="waves-effect waves-dark" href="rentals.php" aria-expanded="false"><i
                                    class="mdi mdi-earth"></i><span class="hide-menu">Hóa Đơn</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="transactions-list.php" aria-expanded="false"><i
                                    class="mdi mdi-book-open-variant"></i><span class="hide-menu">Thanh Toán</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.php" aria-expanded="false"><i
                                    class="mdi mdi-help-circle"></i><span class="hide-menu">404</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Hóa Đơn</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <h2>Danh sách các khoản thuê nhà</h2>
                            <a href="./add-transaction.php">Thêm Đơn Giao Dịch</a>
                            <form method="post" action="" class="form-inline my-2 my-lg-0">
                                <div class="input-group ml-2">
                                    <input value="<?php echo isset($searchValue) ? $searchValue : ''; ?>" type="text" name="searchValue" class="form-control" placeholder="Nhập Tên Kho Hàng">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </form>
                            <?php if (!empty($rentalsData)): ?>
                                <table>
                                    <tr>
                                        <th>RentalID</th>
                                        <th>Người Mua</th>
                                        <th>Phương Thức Thanh Toán</th>
                                        <th>Số Lượng</th>
                                        <th>Ngày Giao Dịch</th>
                                    </tr>
                                    <?php foreach ($rentalsData as $rental): ?>
                                        <tr>
                                            <td><?php echo $rental['RentalID']; ?></td>
                                            <td><?php echo $rental['UserName']; ?></td>
                                            <td><?php echo $rental['PaymentMethod']; ?></td>
                                            <td><?php echo $rental['Amount']; ?></td>
                                            <td><?php echo $rental['TransactionDate']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <div style="margin-top: 2rem;">
                                    <?php generatePagination($currentPage, $totalPages); ?>
                                </div>
                            <?php else: ?>
                                <p>Không có dữ liệu thuê nhà.</p>
                            <?php endif; ?>             
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCUBL-6KdclGJ2a_UpmB2LXvq7VOcPT7K4&sensor=true"></script>
</body>

</html>