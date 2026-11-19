<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/database.php';

function demoUsers(): array {
    return [
        [
            'id' => 1,
            'name' => 'Administrator EduMind',
            'email' => 'admin@edumind.polinela.ac.id',
            'password' => 'password123',
            'role' => 'admin',
            'status' => 'aktif'
        ],
        [
            'id' => 2,
            'name' => 'Razzi Ronaldi (Guru)',
            'email' => 'guru@edumind.polinela.ac.id',
            'password' => 'password123',
            'role' => 'guru',
            'status' => 'aktif'
        ],
        [
            'id' => 3,
            'name' => 'Riski Winata',
            'email' => 'riski@edumind.polinela.ac.id',
            'password' => 'password123',
            'role' => 'siswa',
            'status' => 'aktif'
        ],
        [
            'id' => 4,
            'name' => 'Putri Aulia R.',
            'email' => 'putri@edumind.polinela.ac.id',
            'password' => 'password123',
            'role' => 'siswa',
            'status' => 'aktif'
        ],
        [
            'id' => 5,
            'name' => 'Raffi Aditya H.',
            'email' => 'raffi@edumind.polinela.ac.id',
            'password' => 'password123',
            'role' => 'siswa',
            'status' => 'aktif'
        ],
    ];
}

function authenticateUser(string $email, string $password): ?array {
    $pdo = getDBConnection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT id, name, email, password_hash, role, status FROM users WHERE email = :email LIMIT 1");
            $stmt->execute(['email' => trim($email)]);
            $user = $stmt->fetch();
            if ($user && $user['status'] === 'aktif' && password_verify($password, $user['password_hash'])) {
                unset($user['password_hash']);
                return $user;
            }
        } catch (Throwable $e) {
            // Fallback ke akun demo bila tabel belum diimpor
        }
    }

    foreach (demoUsers() as $u) {
        if (strcasecmp($u['email'], trim($email)) === 0 && $u['password'] === $password && $u['status'] === 'aktif') {
            $copy = $u;
            unset($copy['password']);
            return $copy;
        }
    }
    return null;
}

function currentUser(): ?array {
    return $_SESSION['user'] ?? null;
}

function dashboardUrlForRole(string $role): string {
    return match ($role) {
        'admin' => 'pages/admin/dashboard.php',
        'guru' => 'pages/guru/dashboard.php',
        default => 'pages/siswa/dashboard.php',
    };
}

function requireRole(array $allowedRoles, string $basePrefix = '../../'): void {
    $user = currentUser();
    if (!$user) {
        header('Location: ' . $basePrefix . 'login.php?error=auth_required');
        exit;
    }
    if (!in_array($user['role'], $allowedRoles, true)) {
        http_response_code(403);
        echo '<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>403 Akses Ditolak</title>';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>';
        echo '<body class="bg-light d-flex align-items-center justify-content-center vh-100">';
        echo '<div class="card shadow-sm p-4 text-center" style="max-width:440px">';
        echo '<h4 class="text-danger fw-bold">403 — Akses Ditolak (RBAC)</h4>';
        echo '<p class="text-muted">Peran akun Anda (<strong>' . htmlspecialchars($user['role']) . '</strong>) tidak memiliki izin untuk membuka halaman ini.</p>';
        echo '<a href="' . $basePrefix . dashboardUrlForRole($user['role']) . '" class="btn btn-primary">Kembali ke Dashboard Anda</a>';
        echo '</div></body></html>';
        exit;
    }
}
