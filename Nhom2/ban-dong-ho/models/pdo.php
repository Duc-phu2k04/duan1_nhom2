<?php
// Cấu hình kết nối cơ sở dữ liệu
$host = '127.0.0.1';      // Địa chỉ máy chủ cơ sở dữ liệu
$db = 'duan1_nhom2';      // Tên cơ sở dữ liệu
$user = 'root';           // Tên người dùng
$pass = '';               // Mật khẩu

// Tạo DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

// Các tùy chọn cho PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Cài đặt chế độ lỗi
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // Lấy dữ liệu dưới dạng mảng kết hợp
    PDO::ATTR_EMULATE_PREPARES   => false,                    // Tắt chuẩn bị giả
];

// Kết nối đến cơ sở dữ liệu
try {
    // Tạo đối tượng PDO để kết nối với cơ sở dữ liệu
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Kết nối thành công!";
} catch (PDOException $e) {
    // Xử lý lỗi nếu kết nối thất bại
    die("Kết nối thất bại: " . $e->getMessage());
}
?>
