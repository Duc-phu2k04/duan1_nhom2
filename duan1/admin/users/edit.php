<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa thông tin người dùng</h1>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu mới (nếu muốn thay đổi):</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu mới"><br>
                <small class="form-text text-muted">Nếu không thay đổi mật khẩu, để trống trường này.</small>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>
