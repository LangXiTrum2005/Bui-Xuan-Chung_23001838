CREATE DATABASE IF NOT EXISTS shopping_cart;

USE shopping_cart;

CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO products (name, price, quantity)
VALUES
('Chuột Logitech', 150000, 2),
('Bàn phím cơ', 850000, 1),
('Lót chuột', 50000, 10),
('Tai nghe Sony', 1200000, 3),
('Cáp sạc Type-C', 80000, 6);