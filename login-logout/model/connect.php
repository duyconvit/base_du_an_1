<?php
$servername = "localhost"; // Thay đổi nếu database của bạn ở máy chủ khác
$username = "root";       // Thay đổi thành tên người dùng database của bạn
$password = "";           // Thay đổi thành mật khẩu database của bạn
$dbname = "dangnhap"; // Thay đổi thành tên database của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}
// echo "Kết nối thành công"; // Bạn có thể bỏ ghi chú dòng này nếu muốn kiểm tra kết nối

?>