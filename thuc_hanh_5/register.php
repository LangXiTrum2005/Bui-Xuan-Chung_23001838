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
    } elseif (mb_strlen($username, 'UTF-8') > 50) {
        $error = 'Tên đăng nhập không được quá 50 ký tự.';
    } elseif (getUserByUsername($username) !== null) {
        $error = 'Tên đăng nhập đã tồn tại.';
    } else {
        try {
            addUser($username, $password);
            redirectTo('login.php?registered=1');
        } catch (mysqli_sql_exception $exception) {
            if ($exception->getCode() === 1062) {
                $error = 'Tên đăng nhập đã tồn tại.';
            } else {
                throw $exception;
            }
        }
    }
}

$pageTitle = 'Đăng ký';
require __DIR__ . '/view/header.php';
?>
<section class="card form-card">
    <h1>Đăng ký</h1>
    <p>Tạo tài khoản để quản lý sản phẩm.</p>
    <?php if ($error !== ''): ?><p class="message error" role="alert"><?= escapeHtml($error) ?></p><?php endif; ?>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?= escapeHtml(csrfToken()) ?>">
        <label for="username">Tên đăng nhập</label>
        <input id="username" name="username" type="text" maxlength="50" autocomplete="username" required value="<?= escapeHtml($username) ?>">

        <label for="password">Mật khẩu</label>
        <input id="password" name="password" type="password" autocomplete="new-password" required>

        <div class="form-actions">
            <button type="submit">Đăng ký</button>
            <a href="login.php">Đã có tài khoản?</a>
        </div>
    </form>
</section>
<?php require __DIR__ . '/view/footer.php'; ?>
