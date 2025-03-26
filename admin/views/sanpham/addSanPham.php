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
          <h1>Quản Lý Danh Sach Sản Phẩm</h1>
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
                <h3 class="card-title">Them san pham</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham'?>" method="POST" enctype="multipart/form-data">
                <div class="card-body row">

                  <div class="form-group col-12">
                    <label>Ten san pham</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhap ten san pham">
                    <?php if(isset($_SESSION['errors']['ten_san_pham'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                   <?php } ?>
                  </div>
                
                  <div class="form-group col-6">
                    <label>Gia san pham</label>
                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhap gia san pham">
                    <?php if(isset($_SESSION['errors']['gia_san_pham'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                   <?php } ?>
                  </div>    
                  
                  <div class="form-group col-6">
                    <label>Gia khuyen mai</label>
                    <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhap gia khuyen mai san pham">
                    <?php if(isset($_SESSION['errors']['gia_khuyen_mai'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                   <?php } ?>
                  </div>
                  
                  <div class="form-group col-6">
                    <label>Hinh anh</label>
                    <input type="file" class="form-control" name="hinh_anh">
                    <?php if(isset($_SESSION['errors']['hinh_anh'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                   <?php } ?>
                  </div>  
                  
                  <!-- <div class="form-group col-6">
                    <label>Album Hinh anh</label>
                    <input type="file" class="form-control" name="img_array[] " multiple>
                  </div>  -->
                  
                  <div class="form-group col-6">
                    <label>So luong</label>
                    <input type="number" class="form-control" name="so_luong" placeholder="Nhap So luong san pham">
                    <?php if(isset($_SESSION['errors']['so_luong'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                   <?php } ?>
                  </div>
                  
                  <div class="form-group col-6">
                    <label>Ngay nhap</label>
                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhap Ngay nhap">
                    <?php if(isset($_SESSION['errors']['ngay_nhap'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                   <?php } ?>
                  </div>    
                  
                  <div class="form-group col-6">
                    <label>Danh muc</label>
                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                      <option selected disabled>Chon danh muc san pham</option>

                      <?php foreach($listDanhMuc as $danhMuc): ?>
                        <option value="<?= $danhMuc['id'] ?>"><?=$danhMuc['ten_danh_muc'] ?></option>
                      <?php endforeach ?>  
                    </select>
                    <?php if(isset($_SESSION['errors']['danh_muc_id'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Trang thai</label>
                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                      <option selected disabled>Chon trang thai</option>
                      <option value="1">Còn hàng</option>
                      <option value="2">Hết hàng</option>
                    </select>
                    <?php if(isset($_SESSION['errors']['trang_thai'])){ ?>
                        <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-12">
                    <label>Mo ta</label>
                    <textarea name="mo_ta" id="" class="form-control"></textarea>
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