<?php
class AdminSanPhamController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
    }
    public function danhSachSanPham()
    {
        // echo "day la trang danh muc";
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        //hàm này đùng để hiển thị form nhập
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/addSanPham.php';
    }
    public function postAddSanPham()
    {
        //hàm này đùng để xử lý thêm dữ liệu
        // var_dump($_POST);
        //Kiểm tra xem dữ liệu có phải được submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy dữ liệu
            $name = $_POST['name'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $mau = $_POST['mau'];
            $kichco = $_POST['kichco'];
            $chatlieu = $_POST['chatlieu'];
            $ngaynhap = $_POST['ngaynhap'];
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;
            $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : null;
            
            $mota = $_POST['mota'];

            $anh = $_FILES['anh'];

            //lưu hình ảnh vào
            $file_thumb = uploadFile($anh, './uploads/');

            //mảng hình ảnh
            $img_array = $_FILES['img_array'];

            //taọ 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia)) {
                $errors['gia'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($soluong)) {
                $errors['soluong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($mau)) {
                $errors['mau'] = 'Màu sản phẩm không được để trống';
            }
            if (empty($kichco)) {
                $errors['kichco'] = 'Kích cỡ sản phẩm không được để trống';
            }
            if (empty($chatlieu)) {
                $errors['chatlieu'] = 'Chất liệu sản phẩm không được để trống';
            }
            if (empty($ngaynhap)) {
                $errors['ngaynhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($category_id)) {
                $errors['category_id'] = 'Danh mục sản phẩm phải chọn';
            }
            if (empty($trangthai)) {
                $errors['trangthai'] = 'Trạng thái sản phẩm phải chọn';
            }


            if (empty($errors)) {
                //nếu không có lỗi thì tiến hành thêm sản phẩm 
                // var_dump('oke');
                 $this->modelSanPham->insertSanPham($name,
                                                    $gia,
                                                    $soluong,
                                                    $mau,
                                                    $kichco,
                                                    $chatlieu,
                                                    $ngaynhap,
                                                    $category_id,
                                                    $trangthai,
                                                    $mota,
                                                    $file_thumb
                   
                );
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                //trả về form và lỗi
                require_once './views/sanpham/addSanPham.php';
            }
        }
    }

    //     public function formEditSanPham(){
    //         //hàm này đùng để hiển thị form nhập
    //         //lấy ra thông tin của danh mục cần sửa
    //         $id = $_GET['id_danhmuc'];
    //         $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    //         // var_dump($danhMuc);
    //         // die();
    //         if($danhMuc){
    //             require_once './views/danhmuc/editDanhMuc.php';
    //         }else{
    //             header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //             exit();
    //             //không có id trong danh mục thì trở về trang quản lý danh mục
    //         }

    //      }
    //      public function postEditSanPham(){
    //          //hàm này đùng để xử lý thêm dữ liệu
    //          // var_dump($_POST);
    //          //Kiểm tra xem dữ liệu có phải được submit lên không
    //  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //      //lấy dữ liệu
    //      $id = $_POST['id'];
    //      $tendanhmuc = $_POST['tendanhmuc'];
    //      $mota = $_POST['mota'];

    //      //taọ 1 mảng trống để chứa dữ liệu
    //      $errors = [];
    //      if(empty($tendanhmuc)){
    //          $errors['tendanhmuc'] = 'Tên danh mục không được để trống';
    //      }


    //      if(empty($errors)){
    //  //nếu không có lỗi thì tiến hành sửa danh mục
    // //  var_dump('oke');
    //  $this->modelDanhMuc->updateDanhMuc($id,$tendanhmuc, $mota);
    //  header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //  exit();
    //      }else{
    //          //trả về form và lỗi
    //          $danhMuc = ['id' => $id, 'tendanhmuc' => $tendanhmuc, 'mota' => $mota];
    //          require_once './views/danhmuc/editDanhMuc.php';
    //      }
    //  }
    //      }

    //      public function deleteSanPham(){
    //         $id = $_GET['id_danhmuc'];
    //         $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

    //         if($danhMuc){
    // $this->modelDanhMuc->destroyDanhMuc($id);
    //         }
    //         header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //  exit();
    //      }

}
