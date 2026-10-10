<?php

require_once 'model/product.php';


if (!isset($_GET['id'])) {

    die("Thiếu ID sản phẩm.");
}


$id = (int)$_GET['id'];


$product = getProductById($id);


if (!$product) {

    die("Sản phẩm không tồn tại.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    deleteProduct($id);

    header("Location: product_list.php");

    exit;
}


require_once 'view/header.php';

?>


<h2>Xóa sản phẩm</h2>


<p>
    Bạn có chắc chắn muốn xóa sản phẩm:
    <strong>
        <?php echo htmlspecialchars($product['name']); ?>
    </strong>
    ?
</p>


<form method="POST">

    <button type="submit">
        Xác nhận xóa
    </button>

    <a href="product_list.php">
        Hủy
    </a>

</form>


<?php

require_once 'view/footer.php';

?>