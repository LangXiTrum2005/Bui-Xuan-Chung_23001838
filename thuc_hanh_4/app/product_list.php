<?php
require_once __DIR__ . '/model/product.php';
require_once __DIR__ . '/common/validation.php';

$products = getAllProducts();
$pageTitle = 'Danh sách sản phẩm';
require __DIR__ . '/view/header.php';
?>
<div class="page-heading">
    <h1>Danh sách sản phẩm</h1>
    <a class="button" href="product_add.php">Thêm sản phẩm</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr><th>ID</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Chức năng</th></tr>
        </thead>
        <tbody>
        <?php if ($products->num_rows === 0): ?>
            <tr><td colspan="5">Chưa có sản phẩm nào.</td></tr>
        <?php else: ?>
            <?php while ($product = $products->fetch_assoc()): ?>
                <tr>
                    <td><?= (int) $product['id'] ?></td>
                    <td><?= escapeHtml($product['name']) ?></td>
                    <td><?= number_format((float) $product['price'], 2, ',', '.') ?> đ</td>
                    <td><?= (int) $product['quantity'] ?></td>
                    <td class="actions">
                        <a href="product_edit.php?id=<?= (int) $product['id'] ?>">Sửa</a>
                        <a href="product_delete.php?id=<?= (int) $product['id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/view/footer.php'; ?>
