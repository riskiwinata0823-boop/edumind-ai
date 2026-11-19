<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['admin'], '../../');
$user = currentUser();
$subjects = getSubjectsData();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrator — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-danger px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Administrator</span>
    <div class="d-flex align-items-center gap-3 text-white small">
        <span><?= htmlspecialchars($user['name']) ?></span>
        <a href="../../logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>
<div class="container py-4">
    <h3 class="fw-bold mb-4">Panel Administrasi Sistem & Hak Akses</h3>
    <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Total Pengguna</div><h4 class="fw-bold">5 Akun</h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Kelas Aktif</div><h4 class="fw-bold">1 Kelas (MI-3A)</h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Mata Pelajaran</div><h4 class="fw-bold"><?= count($subjects) ?> Mapel</h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Kebijakan RBAC</div><h4 class="fw-bold text-success">Aktif</h4></div></div></div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white fw-bold">Daftar Akun & Peran Terdaftar</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Nama</th><th>Email</th><th>Role</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php foreach (demoUsers() as $du): ?>
                        <tr>
                            <td><?= htmlspecialchars($du['name']) ?></td>
                            <td><?= htmlspecialchars($du['email']) ?></td>
                            <td><span class="badge bg-secondary"><?= htmlspecialchars($du['role']) ?></span></td>
                            <td><span class="badge bg-success"><?= htmlspecialchars($du['status']) ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
