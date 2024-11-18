<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Cửa Hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            width: 100%;
            height: 500px; 
            object-fit: cover; 
        }
    </style>
</head>
<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Cửa Hàng</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Đặt các phần tử bên trái -->
            <ul class="navbar-nav mr-auto">
                <!-- Thanh tìm kiếm -->
                <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>

                <!-- Menu danh mục -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Danh Mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Danh mục 1</a>
                        <a class="dropdown-item" href="#">Danh mục 2</a>
                        <a class="dropdown-item" href="#">Danh mục 3</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Khác</a>
                    </div>
                </li>

                <!-- Giỏ hàng -->
                <li class="nav-item">
                    <a class="nav-link" href="view/cart.php">Giỏ Hàng</a>
                </li>
            </ul>

            <!-- Phần đăng nhập và thông tin người dùng nằm phía bên phải -->
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <!-- Nếu người dùng đã đăng nhập -->
                    <?php if ($_SESSION['user']['vaitro'] == '1'): ?>
                        <!-- Nếu người dùng là admin, hiển thị nút Admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Admin</a>
                        </li>
                    <?php endif; ?>
                    
                    <!-- Hiển thị tên người dùng và nút Đăng xuất -->
                    <li class="nav-item">
                        <span class="nav-link">Xin chào, <?php echo $_SESSION['user']['ten']; ?></span>
                    </li>
                    <!-- Khi nhấn vào tên người dùng, chuyển đến trang thông tin khách hàng -->
                    <li class="nav-item">
                        <a class="nav-link" href="customer_info.php">Thông tin khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Đăng xuất</a>
                    </li>
                <?php else: ?>
                    <!-- Nếu người dùng chưa đăng nhập -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Đăng Nhập</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Nội dung trang chủ -->
    <div class="container mt-5">
        <h1 class="text-center">Chào mừng đến với Cửa Hàng của chúng tôi!</h1>
        
        <!-- Slideshow Banner -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://rolex.dafc.com.vn/rolex/wp-content/uploads/2024/06/rolex-new-watches-2024-dafc-banner-mobile.jpg" class="d-block w-100" alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Banner 1</h5>
                        <p>Mô tả ngắn cho banner 1.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://euluxury.vn/data/new/Gia_dong_ho_Rolex_nam_(14).jpg" class="d-block w-100" alt="Banner 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Banner 2</h5>
                        <p>Mô tả ngắn cho banner 2.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.bobswatches.com/rolex-blog/wp-content/uploads/2021/02/Rolex_Submariner_116610_5D3_4341-Edit-1.jpg" class="d-block w-100" alt="Banner 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Banner 3</h5>
                        <p>Mô tả ngắn cho banner 3.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <p class="text-center">Khám phá các sản phẩm nổi bật dưới đây:</p>

        <!-- Danh sách sản phẩm -->
        <div class="row">
            <!-- Thẻ sản phẩm 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Sản phẩm 1">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 1</h5>
                        <p class="card-text">Mô tả ngắn về sản phẩm.</p>
                        <a href="#" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <!-- Thẻ sản phẩm 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Sản phẩm 2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">Mô tả ngắn về sản phẩm.</p>
                        <a href="#" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <!-- Thẻ sản phẩm 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Sản phẩm 3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">Mô tả ngắn về sản phẩm.</p>
                        <a href="#" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://

