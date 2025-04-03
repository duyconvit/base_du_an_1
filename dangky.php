<?php
include('model/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng ký
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $dia_chi = $_POST['diachi'];
    $role = $_POST['role'];

    // Kiểm tra nếu các trường đều có giá trị
    if (empty($username) || empty($password) || empty($sdt) || empty($email) || empty($dia_chi) || empty($role)) {
        echo "Tất cả các trường đều phải được điền đầy đủ!";
    } else {
        // Kiểm tra email đã tồn tại chưa
        $check_email = "SELECT * FROM user3 WHERE email = ?  ";
        $stmt = $conn->prepare($check_email);
       
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "Email đã tồn tại!";
        }else{
             $check_user= "SELECT * FROM user3 WHERE username = ?  ";
        $stmt1 = $conn->prepare($check_user);
       
        $stmt1->bind_param("s", $username);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        if ($result1->num_rows > 0) {
            echo "Tên đăng nhập đã tồn tại!";
        }
        
        else {
            
            $insert_user = "INSERT INTO user3 (username, password, sdt, email, diachi, role) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_user);
            $stmt->bind_param("ssssss", $username, $password, $sdt, $email, $dia_chi, $role);
            if ($stmt->execute()) {

                header("Location: trang.php");
            } else {
                echo "Lỗi khi đăng ký!";
            }
        }
    }
}
}
?>
