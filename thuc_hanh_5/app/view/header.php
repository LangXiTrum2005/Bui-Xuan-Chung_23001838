<?php
require_once __DIR__ . '/../common/auth.php';
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
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Xin chào, <strong><?= escapeHtml($_SESSION['username']) ?></strong></span>
                <a href="product_list.php">Sản phẩm</a>
                <a href="logout.php">Đăng xuất</a>
            <?php else: ?>
                <a href="login.php">Đăng nhập</a>
                <a href="register.php">Đăng ký</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="container">
