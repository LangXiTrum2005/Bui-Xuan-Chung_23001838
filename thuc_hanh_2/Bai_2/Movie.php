<?php

class Movie
{
    private int $id;
    private string $title;
    private float $price;
    private int $totalSeats;
    private int $availableSeats;

    public function __construct(
        int $id,
        string $title,
        float $price,
        int $totalSeats
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->totalSeats = $totalSeats;

        $this->availableSeats = $totalSeats;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function bookTicket(int $quantity): bool
    {
        if ($quantity <= 0) {
            echo "Số vé phải lớn hơn 0.<br>";
            return false;
        }

        if ($quantity > $this->availableSeats) {
            echo "Không đủ ghế.<br>";
            return false;
        }

        $this->availableSeats -= $quantity;

        return true;
    }

    public function cancelTicket(int $quantity): bool
    {
        if ($quantity <= 0) {
            echo "Số vé hủy phải lớn hơn 0.<br>";
            return false;
        }

        if ($quantity > $this->getSoldSeats()) {
            echo "Không thể hủy nhiều hơn số vé đã bán.<br>";
            return false;
        }

        $this->availableSeats += $quantity;

        return true;
    }

    public function getSoldSeats(): int
    {
        return $this->totalSeats - $this->availableSeats;
    }

    public function getRevenue(): float
    {
        return $this->getSoldSeats() * $this->price;
    }

    public function displayInfo(): void
    {
        echo "<hr>";

        echo "ID: " . $this->id . "<br>";

        echo "Tên phim: " . $this->title . "<br>";

        echo "Giá vé: "
            . number_format($this->price, 0, ',', '.')
            . " VNĐ<br>";

        echo "Tổng ghế: " . $this->totalSeats . "<br>";

        echo "Ghế còn lại: " . $this->availableSeats . "<br>";

        echo "Đã bán: " . $this->getSoldSeats() . "<br>";

        echo "Doanh thu: "
            . number_format($this->getRevenue(), 0, ',', '.')
            . " VNĐ<br>";
    }
}