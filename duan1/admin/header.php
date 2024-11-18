<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Bán Đồng Hồ Rolex</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Thêm Font Awesome cho icon -->
    <style>
        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .header-nav .logo {
            flex: 0 0 auto;
        }

        .header-nav .menu {
            flex: 1;
            text-align: center;
        }

        .header-nav .user-menu {
            flex: 0 0 auto;
        }

        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #ddd !important;
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="header-nav">
                <!-- Logo phần trái -->
                <div class="logo">
                    <img src="https://picsum.photos/50/50" alt="Logo"> <!-- Thay đổi đường dẫn logo -->
                </div>

                <!-- Menu chính phần giữa -->
                <div class="menu">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=adddm" class="nav-link">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=addsp" class="nav-link">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=listdh" class="nav-link">Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=list_user" class="nav-link">Danh sách người dùng</a>
                        </li>
                    </ul>
                </div>

                <!-- Menu người dùng phần phải -->
                <div class="user-menu">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="index.php?act=register" class="nav-link">Đăng Ký</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=login" class="nav-link">Đăng Nhập</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="banner">
        <img src="https://picsum.photos/1920/400" alt="Banner" class="img-fluid w-100"> <!-- Thay đổi đường dẫn banner -->
    </div>

    <!-- Thêm JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Phiên bản mới hơn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap bundle -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->

</body>
</html>
