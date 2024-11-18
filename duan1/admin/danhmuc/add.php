<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Thêm Danh Mục</h2>
        <form action="index.php?act=adddm" method="post">
            <div class="form-group">
                <label for="tenloai">Tên danh mục</label>
                <input type="text" class="form-control" name="tenloai" id="tenloai" required>
            </div>
            
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="themmoi">Thêm Mới</button>
            <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
        </form>
    </div>
</body>
</html>
