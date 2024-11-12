<?php

class AdminDanhMuc{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDanhMuc(){
        try {
           $sql = 'SELECT * FROM danhmuc';
           $stmt = $this->conn->prepare($sql);
           $stmt->execute();
           return $stmt->fetchAll();
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }

    public function insertDanhMuc($tendanhmuc, $mota){
        try {
           $sql = 'INSERT INTO danhmuc (tendanhmuc, mota)
                    VALUE   (:tendanhmuc, :mota)';

           $stmt = $this->conn->prepare($sql);
           $stmt->execute([
            ':tendanhmuc' => $tendanhmuc,
            ':mota' => $mota

           ]);
           return true;
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }

    public function getDetailDanhMuc($id){
        try {
           $sql = 'SELECT * FROM danhmuc WHERE id = :id';

           $stmt = $this->conn->prepare($sql);
           $stmt->execute([
            ':id' => $id,
           ]);
           return $stmt->fetch();
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }

    public function updateDanhMuc($id, $tendanhmuc, $mota){
        try {
           $sql = 'UPDATE danhmuc SET tendanhmuc = :tendanhmuc, mota= :mota  WHERE id = :id';

           $stmt = $this->conn->prepare($sql);
           $stmt->execute([
            ':tendanhmuc' => $tendanhmuc,
            ':mota' => $mota,
            ':id' => $id

           ]);
           return true;
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }


    public function destroyDanhMuc($id){
        try {
           $sql = 'DELETE FROM danhmuc WHERE id = :id';

           $stmt = $this->conn->prepare($sql);
           $stmt->execute([
            ':id' => $id
           ]);
           return true;
        } catch (Exception $e) {
           echo "loi". $e->getMessage();
        }
    }
}