<!-- header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản Lý Danh Mục Sản Phẩm</h1>
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
                <h3 class="card-title">Sua danh muc</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc'?>" method="POST">
                
                <!-- Ban ngam cai id -->
                <input type="text" name="id" value="<?= $danhMuc['id'] ?>" hidden> 

                <div class="card-body">
                  <div class="form-group">
                    <label>Ten danh muc</label>
                    <input type="text" class="form-control" name="ten_danh_muc" value="<?= $danhMuc['ten_danh_muc'] ?>" placeholder="Nhap ten danh muc">
                    <?php if(isset($errors['ten_danh_muc'])){ ?>
                        <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                   <?php } ?>
                  </div>
                
                  <div class="form-group">
                    <label>Mo ta</label>
                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhap mo ta"><?= $danhMuc['mo_ta'] ?></textarea>
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

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- EndFooter -->


</html>