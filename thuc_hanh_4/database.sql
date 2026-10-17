CREATE DATABASE IF NOT EXISTS shopping_cart CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE shopping_cart;

CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Chỉ thêm dữ liệu mẫu khi bảng chưa có sản phẩm.
INSERT INTO products (name, price, quantity)
SELECT seed.name, seed.price, seed.quantity
FROM (
    SELECT 'Chuột Logitech' AS name, 150000.00 AS price, 2 AS quantity
    UNION ALL SELECT 'Bàn phím cơ', 850000.00, 1
    UNION ALL SELECT 'Lót chuột', 50000.00, 10
    UNION ALL SELECT 'Tai nghe Sony', 1200000.00, 3
    UNION ALL SELECT 'Cáp sạc Type-C', 80000.00, 6
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM products);
