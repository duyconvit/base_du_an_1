<?php 

class HomeController
{
    public $modelSanPham;

    public function __construct() {
        $this -> modelSanPham = new Product();
    }

    public function home() {
        echo "Trang Home";
    }

    public function trangchu() {
        echo "Trang chủ";
    }

    public function danhSachSanPham() {
        // echo "Danh sách sản phẩm";
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);die();
        require_once './views/listProduct.php';
    }
}