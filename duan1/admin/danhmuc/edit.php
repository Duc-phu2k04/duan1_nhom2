<!-- edit.php -->
<div class="container mt-5">
    <h2>Sửa Danh Mục</h2>
    <form action="index.php?act=editdm&id=<?php echo $category['id']; ?>" method="post">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" class="form-control" name="tenloai" value="<?php echo $category['category_name']; ?>" required>
        </div>

        <!-- Thêm trường Mô Tả -->
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description"><?php echo $category['description']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php?act=adddm" class="btn btn-info">Quay lại</a>
    </form>
</div>
