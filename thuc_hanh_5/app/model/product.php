<?php

require_once __DIR__ . '/../common/dbConnect.php';

function getAllProducts(): array
{
    $result = getDbConnection()->query('SELECT id, name, price, quantity FROM products ORDER BY id DESC');
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProductById(int $id): ?array
{
    $statement = getDbConnection()->prepare('SELECT id, name, price, quantity FROM products WHERE id = ?');
    $statement->bind_param('i', $id);
    $statement->execute();
    $product = $statement->get_result()->fetch_assoc();
    $statement->close();
    return $product ?: null;
}

function addProduct(string $name, string $price, int $quantity): void
{
    $statement = getDbConnection()->prepare('INSERT INTO products (name, price, quantity) VALUES (?, ?, ?)');
    $statement->bind_param('ssi', $name, $price, $quantity);
    $statement->execute();
    $statement->close();
}

function updateProduct(int $id, string $name, string $price, int $quantity): void
{
    $statement = getDbConnection()->prepare('UPDATE products SET name = ?, price = ?, quantity = ? WHERE id = ?');
    $statement->bind_param('ssii', $name, $price, $quantity, $id);
    $statement->execute();
    $statement->close();
}

function deleteProduct(int $id): void
{
    $statement = getDbConnection()->prepare('DELETE FROM products WHERE id = ?');
    $statement->bind_param('i', $id);
    $statement->execute();
    $statement->close();
}
