<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
//đường dẫn vào đến phần client
define('BASE_URL'       , 'http://localhost/DU AN 1/Nhom2/ban-dong-ho/');
//Đường dẫn vào phần admin
define('BASE_URL_ADMIN'       , 'http://localhost/DU AN 1/Nhom2/ban-dong-ho/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duan1_nhom2');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
