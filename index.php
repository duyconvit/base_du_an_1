<?php
// Bắt đầu session
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Sản phẩm</h2>

<div class="product-list">
    <div class="product">
        <span>Sản phẩm A</span>
        <form action="cart.php" method="POST">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="Sản phẩm A">
            <input type="hidden" name="product_price" value="100000">
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" value="1" min="1" required>
            <button type="submit" name="add_to_cart">Thêm vào giỏ</button>
        </form>
    </div>
    <div class="product">
        <span>Sản phẩm B</span>
        <form action="cart.php" method="POST">
            <input type="hidden" name="product_id" value="2">
            <input type="hidden" name="product_name" value="Sản phẩm B">
            <input type="hidden" name="product_price" value="200000">
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" value="1" min="1" required>
            <button type="submit" name="add_to_cart">Thêm vào giỏ</button>
        </form>
    </div>
    <div class="product">
        <span>Sản phẩm C</span>
        <form action="cart.php" method="POST">
            <input type="hidden" name="product_id" value="3">
            <input type="hidden" name="product_name" value="Sản phẩm C">
            <input type="hidden" name="product_price" value="300000">
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" value="1" min="1" required>
            <button type="submit" name="add_to_cart">Thêm vào giỏ</button>
        </form>
    </div>
</div>

<a href="cart.php">Đi đến giỏ hàng</a>

</body>
</html>
