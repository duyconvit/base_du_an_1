<?php 

class Product 
{
    public $conn; //khai bao phuong thuc

    public function __construct(){
        $this->conn = connectDB();
    }

    //viet ham la toan bo dnah sach san pham
    public function getAllProduct(){
        try {
            $sql = 'SELECT * FROM san_phams';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Loi roi" . $e->getMessage();
        }
    }
}