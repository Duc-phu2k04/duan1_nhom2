<?php
// Thông tin kết nối cơ sở dữ liệu
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

if (!defined('DB_PORT')) {
    define('DB_PORT', '3306');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'duan1_nhom2');
}

if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

// Kết nối CSDL qua PDO
function connectDB() {
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
        // Cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch (PDOException $e) {
        echo ("Kết nối thất bại: " . $e->getMessage());
        return null; // Nếu kết nối thất bại, trả về null
    }
}
/**
 * Thực thi câu lệnh SQL thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql Câu lệnh SQL
 * @param array $params Mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException Lỗi thực thi câu lệnh
 */
function pdo_execute($sql, $params = []) {
    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params); // Truyền mảng tham số vào câu lệnh SQL
    } catch (PDOException $e) {
        throw new Exception("Lỗi thực thi câu lệnh: " . $e->getMessage());
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL truy vấn dữ liệu (SELECT)
 * @param string $sql Câu lệnh SQL
 * @param array $args Mảng giá trị cung cấp cho các tham số của $sql
 * @return array Mảng các bản ghi
 * @throws PDOException Lỗi thực thi câu lệnh
 */
function pdo_query($sql) {
    $sql_args = array_slice(func_get_args(), 1); // Lấy các tham số sau câu lệnh SQL
    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng các bản ghi
    } catch (PDOException $e) {
        throw new Exception("Lỗi thực thi câu lệnh truy vấn: " . $e->getMessage());
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL truy vấn một bản ghi
 * @param string $sql Câu lệnh SQL
 * @param array $args Mảng giá trị cung cấp cho các tham số của $sql
 * @return array Mảng chứa bản ghi
 * @throws PDOException Lỗi thực thi câu lệnh
 */
function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1); // Lấy các tham số sau câu lệnh SQL
    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về bản ghi đầu tiên
    } catch (PDOException $e) {
        throw new Exception("Lỗi thực thi câu lệnh truy vấn một bản ghi: " . $e->getMessage());
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL truy vấn một giá trị
 * @param string $sql Câu lệnh SQL
 * @param array $args Mảng giá trị cung cấp cho các tham số của $sql
 * @return mixed Giá trị
 * @throws PDOException Lỗi thực thi câu lệnh
 */
function pdo_query_value($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null; // Trả về giá trị đầu tiên hoặc null nếu không có kết quả
    } catch (PDOException $e) {
        throw new Exception("Lỗi thực thi câu lệnh truy vấn giá trị: " . $e->getMessage());
    } finally {
        unset($conn);
    }
}
?>
