<?php
require_once __DIR__ . '/model/product.php';
require_once __DIR__ . '/common/validation.php';

$name = '';
$price = '';
$quantity = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$name, $price, $quantity, $error] = validateProductInput($_POST);
    if ($error === '') {
        addProduct($name, $price, $quantity);
        header('Location: product_list.php');
        exit;
    }
}

$pageTitle = 'Thêm sản phẩm';
require __DIR__ . '/view/header.php';
?>
<section class="card form-card">
    <h1>Thêm sản phẩm</h1>
    <?php if ($error !== ''): ?><p class="message" role="alert"><?= escapeHtml($error) ?></p><?php endif; ?>
    <form method="post">
        <label for="name">Tên sản phẩm</label>
        <input id="name" name="name" type="text" maxlength="100" required value="<?= escapeHtml($name) ?>">

        <label for="price">Giá (đ)</label>
        <input id="price" name="price" type="number" min="0.01" step="0.01" required value="<?= escapeHtml($price) ?>">

        <label for="quantity">Số lượng</label>
        <input id="quantity" name="quantity" type="number" min="0" step="1" required value="<?= escapeHtml($quantity) ?>">

        <div class="form-actions">
            <button type="submit">Thêm sản phẩm</button>
            <a href="product_list.php">Hủy</a>
        </div>
    </form>
</section>
<?php require __DIR__ . '/view/footer.php'; ?>
