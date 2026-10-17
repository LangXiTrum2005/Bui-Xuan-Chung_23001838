<?php
require_once __DIR__ . '/../common/validation.php';
$pageTitle = $pageTitle ?? 'Quản lý sản phẩm';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= escapeHtml($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header">
    <div class="container header-content">
        <a class="brand" href="index.php">Quản lý sản phẩm</a>
        <nav aria-label="Điều hướng chính">
            <a href="product_list.php">Danh sách</a>
            <a href="product_add.php">Thêm sản phẩm</a>
        </nav>
    </div>
</header>
<main class="container">
