<?php 

class SanPham 
{
    public $conn; //khai bao phuong thuc

    public function __construct(){
        $this->conn = connectDB();
    }

    //viet ham la toan bo dnah sach san pham
    public function getAllSanPham(){
        try {
            $sql = 'SELECT san_phams. * , danh_mucs.ten_danh_muc 
            FROM san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Loi roi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về chi tiết sản phẩm
        } catch (Exception $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi
        }
    }

    public function getListSanPhamDanhMuc($danh_muc_id){
        try {
            $sql = 'SELECT san_phams. * , danh_mucs.ten_danh_muc 
            FROM san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = ' . $danh_muc_id;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Loi roi" . $e->getMessage();
        }
    }
}

?>