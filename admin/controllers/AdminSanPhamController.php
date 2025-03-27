<?php

class AdminSanPhamController{

        public $modelSanPham; 
        public $modelDanhMuc; 

        public function __construct(){
            $this->modelSanPham = new AdminSanPham();
            $this->modelDanhMuc = new AdminDanhMuc();
        }

        public function danhSachSanPham(){

            $listSanPham = $this-> modelSanPham ->getAllSanPham();
            
            require_once "./views/sanpham/listSanPham.php";
        }
        
    public function formAddSanPham(){
        // ham nay dung hien thi form nhap
        $listDanhMuc = $this-> modelDanhMuc ->getAllDanhMuc();

        require_once "./views/sanpham/addSanPham.php";
        
        //xoa session sau khi load trang
        deleteSessionError();
    }

    public function postAddSanPham(){
        // ham nay dung them du lieu

        //kiem tra xem du lieu co phai dc submit len ko
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ??'';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            //luu hinh anh vao thu muc
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            //mang hinh anh
            $img_array = $_FILES['img_array'];


            //tao 1 mang trong de chua du lieu
            $errors =[];

            if(empty($ten_san_pham)){
                $errors['ten_san_pham'] = "Ten san pham khong duoc de trong";
            }
            if(empty($gia_san_pham)){
                $errors['gia_san_pham'] = "Gia san pham khong duoc de trong";
            }
            if(empty($gia_khuyen_mai)){
                $errors['gia_khuyen_mai'] = "Gia khuyen mai san pham khong duoc de trong";
            }
            if(empty($so_luong)){
                $errors['so_luong'] = "So luong san pham khong duoc de trong";
            }
            if(empty($ngay_nhap)){
                $errors['ngay_nhap'] = "Ngay nhap san pham khong duoc de trong";
            }
            if(empty($danh_muc_id)){
                $errors['danh_muc_id'] = "Danh muc phai chon";
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = "Trang thai phai chon";
            }
            if($hinh_anh['errors'] !==0) {
                $error['hinh_anh'] = 'Vui Lòng Chọn Ảnh Sản Phẩm !';
            } 
            }

            $_SESSION['errors'] = $errors;
            // Neu khog co loi thi tien hanh them san pham
            if (empty($errors)) {
                // var_dump("ok");
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$file_thumb);
                // var_dump($san_pham_id);die;
                header("location: " . BASE_URL_ADMIN . "?act=san-pham");
                exit();
            }else{
                // tra loi tra ve form
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . "?act=form-them-san-pham");
                exit();

            }

        }


    public function formEditSanPham(){
        // ham nay dung hien thi form nhap
        //lay ra thong tin danh muc can sua
        $id =  $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this-> modelDanhMuc ->getAllDanhMuc();
        if ($sanPham) {
            require_once "./views/sanpham/editSanPham.php";
            deleteSessionError();
        }else{
            header("location: " . BASE_URL_ADMIN . "?act=san-pham");
            exit();
        }
        
    }

    public function postEditSanPham(){
        // ham nay dung them du lieu

        //kiem tra xem du lieu co phai dc submit len ko
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            //lay ra du lieu cu cua san pham
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //truy van
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // lay anh cu de cho sua anh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ??'';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            
            $hinh_anh = $_FILES['hinh_anh'] ?? null;    

            //tao 1 mang trong de chua du lieu
            $errors =[];

            if(empty($ten_san_pham)){
                $errors['ten_san_pham'] = "Ten san pham khong duoc de trong";
            }
            if(empty($gia_san_pham)){
                $errors['gia_san_pham'] = "Gia san pham khong duoc de trong";
            }
            if(empty($gia_khuyen_mai)){
                $errors['gia_khuyen_mai'] = "Gia khuyen mai san pham khong duoc de trong";
            }
            if(empty($so_luong)){
                $errors['so_luong'] = "So luong san pham khong duoc de trong";
            }
            if(empty($ngay_nhap)){
                $errors['ngay_nhap'] = "Ngay nhap san pham khong duoc de trong";
            }
            if(empty($danh_muc_id)){
                $errors['danh_muc_id'] = "Danh muc phai chon";
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = "Trang thai phai chon";
            }
            if($hinh_anh['errors']){
                $errors['hinh_anh'] = "Hinh anh phai chon";
            }

            $_SESSION['errors'] = $errors;

            // logic sua anh
            if(isset($hinh_anh) && $hinh_anh['errors']== UPLOAD_ERR_OK){
                //upload anh moi len
                $new_file = uploadFile($hinh_anh, './uploads/');

                if(!empty($old_file)){ // neu co anh cu thi xoa anh cu
                    deleteFile($old_file);
                }
            }else{
                $new_file = $old_file;
            }

            // Neu khog co loi thi tien hanh them san pham
            if (empty($errors)) {
                // var_dump("ok");
                $this->modelSanPham->updateSanPham($san_pham_id,$ten_san_pham,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$new_file);
                // var_dump($san_pham_id);die;
                header("location: " . BASE_URL_ADMIN . "?act=san-pham");
                exit();
            }else{
                // tra loi tra ve form
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . "?act=form-sua-san-pham&id_san_pham=".$san_pham_id);
                exit();

            }

        }
    }

    public function deleteSanPham(){
        
        $id =  $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        if ($sanPham) {
            $this->modelSanPham->destroySanPham($id);
           
        }
          
            header("location: " . BASE_URL_ADMIN . "?act=san-pham");
            exit();
        
    }
}

?>
