<?php
require_once __DIR__ . '/includes/auth.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string)($_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($name === '' || $email === '' || strlen($password) < 6) {
        $error = 'Lengkapi nama, email valid, dan kata sandi minimal 6 karakter.';
    } else {
        $pdo = getDBConnection();
        if ($pdo) {
            try {
                $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, role, status) VALUES (:name, :email, :hash, 'siswa', 'aktif')");
                $stmt->execute(['name' => $name, 'email' => $email, 'hash' => password_hash($password, PASSWORD_BCRYPT)]);
                $message = 'Registrasi berhasil! Silakan login menggunakan email dan kata sandi Anda.';
            } catch (Throwable $e) {
                $error = 'Gagal mendaftar: email mungkin sudah terdaftar atau database belum siap.';
            }
        } else {
            $_SESSION['user'] = ['id' => 99, 'name' => $name, 'email' => $email, 'role' => 'siswa', 'status' => 'aktif'];
            header('Location: pages/siswa/dashboard.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Siswa — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">Registrasi Akun Siswa</h4>
                    <?php if ($error): ?><div class="alert alert-danger small"><?= htmlspecialchars($error) ?></div><?php endif; ?>
                    <?php if ($message): ?><div class="alert alert-success small"><?= htmlspecialchars($message) ?></div><?php endif; ?>
                    <form method="POST">
                        <div class="mb-3"><label class="form-label">Nama Lengkap</label><input type="text" name="name" class="form-control" required></div>
                        <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" required></div>
                        <div class="mb-3"><label class="form-label">Kata Sandi (min. 6 karakter)</label><input type="password" name="password" class="form-control" required></div>
                        <button type="submit" class="btn btn-success w-100">Daftar Akun Siswa</button>
                    </form>
                    <div class="mt-3 small text-center">Sudah punya akun? <a href="login.php">Login di sini</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
