<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
include_once "../commons/function.php";

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

if (isset($_GET['act'])) {
     $act = $_GET['act'];
     switch ($act) {
         
 
             case 'list_user':
                 // Lấy danh sách người dùng từ cơ sở dữ liệu
                 $sql = "SELECT * FROM nguoidung";
                 try {
                     // Gọi hàm pdo_query để lấy tất cả người dùng
                     $users = pdo_query($sql); // Lấy danh sách người dùng
                 } catch (Exception $e) {
                     echo "Lỗi: " . $e->getMessage();
                     $users = []; // Nếu có lỗi, gán mảng rỗng cho $users để tránh lỗi khi lặp
                 }
             
                 // Bao gồm file danh sách người dùng
                 include "users/list.php"; 
                 break;
             
 
                 case 'edit_user':
                     if (isset($_GET['id'])) {
                         $id = $_GET['id'];  // Lấy id người dùng từ URL
                 
                         // Lấy thông tin người dùng từ CSDL
                         $sql = "SELECT * FROM nguoidung WHERE id = :id";
                         try {
                             $user = pdo_query_one($sql, [':id' => $id]); // Truy vấn thông tin người dùng
                         } catch (Exception $e) {
                             echo "Lỗi: " . $e->getMessage();
                         }
                 
                         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                             $email = $_POST['email'];
                             $password = $_POST['password'];  // Mật khẩu (không mã hóa khi sửa)
                 
                             // Nếu có nhập mật khẩu mới, cập nhật mật khẩu
                             if (!empty($password)) {
                                 // Nếu mật khẩu mới được nhập, không mã hóa, chỉ lưu mật khẩu thuần túy
                                 $sql = "UPDATE nguoidung SET email = :email, password = :password WHERE id = :id";
                                 pdo_execute($sql, [':email' => $email, ':password' => $password, ':id' => $id]);
                             } else {
                                 // Nếu không nhập mật khẩu mới, chỉ cập nhật email
                                 $sql = "UPDATE nguoidung SET email = :email WHERE id = :id";
                                 pdo_execute($sql, [':email' => $email, ':id' => $id]);
                             }
                 
                             header("Location: index.php?act=list_user"); // Quay lại danh sách người dùng
                             exit;
                         }
                 
                         include "users/edit.php"; // Bao gồm giao diện sửa
                     }
                     break;
                 
                 
                 
             
         case 'delete_user':
             if (isset($_GET['id'])) {
                 $id = $_GET['id'];
                 $sql = "DELETE FROM nguoidung WHERE id = :id";
                 try {
                     pdo_execute($sql, [':id' => $id]);
                     echo "<script>alert('Xóa người dùng thành công'); window.location = 'index.php?act=list_user';</script>";
                 } catch (PDOException $e) {
                     echo "<script>alert('Lỗi: " . $e->getMessage() . "');</script>";
                 }
             }
             break;
 
         default:
             include "home.php"; // Trang mặc định
             break;
     }
 } else {
     include "home.php"; // Trang mặc định
 }
