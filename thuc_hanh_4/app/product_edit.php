<?php
require_once __DIR__ . '/model/product.php';
require_once __DIR__ . '/common/validation.php';

$id = productId($_GET['id'] ?? null);
$product = $id === null ? null : getProductById($id);
$error = '';

if ($product === null) {
    http_response_code(404);
} else {
    $name = $product['name'];
    $price = $product['price'];
    $quantity = $product['quantity'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        [$name, $price, $quantity, $error] = validateProductInput($_POST);
        if ($error === '') {
            updateProduct($id, $name, $price, $quantity);
            header('Location: product_list.php');
            exit;
        }
    }
}

$pageTitle = 'Sửa sản phẩm';
require __DIR__ . '/view/header.php';
?>
<section class="card form-card">
    <?php if ($product === null): ?>
        <h1>Không tìm thấy sản phẩm</h1>
        <p>Sản phẩm không tồn tại hoặc ID không hợp lệ.</p>
        <a href="product_list.php">Quay lại danh sách</a>
    <?php else: ?>
        <h1>Sửa sản phẩm #<?= (int) $id ?></h1>
        <?php if ($error !== ''): ?><p class="message" role="alert"><?= escapeHtml($error) ?></p><?php endif; ?>
        <form method="post">
            <label for="name">Tên sản phẩm</label>
            <input id="name" name="name" type="text" maxlength="100" required value="<?= escapeHtml($name) ?>">

            <label for="price">Giá (đ)</label>
            <input id="price" name="price" type="number" min="0.01" step="0.01" required value="<?= escapeHtml($price) ?>">

            <label for="quantity">Số lượng</label>
            <input id="quantity" name="quantity" type="number" min="0" step="1" required value="<?= escapeHtml($quantity) ?>">

            <div class="form-actions">
                <button type="submit">Lưu thay đổi</button>
                <a href="product_list.php">Hủy</a>
            </div>
        </form>
    <?php endif; ?>
</section>
<?php require __DIR__ . '/view/footer.php'; ?>
