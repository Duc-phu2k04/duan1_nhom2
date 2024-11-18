<?php if (!empty($users)): ?> <!-- Kiểm tra nếu có người dùng -->
    <div class="container mt-5">
        <h3>Danh sách người dùng</h3>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td>
                            <!-- Nút sửa người dùng -->
                            <a href="index.php?act=edit_user&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Sửa</a> 
                            <!-- Nút xóa người dùng -->
                            <a href="index.php?act=delete_user&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="container mt-5">
        <div class="alert alert-warning" role="alert">
            Không có người dùng nào trong hệ thống.
        </div>
    </div>
<?php endif; ?>
