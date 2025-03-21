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
            <h1>Quan ly danh muc san pham</h1>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ten danh muc</th>
                    <th>Mo ta</th>
                    <th>Hinh anh</th>
                    <th>Thao tac</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                  <tr>
                    <td><?=  $key+1 ?></td>
                    <td><?= $danhMuc['ten_danh_muc']?></td>
                    <td><?= $danhMuc['mo_ta']?></td>
                    <td><?= $danhMuc['hinh_anh']?></td>
                    <td>
                      <button class="btn btn-primary me-2">Sua</button>
                      <button class="btn btn-danger">xoa</button>
                    </td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Ten danh muc</th>
                    <th>Mo ta</th>
                    <th>Hinh anh</th>
                    <th>Thao tac</th>
                  </tr>
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

  <!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
  <!-- EndFooter -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
<!-- Code injected by live-server -->

</body>
</html>




<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ten danh muc</th>
                    <th>Mo ta</th>
                    <th>Hinh anh</th>
                    <th>Thao tac</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                  <tr>
                    <td><? $key+1 ?></td>
                    <td><?= $danhMuc['ten_danh_muc']?></td>
                    <td><?= $danhMuc['mo_ta']?></td>
                    <td><?= $danhMuc['hinh_anh']?></td>
                    <td>
                      <button class="btn btn-primary me-2">Sua</button>
                      <button class="btn btn-danger">xoa</button>
                    </td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Ten danh muc</th>
                    <th>Mo ta</th>
                    <th>Hinh anh</th>
                    <th>Thao tac</th>
                  </tr>
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