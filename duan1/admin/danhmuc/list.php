<!-- list.php -->
<div class="container mt-5">
    <h2>Danh Sách Danh Mục</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Mô Tả</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td>
                        <!-- Nút sửa -->
                        <a href="index.php?act=editdm&id=<?php echo $category['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                        
                        <!-- Nút xóa -->
                        <a href="index.php?act=deletedm&id=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <a href="index.php?act=adddm" class="btn btn-primary">Thêm Danh Mục Mới</a>
        </tbody>
    </table>
</div>
