<?php
$prices = [120000, 85000, 250000, 99000, 175000];

function calculateTotal($prices) {
    $total = 0;

    foreach ($prices as $price) {
        $total += $price;
    }

    return $total;
}

function findMaxPrice($prices) {
    $maxPrice = $prices[0];

    foreach ($prices as $price) {
        if ($price > $maxPrice) {
            $maxPrice = $price;
        }
    }

    return $maxPrice;
}

echo "Tổng giá trị sản phẩm: " . calculateTotal($prices) . " đồng<br>";
echo "Giá sản phẩm cao nhất: " . findMaxPrice($prices) . " đồng";
?>