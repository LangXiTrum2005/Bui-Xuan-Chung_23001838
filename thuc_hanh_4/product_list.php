<?php

require_once 'model/product.php';

$products = getAllProducts();

require_once 'view/header.php';

?>

<h2>Danh sách sản phẩm</h2>

<a href="product_add.php">
    Thêm sản phẩm
</a>

<br><br>

<table border="1"
       cellpadding="10"
       cellspacing="0">

    <tr>
        <th>ID</th>

        <th>Tên sản phẩm</th>

        <th>Giá</th>

        <th>Số lượng</th>

        <th>Chức năng</th>
    </tr>


    <?php while ($product = mysqli_fetch_assoc($products)): ?>

        <tr>

            <td>
                <?php echo $product['id']; ?>
            </td>

            <td>
                <?php echo htmlspecialchars($product['name']); ?>
            </td>

            <td>
                <?php
                echo number_format(
                    $product['price'],
                    0,
                    ',',
                    '.'
                );
                ?> VNĐ
            </td>

            <td>
                <?php echo $product['quantity']; ?>
            </td>

            <td>

                <a href="product_edit.php?id=<?php echo $product['id']; ?>">
                    Sửa
                </a>

                |

                <a href="product_delete.php?id=<?php echo $product['id']; ?>">
                    Xóa
                </a>

            </td>

        </tr>

    <?php endwhile; ?>

</table>


<?php

require_once 'view/footer.php';

?>