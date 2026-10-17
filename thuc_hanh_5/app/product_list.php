<?php
require_once __DIR__ . '/common/auth.php';
requireLogin();
require_once __DIR__ . '/model/product.php';

$products = getAllProducts();
$pageTitle = 'Danh sách sản phẩm';
require __DIR__ . '/view/header.php';
?>
<div class="page-heading">
    <div>
        <h1>Danh sách sản phẩm</h1>
        <p>Quản lý các sản phẩm trong hệ thống.</p>
    </div>
    <a class="button" href="product_add.php">Thêm sản phẩm</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
        <tr><th>ID</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Chức năng</th></tr>
        </thead>
        <tbody>
        <?php if (!$products): ?>
            <tr><td colspan="5">Chưa có sản phẩm nào.</td></tr>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= escapeHtml($product['id']) ?></td>
                    <td><?= escapeHtml($product['name']) ?></td>
                    <td><?= number_format((float) $product['price'], 2, ',', '.') ?> đ</td>
                    <td><?= escapeHtml($product['quantity']) ?></td>
                    <td class="actions">
                        <a href="product_edit.php?id=<?= (int) $product['id'] ?>">Sửa</a>
                        <a href="product_delete.php?id=<?= (int) $product['id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/view/footer.php'; ?>
