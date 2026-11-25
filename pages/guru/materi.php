<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['guru'], '../../');
$user = currentUser();
$notice = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim((string)($_POST['title'] ?? ''));
    $subjectId = (int)($_POST['subject_id'] ?? 1);
    $diff = trim((string)($_POST['difficulty_level'] ?? 'menengah'));
    $obj = trim((string)($_POST['learning_objectives'] ?? ''));
    $matTitle = trim((string)($_POST['material_title'] ?? $title));
    $matContent = trim((string)($_POST['material_content'] ?? ''));
    $summary = trim((string)($_POST['summary_notes'] ?? ''));

    if ($title !== '') {
        addCustomTopic([
            'title' => $title,
            'subject_id' => $subjectId,
            'difficulty_level' => $diff,
            'learning_objectives' => $obj,
            'material_title' => $matTitle,
            'material_content' => $matContent,
            'summary_notes' => $summary
        ]);
        $notice = "Topik/Materi baru \"$title\" (level: $diff) berhasil ditambahkan ke daftar aktif.";
    }
}

$topics = getTopicsData();
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
                            <label class="form-label">Mata Pelajaran</label>
                            <select name="subject_id" class="form-select">
                                <option value="1">Matematika Adaptif</option>
                                <option value="2">Teknologi Web & Logika Pemrograman</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Topik</label>
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
                            <textarea name="learning_objectives" class="form-control" rows="2" placeholder="Kompetensi yang ingin dicapai siswa..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Materi & Isi Materi</label>
                            <input type="text" name="material_title" class="form-control mb-2" placeholder="Judul materi...">
                            <textarea name="material_content" class="form-control" rows="3" placeholder="Uraian materi pembelajaran..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ringkasan Kunci</label>
                            <input type="text" name="summary_notes" class="form-control" placeholder="Poin ringkas materi...">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan Topik & Materi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Daftar Topik & Materi Aktif (<?= count($topics) ?> Topik)</div>
                <div class="card-body">
                    <?php foreach ($topics as $t): ?>
                        <div class="border rounded p-3 mb-3 bg-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-secondary mb-1"><?= htmlspecialchars($t['subject_name']) ?></span>
                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($t['title']) ?></h6>
                                </div>
                                <span class="badge bg-info text-dark"><?= htmlspecialchars($t['difficulty_level']) ?></span>
                            </div>
                            <p class="small text-muted mb-2"><strong>Tujuan:</strong> <?= htmlspecialchars($t['learning_objectives']) ?></p>
                            <?php foreach ($t['materials'] as $m): ?>
                                <div class="bg-light rounded p-2 mb-2 small">
                                    <strong><?= htmlspecialchars($m['title']) ?></strong> (<?= (int)$m['estimated_minutes'] ?> mnt):<br>
                                    <?= htmlspecialchars($m['content']) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
