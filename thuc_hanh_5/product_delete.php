<?php
require_once __DIR__ . '/common/auth.php';
requireLogin();
require_once __DIR__ . '/model/product.php';

$id = positiveId($_GET['id'] ?? null);
$product = $id === null ? null : getProductById($id);

if ($product === null) {
    http_response_code(404);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifyCsrf();
    deleteProduct($id);
    redirectTo('product_list.php');
}

$pageTitle = 'Xóa sản phẩm';
require __DIR__ . '/view/header.php';
?>
<section class="card form-card">
    <?php if ($product === null): ?>
        <h1>Không tìm thấy sản phẩm</h1>
        <p>Sản phẩm không tồn tại hoặc ID không hợp lệ.</p>
        <a href="product_list.php">Quay lại danh sách</a>
    <?php else: ?>
        <h1>Xóa sản phẩm</h1>
        <p>Bạn có chắc chắn muốn xóa <strong><?= escapeHtml($product['name']) ?></strong>?</p>
        <form method="post">
            <input type="hidden" name="csrf_token" value="<?= escapeHtml(csrfToken()) ?>">
            <div class="form-actions">
                <button class="danger" type="submit">Xác nhận xóa</button>
                <a href="product_list.php">Hủy</a>
            </div>
        </form>
    <?php endif; ?>
</section>
<?php require __DIR__ . '/view/footer.php'; ?>
