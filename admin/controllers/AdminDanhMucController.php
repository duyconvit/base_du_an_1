<?php

class AdminDanhMucController{

        public $modelDanhMuc;

        public function __construct(){
            $this->modelDanhMuc = new AdminDanhMuc();
        }

        public function danhSachDanhMuc(){

            $listDanhMuc = $this-> modelDanhMuc ->getAllDanhMuc();
            
            require_once "./views/danhmuc/listDanhMuc.php";
        }
        
    public function formAddDanhMuc(){
        // ham nay dung hien thi form nhap
        require_once "./views/danhmuc/addDanhMuc.php";
        
    }

    public function postAddDanhMuc(){
        // ham nay dung them du lieu

        //kiem tra xem du lieu co phai dc submit len ko
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            //tao 1 mang trong de chua du lieu
            $errors =[];

            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = "Ten danh muc khong duoc de trong";
            }

            // Neu khog co loi thi tien hanh them danh muc
            if (empty($errors)) {
                // var_dump("ok");
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("location: " . BASE_URL_ADMIN . "?act=danh-muc");
                exit();
            }else{
                // tra loi tra ve form
                require_once "./views/danhmuc/addDanhMuc.php";

            }

        }
    }

    public function formEditDanhMuc(){
        // ham nay dung hien thi form nhap
        //lay ra thong tin danh muc can sua
        $id =  $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetaiDanhMuc($id);
        if ($danhMuc) {
            require_once "./views/danhmuc/editDanhMuc.php";
        }else{
            header("location: " . BASE_URL_ADMIN . "?act=danh-muc");
            exit();
        }
        
    }

    public function postEditDanhMuc(){
        // ham nay dung them du lieu

        //kiem tra xem du lieu co phai dc submit len ko
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            //tao 1 mang trong de chua du lieu
            $errors =[];

            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = "Ten danh muc khong duoc de trong";
            }

            // Neu khog co loi thi tien hanh sua danh muc
            if (empty($errors)) {
                // var_dump("ok");
                $this->modelDanhMuc->updateDanhMuc($id,  $ten_danh_muc, $mo_ta);
                header("location: " . BASE_URL_ADMIN . "?act=danh-muc");
                exit();
            }else{
                // tra loi tra ve form
                $danhMuc = ['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc, 'mo_ta'=>$mo_ta];
                require_once "./views/danhmuc/editDanhMuc.php";

            }

        }
    }

    public function deleteDanhMuc(){
        
        $id =  $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetaiDanhMuc($id);

        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
           
        }
          
            header("location: " . BASE_URL_ADMIN . "?act=danh-muc");
            exit();
        
    }
}