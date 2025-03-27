<?php
session_start();
require_once 'controller.php';
?>

<!DOCTY<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 300px; margin: 50px auto; border: 1px solid #ccc; padding: 20px; border-radius: 5px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px; box-sizing: border-box; }
        button[type="submit"] { padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <!--  -->
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit" name="login">Đăng nhập</button>
        </form>
    </div>
</body>
</html>