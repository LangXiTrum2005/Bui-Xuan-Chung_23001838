<?php
require_once __DIR__ . '/common/auth.php';
redirectTo(isset($_SESSION['user_id']) ? 'product_list.php' : 'login.php');
