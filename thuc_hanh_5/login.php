<?php
require_once __DIR__ . '/common/auth.php';
require_once __DIR__ . '/model/user.php';

if (isset($_SESSION['user_id'])) {
    redirectTo('product_list.php');
}

$username = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifyCsrf();
    $username = isset($_POST['username']) && is_string($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) && is_string($_POST['password']) ? $_POST['password'] : '';

    if ($username === '' || $password === '') {
        $error = 'Tên đăng nhập và mật khẩu không được để trống.';
    } else {
        $user = getUserByUsername($username);
        if ($user !== null && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = (int) $user['id'];
            $_SESSION['username'] = $user['username'];
            redirectTo('product_list.php');
        }
        $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
}

$pageTitle = 'Đăng nhập';
require __DIR__ . '/view/header.php';
?>
<section class="card form-card">
    <h1>Đăng nhập</h1>
    <p>Đăng nhập để xem và quản lý sản phẩm.</p>
    <?php if (isset($_GET['registered'])): ?><p class="message success">Đăng ký thành công. Hãy đăng nhập.</p><?php endif; ?>
    <?php if ($error !== ''): ?><p class="message error" role="alert"><?= escapeHtml($error) ?></p><?php endif; ?>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?= escapeHtml(csrfToken()) ?>">
        <label for="username">Tên đăng nhập</label>
        <input id="username" name="username" type="text" autocomplete="username" required value="<?= escapeHtml($username) ?>">

        <label for="password">Mật khẩu</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required>

        <div class="form-actions">
            <button type="submit">Đăng nhập</button>
            <a href="register.php">Tạo tài khoản</a>
        </div>
    </form>
</section>
<?php require __DIR__ . '/view/footer.php'; ?>
