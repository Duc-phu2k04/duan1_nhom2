<!-- <header> -->
<?php require './views/layout/header.php'; ?>
<!-- </header> -->

<!-- <navbar> -->
<?php include './views/layout/navbar.php'; ?>
<!-- </navbar> -->

<!-- <sidebar> -->
<?php include './views/layout/sidebar.php'; ?>
<!-- </sidebar> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh sách sản phẩm</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body row">
                <div class="form-group col-12">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                  <?php if (isset($errors['name'])) { ?>
                    <p class="text-danger"><?= $errors['name'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Giá sản phẩm</label>
                  <input type="number" class="form-control" name="gia" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($errors['gia'])) { ?>
                    <p class="text-danger"><?= $errors['gia'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Màu sản phẩm</label>
                  <input type="text" class="form-control" name="mau" placeholder="Nhập màu sản phẩm">
                  <?php if (isset($errors['mau'])) { ?>
                    <p class="text-danger"><?= $errors['mau'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Kích cỡ sản phẩm</label>
                  <input type="number" class="form-control" name="kichco" placeholder="Nhập kích cỡ sản phẩm">
                  <?php if (isset($errors['kichco'])) { ?>
                    <p class="text-danger"><?= $errors['kichco'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Chất liệu sản phẩm</label>
                  <input type="text" class="form-control" name="chatlieu" placeholder="Nhập chất liệu sản phẩm">
                  <?php if (isset($errors['chatlieu'])) { ?>
                    <p class="text-danger"><?= $errors['chatlieu'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Hình ảnh</label>
                  <input type="file" class="form-control" name="anh">
                  <?php if (isset($errors['anh'])) { ?>
                    <p class="text-danger"><?= $errors['anh'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Album ảnh</label>
                  <input type="file" class="form-control" name="img_array[]" multiple>
                </div>
                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="text" class="form-control" name="soluong" placeholder="Nhập số lượng sản phẩm">
                  <?php if (isset($errors['soluong'])) { ?>
                    <p class="text-danger"><?= $errors['soluong'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Ngày nhập</label>
                  <input type="date" class="form-control" name="ngaynhap" placeholder="Nhập ngày nhập">
                  <?php if (isset($errors['ngaynhap'])) { ?>
                    <p class="text-danger"><?= $errors['ngaynhap'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select class="form-control" name="category_id "id="exampleFormControlSelect1">
                    <option selected disabled>Chọn danh mục sản phẩm</option>
                   <?php foreach($listDanhMuc as $danhMuc): ?>
                        <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['tendanhmuc'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <?php if (isset($errors['category_id'])) { ?>
                    <p class="text-danger"><?= $errors['category_id'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Trạng thái</label>
                  <select class="form-control" name="trangthai "id="exampleFormControlSelect1">
                    <option selected disabled>Chọn trạng thái sản phẩm</option>
                  <option value="1">Còn hàng</option>
                  <option value="2">Hết hàng</option>
                  </select>
                  <?php if (isset($errors['trangthai'])) { ?>
                    <p class="text-danger"><?= $errors['trangthai'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-12">
                    <label>Mô tả</label>
                    <textarea name="mota" class="form-control" id="" placeholder="Nhập mô tả"></textarea>
                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>
<!-- <footer> -->

<!-- end footer -->
</body>

</html>