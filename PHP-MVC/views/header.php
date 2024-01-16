
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/images/logo-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light  mb-4">
        <img src="../assets/images/logo-icon.png" alt="">
        <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>home/index"> ShareBoard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>home/index">Kho cho thuê</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>news/index">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>contact/index">Liên hệ</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>file/index">
                        <i class="bi bi-heart"></i>
                        Yêu thích
                    </a>
                </li>
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAccountDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user_data']['name']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarAccountDropdown">
                        <a class="dropdown-item" href="user.php">Thay đổi thông tin cá nhân</a>
                        <a class="dropdown-item" href="setting-user.php">Thay đổi mật khẩu</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                    </div>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>Users/login"><i class="bi bi-person-circle"></i>
                        Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH; ?>Users/register"><i
                            class="bi bi-box-arrow-in-right"></i> Đăng ký</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <script src="<?php echo ROOT_PATH; ?>../assets/js/bootstrap.min.js"></script>
</body>
</body>

</html>