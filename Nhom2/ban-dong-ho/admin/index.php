<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
// require_once './controllers/AdminSanPhamController.php';

require_once './models/AdminDanhMuc.php';
// require_once './models/AdminSanPham.php';

// Route
$act = $_GET['act'] ?? '/';

// Để đảm bảo chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {   
     'danh-muc' =>(new AdminDanhMucController()) ->danhSachDanhMuc(),
     'form-them-danh-muc' =>(new AdminDanhMucController()) ->formAddDanhMuc(),
     'them-danh-muc' =>(new AdminDanhMucController()) ->postAddDanhMuc(),
     'form-sua-danh-muc' =>(new AdminDanhMucController()) ->formEditDanhMuc(),
     'sua-danh-muc' =>(new AdminDanhMucController()) ->postEditDanhMuc(),
     'xoa-danh-muc' =>(new AdminDanhMucController()) ->deleteDanhMuc(),
};