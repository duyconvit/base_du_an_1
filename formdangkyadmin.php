<?php
require_once 'dangky.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

<div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại:</label>
                    <input type="text" id="sdt" name="sdt" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ:</label>
                    <textarea id="diachi" name="diachi" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Vai trò:</label>
                    <select id="role" name="role" class="form-select">
                        
                        <option value="admin">admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
            </form>


</body>

</html>