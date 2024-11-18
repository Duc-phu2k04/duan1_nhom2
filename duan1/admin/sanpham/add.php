<?php
// File: sanpham/add.php
?>

<!-- HTML Form để nhập dữ liệu sản phẩm -->
<div class="container">
    <h2>Thêm Sản Phẩm</h2>
    <?php if (isset($thongbao)) echo "<p>$thongbao</p>"; ?>
    <form method="POST" action="index.php?act=addsp"> <!-- Gửi đến act=addsp -->
        <div class="form-group">
            <label for="name">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="img">Đường Dẫn Hình Ảnh:</label>
            <input type="text" class="form-control" id="img" name="img" required>
        </div>
        <div class="form-group">
            <label for="mota">Mô Tả:</label>
            <textarea class="form-control" id="mota" name="mota" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="themmoi">Thêm Mới</button>
    </form>
</div>
