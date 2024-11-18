<?php
include_once "../model/pdo.php"; // Kết nối tới cơ sở dữ liệu
include "header.php"; // Bao gồm header của trang

// Controller Logic
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            // Kiểm tra nếu form được gửi và xử lý dữ liệu
            if (isset($_POST['themmoi'])) {
                // Nhận giá trị từ form
                $tenloai = $_POST['tenloai'];
                $description = isset($_POST['description']) ? $_POST['description'] : '';

                // Câu lệnh INSERT để thêm danh mục vào cơ sở dữ liệu
                $sql = "INSERT INTO categories (category_name, description, created_at, updated_at) 
                        VALUES (:category_name, :description, NOW(), NOW())";

                try {
                    // Thực thi câu lệnh
                    pdo_execute($sql, [':category_name' => $tenloai, ':description' => $description]);
                    echo "<script>alert('Danh mục đã được thêm thành công!'); window.location = 'index.php?act=adddm';</script>";
                } catch (Exception $e) {
                    echo "Lỗi: " . $e->getMessage();
                }
            }
            // Bao gồm form thêm danh mục
            include "danhmuc/add.php";
            break;

        case 'listdm': // Hiển thị danh sách danh mục
            // Lấy danh sách danh mục từ cơ sở dữ liệu
            $sql = "SELECT * FROM categories";
            try {
                $categories = pdo_query($sql); // Lấy tất cả danh mục
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
                $categories = []; // Nếu có lỗi, gán mảng rỗng cho categories để tránh lỗi khi lặp
            }

            // Bao gồm file danh sách danh mục
            include "danhmuc/list.php";
            break;

        case 'editdm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];  // Lấy id danh mục từ URL

                // Lấy thông tin danh mục từ CSDL
                $sql = "SELECT * FROM categories WHERE id = :id";
                try {
                    $category = pdo_query_one($sql, [':id' => $id]); // Truy vấn thông tin danh mục
                } catch (Exception $e) {
                    echo "Lỗi: " . $e->getMessage();
                }

                // Nếu form được gửi, thực hiện cập nhật
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $tenloai = $_POST['tenloai'];
                    $description = isset($_POST['description']) ? $_POST['description'] : '';

                    // Cập nhật danh mục
                    $sql = "UPDATE categories SET category_name = :category_name, description = :description WHERE id = :id";
                    try {
                        pdo_execute($sql, [':category_name' => $tenloai, ':description' => $description, ':id' => $id]);
                        header("Location: index.php?act=listdm"); // Quay lại trang danh sách danh mục
                        exit;
                    } catch (Exception $e) {
                        echo "Lỗi: " . $e->getMessage();
                    }
                }

                // Bao gồm trang sửa danh mục
                include "danhmuc/edit.php";
            }
            break;

            // Xử lý xóa danh mục
        case 'deletedm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM categories WHERE id = :id";
                try {
                    pdo_execute($sql, [':id' => $id]);
                    echo "<script>alert('Xóa danh mục thành công'); window.location = 'index.php?act=listdm';</script>";
                } catch (PDOException $e) {
                    echo "<script>alert('Lỗi: " . $e->getMessage() . "');</script>";
                }
            }
            break;
        case 'listdh':
            // Lấy danh sách đơn hàng từ cơ sở dữ liệu
            $sql = "SELECT * FROM orders";
            try {
                $orders = pdo_query($sql); // Lấy tất cả đơn hàng
                if (!$orders) {
                    $orders = []; // Nếu không có đơn hàng nào, gán mảng rỗng
                }
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
                $orders = []; // Gán mảng rỗng nếu có lỗi
            }

            include "donhang/list.php";
            break;

        case 'add_order':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user_id = $_POST['user_id'];
                $order_date = $_POST['order_date'];
                $status = $_POST['status'];
                $total_amount = $_POST['total_amount'];
                $payment_method = $_POST['payment_method'];
                $shipping_address = $_POST['shipping_address'];

                // Câu lệnh INSERT để thêm đơn hàng vào cơ sở dữ liệu
                $sql = "INSERT INTO orders (user_id, order_date, status, total_amount, payment_method, shipping_address, created_at, updated_at) 
                            VALUES (:user_id, :order_date, :status, :total_amount, :payment_method, :shipping_address, NOW(), NOW())";

                try {
                    pdo_execute($sql, [
                        ':user_id' => $user_id,
                        ':order_date' => $order_date,
                        ':status' => $status,
                        ':total_amount' => $total_amount,
                        ':payment_method' => $payment_method,
                        ':shipping_address' => $shipping_address
                    ]);
                    echo "<script>alert('Đơn hàng đã được thêm thành công!'); window.location = 'index.php';</script>";
                } catch (Exception $e) {
                    echo "Lỗi: " . $e->getMessage();
                }
            }
            break;

            // Sửa đơn hàng
            case 'edit_order':  // Chỉnh sửa đơn hàng
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];  // Lấy id đơn hàng từ URL
            
                    // Lấy thông tin đơn hàng từ cơ sở dữ liệu
                    $sql = "SELECT * FROM orders WHERE id = :id";
                    try {
                        $order = pdo_query_one($sql, [':id' => $id]);
                        if (!$order) {
                            echo "Đơn hàng không tồn tại.";
                            exit;
                        }
                    } catch (Exception $e) {
                        echo "Lỗi: " . $e->getMessage();
                        exit;
                    }
            
                    // Nếu form được gửi, thực hiện cập nhật
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $status = $_POST['status'];
                        $payment_method = $_POST['payment_method'];
                        $shipping_address = $_POST['shipping_address'];
            
                        // Kiểm tra giá trị của status
                        $valid_statuses = ['Pending', 'Shipped', 'Delivered', 'Cancelled'];
                        if (!in_array($status, $valid_statuses)) {
                            echo "<script>alert('Trạng thái không hợp lệ!');</script>";
                            exit;
                        }
            
                        // Kiểm tra giá trị của payment_method
                        $valid_payment_methods = ['Credit Card', 'Paypal', 'Cash on Delivery', ''];
                        if (!in_array($payment_method, $valid_payment_methods)) {
                            echo "<script>alert('Phương thức thanh toán không hợp lệ!');</script>";
                            exit;
                        }
            
                        // Cập nhật thông tin đơn hàng trong cơ sở dữ liệu
                        $sql = "UPDATE orders 
                                SET status = :status, payment_method = :payment_method, shipping_address = :shipping_address, updated_at = NOW() 
                                WHERE id = :id";
                        try {
                            pdo_execute($sql, [
                                ':status' => $status,
                                ':payment_method' => $payment_method,
                                ':shipping_address' => $shipping_address,
                                ':id' => $id
                            ]);
                            echo "<script>alert('Đơn hàng đã được cập nhật!'); window.location = 'index.php?act=listdh';</script>";
                        } catch (Exception $e) {
                            echo "Lỗi: " . $e->getMessage();
                        }
                    }
            
                    // Bao gồm trang form chỉnh sửa đơn hàng
                    include "donhang/edit.php";
                }
                break;
            

            // Xóa đơn hàng
        case 'delete_order':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM orders WHERE id = :id";
                try {
                    pdo_execute($sql, [':id' => $id]);
                    echo "<script>alert('Đơn hàng đã được xóa thành công!'); window.location = 'index.php?act=listdh';</script>";
                } catch (Exception $e) {
                    echo "<script>alert('Lỗi: " . $e->getMessage() . "');</script>";
                }
            }
            break;

        case 'addsp':
            // Logic để xử lý thêm sản phẩm

            include "sanpham/add.php"; // Bao gồm trang thêm sản phẩm
            break;

        case 'list_user':
            // Lấy danh sách người dùng từ cơ sở dữ liệu
            $sql = "SELECT * FROM users";
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
                $sql = "SELECT * FROM users WHERE id = :id";
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
                        $sql = "UPDATE users SET email = :email, password_hash = :password WHERE id = :id";
                        pdo_execute($sql, [':email' => $email, ':password' => $password, ':id' => $id]);
                    } else {
                        // Nếu không nhập mật khẩu mới, chỉ cập nhật email
                        $sql = "UPDATE users SET email = :email WHERE id = :id";
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
                $sql = "DELETE FROM users WHERE id = :id";
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

include "footer.php"; // Bao gồm footer của trang
