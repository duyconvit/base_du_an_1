<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

//them file
function uploadFile($file, $folderUpload) {
    $patStorage = $folderUpload . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $patStorage;
    if (move_uploaded_file($from, $to)) {
        return $patStorage;
    }
    return null;
}
//xoa file
function deleteFile($file) {
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}
//xoa session sau khi load trang

function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        //huy session sau khi xoa
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}

function formatPrice($price){
    return number_format($price, 0, ',', '.');
}