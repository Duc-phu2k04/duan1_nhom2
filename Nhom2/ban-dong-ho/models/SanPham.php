<?php
class SanPham{
    public $conn; //khai bao phuong thuc

    public function __construct()
    {
      $this->conn = connectDB();
    }
    //viết hàm lấy toàn bộ danh sách sản phẩm
    public function getAllProduct(){
      try {
        $sql = 'SELECT * FROM sanpham';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
      } catch (Exception $e) {
        echo "loi" .$e->getMessage();
      
      }
    }
}