<?php

require_once __DIR__ . '/../common/dbConnect.php';

function getAllProducts(): mysqli_result
{
    global $conn;
    return $conn->query('SELECT id, name, price, quantity FROM products ORDER BY id DESC');
}

function getProductById(int $id): ?array
{
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, quantity FROM products WHERE id = ?');
    $statement->bind_param('i', $id);
    $statement->execute();
    $product = $statement->get_result()->fetch_assoc();
    $statement->close();
    return $product ?: null;
}

function addProduct(string $name, string $price, int $quantity): void
{
    global $conn;
    $statement = $conn->prepare('INSERT INTO products (name, price, quantity) VALUES (?, ?, ?)');
    $statement->bind_param('ssi', $name, $price, $quantity);
    $statement->execute();
    $statement->close();
}

function updateProduct(int $id, string $name, string $price, int $quantity): void
{
    global $conn;
    $statement = $conn->prepare('UPDATE products SET name = ?, price = ?, quantity = ? WHERE id = ?');
    $statement->bind_param('ssii', $name, $price, $quantity, $id);
    $statement->execute();
    $statement->close();
}

function deleteProduct(int $id): void
{
    global $conn;
    $statement = $conn->prepare('DELETE FROM products WHERE id = ?');
    $statement->bind_param('i', $id);
    $statement->execute();
    $statement->close();
}
