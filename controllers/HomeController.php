<?php 

class HomeController
{
    public $modelSanPham;
    public $danhMuc;


    public function __construct() {
        $this -> modelSanPham = new SanPham();
    }

    public function home() {
        $keyword = $_GET['keyword'] ?? '';

        if(!empty($keyword)){
            $listSanPham = $this->modelSanPham->searchSanPhamByName($keyword);
            require_once './views/dssanpham.php';
            return;
        }
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        // var_dump($listSanPhamCungDanhMuc);die;
        if ($sanPham) {
            require_once('./views/detailSanPham.php');
        } else {
            header('Location:' . BASE_URL);
            exit();
        }
    }
    public function dssanpham()
    {
        $danhMucId = isset($_GET['danh_muc_id']) ? intval($_GET['danh_muc_id']) : 0;
        $listDanhMuc = $this->danhMuc->getAllDanhMuc();
    
        if ($danhMucId>0){
          $listSanPham = $this->modelSanPham->getListSanPhamDanhMuc($danhMucId);
        }else{
            $listSanPham = $this->modelSanPham->getAllSanPham();
        }
    
        require_once './views/dssanpham.php';
    }
}
  
?> 