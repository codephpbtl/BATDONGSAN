<?php
include './database/connectDb.php';
include './logic/user/pagination.php';

// Tạo biến mặc định cho tìm kiếm
$searchValue = isset($_POST['searchValue']) ? $_POST['searchValue'] : '';

// Tạo câu truy vấn dựa vào loại tìm kiếm và giá trị tìm kiếm
$sql = "SELECT COUNT(*) as total FROM `storageunits`";
$totalResult = $conn->query($sql);
$totalRows = $totalResult->fetch_assoc()['total'];

$itemsPerPage = 10; // Số mục trên mỗi trang
$totalPages = ceil($totalRows / $itemsPerPage); // Tổng số trang

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;

$sql = "SELECT * FROM `storageunits`";

if (!empty($searchValue)) {
    $sql .= " WHERE Name LIKE '%$searchValue%'";
   
}

$sql .= " LIMIT $startIndex, $itemsPerPage";
$result = $conn->query($sql);
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
    <title>Admin-Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
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
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel"></h5>
                        <button type="button" onclick="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="confirmDeleteModalBody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="closeModal()" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-danger" id="confirmDeleteButton" href="#">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
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
                        <h3 class="text-themecolor">Quản Lý Kho Hàng</h3>
                    </div>
                </div>
                <a href="/php/add-storage.php">Thêm Nhà Kho</a>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">        
                <form method="post" action="" class="form-inline my-2 my-lg-0">
                    <div class="input-group ml-2">
                        <input value="<?php echo isset($searchValue) ? $searchValue : ''; ?>" type="text" name="searchValue" class="form-control" placeholder="Nhập Tên Kho Hàng">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                        </div>
                    </div>
                 </form>
                <!-- column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách kho hàng</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Địa Chỉ</th>
                                            <th>Ảnh</th>
                                            <th>Trạng Thái</th>
                                            <!-- Thêm các cột khác nếu cần -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Đảm bảo có kết quả từ truy vấn
                                        if ($result !== false && $result->num_rows > 0) {
                                            $count = 1;
                                            // Lặp qua từng hàng dữ liệu
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                <td>{$count}</td>
                                                <td>{$row['Name']}</td>
                                                <td>{$row['Address']}</td>
                                                <td><img src='{$row['Image']}' alt='Hình ảnh' style='max-width: 100px; max-height: 100px;'></td>
                                                <td>{$row['Available']}</td>
                                                <td><a href='#' onclick='openDetailModal({$row['UnitID']})'>Chi Tiết</a></td>
                                                <td><a href='#' onclick='openConfirmModal({$row['UnitID']}, \"{$row['Name']}\", \"{$row['Address']}\")'>Xóa</a></td>
                                            </tr>";
                                            $count++;                                            
                                            }
                                        } else {
                                            // Hiển thị thông báo nếu không có dữ liệu
                                            echo "<tr><td colspan='4'>Không có kho hàng nào</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php generatePagination($currentPage, $totalPages); ?>
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

    <script>
        function openConfirmModal(unitId, name, address) {
            // Thiết lập giá trị cho modal
            document.getElementById('confirmDeleteModalLabel').innerText = 'Xác nhận xóa kho hàng';
            document.getElementById('confirmDeleteModalBody').innerText = 'Bạn có chắc chắn muốn xóa kho hàng "' + name + '" tại địa chỉ "' + address + '" không?';
            document.getElementById('confirmDeleteButton').href = './logic/storage/delete_storage.php?id=' + unitId;

            // Mở modal
            $('#confirmDeleteModal').modal('show');
        }

        function closeModal() {
            $('#confirmDeleteModal').modal('hide');
        }


        function closeDetailModal() {
            $('#detailModal').modal('hide');
        }


        function openDetailModal(unitId) {
        // Gửi AJAX request để lấy thông tin chi tiết từ server
            $.ajax({
                url: './logic/storage/get_storage_details.php', // Đường dẫn tùy thuộc vào cấu trúc của bạn
                type: 'GET',
                data: { id: unitId },
                success: function(response) {
                    // Hiển thị thông tin chi tiết trong modal
                    $('#detailModalBody').html(response);
                    $('#detailModal').modal('show');
                },
                error: function(error) {
                    console.error('Error fetching details:', error);
                }
            });
        }


    </script>
</body>
</html>