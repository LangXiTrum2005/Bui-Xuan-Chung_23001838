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


$error = "";


$name = $product['name'];

$price = $product['price'];

$quantity = $product['quantity'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);

    $price = $_POST['price'];

    $quantity = $_POST['quantity'];


    if ($name == "") {

        $error = "Tên sản phẩm không được để trống.";

    } elseif (!is_numeric($price) || $price <= 0) {

        $error = "Giá sản phẩm phải lớn hơn 0.";

    } elseif (!is_numeric($quantity) || $quantity < 0) {

        $error = "Số lượng phải lớn hơn hoặc bằng 0.";

    } else {

        updateProduct(
            $id,
            $name,
            $price,
            $quantity
        );

        header("Location: product_list.php");

        exit;
    }
}


require_once 'view/header.php';

?>


<h2>Sửa sản phẩm</h2>


<?php if ($error != ""): ?>

    <p style="color:red;">
        <?php echo $error; ?>
    </p>

<?php endif; ?>


<form method="POST">


    <label>
        Tên sản phẩm:
    </label>

    <br>

    <input
        type="text"
        name="name"
        value="<?php echo htmlspecialchars($name); ?>"
    >

    <br><br>


    <label>
        Giá:
    </label>

    <br>

    <input
        type="number"
        name="price"
        value="<?php echo htmlspecialchars($price); ?>"
    >

    <br><br>


    <label>
        Số lượng:
    </label>

    <br>

    <input
        type="number"
        name="quantity"
        value="<?php echo htmlspecialchars($quantity); ?>"
    >

    <br><br>


    <button type="submit">
        Cập nhật
    </button>


    <a href="product_list.php">
        Quay lại
    </a>


</form>


<?php

require_once 'view/footer.php';

?>