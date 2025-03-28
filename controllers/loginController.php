<?php

require_once './commons/env.php';

// Hàm kiểm tra đăng nhập
function login($username, $password, $conn) {
    if (empty(trim($username)) || empty(trim($password))) {
        return "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
    }
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT id, username, password, role FROM user3 WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == '1') {
        $row = $result->fetch_assoc();
        if ($password= $row['password']) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['role'] = $row['role'];
            return true;
        } else {
            return "Sai mật khẩu";
        }
    } else {
        return "Tên đăng nhập không tồn tại.";
    }
 }

// Xử lý đăng nhập
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginResult = login($username, $password, $conn);

    if ($loginResult === true) {
        if ($_SESSION['role'] === '1') {
            header("Location: ./views/home.php  "); // Chuyển hướng đến trang quản trị
        } else {    
            header("Location: user.php");  // Chuyển hướng đến trang người dùng
        }
        exit();
    } else {
        $error = $loginResult;
    }
}



// Xử lý đăng xuất
if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION); // Xóa tất cả các biến session
    header("Location: index.php");
    exit();
}


$conn->close();
?>
