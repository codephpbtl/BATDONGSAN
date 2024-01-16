<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Nhập</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .login-container {
        margin: 0px 50px 50px 0px;
    }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-12">
                <form class="login-form">
                    <h3 class="text-center mb-4">Đăng Nhập</h3>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Nhập email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Mật khẩu</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </form>
            </div>
        </div>

    </div>
    <!-- Thêm Bootstrap JS và các thư viện phụ thuộc -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>