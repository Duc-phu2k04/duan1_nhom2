<?php
// Lấy danh sách sản phẩm từ cơ sở dữ liệu
$sql = "SELECT id, product_name, price, img, description FROM products";
try {
    // Thực hiện truy vấn và lấy tất cả sản phẩm
    $products = pdo_query($sql);
} catch (PDOException $e) {
    // Xử lý lỗi nếu có
    $thongbao = "Lỗi khi lấy danh sách sản phẩm: " . $e->getMessage();
}

// Kiểm tra xem có sản phẩm nào để hiển thị không
if (!empty($products)) {
    echo "<div class='container my-4'>";
    echo "<h2 class='text-center'>Danh Sách Sản Phẩm</h2>";
    echo "<div class='row'>"; // Mở thẻ div cho hàng sản phẩm

    foreach ($products as $product) {
        echo "<div class='col-md-3 mb-4'>"; // Tối đa 4 sản phẩm trong một hàng
        echo "<div class='card'>";
        echo "<img src='" . htmlspecialchars($product['img']) . "' alt='" . htmlspecialchars($product['product_name']) . "' class='card-img-top' />";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($product['product_name']) . "</h5>";
        echo "<p class='card-text'>Giá: " . htmlspecialchars($product['price']) . " VND</p>";
        echo "<p class='card-text'>Mô tả: " . htmlspecialchars($product['description']) . "</p>";
        echo "</div>"; // Đóng thẻ card-body
        echo "</div>"; // Đóng thẻ card
        echo "</div>"; // Đóng thẻ col
    }

    echo "</div>"; // Đóng thẻ row
    echo "</div>"; // Đóng thẻ container
} else {
    echo "<p>Không có sản phẩm nào để hiển thị.</p>";
}

// Tùy chọn hiển thị thông báo lỗi nếu có
if (isset($thongbao)) {
    echo "<p class='text-danger text-center'>" . htmlspecialchars($thongbao) . "</p>";
}
?>
