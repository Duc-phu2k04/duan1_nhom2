<div class="container mt-5">
    <h1 class="mb-4">Quản Lý Đơn Hàng</h1>

    <!-- Form tìm kiếm đơn hàng -->
    <form class="form-inline mb-3" method="GET" action="index.php">
        <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm đơn hàng" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <!-- Bảng danh sách đơn hàng -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Đơn Hàng</th>
                <th>Khách Hàng</th>
                <th>Ngày Đặt</th>
                <th>Trạng Thái</th>
                <th>Tổng Giá Trị</th>
                <th>Phương Thức Thanh Toán</th>
                <th>Địa Chỉ Giao Hàng</th>
                <th>Ngày Tạo</th>
                <th>Ngày Cập Nhật</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)) { ?>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td><?php echo number_format($order['total_amount']); ?> VND</td>
                        <td><?php echo $order['payment_method']; ?></td>
                        <td><?php echo $order['shipping_address']; ?></td>
                        <td><?php echo $order['created_at']; ?></td>
                        <td><?php echo $order['updated_at']; ?></td>
                        <td>
                            <a href="index.php?act=edit_order&id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="index.php?act=delete_order&id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="10" class="text-center">Không có đơn hàng nào.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

  
</div>
