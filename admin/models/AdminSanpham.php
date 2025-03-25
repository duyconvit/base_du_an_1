<?php

class AdminSanPham{
    public $conn;

    public function __construct()
    {
        $this-> conn = connectDB();
    }
    public function getAllSanPham(){
        try {
            $sql = "SELECT san_phams. *, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function insertSanPham($ten_san_pham,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$hinh_anh){
        try {
            $sql = "INSERT INTO danh_mucs (ten_san_pham,gia_san_pham,gia_khuyen_mai,so_luong,ngay_nhap,danh_muc_id,trang_thai, mo_ta,hinh_anh) 
            VALUES (:ten_san_pham,:gia_san_pham,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai, :mo_ta,:hinh_anh)";

            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc, //bsbabahshshd
                ':mo_ta' => $mo_ta
            ]);

            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    
}
