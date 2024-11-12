<?php

class HomeController
{

    public $modelSanPham;

    public function __construct()
    {
       $this->modelSanPham = new SanPham();
    }
    public function home(){
        echo "Day la home";
    }
    public function trangChu(){
        echo "Day la trang chu cua toi";
    }
    public function danhSachSanPham(){
        // echo "Đây là danh sách sản phẩm";
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);die();
        require_once './views/listProduct.php';
        // var_dump("abc");
    }
}