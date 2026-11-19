<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['guru'], '../../');
$user = currentUser();
$topics = getTopicsData();
$notice = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim((string)($_POST['title'] ?? ''));
    $diff = trim((string)($_POST['difficulty_level'] ?? 'menengah'));
    $obj = trim((string)($_POST['learning_objectives'] ?? ''));
    if ($title !== '') {
        $notice = "Topik/Materi baru \"$title\" (level: $diff) dicatat pada sesi demonstrasi guru.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi & Topik — Guru EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-success px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Manajemen Topik & Materi</span>
    <div class="d-flex gap-2">
        <a href="dashboard.php" class="btn btn-sm btn-outline-light">Kembali ke Dashboard</a>
        <a href="../../logout.php" class="btn btn-sm btn-danger">Logout</a>
    </div>
</nav>
<div class="container py-4">
    <?php if ($notice): ?><div class="alert alert-success"><?= htmlspecialchars($notice) ?></div><?php endif; ?>
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Tambah Topik & Materi Pembelajaran</div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Judul Topik / Materi</label>
                            <input type="text" name="title" class="form-control" required placeholder="Contoh: Perkalian Pecahan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tingkat Kesulitan</label>
                            <select name="difficulty_level" class="form-select">
                                <option value="dasar">Dasar</option>
                                <option value="menengah" selected>Menengah</option>
                                <option value="lanjut">Lanjut</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tujuan Pembelajaran</label>
                            <textarea name="learning_objectives" class="form-control" rows="3" placeholder="Tuliskan kompetensi yang ingin dicapai siswa..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan Topik & Materi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Daftar Topik & Materi Aktif</div>
                <div class="card-body">
                    <?php foreach ($topics as $t): ?>
                        <div class="border rounded p-3 mb-3 bg-white">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-bold mb-1"><?= htmlspecialchars($t['title']) ?></h6>
                                <span class="badge bg-info text-dark"><?= htmlspecialchars($t['difficulty_level']) ?></span>
                            </div>
                            <p class="small text-muted mb-1"><strong>Tujuan:</strong> <?= htmlspecialchars($t['learning_objectives']) ?></p>
                            <p class="small mb-0"><?= htmlspecialchars($t['material_content']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
