<?php

require_once "CartItem.php";

class ShoppingCart
{
    private array $items = [];

    public function addItem(CartItem $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(string $name): bool
    {
        foreach ($this->items as $index => $item) {

            if (strcasecmp($item->getName(), $name) === 0) {

                unset($this->items[$index]);

                $this->items = array_values($this->items);

                echo "Đã xóa sản phẩm: $name<br>";

                return true;
            }
        }

        echo "Không tìm thấy sản phẩm: $name<br>";

        return false;
    }

    public function calculateTotal(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }

    public function displayCart(): void
    {
        if (empty($this->items)) {
            echo "Giỏ hàng đang trống.<br>";
            return;
        }

        echo "<table border='1' cellpadding='8'>";

        echo "
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        ";

        foreach ($this->items as $item) {

            echo "<tr>";

            echo "<td>" . $item->getName() . "</td>";

            echo "<td>"
                . number_format($item->getPrice(), 0, ',', '.')
                . " VNĐ</td>";

            echo "<td>"
                . $item->getQuantity()
                . "</td>";

            echo "<td>"
                . number_format($item->getTotal(), 0, ',', '.')
                . " VNĐ</td>";

            echo "</tr>";
        }

        echo "</table>";

        echo "<br>Tổng tiền: "
            . number_format($this->calculateTotal(), 0, ',', '.')
            . " VNĐ<br>";
    }
}