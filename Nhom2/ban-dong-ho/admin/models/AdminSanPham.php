<?php

class AdminSanPham{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham(){
        try {
           $sql = 'SELECT sanpham.*, danhmuc.tendanhmuc
           FROM sanpham
           INNER JOIN danhmuc ON sanpham.category_id = danhmuc.id     
           ';
           $stmt = $this->conn->prepare($sql);

           $stmt->execute();
           return $stmt->fetchAll();
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }

    public function insertSanPham($name,$gia, $soluong,$mau,$kichco,$chatlieu,$ngaynhap,$category_id,$trangthai,$mota,$anh){
        try {
           $sql = 'INSERT INTO sanpham (name,gia,soluong,mau,kichco,chatlieu,ngaynhap,category_id,trangthai,mota,anh)
                    VALUE   (:name, :gia, :soluong, :mau, :kichco, :chatlieu, :ngaynhap, :category_id, :trangthai, :mota, :anh)';

           $stmt = $this->conn->prepare($sql);
           $stmt->execute([
            ':name' => $name,
            ':gia' => $gia,
            ':soluong' => $soluong,
            ':mau' => $mau,
            ':kichco' => $kichco,
            ':chatlieu' => $chatlieu,
            ':ngaynhap' => $ngaynhap,
            ':category_id' => $category_id,
            ':trangthai' => $trangthai,
            ':mota' => $mota,
            ':anh' => $anh,

           ]);
           return true;
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }

    public function updateSanPham($name, $gia, $soluong, $mau, $kichco, $chatlieu, $ngaynhap, $category_id, $trangthai, $mota, $anh){
    try {
        $sql = 'UPDATE sanpham (name,gia,soluong,mau,kichco,chatlieu,ngaynhap,category_id,trangthai,mota,anh)
        SET name = :name,
            gia = :gia,
            soluong = :soluong,
            mau = :mau,
            kichco = :kichco,
            chatlieu = :chatlieu,
            ngaynhap = :ngaynhap,
            category = :category,
            trangthai = :trangthai,
            mota = :mota,
            anh = :anh,
            WHERE id = :id';
       
    } catch (\Throwable $th) {
        //throw $th;
    }
    }
}