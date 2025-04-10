<?php
session_start();

// Xử lý khi thêm sản phẩm vào giỏ
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    // Nếu giỏ hàng chưa có, khởi tạo giỏ hàng mới
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ chưa
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['quantity'] += $quantity; // Tăng số lượng nếu sản phẩm đã có trong giỏ
            $found = true;
            break;
        }
    }

    // Nếu sản phẩm chưa có trong giỏ, thêm mới sản phẩm vào giỏ
    if (!$found) {
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'quantity' => $quantity
        ];
    }
}

// Xử lý khi xóa sản phẩm khỏi giỏ
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    // Cập nhật lại giỏ hàng sau khi xóa
    header("Location: cart.php");
    exit();
}

// Xử lý khi sửa sản phẩm trong giỏ
if (isset($_POST['update_product'])) {
    $update_id = $_POST['product_id'];
    $new_name = $_POST['product_name'];
    $new_price = $_POST['product_price'];
    $new_quantity = $_POST['quantity'];
    
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $update_id) {
            $item['product_name'] = $new_name;
            $item['product_price'] = $new_price;
            $item['quantity'] = $new_quantity;
            break;
        }
    }
    // Cập nhật giỏ hàng sau khi thay đổi thông tin sản phẩm
    header("Location: cart.php");
    exit();
}

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

<h2>Giỏ Hàng</h2>

<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <?php foreach ($_SESSION['cart'] as $item): ?>
        <div class="cart-item">
            <span>Tên sản phẩm: <?php echo $item['product_name']; ?></span><br>
            <span>Giá: <?php echo number_format($item['product_price']); ?> VND</span><br>
            <span>Số lượng: <?php echo $item['quantity']; ?></span><br>
            
            <!-- Nút sửa sản phẩm -->
            <button onclick="showEditForm(<?php echo $item['product_id']; ?>, '<?php echo $item['product_name']; ?>', <?php echo $item['product_price']; ?>, <?php echo $item['quantity']; ?>)">Sửa sản phẩm</button>

            <!-- Nút xóa sản phẩm -->
            <a href="cart.php?remove=<?php echo $item['product_id']; ?>">Xóa</a>
        </div>
    <?php endforeach; ?>

    <!-- Form sửa sản phẩm (ẩn theo mặc định) -->
    <div id="edit-form" style="display: none;">
        <h3>Sửa sản phẩm</h3>
        <form action="cart.php" method="POST">
            <input type="hidden" name="product_id" id="edit-product-id">
            <label for="edit-product-name">Tên sản phẩm:</label>
            <input type="text" name="product_name" id="edit-product-name" required><br>

            <label for="edit-product-price">Giá sản phẩm:</label>
            <input type="number" name="product_price" id="edit-product-price" required><br>

            <label for="edit-quantity">Số lượng:</label>
            <input type="number" name="quantity" id="edit-quantity" min="1" required><br>

            <button type="submit" name="update_product">Lưu thay đổi</button>
            <button type="button" onclick="cancelEdit()">Hủy</button>
        </form>
    </div>
<?php else: ?>
    <p>Giỏ hàng của bạn đang trống!</p>
<?php endif; ?>

<a href="index.php">Tiếp tục mua sắm</a>

<script>
    function showEditForm(id, name, price, quantity) {
        // Hiển thị form sửa sản phẩm
        document.getElementById('edit-form').style.display = 'block';
        document.getElementById('edit-product-id').value = id;
        document.getElementById('edit-product-name').value = name;
        document.getElementById('edit-product-price').value = price;
        document.getElementById('edit-quantity').value = quantity;
    }

    function cancelEdit() {
        // Ẩn form sửa sản phẩm
        document.getElementById('edit-form').style.display = 'none';
    }
</script>

</body>
</html>

