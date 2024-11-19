<?php
// Gọi file kết nối cơ sở dữ liệu
require_once '../models/pdo.php'; // Đảm bảo đã kết nối thành công

// Kiểm tra xem id có được truyền vào URL không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn chi tiết sản phẩm từ cơ sở dữ liệu theo id
    $sql = "SELECT id, name, anh, soluong, gia, mau, mauma, kichco, chatlieu, mota FROM sanpham WHERE id = ?";
    try {
        // Thực hiện truy vấn và lấy sản phẩm
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $product = $stmt->fetch();
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        $thongbao = "Lỗi khi lấy thông tin sản phẩm: " . $e->getMessage();
    }

    // Kiểm tra xem có sản phẩm hay không
    if (!$product) {
        $thongbao = "Sản phẩm không tồn tại.";
    }
} else {
    $thongbao = "ID sản phẩm không hợp lệ.";
}

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />';

echo '<div class="container-fluid">';

// **Header**
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Shop Name</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Giỏ hàng</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Đăng nhập</a></li>
      </ul>
    </div>
  </div>
</nav>';

// **Main content**
echo '<div class="container">';
if (isset($thongbao)) {
    echo "<p class='text-danger text-center'>$thongbao</p>";
} else {
    // **Chi tiết sản phẩm**
    echo "<div class='row align-items-center'>";  // Dùng align-items-center để căn giữa các phần tử trong row

    // **Ảnh sản phẩm**
    echo "<div class='col-md-6'>";
    echo "<div class='card shadow-sm border-light'>";
    // Thêm lớp 'img-fluid' và giới hạn chiều rộng bằng 'w-75' (chiều rộng 75% của cột)
    echo "<img src='" . htmlspecialchars($product['anh']) . "' alt='" . htmlspecialchars($product['name']) . "' class='img-fluid w-75 rounded mx-auto d-block' />";
    echo "</div>";
    echo "</div>";  // Đóng thẻ col-md-6 cho ảnh sản phẩm

    // **Thông tin sản phẩm**
    echo "<div class='col-md-6'>";
    echo "<h2>" . htmlspecialchars($product['name']) . "</h2>";
    echo "<p><strong>Giá: </strong><span class='text-danger'>" . number_format($product['gia'], 0, ',', '.') . " VND</span></p>";
    echo "<p><strong>Màu sắc: </strong>" . htmlspecialchars($product['mau']) . "</p>";
    echo "<p><strong>Kích cỡ: </strong>" . htmlspecialchars($product['kichco']) . "</p>";
    echo "<p><strong>Chất liệu: </strong>" . htmlspecialchars($product['chatlieu']) . "</p>";
    echo "<p><strong>Số lượng còn lại: </strong>" . htmlspecialchars($product['soluong']) . "</p>";

    // **Mô tả sản phẩm**
    echo "<h5 class='mt-4'>Mô tả sản phẩm</h5>";
    echo "<p>" . nl2br(htmlspecialchars($product['mota'])) . "</p>";

    // **Nút thêm vào giỏ hàng**
    echo "<form action='add_to_cart.php' method='POST'>
            <input type='hidden' name='id' value='" . $product['id'] . "'>
            <button type='submit' class='btn btn-primary btn-lg mt-3'>Thêm vào giỏ hàng</button>
          </form>";
    echo "</div>";  // Đóng thẻ col-md-6 cho thông tin sản phẩm

    echo "</div>";  // Đóng thẻ row
}

echo '</div>'; // Đóng thẻ container

// **Footer**
echo '<footer class="bg-light py-4 mt-5">
  <div class="container text-center">
    <p>&copy; 2024 Shop Name. Tất cả quyền được bảo vệ.</p>
    <ul class="list-unstyled">
      <li><a href="#">Điều khoản dịch vụ</a></li>
      <li><a href="#">Chính sách bảo mật</a></li>
      <li><a href="#">Liên hệ</a></li>
    </ul>
  </div>
</footer>';

echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>';
echo '</div>';
?>
