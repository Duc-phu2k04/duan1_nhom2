<?php
class AdminDanhMucController{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){
        // echo "day la trang danh muc";
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc(){
       //hàm này đùng để hiển thị form nhập
       require_once './views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc(){
        //hàm này đùng để xử lý thêm dữ liệu
        // var_dump($_POST);
        //Kiểm tra xem dữ liệu có phải được submit lên không
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //lấy dữ liệu
    $tendanhmuc = $_POST['tendanhmuc'];
    $mota = $_POST['mota'];

    //taọ 1 mảng trống để chứa dữ liệu
    $errors = [];
    if(empty($tendanhmuc)){
        $errors['tendanhmuc'] = 'Tên danh mục không được để trống';
    }

    
    if(empty($errors)){
//nếu không có lỗi thì tiến hành thêm danh mục
var_dump('oke');
$this->modelDanhMuc->insertDanhMuc($tendanhmuc, $mota);
header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
exit();
    }else{
        //trả về form và lỗi
        require_once './views/danhmuc/addDanhMuc.php';
    }
}
    }
    
    public function formEditDanhMuc(){
        //hàm này đùng để hiển thị form nhập
        //lấy ra thông tin của danh mục cần sửa
        $id = $_GET['id_danhmuc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        // var_dump($danhMuc);
        // die();
        if($danhMuc){
            require_once './views/danhmuc/editDanhMuc.php';
        }else{
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
            //không có id trong danh mục thì trở về trang quản lý danh mục
        }
       
     }
     public function postEditDanhMuc(){
         //hàm này đùng để xử lý thêm dữ liệu
         // var_dump($_POST);
         //Kiểm tra xem dữ liệu có phải được submit lên không
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     //lấy dữ liệu
     $id = $_POST['id'];
     $tendanhmuc = $_POST['tendanhmuc'];
     $mota = $_POST['mota'];
 
     //taọ 1 mảng trống để chứa dữ liệu
     $errors = [];
     if(empty($tendanhmuc)){
         $errors['tendanhmuc'] = 'Tên danh mục không được để trống';
     }
 
     
     if(empty($errors)){
 //nếu không có lỗi thì tiến hành sửa danh mục
//  var_dump('oke');
 $this->modelDanhMuc->updateDanhMuc($id,$tendanhmuc, $mota);
 header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
 exit();
     }else{
         //trả về form và lỗi
         $danhMuc = ['id' => $id, 'tendanhmuc' => $tendanhmuc, 'mota' => $mota];
         require_once './views/danhmuc/editDanhMuc.php';
     }
 }
     }

     public function deleteDanhMuc(){
        $id = $_GET['id_danhmuc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if($danhMuc){
$this->modelDanhMuc->destroyDanhMuc($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
 exit();
     }
     
}