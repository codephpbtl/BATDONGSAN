<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
* {
    list-style: none;
    padding: 0;
    margin: 0;
}

li,
ol,
ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.favorite-btn {
    background-color: transparent;
    color: #ff6b6b;
    border: none;
}

.favorite-btn:hover {
    color: #ff4757;
}

.favorite-btn.active {
    color: #ff4757;
}

.post-sort a,
.location-city a,
.list-links a {
    color: black;
    text-decoration: none;
}

.location-city a:hover,
.list-links a:hover {
    color: #ff6666;
}


.location-bg img {
    width: 100%;
    height: auto;
    display: block;
}

.location-city {
    flex-basis: calc(22.222% - 20px);
    margin: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.location-city:hover {
    transform: translateY(-5px);
}

.location-item {
    display: block;
    color: white;
    text-decoration: none;
}

.location-cat {
    box-sizing: border-box;
    text-align: center;
}

.location-name {
    font-weight: bold;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }

    .location-city {
        flex-basis: 100%;
        margin: 10px 0;
    }
}

.section-sublink {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 10px;
    margin: 10px;
    background: whitesmoke;
}
.image-search-container {
    position: relative;
    width: 100%; /* You can set this to the width of your choice */
}
.image-search-container img {
    width: 100%;
    height: auto;
    display: block; /* Removes bottom space/line */
}
.search-bar {
    position: absolute;
    bottom: 0; /* Position at the bottom of the image container */
    left: 0;
    right: 0;
    padding: 10px; /* Add some padding inside the search bar */
    background: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
}
/* chọn thành phố */
.popup {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.popup-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    width: 30%;
    border: 1px solid #888;
}

/* Nút đóng */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>



<section>

    <div class="container">
        <div class="image-search-container">
            <img src="../assets/images/banner.jpg" alt="Warehouse">
            <div class="search-bar">
                <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Tìm kiếm">
                    <div class="input-group-append">
                        <button class="btn btn-primary search-button" type="button">Tìm kiếm</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<section>
    <div class="container ">
        <button id="openPopup">Chọn thành phố<i class="bi bi-chevron-right"></i></button>
        <div id="filterPopup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2>Bộ Lọc</h2>
            </div>
        </div>

    </div>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="page-section welcome">
            <h1 class="page-h1" style="text-align:center;">Tìm kiếm chỗ thuê ưng ý</h1>
            <p class="page-description">Kênh thông tin Phòng trọ số 1 Việt Nam - Website đăng tin cho thuê phòng
                trọ,
                nhà nguyên căn, căn hộ, ở ghép nhanh, hiệu quả với 100.000+ tin đăng và 2.500.000 lượt xem mỗi
                tháng.
            </p>
        </div>
        <div class="location-city">
            <a class="location-item city-1" href="app.php" title="Phòng trọ Hồ Chí Minh">
                <div class="location-bg">
                    <img src="../assets/images/location_hcm.jpg" alt="Hồ Chí Minh">
                </div>
                <span class="location-cat">Phòng trọ <span class="location-name">Hồ Chí Minh</span></span>
            </a>
        </div>
        <div class="location-city">
            <a class="location-item city-2" href="#" title="Phòng trọ Hà Nội">
                <div class="location-bg">
                    <img src="../assets/images/location_hn.jpg" alt="Hà Nội">
                </div>
                <span class="location-cat">Phòng trọ <span class="location-name">Hà Nội</span></span>
            </a>
        </div>
        <div class="location-city">
            <a class="location-item city-3" href="#" title="Phòng trọ Đà Nẵng">
                <div class="location-bg">
                    <img src="../assets/images/location_hn.jpg" alt="Đà Nẵng">
                </div>
                <span class="location-cat">Phòng trọ <span class="location-name">Đà Nẵng</span></span>
            </a>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row clearfix">
        <div class="col-8 col-left ">
            <div class="row section-header">
                <span class="section-title">Tổng 119.639 kết quả</span>
            </div>
            <div class="row">
                <div class="post-sort">
                    <span>Sắp xếp: </span>
                    <a class="active" href="">Mặc định</a>
                    <a class="" href="">Mới nhất</a>
                    <a class="" href="">Có video</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 post-item">
                    <div class="container mt-5">
                        <div class="row mb-4">
                            <div class="col-md-4 position-relative">
                                <img src="../assets/images/location_hn.jpg" alt="Listing" class="img-fluid">

                            </div>
                            <div class="col-md-8">
                                <h5>CHO THUÊ PHÒNG TRỌ MỚI CHÍNH CHỦ, GIẢM GIÁ, QUẬN TÂN PHÚ - GẦN BÊN TRƯỜNG…
                                </h5>
                                <div>
                                    <span class="badge badge-primary">Hot</span>
                                    <span class="ml-2">3 triệu/tháng</span>
                                    <span class="ml-2">30m<sup>2</sup></span>
                                    <span class="ml-2">Quận Tân Phú, Hồ Chí Minh</span>
                                </div>
                                <div class="text-title">
                                    PHÒNG TRỌ 24 SƠN KỲ TÂN PHÚ, GẦN ĐH CÔNG NGHỆ THỰC PHẨM- Cách trường Đại Học
                                    Công nghệ Thực Phẩm 700m, cách AeOnMall Tân Phú 500m, Gần eTown, PanDoRa…
                                </div>
                                <button class="btn btn-primary">Liên hệ</button>
                                <button class="btn btn-secondary">Chi tiết</button>
                                <button class="btn position-absolute favorite-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 post-item">
                    <div class="container mt-5">
                        <div class="row mb-4">
                            <div class="col-md-4 position-relative">
                                <img src="../assets/images/location_hn.jpg" alt="Listing" class="img-fluid">

                            </div>
                            <div class="col-md-8">
                                <h5>CHO THUÊ PHÒNG TRỌ MỚI CHÍNH CHỦ, GIẢM GIÁ, QUẬN TÂN PHÚ - GẦN BÊN TRƯỜNG…
                                </h5>
                                <div>
                                    <span class="badge badge-primary">Hot</span>
                                    <span class="ml-2">3 triệu/tháng</span>
                                    <span class="ml-2">30m<sup>2</sup></span>
                                    <span class="ml-2">Quận Tân Phú, Hồ Chí Minh</span>
                                </div>
                                <div class="text-title">
                                    PHÒNG TRỌ 24 SƠN KỲ TÂN PHÚ, GẦN ĐH CÔNG NGHỆ THỰC PHẨM- Cách trường Đại Học
                                    Công nghệ Thực Phẩm 700m, cách AeOnMall Tân Phú 500m, Gần eTown, PanDoRa…
                                </div>
                                <button class="btn btn-primary">Liên hệ</button>
                                <button class="btn btn-secondary">Chi tiết</button>
                                <button class="btn position-absolute favorite-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 post-item">
                    <div class="container mt-5">
                        <div class="row mb-4">
                            <div class="col-md-4 position-relative">
                                <img src="../assets/images/location_hn.jpg" alt="Listing" class="img-fluid">

                            </div>
                            <div class="col-md-8">
                                <h5>CHO THUÊ PHÒNG TRỌ MỚI CHÍNH CHỦ, GIẢM GIÁ, QUẬN TÂN PHÚ - GẦN BÊN TRƯỜNG…
                                </h5>
                                <div>
                                    <span class="badge badge-primary">Hot</span>
                                    <span class="ml-2">3 triệu/tháng</span>
                                    <span class="ml-2">30m<sup>2</sup></span>
                                    <span class="ml-2">Quận Tân Phú, Hồ Chí Minh</span>
                                </div>
                                <div class="text-title">
                                    PHÒNG TRỌ 24 SƠN KỲ TÂN PHÚ, GẦN ĐH CÔNG NGHỆ THỰC PHẨM- Cách trường Đại Học
                                    Công nghệ Thực Phẩm 700m, cách AeOnMall Tân Phú 500m, Gần eTown, PanDoRa…
                                </div>
                                <button class="btn btn-primary">Liên hệ</button>
                                <button class="btn btn-secondary">Chi tiết</button>
                                <button class="btn position-absolute favorite-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 post-item">
                    <div class="container mt-5">
                        <div class="row mb-4">
                            <div class="col-md-4 position-relative">
                                <img src="../assets/images/location_hn.jpg" alt="Listing" class="img-fluid">

                            </div>
                            <div class="col-md-8">
                                <h5>CHO THUÊ PHÒNG TRỌ MỚI CHÍNH CHỦ, GIẢM GIÁ, QUẬN TÂN PHÚ - GẦN BÊN TRƯỜNG…
                                </h5>
                                <div>
                                    <span class="badge badge-primary">Hot</span>
                                    <span class="ml-2">3 triệu/tháng</span>
                                    <span class="ml-2">30m<sup>2</sup></span>
                                    <span class="ml-2">Quận Tân Phú, Hồ Chí Minh</span>
                                </div>
                                <div class="text-title">
                                    PHÒNG TRỌ 24 SƠN KỲ TÂN PHÚ, GẦN ĐH CÔNG NGHỆ THỰC PHẨM- Cách trường Đại Học
                                    Công nghệ Thực Phẩm 700m, cách AeOnMall Tân Phú 500m, Gần eTown, PanDoRa…
                                </div>
                                <button class="btn btn-primary">Liên hệ</button>
                                <button class="btn btn-secondary">Chi tiết</button>
                                <button class="btn position-absolute favorite-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 col-left section-container">
            <section class=" section-sublink ">
                <div class="section-header"><span class="section-title">Xem theo giá</span></div>
                <ul class=" row list-links price clearfix">
                    <li class="col-6"><a href="">Dưới 1 triệu</a></li>
                    <li class="col-6"><a href="">Từ 1 - 2 triệu</a></li>
                    <li class="col-6"> <a href="">Từ 2 - 3 triệu</a></li>
                    <li class="col-6"><a href="">Từ 3 - 5 triệu</a></li>
                    <li class="col-6"><a href="">Từ 5 - 7 triệu</a></li>
                    <li class="col-6"><a href="">Từ 7 - 10 triệu</a></li>
                    <li class="col-6"><a href="">Từ 10 - 15 triệu</a></li>
                    <li class="col-6"><a href="">Trên 15 triệu</a></li>
                </ul>
            </section>
            <section class=" section-sublink">
                <div class="section-header"><span class="section-title">Xem theo giá</span></div>
                <ul class=" row list-links acreage clearfix">
                    <li class="col-6"><a href="">Dưới 20 m<sup>2</sup></a></li>
                    <li class="col-6"><a href="">Từ 20 - 30m<sup>2</sup></a></li>
                    <li class="col-6"><a href="">Từ 30 - 40m<sup>2</sup></a></li>
                    <li class="col-6"><a href="">Từ 40 - 50m<sup>2</sup></a></li>
                    <li class="col-6"><a href="">Từ 50 - 60m<sup>2</sup></a></li>
                    <li class="col-6"><a href="">Trên 60m<sup>2</sup></a></li>
                </ul>
            </section>
            <section class=" section-sublink">
                <div class="section-header"><span class="section-title">Xem theo giá</span></div>
                <ul class=" row list-links aside clearfix">
                    <li class="post-item clearfix normal">
                        <a href="">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../assets/images/logo-icon.png" alt="">
                                </div>
                                <div class="col-10">
                                    <div class="post-title"> CHO THUÊ PHÒNG TRỌ QUẬN PHÚ NHUẬN </div>
                                    <div class="row">
                                        <div class="col-6 post-price">
                                            1.6 triệu/tháng
                                        </div>
                                        <div class="col-6 post-time"> 5 phút trước</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="post-item clearfix normal">
                        <a href="">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../assets/images/logo-icon.png" alt="">
                                </div>
                                <div class="col-10">
                                    <div class="post-title"> CHO THUÊ PHÒNG TRỌ QUẬN PHÚ NHUẬN </div>
                                    <div class="row">
                                        <div class="col-6 post-price">
                                            1.6 triệu/tháng
                                        </div>
                                        <div class="col-6 post-time"> 5 phút trước</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="post-item clearfix normal">
                        <a href="">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../assets/images/logo-icon.png" alt="">
                                </div>
                                <div class="col-10">
                                    <div class="post-title"> CHO THUÊ PHÒNG TRỌ QUẬN PHÚ NHUẬN </div>
                                    <div class="row">
                                        <div class="col-6 post-price">
                                            1.6 triệu/tháng
                                        </div>
                                        <div class="col-6 post-time"> 5 phút trước</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="post-item clearfix normal">
                        <a href="">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../assets/images/logo-icon.png" alt="">
                                </div>
                                <div class="col-10">
                                    <div class="post-title"> CHO THUÊ PHÒNG TRỌ QUẬN PHÚ NHUẬN </div>
                                    <div class="row">
                                        <div class="col-6 post-price">
                                            1.6 triệu/tháng
                                        </div>
                                        <div class="col-6 post-time"> 5 phút trước</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>

            <section>
                <div class="section-header"><span class="section-title">Bài viết mới</span></div>
                <ul class="list-links clearfix">
                    <li><a rel="nofollow" href="" title="Thủ tục thuê phòng trọ chính xác dành cho người nước ngoài">Thủ
                            tục cho thuê
                            kho bãi</a></li>
                </ul>
            </section>
        </div>
    </div>
</div>
</section>
<script>
// Tim
$(document).ready(function() {
    $('.favorite-btn').click(function() {
        $(this).toggleClass('active');
    });
});
// chọn thành phố 
var popup = document.getElementById("filterPopup");
var btn = document.getElementById("openPopup");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    popup.style.display = "block";
}

span.onclick = function() {
    popup.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
</script>