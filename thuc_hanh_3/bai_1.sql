CREATE DATABASE IF NOT EXISTS shopping_cart;
USE shopping_cart;

CREATE TABLE cart_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO cart_items (name, price, quantity)
VALUES
('Laptop Dell', 15000000, 2),
('Chuột Logitech', 350000, 6),
('Bàn phím cơ', 850000, 3),
('Tai nghe Bluetooth', 500000, 8),
('USB 64GB', 150000, 10);

SELECT * FROM cart_items;

SELECT *
FROM cart_items
WHERE price > 100000;

SELECT *
FROM cart_items
WHERE quantity > 5;

SELECT *
FROM cart_items
ORDER BY price DESC;

UPDATE cart_items
SET price = 400000
WHERE name = 'Chuột Logitech';

UPDATE cart_items
SET quantity = 5
WHERE name = 'Bàn phím cơ';

DELETE FROM cart_items
WHERE name = 'USB 64GB';

SELECT
    name,
    price,
    quantity,
    price * quantity AS thanh_tien
FROM cart_items;

SELECT
    SUM(price * quantity) AS tong_tien
FROM cart_items;