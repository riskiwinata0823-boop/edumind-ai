<?php
require_once __DIR__ . '/includes/auth.php';

$error = '';
if (!empty($_GET['error']) && $_GET['error'] === 'auth_required') {
    $error = 'Silakan login terlebih dahulu untuk mengakses halaman tersebut.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $user = authenticateUser($email, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ' . dashboardUrlForRole($user['role']));
        exit;
    }
    $error = 'Email atau kata sandi tidak valid, atau akun tidak aktif.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">Login EduMind AI</h4>
                        <a href="index.php" class="btn btn-sm btn-outline-secondary">Beranda</a>
                    </div>
                    <?php if ($error): ?>
                        <div class="alert alert-danger py-2 small"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="nama@edumind.polinela.ac.id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" required placeholder="••••••••••••">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk & Arahkan Sesuai Role</button>
                    </form>
                    <hr>
                    <div class="small text-muted">
                        <strong>Akun Demo (password: <code>password123</code>):</strong>
                        <ul class="mb-2 mt-1">
                            <li>Admin: <code>admin@edumind.polinela.ac.id</code></li>
                            <li>Guru: <code>guru@edumind.polinela.ac.id</code></li>
                            <li>Siswa: <code>riski@edumind.polinela.ac.id</code></li>
                        </ul>
                        Belum punya akun siswa? <a href="register.php">Daftar di sini</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
