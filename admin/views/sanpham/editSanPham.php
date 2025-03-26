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
          <h1>Sua Sản Phẩm: <?= $sanPham['ten_san_pham'] ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thong tin san pham</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_san_pham">Ten san pham</label>
                <input type="text" id="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>" name="ten_san_pham">
                <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="gia_san_pham">Gia san pham</label>
                <input type="number" id="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>" name="gia_san_pham">
                <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="gia_khuyen_mai">Gia khuyen mai</label>
                <input type="number" id="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>" name="gia_khuyen_mai">
                <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="hinh_anh">Hinh anh</label>
                <input type="file" id="hinh_anh" class="form-control" name="hinh_anh">
              </div>

              <div class="form-group">
                <label for="so_luong">So luong</label>
                <input type="number" id="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>" name="so_luong">
                <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="ngay_nhap">Ngay nhap</label>
                <input type="date" id="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>" name="ngay_nhap">
                <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Danh muc san pham</label>
                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                  <?php endforeach; ?>
                  <?php if (isset($_SESSION['errors']['danh_muc_id'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="trang_thai">Trạng thái sản phẩm</label>
                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                  <option value="1" <?= isset($sanPham['trang_thai']) && $sanPham['trang_thai'] == 1 ? 'selected' : '' ?>>Con hang</option>
                  <option value="2" <?= isset($sanPham['trang_thai']) && $sanPham['trang_thai'] == 2 ? 'selected' : '' ?>>Het hàng</option>
                </select>
                <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                <?php } ?>
              </div>


              <div class="form-group">
                <label for="mo_ta">Mo ta</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta'] ?></textarea>
                <?php if (isset($_SESSION['errors']['mo_ta'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?></p>
                <?php } ?>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
        <!-- /.card -->
      </div>
      <div class="col-md-6">

      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- EndFooter -->


</html>