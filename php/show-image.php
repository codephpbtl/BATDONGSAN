<?php
include "./database/connectDb.php";

$unitName = ""; // Khởi tạo biến $unitName trước khi sử dụng

// Kiểm tra xem có UnitId được chuyển từ trang trước không
if (isset($_GET['UnitId'])) {
    $unitId = $_GET['UnitId'];

    // Truy vấn thông tin từ bảng storageunits
    $storageUnitQuery = "SELECT * FROM storageunits WHERE UnitID = '$unitId'";
    $storageUnitResult = $conn->query($storageUnitQuery);

    if ($storageUnitResult->num_rows > 0) {
        // Lấy thông tin của storage unit
        $storageUnitData = $storageUnitResult->fetch_assoc();
        $unitName = $storageUnitData['Name'];
    } else {
        echo "No storage unit found for UnitId: $unitId.";
    }
} else {
    echo "UnitId not provided.";
}

            // Xử lý xóa ảnh nếu nút xóa được nhấp
if (isset($_POST['deleteImage'])) {
    $imageIdToDelete = $_POST['imageId'];
        $deleteSql = "DELETE FROM images WHERE ImageID = '$imageIdToDelete'";
            if ($conn->query($deleteSql) === TRUE) {
                header("Location: /php/show-image.php?UnitId=1");
            } else {
                echo "Error deleting image: " . $conn->error;
            }
}
$conn->close();

?>
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
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <style>
        body {
            background: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        .gallery {
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .image-container {
            position: relative;
            flex: 0 0 calc(30% - 20px);
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }

        .image-container:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        img {
            width: 110%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .delete-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .delete-button:hover {
            background-color: #ff1a1a;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

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

    <!-- ==============================================================-->
    <!-- Modal Chi Tiết -->
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Thông Tin Kho Hàng</h5>
                        <button type="button" class="close" onclick="closeDetailModal()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="detailModalBody">
                        <h1>OK</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeDetailModal()">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- ==============================================================-->
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
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
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
        <!-- modal -->
        <!-- modal -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <a href="/php/multiple-Image.php">Thêm Ảnh Chi Tiết Cho Kho</a>
                <h2>Danh sách ảnh của store <?php echo $unitName; ?></h2>

                <br>
                <div class="row">
                    <?php
                    include "./database/connectDb.php";

                    // Kiểm tra xem có UnitId được chuyển từ trang trước không
                    if (isset($_GET['UnitId'])) {
                        $unitId = $_GET['UnitId'];

                        // Truy vấn ảnh từ cơ sở dữ liệu theo UnitId
                        $sql = "SELECT * FROM images WHERE StorageUnitID = '$unitId'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Hiển thị mỗi ảnh dưới dạng thẻ <img> và nút xóa
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="image-container">
                                        <img src="' . $row['ImageData'] . '" alt="Image">
                                        <form method="post">
                                            <input type="hidden" name="imageId" value="' . $row['ImageID'] . '">
                                            <button type="submit" class="delete-button" name="deleteImage">Delete</button>
                                        </form>
                                    </div>';
                            }
                        } else {
                            echo "No images found for UnitId: $unitId."; 
                        }
                    } 
            ?>
        </div>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
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

    
</body>
</html>