
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
            <h1>Quản lý danh sách đồng hồ</h1>
          </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham'?>">
                  <button class="btn btn-success">Thêm đồng hồ mới</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                  <th>STT</th>   
                  <th>Tên sản phẩm</th>
                  <th>Ảnh sản phẩm</th>
                  <th>GIá tiền</th>
                  <th>Số lượng</th>
                  <th>Danh mục</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                 </tr>
                  </thead>
                  <tbody>
  <?php foreach($listSanPham as $key => $sanPham): ?>
    <tr>
      <td><?= $key + 1 ?></td>
      <td><?= $sanPham['name']?></td>
      <td>
        <img src=" <?= BASE_URL . $sanPham["anh"]?>" style="width:100px"alt="" onerror="this.onerror=null;this.src='https://png.pngtree.com/png-vector/20240321/ourlarge/pngtree-gold-mechanical-wristwatch-png-image_12021746.png'">
      </td>
      <td><?= $sanPham['gia']?></td>
      <td><?= $sanPham['soluong']?></td>
      <td><?= $sanPham['tendanhmuc']?></td>
      <td><?= $sanPham['trangthai'] == 1 ? 'Còn hàng' : 'Hết hàng';?></td>
      <td>
        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_sanpham=' . $sanPham['id']?>">
        <button class="btn btn-danger">Sửa</button>
        </a>
        <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_sanpham=' . $sanPham['id']?>" 
        onclick="return confirm('Bạn có chắc chắn xóa hay không?')">
        <button class="btn btn-warning">Xóa</button>
        </a>
      </td>
    </tr>
  <?php endforeach ?>
</tbody>

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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

  
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy","excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
