<?php

class CartItem
{
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity)
    {
        if ($price <= 0) {
            throw new InvalidArgumentException("Giá sản phẩm phải lớn hơn 0.");
        }

        if ($quantity <= 0) {
            throw new InvalidArgumentException("Số lượng phải lớn hơn 0.");
        }

        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTotal(): float
    {
        return $this->price * $this->quantity;
    }
}