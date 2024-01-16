<!DOCTYPE html>
<html>
<head>
    <title>Form Hồ Sơ Cá Nhân và Thông Tin Hoá Đơn</title>
    <!-- Liên kết đến các tệp CSS của Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Hồ Sơ Cá Nhân</h2>
                <form>
                    <div class="form-group">
                        <label for="avatar">Ảnh đại diện:</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="full_name">Họ và tên:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </form>
                <h2 class="text-center mt-5 mb-4">Thông Tin Hoá Đơn</h2>
                <form>
                    <div class="form-group">
                        <label for="buyer_name">Tên người mua hàng:</label>
                        <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="invoice_email">Email nhân đơn:</label>
                        <input type="email" class="form-control" id="invoice_email" name="invoice_email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ nhân đơn:</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Liên kết đến các tệp JavaScript của Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
