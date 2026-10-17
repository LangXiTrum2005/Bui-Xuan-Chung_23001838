<?php

require_once __DIR__ . '/../common/dbConnect.php';

function getUserByUsername(string $username): ?array
{
    $statement = getDbConnection()->prepare('SELECT id, username, password FROM users WHERE username = ?');
    $statement->bind_param('s', $username);
    $statement->execute();
    $user = $statement->get_result()->fetch_assoc();
    $statement->close();
    return $user ?: null;
}

function addUser(string $username, string $password): void
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $statement = getDbConnection()->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $statement->bind_param('ss', $username, $hash);
    $statement->execute();
    $statement->close();
}
